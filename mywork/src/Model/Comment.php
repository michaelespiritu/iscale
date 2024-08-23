<?php

namespace iScale\Model;

use DateTime;

class Comment
{
    /**
     * @var int ID for comment.
     */
    private int $id;

    /**
     * @var string Body of comment.
     */
    private string $body;

    /**
     * @var DateTime Date when comment is creaated.
     */
    private DateTime $createdAt;

    /**
     * @var int ID of news
     */
    private int $newsId;

    /**
     * @param int $id ID for comment.
     * @param string $body Body of comment.
     * @param DateTime $createdAt Date when comment is creaated.
     * @param int $newsId ID of news
     */
    public function __construct(int $id, string $body, DateTime $createdAt, int $newsId)
    {
        $this->id = $id;
        $this->body = $body;
        $this->createdAt = $createdAt;
        $this->newsId = $newsId;
    }

    /**
     * Get ID of comment.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set ID for comment.
     *
     * @param int
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get body of comment.
     *
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * Set the body of comment..
     *
     * @param string $body
     * @return self
     */
    public function setBody(string $body): self
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Get the Date when comment is created.
     *
     * @return DateTime 
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Set the Date when comment is created.
     *
     * @param DateTime
     * @return self
     */
    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get news ID
     *
     * @return int
     */
    public function getNewsId(): int
    {
        return $this->newsId;
    }

    /**
     * Set ID of news
     *
     * @param int
     * @return self
     */
    public function setNewsId(int $newsId): self
    {
        $this->newsId = $newsId;
        return $this;
    }
}
