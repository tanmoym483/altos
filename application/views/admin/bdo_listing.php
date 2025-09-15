<style>
    #content h3 {
        color: red;
    }
</style>
<div class="content-wrapper" style="min-height: 2080.26px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trust Members list</h1>
                </div>
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Trust Member List</li>
                    </ol> -->
                    <?php if($search == ''){ ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Trust Member List</li>
                    </ol>
                    <?php } else { ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('bdo/list'); ?>" class="btn btn-primary">Back</a></li>
                        
                    </ol> 
                    <?php } ?>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-sm-12">
<div class="d-flex justify-content-between responsive_view">
                   <div class="p-2">
                        <form method="get">
                            <div class="row"><div class="col-6 col-lg-6 col-sm-4">
                    <label>From</label>
                    <input type="date" class="form-control" name="from" max="<?= date('Y-m-d'); ?>"></div>
                    <div class="col-6 col-lg-5 col-sm-4"><label>To</label>
                    <input type="date" name="to" class="form-control"  max="<?= date('Y-m-d'); ?>"></div>
                    <div class="col-lg-1 col-sm-2"><label style="opacity:0;">From</label><button class="btn btn-primary" type="submit" name="sr" class="btn btn-default">Search</button></div></div>
                </form>
                   </div> 
                   <div></div>
                   <div class="p-2 mt-4">
                        <button type="button" class="btn btn-custom  saveAsExcel-bdo"><svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                        </svg> Excel</button>
               
                        <button class="btn btn-custom" id="gen_bdo_pdf"><svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                        </svg> PDF</button>
              
                   </div>
                </div>
                <div id="editor"></div>
                
                <!-- </form> -->

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-tools">
                                <form method="get">

                                    <div class="input-group input-group-sm" style="width: 285px;">
                                        <input type="text" name="table_search" class="form-control float-right" value="<?=$search?>" placeholder="Search by Reg Id or Email">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Search
                                                <!-- <i class="fas fa-search"></i> -->
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive" >
                                <table class="table table-bordered exportable" id="content" style="font-size:14px;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">SL.No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                           
                                            <th>Reg ID</th>
                                            <th>Transaction No./ UTR No.</th>
                                            <th>Transaction Pic</th>
                                            <th>Joining Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
                                        foreach ($users['result'] as $key => $u) {

                                        ?>
                                            <tr>
                                                <td><?php 
                                                 if($page == 0 || $page == 1){
                                                    echo $serial_number = ($page*10)+ $key + 1;
                                                } else{
                                                    echo $serial_number = (($page-1)*10)+ $key + 1;
                                                }
                                                ?></td>
                                                <td><?php echo $u->firstName . ' ' . $u->middleName . ' ' . $u->lastName; ?></td>
                                                <td><?php echo $u->email; ?></td>
                                                <td><?php echo $u->phone; ?></td>
                                                <td><?php echo $u->address.' '.$u->city.' '.$u->district.' '.$u->state.' '.$u->postcode; ?></td>
                                               
                                                <td><?php echo $u->regId; ?></td>
                                                <td><?php echo $u->transRefNo; ?></td>
                                                <td>
                                                <?php if($u->transRefDoc != ''){ ?>    
                                                <a href="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1"><img src="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" width="100" height="70" /></a>
                                                    <a href="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" download>
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                                        </svg>
                                                    </a><?php } ?>
                                                </td>
                                                <!--<td><?php echo date('d-m-Y', strtotime($u->createdAt)); ?></td>-->
                                                <!--<td><?php echo $u->status; ?></td>-->
                                                <td><?php echo $u->createdAt; ?></td> 
                                                <td>
                                                    <?php
                                                    if($u->status == 'pending')
                                                    echo '<strong class="text-warning">'.$u->status.'</strong>';
                                                    if($u->status == 'approved')
                                                    echo '<strong class="text-primary">'.$u->status.'</strong>';
                                                    if($u->status == 'reject')
                                                    echo '<strong class="text-danger">'.$u->status.'</strong>';
                                                    if($u->status == 'active')
                                                    echo '<strong class="text-success">'.$u->status.'</strong>';
                                                    if($u->status == 'inactive')
                                                    echo '<strong style="color:#f6d1d5">'.$u->status.'</strong>';?></td>

                                                <td><?php if ($u->status == 'pending') { ?>
                                                        <button class="btn btn-success" onClick="ajax_bdo_status_change(<?php echo $u->id; ?>, 'approved')">Approve</button>
                                                        <button class="btn btn-danger" onClick="ajax_bdo_status_change(<?php echo $u->id; ?>, 'reject')">Reject</button>
                                                    <?php } ?>
                                                    <?php if ($_SESSION['role'] == "superAdmin") { ?><button class="btn btn-danger" onClick="userdetailsUpdate(<?php echo $u->id; ?>)" data-toggle="modal" data-target="#exampleModal">Edit</button><?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                                <div style='margin-top: 10px;'>
                                    <div class="text-right pagination"><?php if(isset($users['pagination'])) { echo $users['pagination']; } ?></div>
                                </div>
                                <table  id="mytable" style="display:none;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">SL.No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                           
                                            <th>Reg ID</th>
                                            <th>Transaction No./ UTR No.</th>
                                            <th>Transaction Pic</th>
                                            <th>Joining Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                       
                                        foreach ($users['allusers'] as $key => $u) {

                                        ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $u->firstName . ' ' . $u->middleName . ' ' . $u->lastName; ?></td>
                                                <td><?php echo $u->email; ?></td>
                                                <td><?php echo $u->phone; ?></td>
                                                <td><?php echo $u->address.' '.$u->city.' '.$u->district.' '.$u->state.' '.$u->postcode; ?></td>
                                               
                                                <td><?php echo $u->regId; ?></td>
                                                <td><?php echo $u->transRefNo; ?></td>
                                                <td>
                                                <?php if($u->transRefDoc != ''){ ?>    
                                                <a href="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1"><img src="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" width="100" height="70" /></a>
                                                    <a href="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" download>
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                                        </svg>
                                                    </a><?php } ?>
                                                </td>
                                                <!--<td><?php echo date('d-m-Y', strtotime($u->createdAt)); ?></td>-->
                                                <!--<td><?php echo $u->status; ?></td>-->
                                                <td><?php echo $u->createdAt; ?></td> 
                                                <td><?php echo $u->status;?></td>

                                                <td><?php if ($u->status == 'pending') { ?>
                                                        <button class="btn btn-success" onClick="ajax_bdo_status_change(<?php echo $u->id; ?>, 'approved')">Approve</button>
                                                        <button class="btn btn-danger" onClick="ajax_bdo_status_change(<?php echo $u->id; ?>, 'reject')">Reject</button>
                                                    <?php } ?>
                                                    <?php if ($_SESSION['role'] == "superAdmin") { ?><button class="btn btn-danger" onClick="userdetailsUpdate(<?php echo $u->id; ?>)" data-toggle="modal" data-target="#exampleModal">Edit</button><?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        
                    </div>
                    <!-- /.card -->
                    <!--model-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Trust Members Register</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo base_url('auth/userEdit') ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="userId" id="userId">
                                        <div class="brand-link"><img class="img-responsive" src="<?php echo base_url('assets/images/login_logo.png'); ?>" /></div>
                                        <!-- <h4 class="mt-2 mb-3">Trust Members Register</h4> -->
                                        <?php if ($this->session->flashdata('error') != '') { ?>
                                            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                                        <?php } ?>
                                        <?php if ($this->session->flashdata('success') != '') { ?>
                                            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                                        <?php } ?>

                                        <div class="row">
                                            <div class="form-outline mb-4 col-sm-4">
                                                <label class="text-left">First Name <span class="text-danger">*</span></label>
                                                <input type="text" id="firstName-2" class="form-control" placeholder="First Name" name="firstName" value="<?php echo set_value('firstName'); ?>" />
                                                <?php echo form_error('firstName'); ?>
                                            </div>

                                            <div class="form-outline mb-4 col-sm-4">
                                                <label class="text-left">Middle Name <span class="text-danger"></span></label>
                                                <input type="text" id="middleName-2" class="form-control" placeholder="Middle Name" name="middleName" value="<?php echo set_value('middleName'); ?>" />
                                                <?php echo form_error('middleName'); ?>
                                            </div>
                                            <div class="form-outline mb-4 col-sm-4">
                                                <label class="text-left">Last Name <span class="text-danger">*</span></label>
                                                <input type="text" id="lastName-2" class="form-control" placeholder="Last Name" name="lastName" value="<?php echo set_value('lastName'); ?>" />
                                                <?php echo form_error('lastName'); ?>
                                            </div>
                                            <div class="form-outline mb-4 col-sm-4">
                                                <label class="text-left">Email ID <span class="text-danger">*</span></label>
                                                <input type="text" id="email-2" class="form-control" placeholder="Email ID" name="email" value="<?php echo set_value('email'); ?>" />
                                                <?php echo form_error('email'); ?>
                                            </div>
                                            <div class="form-outline mb-4 col-sm-4">
                                                <label class="text-left">Phone Number <span class="text-danger">*</span></label>
                                                <input type="text" id="phone-2" class="form-control" placeholder="Phone Number" name="phone" value="<?php echo set_value('phone'); ?>" />
                                                <?php echo form_error('phone'); ?>
                                            </div>
                                            <div class="form-outline mb-4 col-sm-4">
                                                <label class="text-left">Birthday <span class="text-danger">*</span></label>
                                                <input type="text" id="birthday"  class="form-control" placeholder="mm/dd/yyyy" readonly name="birthday" required=""  value="<?php echo set_value('birthday'); ?>" />
                                                <!-- <input type="text" id="birthday" class="form-control" placeholder="Birthday" name="birthday" value="<?php echo set_value('birthday'); ?>" /> -->
                                                <?php echo form_error('birthday'); ?>
                                            </div>
                                            <div class="form-outline mb-4 col-sm-4">
                                                <label class="text-left">City <span class="text-danger">*</span></label>
                                                <input type="text" id="city-2" class="form-control" placeholder="City" name="city" value="<?php echo set_value('city'); ?>" />
                                                <?php echo form_error('city'); ?>
                                            </div>
                                            <div class="form-outline mb-4 col-sm-4">
                                                <label>State</label>

                                                <input type="text" id="state" class="form-control" placeholder="State" name="state" value="<?php echo set_value('state'); ?>" />
                                                <?php echo form_error('state'); ?>


                                                <!--<label class="text-left">State <span class="text-danger">*</span></label>-->
                                                <!--<input type="text" id="typePasswordX-2" class="form-control" placeholder="State" name="state" value="<?php echo set_value('state'); ?>" />-->
                                                <?php echo form_error('state'); ?>
                                            </div>
                                            <div class="form-outline mb-4 col-sm-4">
                                                <label class="text-left">Pincode <span class="text-danger">*</span></label>
                                                <input type="text" id="postcode-2" class="form-control" placeholder="Pincode" name="postcode" value="<?php echo set_value('postcode'); ?>" />
                                                <?php echo form_error('postcode'); ?>
                                            </div>
                                            <div class="form-outline mb-4 col-sm-4">
                                                <label class="text-left">Address <span class="text-danger">*</span></label>
                                                <input type="text" id="address-2" class="form-control" placeholder="Address" name="address" value="<?php echo set_value('address'); ?>" />
                                                <?php echo form_error('address'); ?>
                                            </div>
                                            <input type="hidden" id="status" name="status" value="<?php echo set_value('status'); ?>" />
                                           <div id="reject-portion" class="col-sm-12" style="display:none">
                                            <div class="row">
                                                <input type="hidden" id="transactionid" name="transactionid" value="<?php echo set_value('transactionid'); ?>" />
                                                <div class="form-outline mb-4 col-sm-4">
                                                    <label class="text-left">Transaction Id <span class="text-danger">*</span></label>
                                                    <input type="text" id="transRefNo-2" class="form-control" placeholder="Transaction Number " name="transRefNo" value="<?php echo set_value('transRefNo'); ?>" />
                                                    <?php echo form_error('transRefNo'); ?>
                                                </div>
                                                <div class="form-outline mb-4 col-sm-4">
                                                    <label class="text-left">Transaction Pic <span class="text-danger">*</span></label>
                                                    <input type="file" id="transRefDoc-2" class="form-control"  name="transRefDoc" value="<?php echo set_value('transRefDoc'); ?>" />
                                                    <?php echo form_error('transRefDoc'); ?>
                                                </div>
                                            </div></div>
                                            <div class="form-outline mb-4 col-sm-12">
                                                <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--endmodel-->


                </div>

            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>
<style>
    .modal-body .brand-link{
        width: 100%;
    }
</style>