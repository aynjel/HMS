<?php

session_start();

require_once('../classes/Autoloader.php');

$get_room = new Room();
$rooms = $get_room->GetRooms();

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}