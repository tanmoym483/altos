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
                    <h1>Health Card Commision Chart</h1>
                </div>
                <div class="col-sm-6">
                
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Health Card Commision Chart</li>
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
                                        
                                            
                                            <?php if ($_SESSION['role'] != "customer") { ?>
                                           
                                            <th>L1</th>
                                            <th>L2</th>
                                            <th>L3</th>
                                            <th>L4</th>
                                            <th>L5</th>
                                            <th>L6</th>
                                            <th>L7</th>
                                            <th>L8</th>
                                            <th>L9</th>
                                            <th>L10</th>
                                            <th>L11</th>
                                            <th>L12</th>
                                            <th>L13</th>
                                            <th>L14</th>
                                            <th>L15</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>

                                 





                                            <tr>
                                                
                                                <?php if ($_SESSION['role'] != "customer") { ?>
                                               
                                                <td>100</td>
                                                <td>20</td>
                                                <td>10</td>
                                                <td>10</td>
                                                <td>10</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <?php } ?>
                                            </tr>
                                            
                                    </tbody>
                                </table>
                                <ol><li> <strong>DIRECT MEMBERSHIP REFFERAL BONUS Rs - 100/-</strong></li>
<li><strong>DIRECT FRANCHISE MATCHING BONUS Rs - 100/-</strong></li>
<li><strong>SPONSOR FRANCHISE MATCHING BONUS UPTO 15th LEVEL Rs - 100/-</strong></li>
<li><strong>MONTHLY HEALTH AND A LL DIAGNOSTIC LEVEL INCOME</strong></li>
<li><strong>QUATERLY MEMBERSHIP LEVEL 5TH ACHIEVEMENT FRANCHISE (Assistant Relationship Manager )
SPONSOR FRANCHISE MATCHING BONUS Rs - 50/-</strong></li>
<li><strong>HALF YEARLY MEMBERSHIP LEVEL 10TH ACHIEVEMENT FRANCHISE MATCHING BONUS (Franchise
Group Unit Manager) SPONSOR FRANCHISE MATCHING BONUS Rs - 25/-</strong></li>
<li><strong>YEARLY MEMBERSHIP LEVEL 15TH ACHIEVEMENT FRANCHISE MATCHING BONUS (Franchise
Regional Manager ) SPONSOR FRANCHISE MATCHING BONUS Rs - 25/-</strong></li></ol>
                            </div>
                                
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