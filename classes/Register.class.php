<?php 

require_once('Database.class.php');

class Register extends Database{

    public function registerUser($email, $password, $first_name, $last_name){
        $sql = "INSERT INTO tbl_user (email, password, first_name, last_name) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email, $password, $first_name, $last_name]);
        return $stmt;
    }

    public function checkEmail($email){
        $sql = "SELECT * FROM tbl_user WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result;
    }

}