<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('dashboard'); ?>" class="brand-link">
        <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Stox Logo" class="  elevation-3" style="opacity: .8; width:100%">
        <!-- <span class="brand-text font-weight-light">Stox</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex"> -->
        <!-- <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div> -->
        <!-- <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div> -->
        <!-- </div> -->



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="<?php echo site_url('dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == "dashboard") {
                                                                                        echo 'active';
                                                                                    } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul> -->
                </li>
                <?php if ($this->session->role == 'superAdmin' || $this->session->role == 'admin') { ?>
                    <li class="nav-item menu-open">
                        <a href="<?php echo site_url('bdo') ?>" class="nav-link <?php if ($this->uri->segment(1) == "bdo") {
                                                                                    echo 'active';
                                                                                } ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                BDO
                                <!-- <i class="right fas fa-angle-left"></i> -->
                            </p>
                        </a>

                    </li>
                <?php } ?>
                <li class="nav-item menu-open">
                    <a href="<?php echo site_url('users') ?>" class="nav-link <?php if ($this->uri->segment(1) == "users") {
                                                                                    echo 'active';
                                                                                } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Users
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>

                </li>

                <!-- <li class="nav-item menu-open">
                    <a href="<?php echo site_url('UsersDetails') ?>" class="nav-link <?php if ($this->uri->segment(1) == "UsersDetails") {
                                                                                            echo 'active';
                                                                                        } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            UsersDetails
                            
                        </p>
                    </a>

                </li> -->

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>