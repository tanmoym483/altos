<div class="content-wrapper" style="min-height: 2080.26px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaction list</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Transaction list</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- <h3 class="card-title"></h3> -->
                            <div class="card-title">
                                <form method="post">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Search
                                               
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">SL.No</th>
                                            <?php if ($_SESSION['role'] === "superAdmin") { ?>
                                                <th>Membar Name</th>
                                                <th>Reg Id</th>
                                                <th>User Type</th>
                                            <?php  } ?>

                                            <th>Amount</th>

                                            <th>trans Type</th>

                                            <th>trans Ref No</th>

                                            <th>trans Ref Doc</th>

                                            <th>status</th>

                                            <th>Create At</th>
                                            <?php if ($_SESSION['role'] === "superAdmin") { ?>
                                                <th>Action</th>
                                            <?php  } ?>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php 
                                        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                                      // print_r($users);
                                        foreach ($users['result'] as $key => $u) {
                                           
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php 
                                                            if($page == 0 || $page == 1){
                                                                echo $serial_number = ($page*10)+ $key + 1;
                                                            } else{
                                                                echo $serial_number = (($page-1)*10)+ $key + 1;
                                                            }
                                                            ?></td>
                                                <?php if ($_SESSION['role'] === "superAdmin") {
                                                    $membarname =  $u->firstName . ' ' . $u->lastName;
                                                ?>
                                                    <td>
                                                        <?php echo $membarname ?>
                                                    </td>

                                                    <td><?php echo $u->regId; ?>
                                                    </td>
                                                    <td><?php //echo $u->role; 
                                                     if( $u->role == 'vendor' ) {
                                                        echo 'Franchise';
                                                     }
                                                    
                                                     if( $u->role == 'customer' && $u->vendor_id == '' ) {
                                                        echo 'Card Member';
                                                        echo '<br>'.$u->cfirstName . ' ' . $u->clastName. '<br>'.$u->cregId;
                                                        
                                                      } 
                                                      if( $u->vendor_id != '') {
                                                        echo 'Created By Franchaise '. $u->cregId;
                                                       // echo '<br>'.$u->vfirstName . ' ' . $u->vlastName. '<br>'.$u->vregId;
                                                        
                                                      } 
                                                     ?>
                                                    </td>
                                                <?php } ?>

                                                <td>
                                                    <?php echo $u->amount; ?>
                                                </td>

                                                <td>
                                                    <?php if($u->transType=="deposite"){ ?>
                                                    <p>Credited by ADD wallet fund</p>
                                                    <?php } ?>
                                                    <?php if($u->transType=="vendor_active"){ ?>
                                                    <p>Debited for Franchise Active </p>
                                                    <?php echo 'Franchise:'.$u->firstName . ' ' . $u->lastName. '<br>'.$u->regId ?>
                                                    <?php } ?>
                                                    <?php if($u->transType=="card_active"){ ?>
                                                    <p>Debited for Card Active</p>
                                                    <?php echo 'Card number:'.$u->cardnumber.'<br>'; ?>
                                                    <?php } 
                                                     if( $u->role == 'customer' && $_SESSION['role'] === "vendor" ) {
                                                        echo 'Customer: <br>'.$u->firstName . ' ' . $u->lastName. '<br>'.$u->regId;
                                                        
                                                      } 
                                                    ?>
                                                   
                                                </td>

                                                <td><?php if($u->transType=="card_active" || $u->transType=="vendor_active"){ echo $u->transaction_id; } else { echo $u->transRefNo; } ?></td>

                                                <td>
                                                    <?php if($u->transRefDoc != '') {?>
                                                    <a href="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1">
                                                        <img src="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" width="100" height="70" crossorigin="" />
                                                    </a>
                                                    <a href="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" download>

                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                    if($u->tstatus == 'pending')
                                                    echo '<strong class="text-warning">'.$u->tstatus.'</strong>';
                                                    // if($u->tstatus == 'approved')
                                                    // echo '<strong class="text-primary">'.$u->tstatus.'</strong>';
                                                    if($u->tstatus == 'reject')
                                                    echo '<strong class="text-danger">'.$u->tstatus.'</strong>';
                                                    if($u->tstatus == 'approved')
                                                    echo '<strong class="text-success">'.$u->tstatus.'</strong>';
                                                    if($u->tstatus == 'inactive')
                                                    echo '<strong style="color:#f6d1d5">'.$u->tstatus.'</strong>';?>
                                            </td>
                                                <td><?php echo $u->tcreatedAt; ?></td>
                                                <?php if ($_SESSION['role'] === "superAdmin") { ?>
                                                    <td><?php if ($u->tstatus == 'pending') { ?>
                                                            <button class="btn btn-success" onClick="ajax_payment_status_change(<?php echo $u->tid; ?>, 'approved')">Approve</button>
                                                            <button class="btn btn-danger" onClick="ajax_payment_status_change(<?php echo $u->tid; ?>, 'reject')">Reject</button>
                                                        <?php } ?>
                                                        <button onClick="paymentEdit(<?php echo $u->tid; ?>)" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Edit</button>
                                                    </td>
                                                <?php } ?>

                                            </tr>
                                        <?php  } ?>

                                    </tbody>
                                </table>
                            </div>
                            <div style='margin:0 auto'>
                                <div class="pagination"><?php if(isset($users['pagination'])) { echo $users['pagination']; }?></div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card -->

                    <div class="container">

                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Transaction</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="container">
                                            <form method="post" action="<?php echo base_url('auth/updatePaymentList') ?>" enctype="multipart/form-data">
                                                <label>Amount</label>
                                                <input type="hidden" name="userId" id="userId">
                                                <input type="hidden" name="id" id="paymentId">
                                                <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount">
                                                <label>Transection Type</label>
                                                <input type="text" name="transType" class="form-control" id="transType" placeholder="Transection Type">
                                                <label>Transection Ref No</label>
                                                <input type="text" name="transRefNo" class="form-control" id="transRefNo" placeholder="Transection Ref No">
                                                <label>Transection Ref Doc</label>
                                                <img src="" id="transRefDocu">
                                                <input type="file" name="transRefDo" class="form-control crop_image" id="transRefDoc" onClick="paymentListEdit()"><br>
                                                <input type="text" name="transRefDocs" id="transRefDocs" style="display:none">
                                                <input type="submit" value="Submit" class="btn btn-success">
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>

<!-- pan card -->
<div class="modal fade" id="modal_crop_payment" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image Before Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="sample_image_sss" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="payment_list" class="btn btn-primary">Crop</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- end pan card -->