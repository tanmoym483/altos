<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <?php echo $this->session->userdata('firstName'); ?> <i class="far fa-user"></i>
                <!-- <span class="badge badge-warning navbar-badge">15</span> -->
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"><?php echo $this->session->userdata('firstName'); ?></span>
                <div class="dropdown-divider"></div>
                <a href="<?php echo site_url('users/changePassword'); ?>" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i>Change Password
                    <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                </a>

                <a href="<?php echo site_url('auth/logout'); ?>" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                </a>

            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    </ul>
</nav>