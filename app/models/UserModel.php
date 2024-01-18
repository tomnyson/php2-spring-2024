<?php

namespace Models;

class UserModel
{

    private $conn;
    private $table_name = "users";
    private $dbHelper;
    // chạy khi new class
    public function __construct()
    {
        $database = new \Database();
        $this->conn = $database->getConnection();
        $this->dbHelper = new \DatabaseHelper($this->conn);
    }
    public function getAll()
    {
        return $this->dbHelper->read($this->table_name);
    }

    public function getUserByEmail($email = "")
    {
        $sql = "SELECT * FROM $this->table_name where email = '$email'";
        return $this->dbHelper->readWithCondition($sql);
    }

    public function create($data = [])
    {
        return $this->dbHelper->create($this->table_name, $data);
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";

        return $this->dbHelper->readWithCondition($sql, array('email' => $email, 'password' => $password));
    }
}
