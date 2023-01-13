<?php

session_start();

require_once('../classes/BookRoom.class.php');
require_once('../classes/Room.class.php');
require_once('../classes/User.class.php');

if(!isset($_SESSION['admin'])){
    header('Location: auth/signin.php');
}

$admin = $_SESSION['admin'];

$get_user = new User();
$users = $get_user->GetUsers();

$get_bookroom = new BookRoom();
$bookrooms = $get_bookroom->GetBookedRooms();

$get_room = new Room();
$rooms = $get_room->GetRooms();
$available_rooms = $get_room->GetAvailableRoom();
