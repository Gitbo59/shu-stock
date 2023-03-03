<?php
require_once 'Model.php';

class Transaction extends Model
{
    function count(){
        $sql = "SELECT * FROM transactions;";
        $result = $this->conn->query($sql);

        return $result->num_rows;
    }
    function get($latest){
        $json = [];
        if($latest)
            $sql = "SELECT * FROM transactions ORDER BY id DESC LIMIT 2;";
        else
            $sql = "SELECT * FROM transactions;";
        $result = $this->conn->query($sql);
        while($row = mysqli_fetch_assoc($result)){
            $row['id'] = (int) $row['id'];
            $row['product_id'] = (int) $row['product_id'];
            $row['canteen_id'] = (int) $row['canteen_id'];

            $json[] = $row;
        }

        return $json;
    }

    function insert($data){
        $sql = "INSERT INTO transactions (`product_id`, `canteen_id`, `dop`) VALUES ('".$data['product_id']."', '".$data['canteen_id']."','".$data['dop']."')";
    
        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function show($id){
        $sql = "SELECT * FROM transactions WHERE id='$id';";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $row['id'] = (int) $row['id'];
            $row['product_id'] = (int) $row['product_id'];
            $row['canteen_id'] = (int) $row['canteen_id'];
            $row['dop'] = (int) $row['dop'];
            $this->conn->close();
            return $row;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function update($data){
        $sql = "UPDATE transactions SET product_id='".$data['product_id']."', canteen_id='".$data['canteen_id']."', dop='".$data['dop']."' WHERE id=".$data["id"];

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            error_log("Database error: " . $this->conn->error);
            $this->conn->close();
            return false;
        }
    }

    function delete($id){
        $sql = "DELETE FROM transactions WHERE id='$id'";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

}