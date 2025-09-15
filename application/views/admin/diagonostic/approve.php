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
                                            <h5 class="card-title">BANK DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>IFSC Code </label>
                                            <input type="text" class="form-control" name="ifscCode" placeholder="IFSC Code" readonly value="<?=$bankdetails->ifscCode?>" oninput="ifcscode()" id="ifcscodeId">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Bank Name </label>
                                            <input type="text" class="form-control" name="bankName" placeholder="Bank Name" id="bankName" readonly value="<?=$bankdetails->bankName?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Branch </label>
                                            <input type="text" name="branchName" id="branchName" class="form-control" placeholder="Branch" readonly value="<?=$bankdetails->branchName?>">
                                        </div>
                                        <br>

                                        <div class="col-md-4 mb-3">
                                            <label>A/C Type </label>
                                            <select class="form-control" readonly name="accountType">
                                                <option>Select</option>
                                                <option value="current" <?=($bankdetails->accountType == 'current')?'selected':''?> >Current</option>
                                                <option value="savings" <?=($bankdetails->accountType == 'savings')?'selected':''?>>saving</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>A/C Holder Name </label>
                                            <input type="text" name="accountHolderName" class="form-control" id="accountHolderName" readonly placeholder="A/C Holder Name" value="<?=$bankdetails->accountHolderName?>">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>A/C Number </label>
                                            <input type="text" name="accountNumber" class="form-control" placeholder="A/C Number" readonly value="<?=$bankdetails->accountNumber?>">
                                        </div>


                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Passbook/Cancelled Cheque/Statement Upload (310px X 200px) </label>
                                            <a href="<?php echo base_url('uploads/' . $bankdetails->accountProvedDoc); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1"><img class="img-responsive w-img" src="<?php echo base_url('uploads/' . $bankdetails->accountProvedDoc); ?>"/></a>
                                                <a href="<?php echo base_url('uploads/' . $bankdetails->accountProvedDoc); ?>" download>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                    <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                                </svg>
                                                </a>
                                            
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Reason</label>
                                            <textarea class="form-control" placeholder="Purpose" name="purpose" ><?=$bankdetails->purpose?></textarea>
                                        </div>
                                        <div class="col-md-12 p-0">
                                            <div class="">
                                                <form action="<?php echo base_url('diagonostic/postupdatebankstatus') ?>" method="POST"  class="status_change validation-form-message" >            
                                                
                                                <input type="hidden" name="id" value="<?=$bankdetails->id?>" id="id">
                                                <input type="hidden" name="userId" value="<?=$bankdetails->userId?>" id="userId">
                                                <div class="col-md-4 mb-3">
                                                    <label>Status <span style="color:#C00">*</span></label>
                                                    <select class="form-control" name="status" required>
                                                        <option>Select</option>
                                                        
                                                        <option value="processing" <?php if($bankdetails->status == 'processing'){ echo 'selected';}?> <?php if($bankdetails->status == 'verification' || $bankdetails->status == 'branch processing'){ echo 'disabled';}?>>Processing</option>
                                                        <option value="verification" <?php if($bankdetails->status == 'verification'){ echo 'selected';}?> >Verification</option>
                                                       
                                                        <option value="approved" <?php if($bankdetails->status == 'approved'){ echo 'selected';}?>>Approved</option>
                                                        <option value="rejected" <?php if($bankdetails->status == 'rejected'){ echo 'selected';}?>>Rejected</option>
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