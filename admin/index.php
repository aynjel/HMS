<?php 

require_once('init.php');

$title = 'Dashboard';
require_once('components/header.php');
require_once('components/navbar.php');
$curr_page = basename(__FILE__);
require_once('components/sidebar.php');
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12 mt-5">
                    <h3 class="page-title mt-3">
                        Dashboard
                    </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">
                            Welcome to Hotel Management System
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <div>
                                <h3 class="card_widget_header">
                                    <?= count($bookrooms); ?>
                                </h3>
                                <h6 class="text-muted">Total Booking</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0"> 
                                <span class="opacity-7 text-muted">
                                    <i class="fas fa-user fa-2x"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <div>
                                <h3 class="card_widget_header">
                                    <?= count($available_rooms); ?>
                                </h3>
                                <h6 class="text-muted">Available Rooms</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted">
                                    <i class="fas fa-key fa-2x"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <div>
                                <h3 class="card_widget_header">
                                    <?= count($users); ?>
                                </h3>
                                <h6 class="text-muted">Cutomers</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted">
                                    <i class="fas fa-users fa-2x"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card board1 fill">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <div>
                                <h3 class="card_widget_header">
                                    <?= count($rooms); ?>
                                </h3>
                                <h6 class="text-muted">Total Rooms</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted">
                                    <i class="fas fa-suitcase fa-2x"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title float-left mt-2">
                            Booking List <span class="badge badge-pill bg-primary-light"><?= count($bookrooms); ?></span>
                        </h4>
                        <?php if(count($bookrooms) > 0): ?>
                            <button type="button" class="btn btn-primary float-right veiwbutton">Veiw All</button>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center" id="booking">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Room Number</th>
                                        <th>Room Name</th>
                                        <th>Customer</th>
                                        <th>Book Date</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($bookrooms as $bookroom): ?>
                                        <tr>
                                            <td>
                                                <?= $bookroom['book_id'] ?>
                                            </td>
                                            <td>
                                                <?= $bookroom['room_number'] ?>
                                            </td>
                                            <td>
                                                <?= $bookroom['room_name'] ?>
                                            </td>
                                            <td>
                                                <?= $get_user->GetUser($bookroom['user_id'])['first_name'] . ' ' . $get_user->GetUser($bookroom['user_id'])['last_name'] ?>
                                            </td>
                                            <td>
                                                <?= $bookroom['book_date'] ?>
                                            </td>
                                            <td>
                                                <?php if($bookroom['book_isConfirm'] == 'Pending') : ?>
                                                    <span class="badge badge-pill bg-warning-light">
                                                        <?= $bookroom['book_isConfirm'] ?>
                                                    </span>
                                                <?php elseif($bookroom['book_isConfirm'] == 'Confirm') : ?>
                                                    <span class="badge badge-pill bg-success-light">
                                                        <?= $bookroom['book_isConfirm'] ?>
                                                    </span>
                                                <?php elseif($bookroom['book_isConfirm'] == 'Cancel') : ?>
                                                    <span class="badge badge-pill bg-danger-light">
                                                        <?= $bookroom['book_isConfirm'] ?>
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="booking.php?book_id=<?= $bookroom['book_id'] ?>" class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('components/footer.php'); ?>