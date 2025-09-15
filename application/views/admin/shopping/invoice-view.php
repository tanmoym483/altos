<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?=base_url('shopping/invoicelist')?>" class="btn btn-primary">Back</a>
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">

                            <?php if ($this->session->flashdata('error') != '') { ?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('success') != '') { ?>
                                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                            <?php } ?>
                                


                                    <div class="row">
                                       
                                       
                                        <div class="col-md-4 mb-3">
                                            <label>Platform </label>
                                            <input  type="text" value="<?=$data->platform?>" class="form-control" readonly >
                                            
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Transaction </label>
                                            <input  type="text" value="<?=$data->transactionId?>" class="form-control" readonly >
                                            
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Amount </label>
                                            <input  type="text" value="<?=$data->amount?>" class="form-control" readonly >
                                            
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Invoice </label>
                                            <input  type="text" value="<?=$data->invoice_id?>" class="form-control" readonly >
                                            
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Customer Name </label>
                                            <input readonly type="text" value="<?php echo $data->firstName.' '.$data->middleName.' '.$data->lastName ?>"  class="form-control" >
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Customer Reg Id </label>
                                            <input readonly type="text" value="<?=$data->regId?>" class="form-control" >
                                        </div>
                                    
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Invoice  </label>
                                           
                                                
                                            
                                                <a href="<?php echo base_url('uploads/' . $data->invoice); ?>" download>
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                        <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                                    </svg>
                                                </a>
                                                <a href="<?php echo base_url('uploads/' . $data->invoice); ?>" target="_blank" >
                                                    Invoice View 
                                                </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            
                                            
                                        </div>
                                        
                                        

                                    </div>

                                    <?php if ($_SESSION['role'] === "superAdmin" && $data->status != 'approved' && $data->status != 'rejected') {?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="<?php echo base_url('shopping/postinvoiceupdatestatus') ?>" method="POST"  class="status_change validation-form-message" >            
                                                <input type="hidden" name="userId" value="<?=$data->userId?>" id="userId">
                                                <input type="hidden" name="id" value="<?=$data->id?>" id="id">
                                                    <div class="col-md-4 mb-3">
                                                        <label>Status <span style="color:#C00">*</span></label>
                                                        <select class="form-control" name="status" id="invoicestatus" required>
                                                            <option>Select</option>
                                                            
                                                            <option value="processing" <?php if($data->status == 'processing'){ echo 'selected';}?> <?php if($data->status == 'verification' || $data->status == 'branch processing'){ echo 'disabled';}?>>Processing</option>
                                                            <option value="verification" <?php if($data->status == 'verification'){ echo 'selected';}?> >Verification</option>
                                                            
                                                            <option value="approved" <?php if($data->status == 'approved'){ echo 'selected';}?>>approved</option>
                                                            <option value="rejected" <?php if($data->status == 'rejected'){ echo 'selected';}?>>rejected</option>
                                                        </select>
                                                    </div>
                                                <div class="col-md-4 mb-3" id="reject_reason" style="display:none;">
                                                    <label>Reason</label>
                                                    <input type="text"  class="form-control"  name="reason">
                                                </div>
                                                <div class="col-md-3 mb-3" id="approve_invoice" style="display:none;">
                                                    <label>Invoice Id </label>
                                                    <input name="invoice_id" placeholder="Invoice Id" type="text" class="form-control" >
                                                </div>
                                                <div class="col-md-12 mb-6">
                                                <button class="btn btn-primary statusalert" type="button" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Status Update</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div> <?php } ?> 



                                
                            </div>

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- end image -->

