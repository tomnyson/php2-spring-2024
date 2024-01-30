<?php

namespace Models;

class OderModel
{

    private $conn;
    private $table_name = "orders";
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

    public function getOderByUserId($userId)
    {
        $sql = "SELECT Oders.*, products.* 
        FROM Oders 
        INNER JOIN products 
        ON Oders.productId = products.id 
        WHERE Oders.userId = :userId";

        return $this->dbHelper->readWithCondition($sql, array('userId' => $userId));
    }


    public function getListProductLimit($limit = 0)
    {
        $sql = "SELECT * FROM $this->table_name limit $limit";
        return $this->dbHelper->readWithCondition($sql);
    }


    public function create($data)
    {
        return $this->dbHelper->create($this->table_name, $data);
    }

    public function update($data, $conditions)
    {
        return $this->dbHelper->update($this->table_name, $data, $conditions);
    }

    public function remove($id)
    {
        return $this->dbHelper->delete($this->table_name, array('id' => $id));
    }

    public function getOderItem($userId, $product_id)
    {
        $sql = "SELECT * FROM Oders WHERE userId = :userId AND productId = :productId";

        return $this->dbHelper->readWithCondition($sql, array('userId' => $userId, 'productId' => $product_id));
    }
}
