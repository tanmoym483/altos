<style>
    #content h3 {
        font-size: 10px;
    }
</style>
<?php


?>
<div class="content-wrapper" style="min-height: 2080.26px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Payout list</h1>
                </div>
                <div class="col-sm-6">
                    <?php if($_GET['search'] == ''){?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">User Payout List</li>
                    </ol>
                    <?php } else { ?>
                        <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo site_url('commission/payoutList'); ?>" class="btn btn-primary">Back</a></li>
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

                    <div class="col-md-12">
                        <div class="d-flex justify-content-between responsive_view">
                        
                            
                        </div>
                        <div>
                        <div class="p-2">
                            <!-- <button type="button" class="btn btn-danger saveAsExcel">Excel Download</button> -->
                            <!-- <form id="frm_gen_bdo_pdf">
                    <div></div> -->
                            <!-- <button class="btn btn-danger" id="gen_user_list_pdf">PDF Download</button> -->
                            <!-- </form> -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">

                            <!-- <h3 class="card-title"></h3> -->
                            <div class="card-title">
                            
                            </div>
                            <div class="d-flex justify-content-between responsive_view">
                        
                        <div class="col-lg-9">
                            <form method="get">
                                    <div class="row"><div class="col-lg-4 col-sm-4">
                                    
                                    <input type="text" class="form-control" name="search" placeholder="Search by ATF No." value="<?=$_GET['search']?>"></div>
                                    
                                    <div class="col-lg-1 col-sm-2"><button class="btn btn-primary" type="submit" name="sr" class="btn btn-default">Search</button></div></div>
                            </form>
                        </div>
                        <div class="p-2 col-lg-3 text-right">
                            <button type="button" class="btn btn-custom saveAsExcel"> <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                        </svg> Excel </button>
                                        <a class="btn btn-custom" href="<?php echo site_url('commission/payoutlistpdf/'); ?>" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                        </svg> Pdf </a>
                        </div>
                    </div>
                            <!-- <div class="card-tools">

                                Total Commission:
                                <?php //echo count($totalCommission) > 0 ? $totalCommission[0]->amount : 0; ?>
                            </div> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="content">
                                   <table class="table table-bordered exportable" >

                                        <thead>
                                            <tr>
                                                <th style="width: 10px">Sl.No</th>
                                                <th>User Id</th>
                                                <th>User</th>
                                                
                                                 <th>Bank A/C Number</th>
                                                <th>Bank IFSC Code</th>
                                                <th>Bank Name</th>
                                                <th>Amount</th>

                                                <th>Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($result)) { ?>
                                                <?php 
                                                 $page = $this->input->get('per_page') ? $this->input->get('per_page') : 0; 
                                                foreach ($result as $key => $c) {

                                                ?>
                                                    <tr>
                                                    <td><?php   
                                                    if($page == 0 || $page == 1){
                                                            echo $serial_number = ($page*10)+ $key + 1;
                                                    } else{
                                                            echo $serial_number = (($page-1)*10)+ $key + 1;
                                                        }
                                                    ?></td>
                                                    <td><?php echo $c->regId;?></td>
                                                    <td>
                                                        <?php echo $c->firstName.($c->middleName? " ".$c->middleName." ":' ').$c->lastName;?>
                                                    </td>
                                                    
                                                    <td><?php echo count($c->bankDetails)>0? " ".$c->bankDetails[0]->accountNumber:' ';?></td>
                                                    <td><?php echo count($c->bankDetails)>0? " ".$c->bankDetails[0]->ifscCode:' ';?></td>
                                                    <td>
                                                    
                                                        <?php echo (count($c->bankDetails)>0? " ".$c->bankDetails[0]->bankName:' ');?>
                                                       
                                                    </td>
                                                    <td><?php echo (count($c->payout)>0? " ".$c->payout[0]->amount:0); ?></td>
                                                    <td>
                                                        <!-- <button class="btn btn-success" onClick="payOutPaymentClick(<?php echo $c->id; ?>)">Pay</button> -->
                                                        <a href="<?php echo site_url('commission/payouts/'.$c->id); ?>" class="btn btn-success" >View</a>
                                                    </td>

                                                    </tr>
                                            <?php }
                                            } ?>


                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <?php if (isset($pagination))
                                {
                                    echo $pagination;
                                } ?>        
                           <table class="table table-bordered exportable" id="mytable" style="display:none">

<thead>
    <tr>
        <th style="width: 10px">Sl.No</th>
        <th>User Id</th>
        <th>User</th>
        
         <th>Bank A/C Number</th>
        <th>Bank IFSC Code</th>
        <th>Bank Name</th>
        <th>Amount</th>

       


    </tr>
</thead>
<tbody>
    <?php if (!empty($alldata)) { ?>
        <?php 
        
        foreach ($alldata as $key => $c) {

        ?>
            <tr>
            <td><?php   
                echo $key + 1;
             
            ?></td>
            <td><?php echo $c->regId;?></td>
            <td>
                <?php echo $c->firstName.($c->middleName? " ".$c->middleName:' ').$c->lastName;?>
            </td>
            
            <td><?php echo count($c->bankDetails)>0? " ".$c->bankDetails[0]->accountNumber:' ';?></td>
            <td><?php echo count($c->bankDetails)>0? " ".$c->bankDetails[0]->ifscCode:' ';?></td>
            <td>
            
                <?php echo (count($c->bankDetails)>0? " ".$c->bankDetails[0]->bankName:' ');?>
               
            </td>
            <td><?php echo (count($c->payout)>0? " ".$c->payout[0]->amount:0); ?></td>
           

            </tr>
    <?php }
    } ?>


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