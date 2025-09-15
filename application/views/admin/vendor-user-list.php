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
                <?php if($search == ''  && empty($_GET['from'])){ ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Trust Member List</li>
                    </ol>
                    <?php } else { ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/vendoruser'); ?>" class="btn btn-primary" >Back</a></li>
                        
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
                                <div class="row">
                                <div class="col-6 col-lg-6 col-sm-4">
                                <label>From</label>
                                <input type="date" class="form-control" name="from" max="<?= date('Y-m-d'); ?>"></div>
                                <div class="col-6 col-lg-5 col-sm-4"><label>To</label>
                                <input type="date" name="to" class="form-control"  max="<?= date('Y-m-d'); ?>"></div>
                                <div class="col-lg-1 col-sm-2"><label style="opacity:0;">From</label><button class="btn btn-primary" type="submit" name="sr" class="btn btn-default">Search</button>
                                    </div>
                                </div>
                            </form>
                   </div> 
                   <div></div>
                   <div class="p-2 mt-4">
                        <button type="button" class="btn btn-custom saveAsExcel-bdo"><svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                        </svg> Excel</button>
                <!-- <form id="frm_gen_bdo_pdf">
                    <div></div> -->
                <!-- <button class="btn btn-danger" id="gen_bdo_pdf">PDF Download</button> -->
                <!-- </form> -->
                   </div>
                </div>
                <div id="editor"></div>
                
                <!-- </form> -->

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-tools">
                                <form method="post">

                                    <div class="input-group input-group-sm" style="width: 285px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search by ATF No. or Email" value="<?=$search?>">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered exportable" id="content" style="font-size:14px;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">SL.No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Reg ID</th>
                                            <th>Transaction Id</th>
                                            <th>Transaction Pic</th>
                                            <th>Joining Date</th>
                                            <th>Status</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users['result'] as $key => $u) {

                                        ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $u->firstName . ' ' . $u->middleName . ' ' . $u->lastName; ?></td>
                                                <td><?php echo $u->email; ?></td>
                                                <td><?php echo $u->phone; ?></td>
                                                <td><?php echo $u->city; ?></td>
                                                <td><?php echo $u->state; ?></td>
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
                                               
                                                <td><?php echo $u->createdAt; ?></td> 
                                                <td><?php
                                                    if($u->status == 'pending')
                                                    echo '<strong class="text-warning">'.$u->status.'</strong>';
                                                    if($u->status == 'approved')
                                                    echo '<strong class="text-info">'.$u->status.'</strong>';
                                                    if($u->status == 'reject')
                                                    echo '<strong class="text-danger">'.$u->status.'</strong>';
                                                    if($u->status == 'active')
                                                    echo '<strong class="text-success">'.$u->status.'</strong>';
                                                    if($u->status == 'inactive')
                                                    echo '<strong style="color:#f6d1d5">'.$u->status.'</strong>';?></td>

                                               
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>

                            </div>
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
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Reg ID</th>
                                            <th>Transaction Id</th>
                                            <th>Transaction Pic</th>
                                            <th>Joining Date</th>
                                            <th>Status</th>
                                           
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
                                                <td><?php echo $u->city; ?></td>
                                                <td><?php echo $u->state; ?></td>
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
                                               
                                                <td><?php echo $u->createdAt; ?></td> 
                                                <td><?php echo $u->status;  ?></td>

                                               
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                        </div>
                       
                    </div>
                    <!-- /.card -->
                   


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