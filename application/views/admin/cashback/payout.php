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
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Payout List</li>
                    </ol>
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
                        <div class="p-2">
                            <!-- <form method="get">
                                <label>From</label>
                                <input type="date" name="from" max="<?= date('Y-m-d'); ?>">
                                <label>To</label>
                                <input type="date" name="to" max="<?= date('Y-m-d'); ?>">
                                <button class="btn btn-danger" type="submit" name="sr" class="btn btn-default">Go</button>
                            </form> -->
                        </div>
                        <div></div>
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
                                <form method="post">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
                                    <table class="table table-bordered exportable" id="mytable">

                                        <thead>
                                            <tr>
                                            <th>Sl No.</th>
                                                <th style="width: 100px">Date</th>
                                               
                                                <th>Amount</th>
                                                <th>Transaction ID</th>
                                                <th>Transaction Payment Date</th>
                                                <th>Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($data)) { ?>
                                                <?php 
                                                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                                                foreach ($data as $key => $c) {

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
                                                    <td><?php echo $c->created_date; ?></td>
                                                    <td><?php echo $c->cashback; ?></td>
                                                    <td><?php echo $c->transaction_id>0?$c->transaction_id:""; ?></td>
                                                    <td><?php echo $c->payoutDate; ?></td>
                                                   <td> <?php if($c->cashbackstatus =='nonpaid' && $_SESSION['role'] === "superAdmin" ){ ?>
                                                        <button class="btn btn-info" onClick="cashbackpayOutPaymentClick(<?php echo $c->userId; ?>,<?php echo $c->cashbackid; ?>,'<?php echo $c->created_date; ?>')">Pay</button>
                                                   <?php }else{ ?>
                                                    <?php echo $c->cashbackstatus=='paid'?"<span class='bg bg-success px-2'>paid</span>":""; ?>
                                                    <?php } ?>

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
                           
                        </div>
                        <div class="modal" tabindex="-1" role="dialog" id="payoutModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Payment Details</h5>
                                    <button type="button" class="close" onClick="payoutModalClose()">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form id="formCashbackPayout">
                                   
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Transaction Id</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Transaction Id" required name="transactionId">
                                    </div>
                                    <input type="hidden" name="paymentID"  id="paymentID"/>
                                    <input type="hidden" name="userID"  id="userID"/>
                                    <input type="hidden" name="date"  id="date"/>
                                    <button type="button" class="btn btn-primary" id="checkoutModalFormSubmitCashBtn" >Submit</button>
                                    </form>
                                </div>
                               
                                </div>
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