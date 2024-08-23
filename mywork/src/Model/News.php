<?php

namespace iScale\Model;

class News
{
    /**
     * @var int Id for news.
     */
    private int $id;

    /**
     * @var string The Title of the news.
     */
    private string $title;

    /**
     * @var string The Body of news.
     */
    private string $body;

    /**
     * @var \DateTime Date when news is created.
     */
    private \DateTime $createdAt;

    /**
     * @param int $id Id for news.
     * @param string $title Title of the news.
     * @param string $body Body of news.
     * @param \DateTime $createdAt Date when news is created.
     */
    public function __construct(int $id, string $title, string $body, \DateTime $createdAt)
    {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->createdAt = $createdAt;
    }

    /**
     * Get ID of news
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set ID for news.
     *
     * @param int $id.
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get title of news.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set title of news item.
     *
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get body of news.
     *
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * Set body of news.
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
     * Get the Date when news is created.
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * Set the creation date and time.
     *
     * @param \DateTime $createdAt
     * @return self
     */
    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}
