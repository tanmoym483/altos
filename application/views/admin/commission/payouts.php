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
                    <?php if($_SESSION['role'] == 'superAdmin'){ 
                        if($_GET['from'] =='' ){ ?>
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a id="backLink" style="cursor:pointer" class="btn btn-primary">Back</a></li>
                            </ol> 
                      <?php  } else { ?>
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a id="backLink" style="cursor:pointer" class="btn btn-primary">Back</a></li>
                            </ol> 

                       <?php }
                        ?>
                        
                    
                    <?php } else { 
                        if($_GET['from'] =='' ){ ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Payout List</li>
                    </ol>
                    <?php  } else { ?>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a id="backLink" style="cursor:pointer" class="btn btn-primary">Back</a></li>
                            </ol> 
                    <?php } } ?>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-sm-12">

                <div class="col-md-12">
                    
                    <div class="card">
                        <div class="card-header">

                            <!-- <h3 class="card-title"></h3> -->
                            <div class="card-title">
                                
                            </div>
                            <div class="d-flex justify-content-between responsive_view">
                        
                                    <div class="col-lg-7">
                                        <form method="get">
                                                <div class="row"><div class="col-lg-4 col-sm-4">
                                                <label>From</label>
                                                <input type="date" class="form-control" name="from" max="<?=date('Y-m-d'); ?>" value="<?=$_GET['from']?>"></div>
                                                <div class="col-lg-4 col-sm-4"><label>To</label>
                                                <input type="date" name="to" class="form-control"  max="<?=date('Y-m-d'); ?>" value="<?=$_GET['to']?>"></div>
                                                <div class="col-lg-1 col-sm-2"><label style="opacity:0;">From</label><button class="btn btn-primary" type="submit" name="sr" class="btn btn-default">Search</button></div></div>
                                        </form>
                                    </div>
                                    <div class="p-2 col-lg-2 text-right"><?=$vendor->firstName.' '.$vendor->middleName.' '.$vendor->lastName.' '.'('.$vendor->regId.')'?></div>
                                    <div class="p-2 col-lg-3 text-right">
                                        
                                        <button type="button" class="btn btn-custom saveAsExcel"> <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                        <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                                    </svg> Excel </button>
                                                    <a class="btn btn-custom" href="<?php echo site_url('commission/payoutpdf/'.$user_id); ?>" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                        <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                                    </svg> Pdf </a>
                                    </div>
                                </div>
                            <div class="card-tools">
                            
                            
                            <?php
                            if($due != 0){
                                echo '<p class="pr-3">'.'Due Payment: '.$due.'</p>';
                            } else {
                                echo '<p class="pr-3">'.'Due Payment: 0'.'</p>';
                            }
                            if($_SESSION['role'] == 'superAdmin' && $due >= 100){ ?>
                                 <a class="btn btn-primary" onClick="totalPaymentClick(<?php echo $user_id; ?>,<?=$due?>)" >Pay</a>
                           <?php } ?>
                          
                          
                            </div>
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
                                                <th>Transaction Date</th>
                                                <th>Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($result)) { ?>
                                                <?php 
                                                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                                                foreach ($result as $key => $c) {

                                                ?>
                                                    <tr>
                                                    <td> <?php 
                                                        if($page == 0 || $page == 1){
                                                            echo $serial_number = ($page*10)+ $key + 1;
                                                        } else{
                                                            echo $serial_number = (($page-1)*10)+ $key + 1;
                                                        }
                                                        ?>  </td>
                                                    <td><a href="<?php echo site_url("commission/list/".$c->details->user_id.'?d='.date("d-m-Y",strtotime($c->date)))?>"><?php echo date("d-m-Y",strtotime($c->date)); ?></a></td>
                                                    <td><?php echo $c->amount; ?></td>
                                                    <td><?php echo $c->details->transaction_id>0?$c->details->transaction_id:""; ?></td>
                                                    <td><?=($c->details->createdAt == '')?'':date('d-m-Y H:i:s',strtotime($c->details->createdAt))?></td>
                                                   <td> <?php if($c->details->isPaymentCompleted!=='true' && $_SESSION['role'] === "superAdmin" ){ ?>
                                                        <button class="btn btn-info" onClick="payOutPaymentClick(<?php echo $c->details->user_id; ?>,'<?php echo $c->details->createdAt; ?>')">Pay</button>
                                                   <?php }else{ ?>
                                                    <?php echo $c->details->isPaymentCompleted=='true'?"<span class='bg bg-success px-2'>paid</span>":""; ?>
                                                    <?php if($c->details->isPaymentCompleted =='true' && $_SESSION['role'] === "superAdmin"){?><button class="btn btn-info" onClick="editPaymentClick(<?php echo $c->details->id; ?>,'<?=$c->details->transaction_id?>')">Edit</button><?php } ?>
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
                                <form id="formPayout">
                                   
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Transaction Id</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Transaction Id" required name="transactionId">
                                    </div>
                                    <input type="hidden" name="userID"  id="userID"/>
                                    <input type="hidden" name="date"  id="date"/>
                                    <button type="button" class="btn btn-primary" id="checkoutModalFormSubmitBtn" >Submit</button>
                                    </form>
                                </div>
                               
                                </div>
                            </div>
                        </div>
                        <div class="modal" tabindex="-1" role="dialog" id="payoutEditModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Payment Details</h5>
                                    <button type="button" class="close" onClick="payoutEditModalClose()">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form id="formEditPayout">
                                   
                                    <div class="form-group">
                                        <label for="exampleInputPassword2">Transaction Id</label>
                                        <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Transaction Id" required name="transactionId">
                                    </div>
                                    <input type="hidden" name="transId"  id="transId"/>
                                   
                                    <button type="button" class="btn btn-primary" id="checkoutModalFormSubmitBtn1" >Submit</button>
                                    </form>
                                </div>
                               
                                </div>
                            </div>
                        </div>
                        <div class="modal" tabindex="-1" role="dialog" id="totalPayoutModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Payment Details</h5>
                                    <button type="button" class="close" onClick="totalPayoutModalClose()">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form id="formTotalPayout">
                                   
                                    <div class="form-group">
                                        <label for="exampleInputPassword3">Transaction Id</label>
                                        <input type="text" class="form-control" id="exampleInputPassword3" placeholder="Transaction Id" required name="transactionId">
                                    </div>
                                    <input type="hidden" name="userId"  id="tuserId"/>
                                    <input type="hidden" name="amount"  id="amount"/>
                                    <button type="button" class="btn btn-primary" id="checkoutModalFormSubmitBtn2" >Submit</button>
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