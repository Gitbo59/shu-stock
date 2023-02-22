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
            $row['weight'] = (int) $row['weight'];
            $row['Amount'] = (int) $row['Amount'];
            $row['rate_id'] = (int) $row['rate_id'];
            $json[] = $row;
        }

        return $json;
    }

    function insert($data){
        $sql = "INSERT INTO transactions (`weight`, `Amount`, `rate_id`) VALUES ('".$data['weight']."', '".$data['Amount']."', '".$data['rate_id']."')";

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
            $row['weight'] = (int) $row['weight'];
            $row['Amount'] = (int) $row['Amount'];
            $row['rate_id'] = (int) $row['rate_id'];
            $this->conn->close();
            return $row;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function update($data){
        $sql = "UPDATE transactions SET weight='".$data['weight']."', Amount='".$data['Amount']."', rate_id='".$data['rate_id']."' WHERE id=".$data["id"];

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
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