<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">

                            <?php if ($this->session->flashdata('error') != '') { ?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('success') != '') { ?>
                                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                            <?php } ?>
                                <form action="<?php echo base_url("bankcsp/postaddbankregistration") ?>" method="POST"  class="repeater validation-form-message" enctype="multipart/form-data">


                                    <div class="row">
                                    <input type="hidden"  name="userId"  />
                                    <input type="hidden"  name="id"  />
                                        <div class="col-md-4 mb-3">
                                            <label>Enter Cardnumber/Application No. <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="cardnumber" id="application_cardnumber" placeholder="Cardnumber" required="">
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">First Name <span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" placeholder="First Name" name="firstName" id="firstName"  required="" />
                                        </div>

                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Middle Name <span class="text-danger"></span></label>
                                            <input type="text" class="form-control" placeholder="Middle Name" name="middleName" id="middleName"  />
                                            
                                        </div>
                                        
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastName"  required="" />
                                        
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Bank Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control"  placeholder="Bank Name" name="bankName"  required="" />
                                        
                                        </div>
                                        <div class="col-md-12">
                                            <h5 class="card-title">PAYOUT BANK DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>IFSC Code <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="ifscCode" placeholder="IFSC Code" required="" oninput="ifcscode()" id="ifcscodeId">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Bank Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="pbankName" placeholder="Bank Name" id="bankName" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Branch <span style="color:#C00">*</span></label>
                                            <input type="text" name="branchName" id="branchName" class="form-control" placeholder="Branch" required="">
                                        </div>
                                        <br>

                                        <div class="col-md-4 mb-3">
                                            <label>A/C Type <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="accountType">
                                                <option>Select</option>
                                                <option value="current">Current</option>
                                                <option value="savings">Savings </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>A/C Holder Name <span style="color:#C00">*</span></label>
                                            <input type="text" name="accountHolderName" class="form-control" placeholder="A/C Holder Name" required="">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>A/C Number <span style="color:#C00">*</span></label>
                                            <input type="text" name="accountNumber" class="form-control" placeholder="A/C Number" required="">
                                        </div>


                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Passbook/Cancelled Cheque with Self Attested (310px X 200px) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="accountProvedDoc" class="form-control accountProvedDoc"   required="">
                                        </div>
                                    
                                        <div class="col-md-4 mb-3 h-50 image-container">
                                            <label>Signature <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="signature" class="form-control signature"   required="">
                                        </div>
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>IIBF certificate (Not mandatory after 4 month)</label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="ibfCertificate" class="form-control ibfCertificate" >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Registration charge <span style="color:#C00">*</span></label>
                                            <input type="text" name="amount" class="form-control" placeholder="Registration charge" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Transaction Ref No. <span style="color:#C00">*</span></label>
                                            <input type="text" name="transRefNo" class="form-control" placeholder="Transaction Ref No." required="">
                                        </div>
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Payment Reference upload <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="transRefDoc" class="form-control transRefDoc"   required="">
                                            
                                        </div>
                                        <div class="col-md-12 mb-6">
                                            <label><input type="checkbox" required value="yes" name="Terms_and_condition"> I agree to the <a href="#" target="_blank"><span>Terms &amp; Conditions</span></a> </label>
                                        </div>
                                        <br>

                                        <input type="hidden" name="userId" value="" id="userId">
                                        <input type="hidden" name="parentId" value="" id="parentId">
                                        <div class="col-md-12 mb-6">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                        </div>

                                    </div>





                                </form>
                            </div>

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>