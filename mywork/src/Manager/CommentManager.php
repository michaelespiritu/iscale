<?php

namespace iScale\Manager;

use iScale\DB\DB;
use iScale\Model\Comment;

class CommentManager
{
    private static ?self $instance = null;
    private DB $db;

    /**
     * @param DB
     */
    private function __construct(DB $db)
    {
        $this->db = $db;
    }

    /**
     * @param DB
     * @return self
     */
    public static function getInstance(DB $db): self
    {
        if (self::$instance === null) {
            self::$instance = new self($db);
        }
        return self::$instance;
    }

    /**
     * List all comments.
     *
     * @return Comment[] Array
     */
    public function listComments(): array
    {
        $sql = 'SELECT * FROM `comment`';
        $rows = $this->db->select($sql);

        $comments = [];
        foreach ($rows as $row) {
            $comment = new Comment(
                (int) $row['id'],
                $row['body'],
                new \DateTime($row['created_at']),
                (int) $row['news_id']
            );
            $comments[] = $comment;
        }

        return $comments;
    }

    /**
     * Add a comment for news.
     *
     * @param string $body
     * @param int $newsId
     * @return int ID
     */
    public function addCommentForNews(string $body, int $newsId): int
    {
        $sql = "INSERT INTO `comment` (`body`, `created_at`, `news_id`) VALUES (:body, :created_at, :news_id)";
        $params = [
            ':body' => $body,
            ':created_at' => (new \DateTime())->format('Y-m-d'),
            ':news_id' => $newsId,
        ];
        $this->db->exec($sql, $params);

        return $this->db->lastInsertId();
    }

    /**
     * Delete comment.
     *
     * @param int $id
     * @return int Number
     */
    public function deleteComment(int $id): int
    {
        $sql = "DELETE FROM `comment` WHERE `id` = :id";
        $params = [':id' => $id];
        return $this->db->exec($sql, $params);
    }
}
