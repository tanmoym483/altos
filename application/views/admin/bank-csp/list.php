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
                    <h1>CSP Applications</h1>
                </div>
                <div class="col-sm-6">
                
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">CSP Applications</li>
                    </ol>
                    
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-sm-12">
<div class="d-flex justify-content-between responsive_view">
<?php if ($_SESSION['role'] == "vendor") { ?>
                   <div class="p-2">
                        <a href="<?php echo base_url('bankcsp/add') ?>" class="btn btn-primary">Create CSP Application</a>
                   </div> <?php } ?>
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
                
                
                <!-- </form> -->

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-tools">
                                <!-- <form method="post">

                                    <div class="input-group input-group-sm" style="width: 350px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search by ATF No. or Email" value="<?=$search?>">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                </form> -->
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered exportable" id="content" style="font-size:14px;">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Date</th>
                                            <th>Application Number</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Link Branch</th>
                                            <th>Link Bank Code</th>
                                            <th>Link Bank Location</th>
                                            <th width="20%">Address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                                        foreach ($applications as $key=>$u) {

                                        ?>
                                            <tr>
                                                <td>
                                                <?php 
                                                            if($page == 0 || $page == 1){
                                                                echo $serial_number = ($page*10)+ $key + 1;
                                                            } else{
                                                                echo $serial_number = (($page-1)*10)+ $key + 1;
                                                            }
                                                            ?>  
                                                </td>
                                                <td><?=date('d-m-Y H:i:s', strtotime($u->date))?></td>
                                                <td><?php echo $u->application_id; ?></td>
                                                <td><?php echo $u->firstName . ' ' . $u->middleName . ' ' . $u->lastName; ?></td>
                                                <td><?php echo $u->email; ?></td>
                                                <td><?php echo $u->phone; ?></td>
                                                <td><?php echo $u->bankName ?></td>
                                               <td><?=$u->branchCode?></td>
                                               <td><?php echo $u->branchLocation ?></td>
                                               <td><?php echo $u->address.' '.$u->landmark.' '.$u->city.' '.$u->gram_panchayat.' ' .$u->district.' '.$u->state.' -'.$u->pincode  ?></td>
                                                <td>
                                                <?php
                                                    if($u->status == 'processing')
                                                    echo '<strong class="text-warning">'.$u->status.'</strong>';
                                                    if($u->status == 'verification')
                                                    echo '<strong class="text-primary">'.$u->status.'</strong>';
                                                    if($u->status == 'reject')
                                                    echo '<strong class="text-danger">'.$u->status.'</strong>';
                                                    if($u->status == 'approve')
                                                    echo '<strong class="text-success">'.$u->status.'</strong>';
                                                    if($u->status == 'branch processing')
                                                    echo '<strong style="color:#03cbf9">'.$u->status.'</strong>';?>    
                                                
                                                   
                                               <td>
                                                <?php
                                                if( $this->session->role == 'superAdmin' ) { ?>       
                                                <a href="<?=base_url('bankcsp/edit')?>/<?=$u->id?>" class="text-danger"><i class="fa fa-pen"></i></a><?php } ?>
                                                <a href="<?=base_url('bankcsp/details')?>/<?=$u->id?>"><i class="fa fa-eye"></i></a>
                                                <?php 
                                                if($u->status == 'verification') { if($u->downloaded_status == 'not download') { ?> <a href="<?php echo base_url('uploads/Bank CSP Registration Form.pdf'); ?>" data-id="<?=$u->id?>" class="download_btn" download  style="fill:red"> <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg><a><?php } else { ?><a href="<?php echo base_url('uploads/Bank CSP Registration Form.pdf'); ?>" download style="fill:green" > <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg><a>
                                        <a href="<?=base_url('bankcsp/document_upload')?>/<?=$u->id?>" ><i class="fas fa-upload"></i></a>
                                        <?php } } ?>
                                       
                                                </td>
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
                                            <th>Application Number</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Link Branch</th>
                                            <th>Link Bank Code</th>
                                            <th>Link Bank Location</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                       
                                        foreach ($applications as $u) {

                                        ?>
                                            <tr>
                                            <td><?php echo $u->application_id; ?></td>
                                                <td><?php echo $u->firstName . ' ' . $u->middleName . ' ' . $u->lastName; ?></td>
                                                <td><?php echo $u->email; ?></td>
                                                <td><?php echo $u->phone; ?></td>
                                                <td><?php echo $u->bankName ?></td>
                                               <td><?=$u->branchCode?></td>
                                               <td><?php echo $u->branchLocation ?></td>
                                               <td><?php echo $u->address.' '.$u->landmark.' '.$u->city.' '.$u->gram_panchayat.' ' .$u->district.' '.$u->state.' -'.$u->pincode  ?></td>
                                                <td><?php echo $u->status ?></td>
                                                
                                               
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