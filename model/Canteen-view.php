<?php

require_once 'Model.php';

class Canteen extends Model
{
    function count()
    {
        $sql = "SELECT * FROM canteens;";
        $result = $this->conn->query($sql);

        return $result->num_rows;
    }

    function get()
    {
        $json = [];
        $sql = "SELECT * FROM canteens;";
        $result = $this->conn->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $json[] = $row;
        }

        return $json;
    }

    function show($id)
    {
        $sql = "SELECT * FROM canteens WHERE id='$id';";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->conn->close();
            return $row;
        } else {
            $this->conn->close();
            return false;
        }
    }


   
}
