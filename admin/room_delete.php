<?php

require_once('init.php');

if(!isset($_GET['room_id'])){
    header('Location: rooms.php');
}

$room_id = $_GET['room_id'];

$get_room->DeleteRoom($room_id);

$_SESSION['success'] = "Room Deleted Successfully";
header('Location: rooms.php');