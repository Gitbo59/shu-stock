<?php

require_once 'Model.php';

class Stock extends Model
{
    function count(){
        $sql = "SELECT * FROM stocks;";
        $result = $this->conn->query($sql);

        return $result->num_rows;
    }
    function get(){
        $json = [];
        $sql = "SELECT * FROM stocks;";
        $result = $this->conn->query($sql);
        while($row = mysqli_fetch_assoc($result)){
            $row['id'] = (int) $row['id'];
            $row['weight'] = (int) $row['weight'];
            $row['purity'] = (int) $row['purity'];
            $row['canteen_id'] = (int) $row['canteen_id'];
            $row['product_id'] = (int) $row['product_id'];
            $json[] = $row;
        }

        return $json;
    }

    function insert($data){
        $sql = "INSERT INTO stocks (`weight`, `purity`, `canteen_id`, `product_id`) VALUES ('".$data['weight']."', '".$data['purity']."', '".$data['canteen_id']."', '".$data['product_id']."')";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function show($id){
        $sql = "SELECT * FROM stocks WHERE id='$id';";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $row['id'] = (int) $row['id'];
            $row['weight'] = (int) $row['weight'];
            $row['purity'] = (int) $row['purity'];
            $row['canteen_id'] = (int) $row['canteen_id'];
            $row['product_id'] = (int) $row['product_id'];
            $this->conn->close();
            return $row;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function update($data){
        $sql = "UPDATE stocks SET weight='".$data['weight']."', purity='".$data['purity']."', product_id='".$data['product_id']."', canteen_id ='".$data['canteen_id']."' WHERE id=".$data["id"];

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function delete($id){
        $sql = "DELETE FROM stocks WHERE id='$id'";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

}