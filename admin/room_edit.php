<?php 

require_once('init.php');

if(!isset($_GET['room_id'])){
    header('Location: rooms.php');
}

$room_id = $_GET['room_id'];

$room = $get_room->GetRoom($room_id);

$title = 'Update Room';
require_once('components/header.php');
require_once('components/navbar.php');
$curr_page = basename(__FILE__);
require_once('components/sidebar.php');


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $room_number = $_POST['room_number'];
    $room_name = $_POST['room_name'];
    $room_price = $_POST['room_price'];
    $room_image = $_FILES['room_image']['name'];
    $room_image_tmp = $_FILES['room_image']['tmp_name'];
    $room_image_size = $_FILES['room_image']['size'];
    $room_image_type = $_FILES['room_image']['type'];
    $room_image_ext = strtolower(end(explode('.', $room_image)));
    $extensions = array("jpeg", "jpg", "png");

    if(in_array($room_image_ext, $extensions) === false){
        $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
    }

    if($room_image_size > 2097152){
        $errors[] = 'File size must be excately 2 MB';
    }

    if(empty($errors) == true){
        move_uploaded_file($room_image_tmp, "../images/rooms/" . $room_image);
        $get_room->UpdateRoom($room_id, $room_number, $room_name, $room_price, $room_image);
    }else{
        print_r($errors);
    }
}
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row mt-5">
                <div class="col-sm-9">
                    <h3 class="page-title">
                        Update Room
                    </h3>
                </div>
                <div class="col-sm-12 mt-2">
                    <?php require_once('components/alert.php') ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex">
                <div class="card card-table flex-fill">
                    <form method="POST" action="<?= $_SERVER['PHP_SELF'] . '?room_id=' . $room_id ?>"
                        enctype="multipart/form-data">
                        <div class="card-body p-4">
                            <?= $room_id ?>
                            <div class="form-group">
                                <label for="room_number">Room Number</label>
                                <input type="number" class="form-control" name="room_number" id="room_number" value="<?= $room['room_number'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="room_name">Room Name</label>
                                <input type="text" class="form-control" name="room_name" id="room_name" value="<?= $room['room_name'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="room_price">Room Price</label>
                                <input type="number" class="form-control" name="room_price" id="room_price" value="<?= $room['room_price'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="room_img">Room Image</label>
                                <input type="file" class="form-control" name="room_image" id="room_img" required>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Update Room</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('components/footer.php'); ?>