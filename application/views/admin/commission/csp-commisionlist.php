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
                    <h1>CSP Commision Chart</h1>
                </div>
                <div class="col-sm-6">
                
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">CSP Commision Chart</li>
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
                                            <th>BANK NAME</th>
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
                                                <td>STATE BANK OF INDIA</td>
                                                <td>8250</td>
                                                <td>2750</td>
                                                <td>1100</td>
                                                <td>550</td>
                                                <td>550</td>
                                                <td>412.5</td>
                                                <td>412.5</td>
                                                <td>412.5</td>
                                                <td>412.5</td>
                                                <td>412.5</td>
                                                <td>137.5</td>
                                                <td>137.5</td>
                                                <td>137.5</td>
                                                <td>137.5</td>
                                                <td>137.5</td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                
                                                <?php if ($_SESSION['role'] != "customer") { ?>
                                                <td>INDIAN OVERSISE BANK</td>
                                                <td>3750</td>
                                                <td>1250</td>
                                                <td>500</td>
                                                <td>250</td>
                                                <td>250</td>
                                                <td>187.5</td>
                                                <td>187.5</td>
                                                <td>187.5</td>
                                                <td>187.5</td>
                                                <td>187.5</td>
                                                <td>62.5</td>
                                                <td>62.5</td>
                                                <td>62.5</td>
                                                <td>62.5</td>
                                                <td>62.5</td>
                                                <?php } ?>
                                            </tr>
                                            
                                           
                                            <tr>
                                                   
                                                <?php if ($_SESSION['role'] != "customer") { ?>
                                                 <td>BANK OF BORODA</td>
                                                <td>6750</td>
                                                <td>2250</td>
                                                <td>900</td>
                                                <td>450</td>
                                                <td>450</td>
                                                <td>337.5</td>
                                                <td>337.5</td>
                                                <td>337.5</td>
                                                <td>337.5</td>
                                                <td>337.5</td>
                                                <td>112.5</td>
                                                <td>112.5</td>
                                                <td>112.5</td>
                                                <td>112.5</td>
                                                <td>112.5</td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                   
                                                    <?php if ($_SESSION['role'] != "customer") { ?>
                                                        <td>BANK OF INDIA</td>
                                                <td>4500</td>
                                                <td>1500</td>
                                                <td>600</td>
                                                <td>300</td>
                                                <td>300</td>
                                                <td>225</td>
                                                <td>225</td>
                                                <td>225</td>
                                                <td>225</td>
                                                <td>225</td>
                                                <td>75</td>
                                                <td>75</td>
                                                <td>75</td>
                                                <td>75</td>
                                                <td>75</td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                  
                                                    <?php if ($_SESSION['role'] != "customer") { ?>
                                                        <td>UCO BANK</td>
                                                <td>4500</td>
                                                <td>1500</td>
                                                <td>600</td>
                                                <td>300</td>
                                                <td>300</td>
                                                <td>225</td>
                                                <td>225</td>
                                                <td>225</td>
                                                <td>225</td>
                                                <td>225</td>
                                                <td>75</td>
                                                <td>75</td>
                                                <td>75</td>
                                                <td>75</td>
                                                <td>75</td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                   
                                                    <?php if ($_SESSION['role'] != "customer") { ?>
                                                        <td>CENTIRL BANK OF INDIA</td>
                                                <td>6225</td>
                                                <td>2075</td>
                                                <td>830</td>
                                                <td>415</td>
                                                <td>415</td>
                                                <td>311.25</td>
                                                <td>311.25</td>
                                                <td>311.25</td>
                                                <td>311.25</td>
                                                <td>311.25</td>
                                                <td>103.75</td>
                                                <td>103.75</td>
                                                <td>103.75</td>
                                                <td>103.75</td>
                                                <td>103.75</td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                   
                                                    <?php if ($_SESSION['role'] != "customer") { ?>
                                                        <td>INDIAN BANK</td>
                                                <td>4500</td>
                                                <td>1500</td>
                                                <td>600</td>
                                                <td>300</td>
                                                <td>300</td>
                                                <td>225</td>
                                                <td>225</td>
                                                <td>225</td>
                                                <td>225</td>
                                                <td>225</td>
                                                <td>75</td>
                                                <td>75</td>
                                                <td>75</td>
                                                <td>75</td>
                                                <td>75</td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                    
                                                    <?php if ($_SESSION['role'] != "customer") { ?>
                                                        <td>PANJAB NATATIONAL BANK</td>
                                                <td>6750</td>
                                                <td>2250</td>
                                                <td>900</td>
                                                <td>450</td>
                                                <td>450</td>
                                                <td>337.5</td>
                                                <td>337.5</td>
                                                <td>337.5</td>
                                                <td>337.5</td>
                                                <td>337.5</td>
                                                <td>112.5</td>
                                                <td>112.5</td>
                                                <td>112.5</td>
                                                <td>112.5</td>
                                                <td>112.5</td>
                                                <?php } ?>
                                            </tr>
                                            <tr> 
                                               
                                                <?php if ($_SESSION['role'] != "customer") { ?>
                                                    <td>BONGIO GRAMIN VIKASH BANK</td>
                                                <td>6000</td>
                                                <td>2000</td>
                                                <td>800</td>
                                                <td>400</td>
                                                <td>400</td>
                                                <td>300</td>
                                                <td>300</td>
                                                <td>300</td>
                                                <td>300</td>
                                                <td>300</td>
                                                <td>100</td>
                                                <td>100</td>
                                                <td>100</td>
                                                <td>100</td>
                                                <td>100</td>
                                                <?php } ?>
                                            <tr>
                                    </tbody>
                                </table>

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