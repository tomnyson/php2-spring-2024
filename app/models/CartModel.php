<?php

namespace Models;

class CartModel
{

    private $conn;
    private $table_name = "carts";
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

    public function getCartByUserId($userId)
    {
        $sql = "SELECT carts.*, products.* 
        FROM carts 
        INNER JOIN products 
        ON carts.productId = products.id 
        WHERE carts.userId = :userId";

        return $this->dbHelper->readWithCondition($sql, array('userId' => $userId));
    }


    public function getListProductLimit($limit = 0)
    {
        $sql = "SELECT * FROM $this->table_name limit $limit";
        return $this->dbHelper->readWithCondition($sql);
    }


    public function insert($data)
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

    public function removeCartByUserId($userId)
    {
        return $this->dbHelper->delete($this->table_name, array('userId' => $userId));
    }


    public function getCartItem($userId, $product_id)
    {
        $sql = "SELECT * FROM carts WHERE userId = :userId AND productId = :productId";

        return $this->dbHelper->readWithCondition($sql, array('userId' => $userId, 'productId' => $product_id));
    }
    public function getToTalCartByUser($userId)
    {
        $sql = "select sum(quantity * price) as total from carts
        inner join products on carts.productId = products.id
        where userId=:userId
        ";

        return $this->dbHelper->readWithCondition($sql, array('userId' => $userId));
    }
}
