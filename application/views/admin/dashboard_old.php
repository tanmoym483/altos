<style>
#has {
    font-size: 20px;
    font-weight: bold;
}
</style>

<?php echo "Server Time: " . date('Y-m-d H:i:s'); ?> 
<div class="content-wrapper" style="min-height: 2080.26px;">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <div id="has">
                                <?php echo $_SESSION['firstName']; ?>
                                <?php if ($_SESSION['role'] != "diagonstic") { ?>(<?php echo $_SESSION['regId']; ?>
                                )<?php } ?>
                            </div>

                            <p></p>
                            <p>Date of Joining : <?php echo date('d-m-Y', strtotime($_SESSION['joindate'])); ?></p>
                            <?php
              if ($_SESSION['role'] === "customer") {

                if (isset($users) && $users['0']->card_status == 'inactive') {
                  $class = 'danger';
                } else {
                  $class = 'success';
                }
die;

              ?>

                            <p>Card Status: <span
                                    class="badge badge-<?= $class ?>"><?= (isset($users)) ? strtoupper($users['0']->card_status) : '' ?></span>
                            </p><?php } ?>

                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php if ($_SESSION['role'] != "diagonstic" && $_SESSION['role'] != "admin") { ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php if ($_SESSION['role'] === "vendor" || $_SESSION['role'] === "customer") { ?><?= (isset($users)) ? $users['0']->wallet : 0 ?><?php } else { ?><?= (isset($users) && $users['0']->amount != 0) ? $users['0']->amount : 0 ?><?php  } ?>
                            </h3>

                            <p><?php if ($_SESSION['role'] === "vendor" || $_SESSION['role'] === "customer") { ?>Wallet<?php } else { ?>Deposite<?php } ?>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php } ?>
                <?php if ($_SESSION['role'] == "admin" || $_SESSION['role'] === "superAdmin" || $_SESSION['role'] === "vendor") { ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $_card; ?></h3>

                            <p>Franchaise active card member</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $_totalcard; ?></h3>

                            <p>Active card member</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php if ($_SESSION['role'] != "vendor") { ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $_totalcard * 15000; ?></h3>

                            <p>Card amount</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <?php } }
        if ($_SESSION['role'] === "vendor") { ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo ($usercard + 1) * 15000; ?></h3>

                            <p>My health credit card amount</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo base_url('usercard/cardtransaction') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo ($usercard + 1); ?></h3>

                            <p>My Health credit card member</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $totalcard * 15000; ?></h3>

                            <p>My Credit card customer amount</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $totalcard; ?></h3>

                            <p>My Credit card customer </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>0</h3>

                            <p>Customer cashback amount</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= ($leftChild[0]->amount != 0) ? $leftChild[0]->amount : 0 ?></h3>

                            <p>Left side business</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= ($rightChild[0]->amount != 0) ? $rightChild[0]->amount : 0 ?></h3>

                            <p>Right side Business</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-6">
            
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= ($customer[0]->amount != 0) ? $customer[0]->amount : 0 ?></h3>

                <p>Customer Company Demat Investment</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
                <?php } elseif ($_SESSION['role'] === "customer") { ?>

                <?php } else { ?>

                <?php }
        if ($_SESSION['role'] === "superAdmin") { ?>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $vendorcount ?></h3>


                            <p>Total Franchaise Number</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $pendingvendorcount ?></h3>


                            <p>Pending Franchaise Number</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-3 col-6 d-none">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>0</h3>


                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6 d-none">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>0</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php } ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>0</h3>

                            <p>Card Usage</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <?php if ($_SESSION['role'] === "vendor" || $_SESSION['role'] === "superAdmin") { ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $commission; ?></h3>

                            <p>Commission</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php } ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>30000</h3>

                            <p>Franchaise Consumer Loans</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Coming Soon Stay Tuned <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php  if ($_SESSION['role'] === "superAdmin") { ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>30000</h3>

                            <p>Incentive</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ribbon-b"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>30000</h3>

                            <p>Total Payouts</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-ribbon-b"></i>
                        </div>
                        <a href="#" class="small-box-footer">Details <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>