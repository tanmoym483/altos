<div class="content-wrapper" style="min-height: 2080.26px;">

<div class="container p-4">
<h6><a style="cursor: pointer;" id="backLink"  class="btn btn-primary" > Back</a></h6>
    <div class="card p-3">
        <main class="app-content">
                <div class="app-title">
                    <div>
                        <h1>Report Details</h1>
                    </div>
                </div>
                
                <div class="card-body">
                   
                    <div class="col-md-12 mb-3" >
                        <div class="">
                            <div class="row" id="card_enter">
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Enter card number <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control" value="<?=$data->cardnumber?>" readonly />
                                </div>
                               
                            </div>
                            <div id="member-details" class="row" >
                               <?php 
                                if($data->cardId == 0 ){
                                    $name = $data->firstName. ' '.$data->middleName. ' '. $data->lastName;
                                    $phone_number = $data->uphone;
                                   } else {
                                    $name = $data->name;
                                    $phone_number = $data->ucphone;
                                   }
                               ?>
                               <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Name <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control"  value="<?=$name?>" readonly />
                                </div>
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Phone <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control"  value="<?=$phone_number?>" readonly />
                                </div>
                            </div>
                            <div id="report-details" class="row" >
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Doctor Name <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control"  readonly value="<?=$data->doctor_name?>" />
                                </div>
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Report Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control"  readonly><?=$data->report_description?></textarea>
                                </div>
                               
                            </div>
                            <div id="test_section" class="row" >
                                
                                <div id="test_add_section">
                                <?php 
                                    $this->db->select('diagonostic_report_test.test_amount, diagonostic_report_test.test_name, diagonostic_commision.test_category')->from('diagonostic_report_test')->join('diagonostic_commision','diagonostic_commision.id = diagonostic_report_test.test_category');
                                    $this->db->where('diagonostic_report_test.reportId', $data->did);
                                   // $this->db->where('user_id', $logs->user_id);
                                    $query = $this->db->get();
                                    $testnames = $query->result_array();
                                    foreach($testnames as $tname){
                                    ?>
                                    <div class="row">
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Test Type </label>
                                            <input type="text" class="form-control" readonly value="<?=$tname['test_category']?>" />
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Test Name </label>
                                            <input type="text" class="form-control" readonly value="<?=$tname['test_name']?>" />
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Test price </label>
                                            <input type="text" class="form-control" readonly value="<?=$tname['test_amount']?>" />
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="col-md-12 p-0"><label class="text-left">Total :</label> <input type="text" class="form-control" name="total_amount" readonly value="<?=$data->total_amount?>" /></div>
                                <div class="row">
                                    <div class="form-outline mb-4 col-sm-4">
                                        <label class="text-left">Customer GST </label>
                                        <input type="text" class="form-control"  readonly value="<?=$data->cgstin_number?>" />
                                    </div>
                                    <div class="form-outline mb-4 col-sm-4">
                                        <label class="text-left">GST Amount in % </label>
                                        <input type="text" class="form-control"  readonly value="<?=$data->gst_amount?>" />
                                    </div>
                                    <div class="form-outline mb-4 col-sm-4">
                                        <label class="text-left">Amount With GST</label>
                                        <input type="text" class="form-control"  readonly value="<?=$data->amount_with_gst?>" />
                                    </div>
                                    <div class="form-outline mb-4 col-sm-4">
                                        <label class="text-left">Paid Amount </label>
                                        <input type="text" class="form-control"  readonly value="<?=$data->paidamount?>" />
                                    </div>
                                    <div class="form-outline mb-4 col-sm-4">
                                        <label class="text-left">Status </label>
                                        <input type="text" class="form-control"  readonly value="<?=$data->status?>" />
                                    </div>
                                    <div class="form-outline mb-4 col-sm-4">
                                        <label class="text-left">Payment Status </label>
                                        <input type="text" class="form-control"  readonly value="<?=$data->payment_status?>" />
                                    </div>
                                    <div class="form-outline mb-4 col-sm-4">
                                        <label class="text-left">Payment Method </label>
                                        <input type="text" class="form-control"  readonly value="<?=$data->payment_method?>" />
                                    </div>
                                    <div class="form-outline mb-4 col-sm-4">
                                        <label class="text-left">Payment Reference No. </label>
                                        <input type="text" class="form-control"  readonly value="<?=$data->transRefno?>" />
                                    </div>
                                </div>
                                <?php if ($_SESSION['role'] === "superAdmin" && $data->status != 'approved') {?>
                                        <div class="col-md-12 p-0">
                                            <div class="">
                                                <form action="<?php echo base_url('diagonostic/postupdatestatus') ?>" method="POST"  class="status_change validation-form-message" >            
                                                
                                                <input type="hidden" name="id" value="<?=$data->did?>" id="id">
                                                <div class="col-md-4 mb-3">
                                                    <label>Status <span style="color:#C00">*</span></label>
                                                    <select class="form-control" name="status" required>
                                                        <option>Select</option>
                                                        
                                                        <option value="processing" <?php if($data->status == 'processing'){ echo 'selected';}?> <?php if($data->status == 'verification' || $data->status == 'branch processing'){ echo 'disabled';}?>>Processing</option>
                                                        <option value="verification" <?php if($data->status == 'verification'){ echo 'selected';}?> >Verification</option>
                                                       
                                                        <option value="approved" <?php if($data->status == 'approved'){ echo 'selected';}?>>Approved</option>
                                                        <option value="rejected" <?php if($data->status == 'rejected'){ echo 'selected';}?>>Rejected</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mb-6">
                                                <button class="btn btn-primary statusalert" type="button" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Status Update</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div> <?php } ?> 
                            </div>
                            
                        </div>
                    </div>
                    
                    
                </div>
        </main>
    </div>
</div>
<style>
    .main-footer{display: none;}
</style>