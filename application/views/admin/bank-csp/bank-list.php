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
                    <h1>Bank List</h1>
                </div>
                <div class="col-sm-6">
                <?php if(empty($_GET['bankName'])&& empty($_GET['district']) && empty($_GET['ifsc_code']) && empty($_GET['branch_code']) ) { ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Bank List</li>
                    </ol>
                 <?php } else { ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a style="cursor: pointer;" id="backLink" class="btn btn-primary">Back</a></li>
                       
                    </ol>
                <?php }  ?>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-sm-12">
<div class="d-flex justify-content-between responsive_view">

                   <div></div>
                   <div class="p-2 mt-4">
                        <!-- <button type="button" class="btn btn-custom saveAsExcel-bdo"><svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                        </svg> Excel</button> -->
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
                            
                            <div class="card-tools float-left">
                                <form method="get">

                                    <div class="input-group ">
                                        <select class="form-control mr-3" name="bankName">
                                            <option value="">All Bank name</option>
                                            <option value="State Bank Of India" <?php if($_GET['bankName'] == 'State Bank Of India'){ echo 'selected';}?>>State Bank Of India</option>
                                            <option value="Bank Of India" <?php if($_GET['bankName'] == 'Bank Of India'){ echo 'selected';}?>>Bank Of India </option>
                                            <option value="Punjab National Bank" <?php if($_GET['bankName'] == 'Punjab National Bank'){ echo 'selected';}?>>Punjab National Bank</option>
                                            <option value="Indian Overseas Bank" <?php if($_GET['bankName'] == 'Indian Overseas Bank'){ echo 'selected';}?>>Indian Overseas Bank</option>
                                            <option value="Bank Of Baroda" <?php if($_GET['bankName'] == 'Bank Of Baroda'){ echo 'selected';}?>>Bank Of Baroda</option>
                                            <option value="UCO Bank" <?php if($_GET['bankName'] == 'UCO Bank'){ echo 'selected';}?>>UCO Bank</option>
                                            <option value="Indian bank" <?php if($_GET['bankName'] == 'Indian bank'){ echo 'selected';}?>>Indian bank</option>
                                            <option value="CENTRAL BANK OF INDIA" <?php if($_GET['bankName'] == 'CENTRAL BANK OF INDIA'){ echo 'selected';}?>>CENTRAL BANK OF INDIA</option>
                                            <option value="Bangiya Gramin Vikash Bank" <?php if($_GET['bankName'] == 'Bangiya Gramin Vikash Bank'){ echo 'selected';}?>>Bangiya Gramin Vikash Bank</option>
                                        </select>
                                        <select class="form-control mr-3" name="district" >
                                            <option value="">All District</option>
                                            <option value="Nadia" <?php if($_GET['district'] == 'Nadia'){ echo 'selected';}?>>Nadia</option>
                                            <option value="North 24 parganas" <?php if($_GET['district'] == 'North 24 parganas'){ echo 'selected';}?>>North 24 parganas</option>
                                            <option value="Hooghly" <?php if($_GET['district'] == 'Hooghly'){ echo 'selected';}?>>Hooghly</option>
                                        </select>
                                        <input type="text" name="ifsc_code" class="form-control mr-3" placeholder="Search by IFSC Code" value="<?=$_GET['ifsc_code']?>">
                                        <input type="text" name="branch_code" class="form-control mr-3" placeholder="Search by Branch Code" value="<?=$_GET['branch_code']?>">

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
                        <?php if($_GET['bankName'] || $_GET['district'] || $_GET['ifsc_code'] ) { ?>
                            <div class="table-responsive">
                                <table class="table table-bordered exportable" id="content" style="font-size:14px;">
                                    <thead>
                                        <tr>
                                            <th>Bank Name</th>
                                            <th>IFSC Code</th>
                                            <th>Distirct</th>
                                            <th>Branch</th>
                                            <th>Branch Code</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  
                                       foreach ($branchcode['result'] as $u) {
                                       ?>
                                            <tr>
                                                <td><?php echo $u->bank; ?></td>
                                                <td><?php echo $u->ifsc;?></td>
                                                <td><?php echo $u->district; ?></td>
                                                <td><?php echo $u->branch; ?></td>
                                                <td><?php echo $u->branchCode; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                                <div style='margin-top: 10px;'>
                                        <div class="text-right pagination"><?php if(isset($branchcode['pagination'])) { echo $branchcode['pagination']; } ?></div>
                                </div>
                                <?php } ?>
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