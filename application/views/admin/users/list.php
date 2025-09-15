<style>
    #content h3 {
        font-size: 10px;
    }
</style>
<div class="content-wrapper" style="min-height: 2080.26px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Franchise list</h1>
                </div>
                <div class="col-sm-6">
                <?php if($search == '' && empty($_GET['from'])){ ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">User List</li>
                    </ol>
                    <?php } else { ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('users/list'); ?>" class="btn btn-primary">Back</a></li>
                        
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

                <!--<button> <a href="<?php echo base_url('users/userPdf') ?>">Generate PDF</a></button>-->
                <div class="col-md-12">
                    <div class="d-flex justify-content-between responsive_view">
                        <div class="p-2">
                        <?php if ($_SESSION['role'] != "vendor") { ?>
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
                        <?php } ?>
                        </div>
                        <div></div>
                        <div class="p-2 mt-4">
                            <button type="button" class="btn btn-custom saveAsExcel"><svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                        </svg> Excel</button>
                            <!-- <form id="frm_gen_bdo_pdf">
                    <div></div> -->
                            <button class="btn btn-custom" id="gen_user_list_pdf"><svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                        </svg> PDF</button>
                            <!-- </form> -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">

                            <!-- <h3 class="card-title"></h3> -->
                            <div class="card-title">
                                <form method="get">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search by ATF Id" value="<?=$search?>">
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
                            <div class="table-responsive">
                                <div id="content">
                                    <table class="table table-bordered exportable" style="font-size:14px;">

                                        <thead>
                                            <tr>
                                                <th style="width: 10px">SL.No</th>
                                                <th>Member Details</th>

                                                <th>Side</th>

                                                <th>Intro</th>
                                                <th>Upliner</th>
                                                <th>Address</th>
                                                <th>DOJ</th>
                                                <th>Status</th>
                                                <?php if ($_SESSION['role'] != "vendor") { ?>
                                                <th>Commission</th>
                                                <th>Action</th>
                                                <?php } ?>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php if (!empty($users)) { ?>
                                                <?php 
                                                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
                                                foreach ($users['result'] as $key => $u) {
                                                    if ($u->role != 'admin' && $u->role != 'diagonstic') {
                                                ?>
                                                        <tr>
                                                            <td><?php 
                                                            if($page == 0 || $page == 1){
                                                                echo $serial_number = ($page*10)+ $key + 1;
                                                            } else{
                                                                echo $serial_number = (($page-1)*10)+ $key + 1;
                                                            }
                                                            ?></td>
                                                            <td>
                                                                <a href="<?php echo site_url('user-details/' . $u->id); ?>">
                                                                    <?php echo $u->firstName . ' ' . $u->middleName . ' ' . $u->lastName; ?><br><?php echo $u->regId; ?></a>
                                                            </td>

                                                            <td><?php echo $u->side; ?>
                                                            </td>

                                                            <?php if ($_SESSION['role'] == "superAdmin") { ?>

                                                                <?php if ($_SESSION['role'] == "superAdmin") { ?>

                                                                    <?php if ($u->parentNode == null) { ?>
                                                                        <td><?php print($_SESSION['regId']) ?></td>

                                                                    <?php } else { ?>
                                                                        <td><?php echo $u->par_reg_id; ?></td>
                                                                    <?php } ?>


                                                                <?php } ?>

                                                                <?php if ($_SESSION['role'] == "superAdmin") { ?>

                                                                    <?php if ($u->parentNode == null) { ?>
                                                                        <td><?php print($_SESSION['regId']) ?></td>

                                                                    <?php } else { ?>
                                                                        <td><?php echo $u->par_reg_id; ?></td>
                                                                    <?php } ?>


                                                                <?php } ?>








                                                            <?php } else { ?>
                                                                <td><?php print($_SESSION['regId']) ?></td>
                                                                <td><?php print($_SESSION['regId']) ?></td>
                                                            <?php } ?>

                                                            <!--<td><?php echo date('d-m-Y', strtotime($u->createdAt)); ?></td>-->

                                                            <td><?php echo $u->address . ' ' . $u->city . ' ' . $u->district . ' ' . $u->state . ' ' . $u->postcode; ?>
                                                            </td>
                                                            <td><?php echo $u->createdAt; ?></td>
                                                            <td><?php
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
                                                            <?php if ($_SESSION['role'] != "vendor") { ?>
                                                            <td>
                                                                <?php
                                                                if ($_SESSION['role'] == "superAdmin") { ?>
                                                                    <a
                                                                        href="<?php echo base_url('commission/list/' . $u->id); ?>"  >Commission</a>
                                                                <?php
                                                                } ?>
                                                            </td>
                                                            <td><?php if ($_SESSION['role'] != "vendor") { ?><a
                                                                        href="<?php echo base_url('users/usersEdit/' . $u->id); ?>" class="btn btn-danger" >Edit</a><?php } ?>
                                                            </td>
                                                                <?php } ?>

                                                            <!--<td><?php if ($u->status == 'pending') { ?>-->
                                                            <!--        <button class="btn btn-success" onClick="ajax_bdo_status_change(<?php echo $u->id; ?>, 'approved')">Approve</button>-->
                                                            <!--        <button class="btn btn-danger" onClick="ajax_bdo_status_change(<?php echo $u->id; ?>, 'reject')">Reject</button>-->
                                                            <!--    <?php } ?>-->
                                                            <!--</td>-->
                                                        </tr>
                                                <?php }
                                                } ?>
                                            <?php } ?>


                                        </tbody>

                                    </table>
                                    <div style='margin-top: 10px;'>
                                        <div class="text-right pagination"><?php if(isset($users['pagination'])) { echo $users['pagination']; } ?></div>
                                    </div>
                                    <table id="mytable" style="display:none;" >

                                        <thead>
                                            <tr>
                                                <th style="width: 10px">SL.No</th>
                                                <th>Member Details</th>

                                                <th>Side</th>

                                                <th>Intro</th>
                                                <th>Upliner</th>
                                                <th>Address</th>
                                                <th>DOJ</th>
                                                <th>Status</th>
                                                <?php if ($_SESSION['role'] != "vendor") { ?>
                                                <th>Commission</th>
                                                
                                                <?php } ?>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php if (!empty($users)) { ?>
                                                <?php foreach ($users['allusers'] as $key => $u) {
                                                    if ($u->role != 'admin' && $u->role != 'diagonstic') {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $key + 1; ?></td>
                                                            <td>
                                                                <a href="<?php echo site_url('user-details/' . $u->id); ?>">
                                                                    <?php echo $u->firstName . ' ' . $u->middleName . ' ' . $u->lastName; ?><br><?php echo $u->regId; ?></a>
                                                            </td>

                                                            <td><?php echo $u->side; ?>
                                                            </td>

                                                            <?php if ($_SESSION['role'] == "superAdmin") { ?>

                                                                <?php if ($_SESSION['role'] == "superAdmin") { ?>

                                                                    <?php if ($u->parentNode == null) { ?>
                                                                        <td><?php print($_SESSION['regId']) ?></td>

                                                                    <?php } else { ?>
                                                                        <td><?php echo $u->par_reg_id; ?></td>
                                                                    <?php } ?>


                                                                <?php } ?>

                                                                <?php if ($_SESSION['role'] == "superAdmin") { ?>

                                                                    <?php if ($u->parentNode == null) { ?>
                                                                        <td><?php print($_SESSION['regId']) ?></td>

                                                                    <?php } else { ?>
                                                                        <td><?php echo $u->par_reg_id; ?></td>
                                                                    <?php } ?>


                                                                <?php } ?>








                                                            <?php } else { ?>
                                                                <td><?php print($_SESSION['regId']) ?></td>
                                                                <td><?php print($_SESSION['regId']) ?></td>
                                                            <?php } ?>

                                                            <!--<td><?php echo date('d-m-Y', strtotime($u->createdAt)); ?></td>-->

                                                            <td><?php echo $u->address . ' ' . $u->city . ' ' . $u->district . ' ' . $u->state . ' ' . $u->postcode; ?>
                                                            </td>
                                                            <td><?php echo $u->createdAt; ?></td>
                                                            <td><?php echo $u->status; ?></td>
                                                            <?php if ($_SESSION['role'] != "vendor") { ?>
                                                            <td>
                                                                <?php
                                                                if ($_SESSION['role'] == "superAdmin") { ?>
                                                                    <a
                                                                        href="<?php echo base_url('commission/list/' . $u->id); ?>">Commission</a>
                                                                <?php
                                                                } ?>
                                                            </td>
                                                           
                                                                <?php } ?>

                                                            <!--<td><?php if ($u->status == 'pending') { ?>-->
                                                            <!--        <button class="btn btn-success" onClick="ajax_bdo_status_change(<?php echo $u->id; ?>, 'approved')">Approve</button>-->
                                                            <!--        <button class="btn btn-danger" onClick="ajax_bdo_status_change(<?php echo $u->id; ?>, 'reject')">Reject</button>-->
                                                            <!--    <?php } ?>-->
                                                            <!--</td>-->
                                                        </tr>
                                                <?php }
                                                } ?>
                                            <?php } ?>


                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <?php //echo $this->pagination()->create_links(); 
                            ?>
                        </div>
                        <!-- /.card-body -->
                        <!-- <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div> -->
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