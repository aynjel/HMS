<?php
require_once('init.php');

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
                Hotel Rooms
            </h2>
            <p>
                Dear customers we have the best rooms for you. Please book your room now.
            </p>
        </div>
        <div class="row mb_30">
            <?php foreach($rooms as $room) : ?>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="../images/rooms/<?= $room['room_img'] ?>" alt="" height="200px" width="100%">
                        <?php if(isset($_SESSION['user'])): ?>
                            <a href="book_room.php?room_id=<?= $room['room_id'] ?>" class="btn theme_btn button_hover">Book Now</a>
                        <?php else: ?>
                            <a href="javascript:void(0)" data-toggle="modal"
                            data-target="#signin" class="btn theme_btn button_hover">Book Now</a>
                        <?php endif; ?>
                    </div>
                    <a href="#">
                        <h4 class="sec_h4">
                            <?= $room['room_name'] ?>
                        </h4>
                    </a>
                    <h5>
                        ₱ <?= $room['room_price'] ?>
                    </h5>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!--================ Accomodation Area  =================-->

<?php require_once('components/footer.php') ?>