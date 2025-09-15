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
                    <h1> Downline Report</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('users/downlinereports'); ?>" id="backbtn" style="display:none" class="btn btn-primary">Back</a></li>
                        
                    </ol> 
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
                            <!-- <form method="get">
                                <select name="registration" >
                                    <option value="all">All</option>
                                <?php if (!empty($vendorregid)) { ?>
                                        <?php foreach ($vendorregid as $u) {
                                       
                                        ?>
                                    <option value="<?php echo $u['regId']; ?>" <?php echo (!empty($_GET) && $_GET['registration'] == $u['regId'])?'selected':''; ?> ><?php echo $u['regId']; ?></option>
                                    <?php } }  ?>
                                </select>
                                
                                <button class="btn btn-danger" type="submit" name="sr" class="btn btn-default">Go</button>
                            </form> -->
                        </div>
                        <div></div>
                        <div class="p-2">
                        <button type="button" class="btn btn-custom saveAsExcel"><svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                        </svg> Excel</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">

                            <!-- <h3 class="card-title"></h3> -->
                            <div class="card-title">
                                <!-- <form method="post">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search by ATF No." value="<?=$search?>">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form> -->
                            </div>
               
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="content">
                                    <div class="input-group input-group-sm" style="width: 250px; ">
                                        <input type="text" id="myInputTextField" class="form-control float-right" placeholder="Search by ATF No." >
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary" id="inputbtn">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                    <!-- <input type="text" id="myInputTextField"> -->
                                    <table class="table table-bordered exportable" id="myTable" data-ordering="false"  >

                                        <thead>
                                            <tr>
                                                
                                                <th>Sl No.</th>
                                                <th>User Id</th>
                                                <th>Side</th>
                                                <th>Name</th>
                                                <th>Joining date</th>
                                                <th>Status</th>
                                               

                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php if (!empty($users)) { ?>
                                        <?php 
                                        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                                        foreach ($users as $key => $u) {
                                       if($u->role != 'admin' && $u->role != 'diagonstic'){
                                        ?>
                                            <tr>
                                           <td> <?php 
                                                        if($page == 0 || $page == 1){
                                                            echo $serial_number = ($page*10)+ $key + 1;
                                                        } else{
                                                            echo $serial_number = (($page-1)*10)+ $key + 1;
                                                        }
                                                        ?></td>
                                                <td>
                                                   <?php echo $u->regId; ?>
                                                </td>

                                                <td><?php echo $u->side; ?>
                                                </td>
                                                <td><?php echo $u->firstName . ' ' . $u->middleName . ' ' . $u->lastName; ?></td>
                                              

                                                <!--<td><?php echo date('d-m-Y', strtotime($u->createdAt)); ?></td>-->
                                                
                                                
                                                 <td><?php echo $u->createdAt; ?></td>
                                                 <td><strong class='text-success'><?php echo $u->status?></strong></td>
                                               
                                            </tr>
                                        <?php } } ?>
                                    <?php } ?>


                                        </tbody>

                                    </table>
                                    <table class="" id="mytable" style="display:none" >

                                        <thead>
                                            <tr>
                                                
                                                
                                                <th>User Id</th>
                                                <th>Side</th>
                                                <th>Name</th>
                                                <th>Joining date</th>
                                                <th>Status</th>
                                               

                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php if (!empty($users)) { ?>
                                        <?php foreach ($users as $key => $u) {
                                       if($u->role != 'admin' && $u->role != 'diagonstic'){
                                        ?>
                                            <tr>
                                                
                                                <td>
                                                   <?php echo $u->regId; ?>
                                                </td>

                                                <td><?php echo $u->side; ?>
                                                </td>
                                                <td><?php echo $u->firstName . ' ' . $u->middleName . ' ' . $u->lastName; ?></td>
                                                 <td><?php echo $u->createdAt; ?></td>
                                                 <td><strong class='text-success'><?php echo $u->status?></strong></td>
                                               
                                            </tr>
                                        <?php } } ?>
                                    <?php } ?>


                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <?php //echo $this->pagination()->create_links(); 
                            ?>
                        </div>
                        <!-- /.card-body -->
                       
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
