<?php

require_once('Database.class.php');

class BookRoom extends Database{
    public function GetBookedRooms(){
        $sql = "SELECT * FROM tbl_book_room INNER JOIN tbl_room ON tbl_book_room.room_id = tbl_room.room_id INNER JOIN tbl_user ON tbl_book_room.user_id = tbl_user.user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function GetBookedRoom($id){
        $sql = "SELECT * FROM tbl_book_room WHERE book_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function GetBookedRoomByUser($id){
        $sql = "SELECT * FROM tbl_book_room INNER JOIN tbl_room ON tbl_book_room.room_id = tbl_room.room_id INNER JOIN tbl_user ON tbl_book_room.user_id = tbl_user.user_id WHERE tbl_book_room.user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();
        return $result;
    }
    
    public function CreateBookRoom($user_id, $room_id, $book_isConfirm, $book_date, $payment_method){
        if(empty($user_id) || empty($room_id) || empty($book_isConfirm) || empty($book_date) || empty($payment_method)){
            $_SESSION['error'] = "All fields are required";
        }else{
            $sql = "INSERT INTO tbl_book_room (user_id, room_id, book_isConfirm, book_date, payment_method) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute([$user_id, $room_id, $book_isConfirm, $book_date, $payment_method]);

            if($result){
                $_SESSION['success'] = "Book Room Created Successfully";
            }else{
                $_SESSION['error'] = "Book Room Creation Failed";
            }
        }
    }

    public function UpdateBookRoom($book_id, $book_status){
        if(empty($book_id) || empty($book_status)){
            $_SESSION['error'] = "All fields are required";
        }else{
            $sql = "UPDATE tbl_book_room SET book_isConfirm = ? WHERE book_id = ?";
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute([$book_status, $book_id]);

            if($result){
                $_SESSION['success'] = "Book Room Updated Successfully";
            }else{
                $_SESSION['error'] = "Book Room Update Failed";
            }
        }
    }
}