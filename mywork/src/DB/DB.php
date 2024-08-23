<?php

namespace iScale\DB;

use PDO;
use PDOStatement;

class DB
{
    private PDO $pdo;

    private static ?self $instance = null;

    private function __construct()
    {
        $dsn = 'mysql:dbname=iscale;host=127.0.0.1';
        $user = 'root';
        $password = '';

        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @return self
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Prepare SQL.
     *
     * @param string $sql
     * @return PDOStatement
     */
    public function prepare(string $sql): PDOStatement
    {
        return $this->pdo->prepare($sql);
    }

    /**
     * Execute prepared statement.
     *
     * @param PDOStatement $stmt
     * @param array $params
     * @return PDOStatement
     */
    public function execute(PDOStatement $stmt, array $params = []): PDOStatement
    {
        $stmt->execute($params);
        return $stmt;
    }

    /**
     * @param string $sq
     * @param array $params
     * @return array
     */
    public function select(string $sql, array $params = []): array
    {
        $stmt = $this->prepare($sql);
        $this->execute($stmt, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param string $sql
     * @param array $params
     * @return int
     */
    public function exec(string $sql, array $params = []): int
    {
        $stmt = $this->prepare($sql);
        $this->execute($stmt, $params);
        return $stmt->rowCount();
    }

    /**
     * Get last ID
     *
     * @return string
     */
    public function lastInsertId(): string
    {
        return $this->pdo->lastInsertId();
    }
}
