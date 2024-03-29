<?php

require_once 'Model.php';

class ItemsSold extends Model
{
    function count(){
        $sql = "SELECT * FROM sold_items;";
        $result = $this->conn->query($sql);

        return $result->num_rows;
    }

    function get(){
        $json = [];
        $sql = "SELECT * FROM sold_items;";
        $result = $this->conn->query($sql);
        while($row = mysqli_fetch_assoc($result)){
            $json[] = $row;
        }

        return $json;
    }

    function insert($data){
        $sql = "INSERT INTO sold_items (`stock_id`, `customer_id`, `employee_id`, `transaction_id`, `price` ) VALUES ('".$data['stock_id']."', '".$data['customer_id']."', '".$data['employee_id']."', '".$data['transaction_id']."', '".$data['price']."')";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function show($id){
        $sql = "SELECT * FROM sold_items WHERE id='$id';";
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

    function update($data){
        $sql = "UPDATE sold_items SET stock_id='".$data['stock_id']."', customer_id='".$data['customer_id']."', employee_id='".$data['employee_id']."', transaction_id='".$data['transaction_id']."', price='".$data['price']." WHERE id=".$data["id"];

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function delete($id){
        $sql = "DELETE FROM sold_items WHERE id='$id'";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

}