<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <?php if($curr_page == 'index.php') : ?>
                <li class="active">
                    <a href="index.php">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php else : ?>
                <li>
                    <a href="index.php">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if($curr_page == 'bookings.php') : ?>
                <li class="active">
                    <a href="bookings.php">
                        <i class="fas fa-suitcase"></i>
                        <span> Booking</span>
                    </a>
                </li>
                <?php else : ?>
                <li>
                    <a href="bookings.php">
                        <i class="fas fa-suitcase"></i>
                        <span> Booking</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if($curr_page == 'customers.php') : ?>
                <li class="active">
                    <a href="customers.php">
                        <i class="fas fa-user"></i>
                        <span> Customers</span>
                    </a>
                </li>
                <?php else : ?>
                <li>
                    <a href="customers.php">
                        <i class="fas fa-user"></i>
                        <span> Customers</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if($curr_page == 'rooms.php' || $curr_page == 'room_edit.php') : ?>
                <li class="active">
                    <a href="rooms.php">
                        <i class="fas fa-user"></i>
                        <span> Rooms</span>
                    </a>
                </li>
                <?php else : ?>
                <li>
                    <a href="rooms.php">
                        <i class="fas fa-user"></i>
                        <span> Rooms</span>
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</div>