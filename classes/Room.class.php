<?php

require_once('Database.class.php');

class Room extends Database{
    public function GetRooms(){
        $sql = "SELECT * FROM tbl_room ORDER BY room_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function GetRoom($id){
        $sql = "SELECT * FROM tbl_room WHERE room_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function GetAvailableRoom(){
        $sql = "SELECT * FROM tbl_room WHERE room_status = 'Available'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function CreateRoom($room_number, $room_name, $room_price, $room_img){
        if(empty($room_number) || empty($room_name) || empty($room_price) || empty($room_img)){
            return "All fields are required";
        }else{
            $sql = "INSERT INTO tbl_room (room_number, room_name, room_price, room_img) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute([$room_number, $room_name, $room_price, $room_img]);

            if($result){
                return "Room Created Successfully";
            }else{
                return "Room Creation Failed";
            }
        }
    }

    public function UpdateRoom($room_number, $room_name, $room_price, $room_img, $id){
        if(empty($room_number) || empty($room_name) || empty($room_price) || empty($room_img)){
            return "All fields are required";
        }else{
            $sql = "UPDATE tbl_room SET room_number = ?, room_name = ?, room_price = ?, room_img = ? WHERE room_id = ?";
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute([$room_number, $room_name, $room_price, $room_img, $id]);

            if($result){
                return "Room Updated Successfully";
            }else{
                return "Room Update Failed";
            }
        }
    }

    public function UpdateRoomStatus($room_id, $room_status){
        $sql = "UPDATE tbl_room SET room_status = ? WHERE room_id = ?";
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute([$room_status, $room_id]);

        if($result){
            return "Room Status Updated Successfully";
        }else{
            return "Room Status Update Failed";
        }
    }

    public function DeleteRoom($id){
        $sql = "DELETE FROM tbl_room WHERE room_id = ?";
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute([$id]);

        if($result){
            return "Room Deleted Successfully";
        }else{
            return "Room Deletion Failed";
        }
    }
}