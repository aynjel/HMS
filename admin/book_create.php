<?php 

require_once('init.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $room_id = $_POST['room_id'];
    $user_id = $_POST['user_id'];
    $book_date = $_POST['book_date'];
    $payment_method = $_POST['payment_method'];
    $book_isConfirm = $_POST['book_status'];

    $bookroom = new BookRoom();
    $bookroom->CreateBookRoom($user_id, $room_id, $book_isConfirm, $book_date, $payment_method);

    $_SESSION['success'] = 'Book room has been created';
    header('Location: bookings.php');
}else{
    header('Location: bookings.php');
}