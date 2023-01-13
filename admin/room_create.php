<?php 
session_start();

require_once('../classes/Room.class.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $room_number = $_POST['room_number'];
    $room_name = $_POST['room_name'];
    $room_price = $_POST['room_price'];
    $room_image = $_FILES['room_image']['name'];
    $room_image_tmp = $_FILES['room_image']['tmp_name'];
    $room_image_size = $_FILES['room_image']['size'];
    $room_image_type = $_FILES['room_image']['type'];

    if($room_image_size > 2097152){
        $errors[] = 'File size must be excately 2 MB';
    }

    if(empty($errors) == true){
        $room = new Room();
        move_uploaded_file($room_image_tmp, "../images/rooms/" . $room_image);
        $result = $room->CreateRoom($room_number, $room_name, $room_price, $room_image);
        $_SESSION['success'] = $result;
        header('Location: rooms.php');
    }else{
        $_SESSION['errors'] = $errors;
        header('Location: room_create.php');
    }
}