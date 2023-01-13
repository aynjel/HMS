<?php
require_once('init.php');

if(!isset($_GET['room_id'])){
    header('location: index.php');
}

$room_id = $_GET['room_id'];

$room = new Room();
$room_details = $room->GetRoom($room_id);

$title = 'Home';
require_once('components/header.php');
require_once('components/navbar.php');
?>

<!--================ Hotel Rooms  =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <?php require_once('components/alert.php'); ?>
        <div class="section_title text-center">
            <h2 class="title_color">
                Book Room
            </h2>
            <p>
                Book your room now. We have the best rooms for you.
            </p>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="../images/rooms/<?= $room_details['room_img'] ?>" alt="" height="300px" width="100%">
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="accomodation_item">
                    <span class="badge badge-primary">
                        Room Name
                    </span>
                    <h4 class="card-title">
                        <?= $room_details['room_name'] ?>
                    </h4>
                    <span class="badge badge-primary">
                        Price
                    </span>
                    <h5>
                        ₱ <?= $room_details['room_price'] ?>
                    </h5>
                    <span class="badge badge-primary">
                        Payment Method
                    </span>
                    <hr>
                    <?php require_once('book_room_modal.php'); ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookRoom">
                        Book Room
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Accomodation Area  =================-->

<?php require_once('components/footer.php') ?>