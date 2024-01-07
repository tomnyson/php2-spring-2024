<?php

namespace Models;

use PDO;

class CarModel
{

    private $conn;
    private $table_name = "cars";
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

    public function getFilteredCars($params)
    {
        $query = "SELECT * FROM cars WHERE 1 = 1";
        $bindings = [];

        if (!empty($params['name'])) {
            $query .= " AND name LIKE :name";
            $bindings['name'] = '%' . $params['name'] . '%';
        }

        if (!empty($params['brand'])) {
            $query .= " AND brand = :brand";
            $bindings['brand'] = $params['brand'];
        }

        if (!empty($params['km'])) {
            $query .= " AND km <= :km";
            $bindings['km'] = $params['km'];
        }

        if (!empty($params['status'])) {
            $query .= " AND status = :status";
            $bindings['status'] = $params['status'];
        }

        if (!empty($params['location'])) {
            $query .= " AND location = :location";
            $bindings['location'] = $params['location'];
        }

        if (!empty($params['year'])) {
            $query .= " AND year = :year";
            $bindings['year'] = $params['year'];
        }

        // $stmt = $this->conn->prepare($query);
        // foreach ($bindings as $key => $value) {
        //     $stmt->bindValue(":$key", $value);
        // }

        // $stmt->execute();
        // return $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->dbHelper->readWithCondition($query, $bindings);
    }


    public function insert($data)
    {
        return $this->dbHelper->create($this->table_name, $data);
    }
}
