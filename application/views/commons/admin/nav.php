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
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">0</span>
        </a>
        
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">0</span>
        </a>
        
      </li>
      
      
    
    
        <!-- Navbar Search -->

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-user"></i> <?php echo $this->session->userdata('firstName'); ?> (<?php if($this->session->userdata('role') != 'vendor' && $this->session->userdata('role') != 'customer' && $this->session->userdata('role') != 'offline_shop') { echo ucfirst($this->session->userdata('role')); } if($this->session->userdata('role') == 'vendor') { echo 'Franchise'; } if($this->session->userdata('role') == 'offline_shop') { echo 'Offline Shop'; } if($this->session->userdata('role') == 'customer') { echo 'Card Member'; }  ?>) 
                <!-- <span class="badge badge-warning navbar-badge">15</span> -->
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header" style=""><?php echo $this->session->userdata('firstName').' '.$this->session->userdata('lastName'); ?></span>
                <?php if($this->session->userdata('role') != 'superAdmin'){ ?><p class="dropdown-item dropdown-header text-left" ><?php echo 'Email: <span id="email">'.$_SESSION['email'].'</span>'; ?> <span><a onclick="copy('email')"><i class="fas fa-copy"></i></a></span></p>
                <p class="dropdown-item dropdown-header text-left"><?php echo 'Username: <span id="regId">'.$_SESSION['regId'].'</span>'; ?> <span><a onclick="copy('regId')"><i class="fas fa-copy"></i></a></span></p><?php } ?>
                
                <div class="dropdown-divider"></div>
                <?php if($this->session->userdata('role') != 'superAdmin'){ ?><a href="<?php echo site_url('profile'); ?>" class="dropdown-item">
                    <i class="far fa-user mr-2"></i>Profile
                    <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                </a><?php } ?>
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
<style>
  @media(max-width:480px) {
  /* Styles */
  .navbar-expand .navbar-nav .nav-link{
    padding-left:0;
  }
  .navbar-light .navbar-nav .nav-link{
    font-size:16px;
  }
}
</style>