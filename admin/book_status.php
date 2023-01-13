<?php 

require_once('init.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $book_id = $_POST['book_id'];
    $book_status = $_POST['book_status'];

    $bookroom = new BookRoom();
    $bookroom->UpdateBookRoom($book_id, $book_status);

    $_SESSION['success'] = 'Book status has been updated';
    header('Location: bookings.php');
}else{
    header('Location: bookings.php');
}