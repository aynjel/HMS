<?php 

require_once('init.php');

$title = 'Rooms';
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
                        Rooms
                    </h3>
                </div>
                <div class="col-sm-3">
                    <a href="javascript:void(0)" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#addRoom">
                        <i class="fas fa-plus"></i>
                        Add Room
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
                            Rooms List <span class="badge badge-pill bg-primary text-light"><?= count($rooms) ?></span>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center" id="rooms">
                                <thead>
                                    <tr>
                                        <th>Room Number</th>
                                        <th>Room Name</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Available</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($rooms as $room): ?>
                                    <tr>
                                        <td>
                                            <?= $room['room_number'] ?>
                                        </td>
                                        <td>
                                            <?= $room['room_name'] ?>
                                        </td>
                                        <td>
                                            <?= $room['room_price'] ?>
                                        </td>
                                        <td>
                                            <img src="../images/rooms/<?= $room['room_img'] ?>" alt="Room Image"
                                                width="100">
                                        </td>
                                        <td>
                                            <?php if($room['room_status'] == 'Available'): ?>
                                            <span class="badge badge-pill bg-success text-light">
                                                <?= $room['room_status'] ?>
                                            </span>
                                            <?php else: ?>
                                            <span class="badge badge-pill bg-danger text-light">
                                                <?= $room['room_status'] ?>
                                            </span>
                                            <?php endif; ?>

                                            <form action="room_status.php" method="POST" class="d-inline">
                                                <input type="hidden" name="room_id" value="<?= $room['room_id'] ?>">
                                                <select name="room_status" id="book_status" class="form-control"
                                                    onchange="this.form.submit()">
                                                    <option value="Available" <?= $room['room_status'] == 'Available' ? 'selected' : '' ?>>
                                                        Available</option>
                                                    <option value="Unavailable" <?= $room['room_status'] == 'Unavailable' ? 'selected' : '' ?>>
                                                        Unavailable</option>
                                                </select>
                                            </form>

                                        </td>
                                        <td>
                                            <!-- <a href="room_edit.php?room_id=<?= $room['room_id'] ?>" class="btn btn-sm bg-success text-light">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a> -->
                                            <a href="room_delete.php?room_id=<?= $room['room_id'] ?>"
                                                class="btn btn-sm bg-danger text-light"
                                                onclick="return confirm('Are you sure you want to delete this room?')">
                                                <i class="fe fe-trash"></i> Delete
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