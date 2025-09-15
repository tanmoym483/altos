<div class="content-wrapper" style="min-height: 2080.26px;">
<style>
    img {
        display: block;
        max-width: 100%;
    }
    .preview {
        overflow: hidden;
        width: 160px; 
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
    .modal-lg{
        max-width: 1000px !important;
    }
</style>
<div class="container p-4">
    <div class="card p-3">
        <main class="app-content">
                <div class="">
                <div class="card-header">

        <!-- <h3 class="card-title"></h3> -->
                    <div class="card-title">
                        Withdraw Request List
                    </div>
                            
                            
                    <div class="card-tools">
                        <form method="get">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control" placeholder="Search" value="<?=(isset($_GET['search'])?$_GET['search']:'')?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <?php if ($_SESSION['role'] === "superAdmin") { ?>
                                        <th>Membar Name</th>
                                        <th>Reg Id</th>
                                        <th>User Type</th>
                                    <?php  } ?>
                                    <th>Amount</th>
                                    <th>Withdraw Amount</th>
                                    <th>Trans Type</th>
                                    <?php if ($_SESSION['role'] === "superAdmin") { ?>
                                            <th>trans Ref No</th>

                                            <th>trans Ref Doc</th>
                                            <?php  } ?>
                                    <th>Status</th>
                                    <th>Requested at</th>
                                    <?php if ($_SESSION['role'] === "superAdmin") { ?>
                                        <th>Action</th>
                                    <?php  } ?>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php 
                                       // print_r($users);
                                        foreach ($withdrawlist as $key => $u) {
                                            $id = $u->userId;
                                            $CI =& get_instance();
                                            $CI->load->model('Transaction_model', 'transectionModel');
                                           // $CI->load->model('Transaction_model');
                                            $demat = $this->transectionModel->dematamount($id);
                                            $withdraw = $this->transectionModel->withdrawamount($id);
                                            $bonus = $this->transectionModel->bonusamount($id);
                                            
                                            if(!empty($demat)){
                                                $withdrawamount = (!empty($withdraw))? $withdraw[0]['amount'] : 0;
                                                $bonusamount = (!empty($bonus))? $bonus[0]['amount'] : 0;
                                                $amount = ($demat[0]['amount'] + $bonusamount) - $withdrawamount;
                                            } else {
                                                $amount = 0;
                                            }
                                        ?>
                                            <tr>
                                                
                                                <?php if ($_SESSION['role'] === "superAdmin") {
                                                    $membarname =  $u->firstName . ' ' . $u->lastName;
                                                ?>
                                                    <td>
                                                        <?php echo $membarname ?>
                                                    </td>

                                                    <td><?php echo $u->regId; ?>
                                                    </td>
                                                    <td><?php echo ucfirst($u->role); 
                                                     
                                                     ?>
                                                    </td>
                                                <?php } ?>
                                                <td><?=$amount?></td>
                                                <td>
                                                    <?php echo $u->amount; ?>
                                                </td>

                                                <td>
                                                    <?php if($u->transType=="withdraw"){ ?>
                                                    Withdraw
                                                    <?php } ?>
                                                    
                                                   
                                                </td>
                                                <?php if ($_SESSION['role'] === "superAdmin") { ?>
                                                <td><?php echo $u->transRefNo ?></td>

                                                <td>
                                                    <?php if($u->transRefDoc != '') {?>
                                                    <a href="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1">
                                                        <img src="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" width="100" height="70" crossorigin="" />
                                                    </a>
                                                    <a href="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" download>

                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                    <?php } ?>
                                                </td>
                                                <?php } ?>
                                                <td><?php echo $u->tstatus; ?></td>
                                                <td><?php echo $u->createdAt; ?></td>
                                                <?php if ($_SESSION['role'] === "superAdmin") { ?>
                                                    <td><?php if ($u->tstatus == 'pending') { ?>
                                                            <a class="btn btn-success" onClick="approveDocumentSubmit(<?php echo $u->tid; ?>)" data-toggle="modal" data-target="#openapprove" >Approve</a>
                                                            <button class="btn btn-danger" onClick="ajax_payment_status_change(<?php echo $u->tid; ?>, 'reject')">Reject</button>
                                                        <?php } ?>
                                                       
                                                    </td>
                                                <?php } ?>

                                            </tr>
                                        <?php } ?>
                            </tbody>
                            
                        </table>
                        <div style='margin-top: 10px;'>
                        <div class="text-right pagination"><?php if(isset($serviceuser['pagination'])) { echo $serviceuser['pagination']; }?></div>
                        
                        </div>
                    </div>
                                    
                </div>
            </div>       
        </main>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="openapprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Approve withdraw payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                                                      
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url("users/adddocument") ?>">
            <input type="hidden" name="transction_id" id="transction_id"  >
            <div class="col-md-12 mb-3">
                <label class="d-block h-50" >Withdraw Amount</label>
                <input type="text" readonly name="amount" class="form-control col-xs-12" id="withdraw_amount" value="" >
            <div>
            <div class="col-md-12 mb-3">
                <label class="d-block h-50">Payment Reference No <span style="color:#C00">*</span></label>
                <input type="text" name="transRefNo" class="form-control col-xs-12" placeholder="Payment Reference No" required=""><br />
            </div>
            <div class="col-md-12 mb-3">
                <label class="d-block h-50">Payment Reference Upload (310px X 200px) <span style="color:#C00">*</span></label>
                <input type="file" name="transRefDoc" required class="form-control col-xs-12 " value="" id="upload_image" >
                <input type="text" name="transRefDocs" class="form-control col-xs-12 "  id="upload_imagess" style="display:none">
                <input type="hidden" name="transRefDoc" id="transRefDocId">
                
            </div> 
        </form>
      </div>
      <div class="modal-footer">
      <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
      </div>
    </div>
  </div>
</div>