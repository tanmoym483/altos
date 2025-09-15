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
<a href="#" class="nav-link <?php if ($this->uri->segment(2) == "admincreate" || $this->uri->segment(2) == "admin_list") {
                                                                              echo 'active';
                                                                            } ?>">
  <i class="nav-icon fas fa-chart-pie"></i>
  <p>
  Sub Admin
    <i class="right fas fa-angle-left"></i>
  </p>
</a>
<ul class="nav nav-treeview">
  <li class="nav-item">
    <a href="<?php echo base_url('admin/admincreate') ?>" class="nav-link">
      <i class="far fa-circle nav-icon"></i>
      <p>Add Sub Admin</p>
    </a>
  </li>
   
  <li class="nav-item">
    <a href="<?php echo base_url('admin/admin_list') ?>" class="nav-link">
      <i class="far fa-circle nav-icon"></i>
      <p>Sub Admin List</p>
    </a>
  </li>
  
 
</ul>
</li> <?php } ?>
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
        <?php if (  $this->session->role == 'vendor') { ?>
          <li class="nav-item">
            <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "diagnosticcreate" || $this->uri->segment(2) == "diagonstic_list") {
                                                                                          echo 'active';
                                                                                        } ?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
              Diagnostic
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/diagnosticcreate') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Diagnostic</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo base_url('admin/diagonstic_list') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Diagnostic List </p>
                </a>
              </li>
              
            
            </ul>
          </li>
          <?php } ?>
        
         
          <?php if ($this->session->role == 'superAdmin') { ?>
          <li class="nav-item">
              <a href="#" class="nav-link <?php if ($this->uri->segment(1) == "bdo") {
                                                                                    echo 'active';
                                                                                  } ?>">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                Member registration
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                
                
                <li class="nav-item">
                  <a href="<?php echo base_url('bdo/list') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User List</p>
                  </a>
                </li>
                
              
              </ul>
          </li> 
          <?php } ?> 
          <?php if ($this->session->role != 'vendor') { ?>
          <li class="nav-item">
              <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "trustmembercreate" ||$this->uri->segment(2) == "vendoruser" ) {
                                                                                    echo 'active';
                                                                                  } ?>">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                Member registration
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                
              <li class="nav-item">
                  <a href="<?php echo base_url('admin/trustmembercreate') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Registration</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/vendoruser') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User List</p>
                  </a>
                </li>
               
                
              
              </ul>
          </li> 
          <?php } ?>
        <?php if ($this->session->role == 'customer') { ?>  
        <!-- <li class="nav-item">
          <a href="<?=base_url('admin/userservice')?>/<?=$this->session->userId?>" class="nav-link <?php if ($this->uri->segment(1) == "users") {
                                        echo 'active';
                                      } ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Customer Service
              
            </p>
          </a>
        
        </li> -->
        <li class="nav-item">
          <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "customer_add" || $this->uri->segment(2) == "customer_list") {
                                                                                        echo 'active';
                                                                                      } ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Card Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo base_url('users/vendorcard')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Card</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Additional Card Members</p>
                </a>
              </li>
          </ul>
         </li>
         <li class="nav-item">
          <a href="#" class="nav-link <?php if ($this->uri->segment(1) == "cashback" || $this->uri->segment(2) == "payouts" || $this->uri->segment(2) == "payoutList" ) {
                                                                                        echo 'active';
                                                                                      } ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Cashback Wallet
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('cashback/payin') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cashback Payin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('cashback/payout') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cashback Payout</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link <?php if ($this->uri->segment(2) == "customertransction") {
                                        echo 'active';
                                      } ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Wallet Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="<?php echo base_url('users/customerPayment') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Fund Wallet</p>
              </a>
            </li>
           
            <!-- <li class="nav-item">
              <a href="" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Fund Offer</p>
              </a>
            </li> -->
            <!-- <li class="nav-item">
              <a href="<?php echo base_url('users/withdraw') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Withdraw Fund</p>
              </a>
            </li> -->
          </ul>
        </li>
        
        <?php } ?>                                                
        <?php
        
        if ($this->session->role != 'customer' && $this->session->role != 'diagonstic' && $this->session->role != 'admin' &&  $this->session->role != 'offline_shop' ) { ?>                                                               
        <li class="nav-item">
          <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "add" || $this->uri->segment(2) == "list") {
                                        echo 'active';
                                      } ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Franchise Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          
          <ul class="nav nav-treeview">
          <li class="nav-item">
                  <a href="<?php echo base_url('admin/trustmembercreate') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Registration</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/vendoruser') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User List</p>
                  </a>
                </li>
            <li class="nav-item">
              <a href="<?php echo base_url('users/add') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Franchise</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('users/list') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Direct Team</p>
              </a>
            </li>
            <?php if ($this->session->role != 'vendor' ) { ?> 
            <li class="nav-item">
              <a href="<?php echo base_url('users/downlinereport') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Left Downline Report</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('users/rightdownlinereport') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Right Downline Report</p>
              </a>
            </li>
            <?php } ?>
            <?php if ($this->session->role == 'superAdmin') { ?>
              <li class="nav-item">
                <a href="<?php echo base_url('users/downlinereports') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Downline Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('users/adminusers') ?>" class="nav-link  <?php if ($this->uri->segment(0) == "adminusers") {
                                                                                        echo 'active';
                                                                                      } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin users</p>
                </a>
              </li>
            <?php } if ($this->session->role != 'vendor' ) {?>
            <li class="nav-item">
              <a href="<?php echo base_url('users/tree') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tree</p>
              </a>
            </li>
            <?php } ?>
          </ul>
        </li>
        <?php
        }

        if ($this->session->role != 'customer' && $this->session->role != 'diagonstic' && $this->session->role != 'offline_shop' ) { ?>    
        <li class="nav-item">
          <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "customer_add" || $this->uri->segment(2) == "customer_list") {
                                                                                        echo 'active';
                                                                                      } ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Card Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
          <?php if ($this->session->role == 'vendor' ) { ?>  
            <li class="nav-item">
              <a href="<?php echo base_url('admin/customer_add') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Card Member</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/add_cardmember') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Additional Card Member</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('users/vendorcard') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>My card</p>
              </a>
            </li>
            <?php } ?>
            <?php if ($this->session->role == 'admin' ) { ?>  
            <li class="nav-item">
              <a href="<?php echo base_url('admin/admin_customer_list') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Member List</p>
              </a>
            </li>
            <?php } ?> 
            <?php if ($this->session->role != 'vendor' && $this->session->role != 'admin') { ?>  
            <li class="nav-item">
              <a href="<?php echo base_url('admin/add_cardmember') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Additional Card Member</p>
              </a>
            </li>
           
            <li class="nav-item">
              <a href="<?php echo base_url('admin/customer_list') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Member List</p>
              </a>
            </li>
            <?php } ?> 
            
            <?php if ($this->session->role == 'vendor') { ?>  
              <li class="nav-item">
                <a href="<?=base_url('admin/vendoractivecustomer')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Card Active Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/vendorcustomer')?>" class="nav-link <?php if ($this->uri->segment(1) == "users") {
                                              echo 'active';
                                            } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Card Member list
                  </p>
                </a>
            
            </li>
        <?php } ?> 


        <?php if ($this->session->role != 'admin' && $this->session->role == 'vendor' && $this->session->role != 'superAdmin') { ?>  
        <li class="nav-item">
              <a href="<?php echo base_url('admin/cardactive') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Card Active</p>
              </a>
            </li>
         
        <?php } ?>

        
        <?php if ($this->session->role == 'superAdmin') { ?>  
        <li class="nav-item">
              <a href="<?php echo base_url('admin/admincardactive') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Card Active</p>
              </a>
            </li>
        <?php } ?>
            
          </ul>
        </li>                                                                                
        <?php  }  if ($this->session->role != 'customer' && $this->session->role != 'diagonstic' && $this->session->role != 'offline_shop'){ ?>

          <li class="nav-item">
          <?php if ($_SESSION['role'] !== "admin" && $_SESSION['role'] !== "vendor") { ?>
          <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "commissions" || $this->uri->segment(2) == "payouts" || $this->uri->segment(2) == "payoutList" ) {
                                                                                        echo 'active';
                                                                                      } ?>">
            
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Commissions 
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <?php }?>
          <ul class="nav nav-treeview">
          <?php if ($_SESSION['role'] === "superAdmin") { ?>
            
            <li class="nav-item">
              <a href="<?php echo base_url('commission/commisionchart') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>CSP Commision Chart</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('commission/healthcardchart')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Health Card Commision Chart</p>
              </a>
            </li>
            
            
            <li class="nav-item">
              <a href="<?php echo base_url('commission/payoutList');?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Payout List</p>
              </a>
            </li>
            <?php } ?>
           
             <?php if ($_SESSION['role'] === "vendor") { ?>
              <li class="nav-item">
              <a href="<?php echo base_url('commission/commisionchart') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>CSP Commision Chart</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('commission/healthcardchart')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Health Card Commision Chart</p>
              </a>
            </li>
              <li class="nav-item">
              <a href="<?php echo base_url('users/commissions/').$this->session->userId ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Card Payin Transaction</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url('commission/payouts/').$this->session->userId ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Card Payout Transaction</p>
              </a>
            </li>
           
            
           <?php } ?>
           
          </ul>
        </li>
        <li class="nav-item">
          <?php if($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'vendor') {?>
          <a href="#" class="nav-link <?php if ($this->uri->segment(1) == "cashback" || $this->uri->segment(2) == "payouts" || $this->uri->segment(2) == "payoutList" ) {
                                                                                        echo 'active';
                                                                                      } ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Cashback Commission
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <?php } ?>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('cashback/payin') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cashback Payin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('cashback/payout') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cashback Payout</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
        <?php if ($_SESSION['role'] === "admin" ){ ?>

          <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "addfund"  || $this->uri->segment(2) == "payemntHistory") {
                                                                                        echo 'active';
                                                                                      } ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Wallet Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('users/addfund') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p><?php if ($_SESSION['role'] === "vendor") { ?>Add Fund Own Wallet<?php } else { ?>Add Fund Wallet<?php } ?></p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="<?php echo base_url('users/addtransferfund') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Customer Fund Transfer</p>
              </a>
            </li>
            <?php if ($_SESSION['role'] === "vendor") { ?>
            <li class="nav-item">
              <a href="<?php echo base_url('diagonostic/fund') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Health card Fund Transfer</p>
              </a>
            </li><?php } ?>
            <li class="nav-item">
              <a href="<?php echo base_url('users/payemntHistory') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Wallet Fund Approve</p>
              </a>
            </li>
            
            
          </ul>
          <?php }?>
        </li>
      <?php } ?>
      <?php if ($_SESSION['role'] != "vendor" && $this->session->role != 'offline_shop') { ?>
        <li class="nav-item">
          <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "franTransactionHistory" || $this->uri->segment(2) == "cardtransaction" || $this->uri->segment(2) == "transactionHistory"  ) {
                                                                                        echo 'active';
                                                                                      } ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Diagonostic Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          <?php if ($_SESSION['role'] != "diagonstic" && $_SESSION['role'] != "customer") { ?>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/diagnosticcreate') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Center</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo base_url('admin/diagonstic_list') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Center List </p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="<?php echo base_url('diagonostic/edit_approve_list') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Details Approve </p>
                </a>
              </li>
            
          <?php } if ($_SESSION['role'] == "diagonstic") { ?>
            <li class="nav-item">
              <a href="<?=base_url('diagonostic/report')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Test</p>
              </a>
            </li>
            <?php } if ($_SESSION['role'] == "customer") {?>
            <li class="nav-item">
              <a href="<?=base_url('diagonostic/report_list')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Report list</p>
              </a>
            </li>
            <?php } else {?>
              <li class="nav-item">
              <a href="<?=base_url('diagonostic/test_list')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Test list</p>
              </a>
            </li>
              <?php } ?>
            <li class="nav-item">
              <a href="<?=base_url('diagonostic/calculator')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>EMI Calculator</p>
              </a>
            </li>
            <?php if ($_SESSION['role'] == "customer") {?>
            <li class="nav-item">
              <a href="<?php echo base_url('diagonostic/fund') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Health card Fund Transfer</p>
              </a>
            </li>
           <?php } ?>
          </ul> 
        </li> 
        <?php } if ($_SESSION['role'] != "diagonstic" && $_SESSION['role'] != "vendor") { ?>
        <li class="nav-item ">
        <?php if ($_SESSION['role'] != "admin") { ?>

          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Shopping Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <?php } ?>
          <ul class="nav nav-treeview">
          <?php if ($_SESSION['role'] == "superAdmin") { ?>
            <li class="nav-item">
              <a href="<?=base_url('shopping/add')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Online Link</p>
              </a>
            </li><?php } if($this->session->role != 'offline_shop') {?>
            <li class="nav-item">
              <a href="<?=base_url('shopping/list')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Online Shopping</p>
              </a>
            </li>
            <?php } if ($_SESSION['role'] == "customer" || $_SESSION['role'] == "superAdmin" || $_SESSION['role'] == "vendor") { ?>
            <li class="nav-item">
              <a href="<?=base_url('shopping/invoicelist')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Online Invoice Upload</p>
              </a>
            </li>
            <?php } if ($_SESSION['role'] == "superAdmin" || $_SESSION['role'] == "vendor") { ?>
            <li class="nav-item">
              <a href="<?=base_url('shopping/shop_list')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Shops</p>
              </a>
            </li><?php } if ($_SESSION['role'] == "superAdmin") {?>
            <li class="nav-item">
              <a href="<?=base_url('shopping/offlinelist')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Offline Shops Link</p>
              </a>
            </li>
            <?php } if($this->session->role != 'offline_shop') {?>
            <li class="nav-item">
              <a href="<?=base_url('shopping/offline_product_list')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Offline Shopping</p>
              </a>
            </li>
            <?php } if($this->session->role == 'offline_shop' || $this->session->role == 'superAdmin' ) {?>
            <li class="nav-item">
              <a href="<?=base_url('shopping/product_list')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Product</p>
              </a>
            </li><?php } ?>
            <li class="nav-item">
              <a href="<?=base_url('shopping/order_list')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Offline Order</p>
              </a>
            </li>
           
          </ul> 
        </li>
        <?php } if ($_SESSION['role'] === "superAdmin") { ?>
        <li class="nav-item">
          <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "franTransactionHistory" || $this->uri->segment(2) == "cardtransaction" || $this->uri->segment(2) == "transactionHistory"  ) {
                                                                                        echo 'active';
                                                                                      } ?>">
            
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Loan Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>EMI Calculator</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Product Category</p>
              </a>
            </li>
           
            
            
          </ul> 
        </li> 
        <li class="nav-item">
          <a href="#" class="nav-link <?php if ($this->uri->segment(1) == "bankcsp"  ) {
                                                                                        echo 'active';
                                                                                      } ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Bank CSP Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          
            <li class="nav-item">
              <a href="<?php echo base_url('bankcsp/branchs') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Branch List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('bankcsp/fees') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>CSP Registration Fees</p>
              </a>
            </li>
            <?php if ($_SESSION['role'] === "vendor") { ?>
            <li class="nav-item">
              <a href="<?php echo base_url('bankcsp/add') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>CSP Application</p>
              </a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a href="<?php echo base_url('bankcsp/list') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Application List</p>
              </a>
            </li>
            <?php if ($_SESSION['role'] === "vendor") { ?>
            <li class="nav-item">
              <a href="<?=base_url('bankcsp/registration')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>CSP Registration</p>
              </a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a href="<?=base_url('bankcsp/registrationlist')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Registration List</p>
              </a>
            </li>
           
            
            
          </ul> 
        </li> 
        <?php } ?>
        <?php if ($_SESSION['role'] != "diagonstic" && $this->session->role != 'offline_shop' && $this->session->role != 'vendor') { ?>
          <li class="nav-item <?php if ($this->uri->segment(1) == "offer"  ) {
                                                                                        echo 'active';
                                                                                      } ?>">
            <?php if($_SESSION['role'] != 'admin'){?>
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Cashback Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <?php } ?>
            <ul class="nav nav-treeview">
            <?php if ($_SESSION['role'] === "superAdmin") { ?>
              <li class="nav-item">
                <a href="<?php echo base_url('offer/list') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Offer View</p>
                </a>
              </li>
              <?php } ?>
              <?php if ($_SESSION['role'] === "superAdmin" || $_SESSION['role'] === "vendor") { ?>
              <li class="nav-item">
                <a href="<?php echo base_url('offer/cardmemberlist') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Card Member Offer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('offer/franchaiselist') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Franchaise Offer</p>
                </a>
              </li>
              <?php } ?>   
              <?php if ($_SESSION['role'] === "customer" ) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url('offer/cardmemberlist') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Offer View</p>
                </a>
              </li>
              
              <?php } ?>                                                                  
            </ul>
          </li>
          <?php  } if ($_SESSION['role'] === "customer" ) {
            $this->db->select('*')->from('bank_csp');
            $this->db->where('userId', $_SESSION['userId']);
            $query = $this->db->get();
            $offer = $query->result(); 
            if (count($offer) > 0) {?>
        <li class="nav-item">
          <a href="#" class="nav-link <?php if ($this->uri->segment(1) == "bankcsp"  ) {
                                                                                        echo 'active';
                                                                                      } ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Bank CSP Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('bankcsp/fees') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>CSP Registration Fees</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('bankcsp/list') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>CSP Application List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('bankcsp/registrationlist')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>CSP Registration List</p>
              </a>
            </li>
           
            
            
          </ul> 
        </li> <?php } } ?>
          <li class="nav-item">
          <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "franTransactionHistory" || $this->uri->segment(2) == "cardtransaction" || $this->uri->segment(2) == "transactionHistory"  ) {
                                                                                        echo 'active';
                                                                                      } ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Transaction Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          <?php if ($_SESSION['role'] != "superAdmin" && $_SESSION['role'] != "diagonstic" ) { ?>
            <li class="nav-item">
              <a href="<?php echo base_url('users/payHistory') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Wallet Transaction History</p>
              </a>
            </li>
            <?php } 
            if($this->session->role != 'offline_shop') {
            if ($_SESSION['role'] != "customer" && $_SESSION['role'] != "diagonstic"  ) { ?>
            <li class="nav-item">
              <a href="<?php echo base_url('usercard/transactionHistory') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Card Active Transaction</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('users/franTransactionHistory') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Franchaise Active Transaction</p>
              </a>
            </li><?php } ?>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Diagonostic Transaction</p>
              </a>
            </li>
            <?php if($_SESSION['role'] == "diagonstic" || $_SESSION['role'] == "superAdmin") {?>
              <li class="nav-item">
              <a href="<?=base_url('diagonostic/report_list')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Transaction Test Report</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('diagonostic/downpayment_list')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Total Test Amount</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('diagonostic/downpayment')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Total Test Downpayment</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('diagonostic/duepayments')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Total Test Due</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?=base_url('diagonostic/settlement')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Total Settlement</p>
              </a>
            </li>
            <?php } if ($_SESSION['role'] != "customer" && $_SESSION['role'] != "diagonstic" && $_SESSION['role'] != "admin" && $_SESSION['role'] != "vendor" ) { ?>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Loan Transaction</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('bankcsp/cspTransactionHistory') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bank CSP Transaction</p>
              </a>
            </li><?php } ?>
            <?php if ( $_SESSION['role'] != "diagonstic" && $_SESSION['role'] != "admin" && $_SESSION['role'] != "vendor") { ?>
            <li class="nav-item">
              <a href="<?php echo base_url('cashback/cashbackTransactionHistory')?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Cashback Transaction</p>
              </a>
            </li>
            <?php } if ($_SESSION['role'] === "vendor" || $_SESSION['role'] === "customer" ) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url('usercard/cardtransaction') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Health Card Transaction</p>
                </a>
            </li>
            <?php } } ?>
          </ul> 
        </li>
        <?php  if ($_SESSION['role'] === "superAdmin") { ?>
        <li class="nav-item d-none">
          <a href="<?php echo base_url('admin/commision') ?>" class="nav-link <?php if ($this->uri->segment(2) == "commision" ) {
                                                                                        echo 'active';
                                                                                      } ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
            Commision Management
              
            </p>
          </a>
        </li>
        <li class="nav-item d-none">
          <a href="<?php echo base_url('admin/setting') ?>" class="nav-link <?php if ($this->uri->segment(2) == "setting" ) {
                                                                                        echo 'active';
                                                                                      } ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
            Setting
              
            </p>
          </a>
        </li>
        
        
        <?php } if ($this->session->role != 'customer') { ?> 
       
        <li class="nav-item d-none">
          <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "service_add" || $this->uri->segment(2) == "serviceView" || $this->uri->segment(2) == "serviceform" || $this->uri->segment(2) == "serviceuserview") {
                                                                                        echo 'active';
                                                                                      } ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Service Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview ">
          <?php if ($_SESSION['role'] === "superAdmin") { ?>
            <li class="nav-item ">
              <a href="<?php echo base_url('admin/service_add') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Service</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/serviceView') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Service List</p>
              </a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/serviceform') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Service Form</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/serviceuserview') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Service User List</p>
              </a>
            </li>
          </ul>
        </li>
        <?php } 
        if ($_SESSION['role'] === "superAdmin") { ?>
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Advertisement
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('advertisement/add') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item">
            <a href="#" class="nav-link <?php if ($this->uri->segment(2) == "ifcsCodeView" ) {
                                                                                        echo 'active';
                                                                                      } ?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/pincodelist') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Pincode </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('diagonostic/approve_list') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bank Approve </p>
                </a>
              </li>                                                                       
              <li class="nav-item">
                <a href="<?php echo base_url('admin/ifcsCodeView') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add IFSC Code</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="<?php echo base_url('admin/customer_term_condition') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                  <p>
                  Terms & conditions
                    
                  </p>
                </a>
            </li>      
            <li class="nav-item ">
              <a href="<?php echo base_url('notice/all') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                Notice
                </p>
              </a>
            </li>    
              <li class="nav-item ">
                <a href="<?php echo base_url('advertisement/all') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Advertisement
                  </p>
                </a>
              </li>                                                   
            </ul>
          </li><?php } ?>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>