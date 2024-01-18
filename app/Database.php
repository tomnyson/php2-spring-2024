<?php

class Database
{

    private $host = "localhost";
    private $db_name = "php2";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        $this->host = $_ENV['DB_HOST'] ?? "localhost";
        $this->db_name = $_ENV['DB_NAME'] ?? "php2";
        $this->username = $_ENV['DB_USER'] ?? "root";
        $this->password = $_ENV['DB_PASS'] ?? "";

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Database connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
