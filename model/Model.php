<?php

class Model
{
    public $conn;
    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "SHU_DATA";
        $this->conn = new mysqli($servername, $username, $password, $dbname);
    }

}