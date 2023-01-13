<?php 

require_once('init.php');

$title = 'List of Bookings';
require_once('components/header.php');
require_once('components/navbar.php');
$curr_page = basename(__FILE__);
require_once('components/sidebar.php');
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row mt-5">
                <div class="col-sm-9">
                    <h3 class="page-title">
                        List of Bookings
                    </h3>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#addBooking">
                        <i class="fas fa-plus"></i>
                        Add Booking
                    </a>
                </div>
                <div class="col-sm-12 mt-2">
                    <?php require_once('components/alert.php') ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title float-left mt-2">
                            Booking List (<?= count($bookrooms) ?>)
                        </h4>
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
                                            <?php if($bookroom['book_isConfirm'] == 'Confirmed') : ?>
                                            <span class="badge badge-pill bg-success text-light">
                                                <?= $bookroom['book_isConfirm'] ?>
                                            </span>
                                            <?php elseif($bookroom['book_isConfirm'] == 'Cancelled') : ?>
                                            <span class="badge badge-pill bg-danger text-light">
                                                <?= $bookroom['book_isConfirm'] ?>
                                            </span>
                                            <?php else : ?>
                                            <span class="badge badge-pill bg-warning text-light">
                                                <?= $bookroom['book_isConfirm'] ?>
                                            </span>
                                            <?php endif; ?>

                                            <form action="book_status.php" method="POST" class="d-inline">
                                                <input type="hidden" name="book_id" value="<?= $bookroom['book_id'] ?>">
                                                <select name="book_status" id="book_status" class="form-control"
                                                    onchange="this.form.submit()">
                                                    <option selected disabled hidden>
                                                        Change Status
                                                    </option>
                                                    <option value="Confirmed" <?= $bookroom['book_isConfirm'] == 'Confirmed' ? 'selected' : '' ?>>
                                                        Confirmed
                                                    </option>
                                                    <option value="Cancelled" <?= $bookroom['book_isConfirm'] == 'Cancelled' ? 'selected' : '' ?>>
                                                        Cancelled
                                                    </option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>

                                            <a href="book_delete.php?book_id=<?= $bookroom['book_id'] ?>" onclick="return confirm('Are you sure you want to delete this booking?')"
                                                class="btn btn-sm bg-danger text-light">
                                                <i class="fas fa-trash"></i>
                                            </a>
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