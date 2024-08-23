<?php

namespace iScale\Manager;

use iScale\DB\DB;
use iScale\Model\News;

class NewsManager
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
     * List all news.
     *
     * @return News[] Array
     */
    public function listNews(): array
    {
        $sql = 'SELECT * FROM `news`';
        $rows = $this->db->select($sql);

        $newsItems = [];
        foreach ($rows as $row) {
            $news = new News(
                (int) $row['id'],
                $row['title'],
                $row['body'],
                new \DateTime($row['created_at'])
            );
            $newsItems[] = $news;
        }

        return $newsItems;
    }

    /**
     * Add a new news.
     *
     * @param string $title Title of news.
     * @param string $body Body of news.
     * @return int ID of new news.
     */
    public function addNews(string $title, string $body): int
    {
        $sql = "INSERT INTO `news` (`title`, `body`, `created_at`) VALUES (:title, :body, :created_at)";
        $params = [
            ':title' => $title,
            ':body' => $body,
            ':created_at' => (new \DateTime())->format('Y-m-d'),
        ];
        $this->db->exec($sql, $params);

        return $this->db->lastInsertId();
    }
}
