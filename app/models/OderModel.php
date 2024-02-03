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
        $sql = "SELECT orders.*, users.*, orders.status as orderStatus, orders.id as orderId
        FROM orders 
        INNER JOIN users
        on orders.userId = users.id
        WHERE orders.userId = :userId";

        return $this->dbHelper->readWithCondition($sql, array('userId' => $userId));
    }


    public function getOderDetailById($orderId)
    {
        $sql = "SELECT orders.*, users.*, orderDetails.*, products.*, orders.id as orderId, products.id as productId, orders.status as orderStatus,  orders.id as orderId
        FROM orders 
        INNER JOIN users
        on orders.userId = users.id
        inner join orderDetails
        on orderDetails.orderId = orders.id
        inner join products
        on orderDetails.productId = products.id
        WHERE orders.id = :orderId";

        return $this->dbHelper->readWithCondition($sql, array('orderId' => $orderId));
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
    public function createOrderItem($data)
    {
        return $this->dbHelper->create("orderDetails", $data);
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
    public function getLastID($userId)
    {
        $sql = "SELECT MAX(id) as latestId FROM orders WHERE userId = :userId";
        return $this->dbHelper->readWithCondition($sql, array('userId' => $userId));
    }
}
