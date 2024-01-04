<?php
// app/models/UserModel.php
namespace Models;

require_once BASE_PATH . '/app/database.php';
require_once BASE_PATH . '/app/DatabaseHelper.php';


class UserModel
{
    private $conn;
    private $table_name = "users";
    private $dbHelper;
    public function __construct()
    {
        $database = new \Database(); // Adjust the namespace if Database is in a different namespace
        $this->conn = $database->getConnection();
        $this->dbHelper = new \DatabaseHelper($this->conn);
    }

    public function getUsers()
    {

        return $this->dbHelper->read($this->table_name);
    }
}
