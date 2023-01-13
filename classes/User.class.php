<?php

require_once('Database.class.php');

class User extends Database{
    public function GetUsers(){
        $sql = "SELECT * FROM tbl_user ORDER BY user_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function GetUser($id){
        $sql = "SELECT * FROM tbl_user WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function GetUserBookedRooms($id){
        $sql = "SELECT * FROM tbl_book_room WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function CreateUser($email, $password, $first_name, $last_name){
        if(empty($email) || empty($password) || empty($first_name) || empty($last_name)){
            $_SESSION['error'] = "All fields are required";
            header('Location: user_create.php');
        }else{
            $sql = "INSERT INTO tbl_user (email, password, first_name, last_name) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute([$email, $password, $first_name, $last_name]);

            if($result){
                $_SESSION['success'] = "User Created Successfully";
                header('Location: user_create.php');
            }else{
                $_SESSION['error'] = "User Creation Failed";
                header('Location: user_create.php');
            }
        }
    }

    public function UpdateUser($id, $email, $password, $first_name, $last_name){
        if(empty($email) || empty($password) || empty($first_name) || empty($last_name)){
            $_SESSION['error'] = "All fields are required";
            header('Location: user_edit.php?id='.$id);
        }else{
            $sql = "UPDATE tbl_user SET email = ?, password = ?, first_name = ?, last_name = ? WHERE user_id = ?";
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute([$email, $password, $first_name, $last_name, $id]);

            if($result){
                $_SESSION['success'] = "User Updated Successfully";
                header('Location: user_edit.php?id='.$id);
            }else{
                $_SESSION['error'] = "User Update Failed";
                header('Location: user_edit.php?id='.$id);
            }
        }
    }

    public function DeleteUser($id){
        $sql = "DELETE FROM tbl_user WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute([$id]);

        if($result){
            $_SESSION['success'] = "User Deleted Successfully";
            header('Location: user_index.php');
        }else{
            $_SESSION['error'] = "User Delete Failed";
            header('Location: user_index.php');
        }
    }
}