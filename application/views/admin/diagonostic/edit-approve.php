<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">

                                    <h2>View</h2>
                                
                                   

                                    <div class="row">
                                    <div class="col-md-12">
                                            <h5 class="card-title">USER DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Center Name </label>
                                            <input type="text" class="form-control"   readonly value="<?=$memberdetails->center_name?>" >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Email </label>
                                            <input type="text" class="form-control"  placeholder="Bank Name" readonly value="<?=$memberdetails->email?>">
                                        </div>
                                        


                                        
                                        <div class="col-md-4 mb-3">
                                            <label>Reason</label>
                                            <textarea class="form-control" placeholder="Purpose" ><?=$memberdetails->reason?></textarea>
                                        </div>
                                        <div class="col-md-12 p-0">
                                            <div class="">
                                                <form action="<?php echo base_url('diagonostic/postupdatedetailsstatus') ?>" method="POST"  class="status_change validation-form-message" >            
                                                
                                                <input type="hidden" name="id" value="<?=$memberdetails->id?>" id="id">
                                                <input type="hidden" name="userId" value="<?=$memberdetails->userId?>" id="userId">
                                                <div class="col-md-4 mb-3">
                                                    <label>Status <span style="color:#C00">*</span></label>
                                                    <select class="form-control" name="status" required>
                                                        <option>Select</option>
                                                        
                                                        <option value="processing" <?php if($memberdetails->status == 'processing'){ echo 'selected';}?> <?php if($memberdetails->status == 'verification' || $memberdetails->status == 'branch processing'){ echo 'disabled';}?>>Processing</option>
                                                        <option value="verification" <?php if($memberdetails->status == 'verification'){ echo 'selected';}?> >Verification</option>
                                                       
                                                        <option value="approved" <?php if($memberdetails->status == 'approved'){ echo 'selected';}?>>Approved</option>
                                                        <option value="rejected" <?php if($memberdetails->status == 'rejected'){ echo 'selected';}?>>Rejected</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mb-6">
                                                <button class="btn btn-primary statusalert" type="button" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Status Update</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>