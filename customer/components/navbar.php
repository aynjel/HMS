<?php require_once('signin.php'); ?>
<?php require_once('signup.php'); ?>
<!--================Header Area =================-->
<header class="header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo_h" href="index.php">
                Hotel Booking
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">

                    <?php if(isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">
                            <span class='badge badge-success'>
                                <?= $user['first_name'] . ' ' . $user['last_name'] ?>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="booked_rooms.php">Booked Rooms</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="logout.php"
                            onclick="return confirm('Are you sure you want to logout?')">
                            Logout

                        </a>
                    </li>

                    <?php else: ?>


                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link" data-toggle="modal" data-target="#signin">
                            Sign In
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link" data-toggle="modal" data-target="#signup">
                            Sign Up
                        </a>
                    </li>

                    <?php endif; ?>

                </ul>
            </div>
        </nav>
    </div>
</header>
<!--================Header Area =================-->