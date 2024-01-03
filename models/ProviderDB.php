<?php

class ProviderDB
{
    private $host;
    private $user_name;
    private $password;
    private $db_name;
    private $connection = null;
    function __construct($host, $user_name, $password, $db_name)
    {
        $this->host = $host;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->db_name = $db_name;
        $this->connection = null;
    }

    public function connect()
    {
        try {
            $url = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . "";
            $this->connection = new PDO($url, $this->user_name, $this->password);
        } catch (ErrorException $error) {
            echo $error;
            return null;
        }
    }

    public function disconnect()
    {
        if ($this->connection) {
            $this->connection = null;
        }
    }
}