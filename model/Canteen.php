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

    function insert($data)
    {
        $sql = "INSERT INTO canteens (`name`, `address`, `email`, `phone`) VALUES ('" . $data['name'] . "', '" . $data['address'] . "', '" . $data['email'] . "', '" . $data['phone'] . "')";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
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

    function update($data)
    {
        $sql = "UPDATE canteens SET name='" . $data['name'] . "', address='" . $data['address'] . "', phone='" . $data['phone'] . "', email='" . $data['email'] . "' WHERE id=" . $data["id"];

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function delete($id)
    {
        $sql = "DELETE FROM canteens WHERE id='$id'";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }
}
