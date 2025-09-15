<style>
  .nav-icon-svg svg{
    fill:#fff;
    width:20px;
    margin-right: .2rem;
  }
</style>
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
       
        <li class="nav-item">
          <a href="<?php echo site_url('dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == "dashboard") {
                                                                          echo 'active';
                                                                        } ?>">
            
            <p>
            <span class="nav-icon-svg" style="color:#fff; width: 25px"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                                                                      </span> Home
              <!-- <i class="right fas fa-angle-left"></i> -->
            </p>
          </a>
          <?php if ($this->session->role == 'superAdmin') { ?>
            <li class="nav-item">
              <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "admincreate" || $this->uri->segment(2) == "admin_list") { echo 'active';} ?>">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Product Details
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
                  <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/admincreate') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Product</p>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/admin_list') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Product List</p>
                  </a>
                </li>
              </ul>                        
            </li>
            
            <?php } ?>
        
          
        
        
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>