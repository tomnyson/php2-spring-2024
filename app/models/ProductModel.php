<?php

namespace Models;

class ProductModel
{

    private $conn;
    private $table_name = "products";
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

    public function insert($data)
    {
        return $this->dbHelper->create($this->table_name, $data);
    }
}
