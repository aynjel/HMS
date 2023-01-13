<!-- add booking modal -->
<div class="modal fade" id="addBooking" data-backdrop="static" data-keyboard="true" tabindex="-1"
    aria-labelledby="addBooking" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBookingLabel">
                    <i class="fas fa-plus"></i>
                    Add Booking
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="book_create.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="room_id">Room Number</label>
                        <select class="form-control" name="room_id" id="room_id">
                            <option selected hidden disabled>Select Room</option>
                            <?php foreach($rooms as $room): ?>
                            <option value="<?= $room['room_id'] ?>">
                                <?= $room['room_number'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user_id">Customer</label>
                        <select class="form-control" name="user_id" id="user_id">
                            <option selected hidden disabled>Select Customer</option>
                            <?php foreach($users as $customer): ?>
                            <option value="<?= $customer['user_id'] ?>">
                                <?= $customer['first_name'] . ' ' . $customer['last_name'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="book_date">Book Date</label>
                        <input type="date" class="form-control" name="book_date" id="book_date">
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <select class="form-control" name="payment_method" id="payment_method">
                            <option selected hidden disabled>Select Payment Method</option>
                            <option value="gcash">GCash</option>
                            <option value="paypal">Paypal</option>
                            <option value="mastercard">Mastercard</option>
                        </select>
                    </div>
                    <input type="hidden" name="book_status" value="Pending">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- add room modal -->
<div class="modal fade" id="addRoom" data-backdrop="static" data-keyboard="true" tabindex="-1" aria-labelledby="addRoom"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoomLabel">
                    <i class="fas fa-plus"></i>
                    Add Room
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="room_create.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="room_number">Room Number</label>
                        <input type="number" class="form-control" name="room_number" id="room_number" required>
                    </div>
                    <div class="form-group">
                        <label for="room_name">Room Name</label>
                        <input type="text" class="form-control" name="room_name" id="room_name" required>
                    </div>
                    <div class="form-group">
                        <label for="room_price">Room Price</label>
                        <input type="number" class="form-control" name="room_price" id="room_price" required>
                    </div>
                    <div class="form-group">
                        <label for="room_img">Room Image</label>
                        <input type="file" class="form-control" name="room_image" id="room_img" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>