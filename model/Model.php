<?php

class Model
{
    public $conn;
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "eam";
        $this->conn = new mysqli($servername, $username, $password, $dbname);
    }

}