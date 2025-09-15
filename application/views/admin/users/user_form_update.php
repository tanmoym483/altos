<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">


                                <form action="<?php echo base_url("users/updateMembar") ?>" method="post" class="validation-form-message" enctype="multipart/form-data">

                                    <input type="hidden" name="userId" value="<?php echo $users[0]->userId ?>">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <h5 class=" card-title ">PERSONAL DETAILS</h5>
                                            <hr>
                                        </div>

                                        <!-- <div class=" col-md-3 mb-3">
                                            <label>Introducer code <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="introducer_code" placeholder="Introducer code" id="sopnsercode" value="<?php echo $_SESSION['regId'] ?>"  oninput="intrFunction()" required="">
                                        </div> -->

                                        <div id="match">

                                        </div>
                                        <!-- <div class="col-md-3 mb-3">
                                            <label>Sponsor / Introducer Name</label>
                                            <input type="text" class="form-control" name="sponsor" id="SponsorName" value="" rendoly="">
                                        </div> -->

                                        <!-- <div class="col-md-2 ">
                                        <div id="sideValue">
                                        <label>Side:</label>
                                        <div class="d-flex mb-3">
                                          <div class="">
                                          <div id="leftval">
                                        <input type="radio" id="html" name="side" value="left">
                                        <label for="left">Left</label><br>
                                        </div>
                                        </div>
                                          <div class="" style="margin-left:10px;">
                                          <div id="rightval">
                                        <input type="radio" id="css" name="side" value="right">
                                        <label for="right">Right</label>
                                        </div>
                                        </div>
                                        </div>
                                        
                                        
                                        </div>
                                      </div> -->
                                        <!--<input type="text" id="notmatch">-->
                                        <div class="col-md-6 mb-3">
                                            <label>Franchise Registration Number</label>
                                            <input type="text" class="form-control" name="regId" id="bdoregisterId" value="<?php echo $users[0]->regId ?>" required="" readonly>
                                        </div>



                                        <div class="col-md-12">
                                            <h5 class="card-title">PERSONAL DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">First Name <span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" id="firstName" placeholder="First Name" name="firstName"  required=""  value="<?php echo $users[0]->firstName; ?>" />
                                       
                                        </div>

                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Middle Name <span class="text-danger"></span></label>
                                            <input type="text" class="form-control" id="middleName" placeholder="Middle Name" name="middleName" value="<?php echo $users[0]->middleName; ?>"  />
                                            
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastName" required="" value="<?php echo $users[0]->lastName; ?>" />
                                        
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Mobile <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="phone" value="<?php print_r($users[0]->phone); ?>" placeholder="Mobile" id="mobile" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Email ID <span style="color:#C00">*</span></label>
                                            <input type="email" class="form-control" name="email" id="emailid" value="<?php echo $users[0]->email ?>" placeholder="Email ID" required="">
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Birthday <span class="text-danger">*</span></label>
                                            <input type="text" id="birthday"  class="form-control" placeholder="mm/dd/yyyy" readonly name="birthday" required="" value="<?php echo $users[0]->birthday; ?>" />
                                            <!-- <input type="date" id="birthday" class="form-control" placeholder="Birthday" name="birthday" value="<?php echo $users[0]->birthday; ?>" /> -->
                                        </div>
                                        <br>

                                        <div class="col-md-4 mb-3">
                                            <label>Mother's Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="motherName" value="<?php echo $users[0]->motherName ?>" placeholder="Mother's Name" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Father's Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="fatherName" value="<?php echo $users[0]->fatherName ?>" placeholder="Father's Name" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Gender <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="gender" >
                                                <option>--- Select--- </option>
                                                <option value="Male" <?php echo ($users[0]->gender== 'Male')?'selected':'';?>>Male</option>
                                                <option value="Female" <?php echo ($users[0]->gender== 'Female')?'selected':'';?> >Female</option>
                                            </select>
                                        </div>

                                        <!--pattern="[A-Z]{5}[0-10]{4}[A-Z]{1}"-->
                                        <div class="col-md-4 mb-3">
                                            <label>PAN No<span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="panNo" value="<?php echo $users[0]->panNo; ?>" placeholder="PAN No" required="">
                                            <!-- <label style="color:#C00">Five Capitals Character And Four Digit And One Captals Character</label> -->
                                        </div>
                                        <div class="col-md-4 mb-3 image-container">
                                        <label>PAN Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="panDoc" class="form-control mark_sheet" required >
                                            
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Addhar No<span style="color:#C00">*</span></label>
                                            <input type="text" name="addharNo" value="<?php echo $users[0]->addharNo ?>" class="form-control col-xs-8" placeholder="&#8226;&#8226;&#8226;&#8226; &#8226;&#8226;&#8226;&#8226; &#8226;&#8226;&#8226;&#8226;" maxlength="14" id="card_number" >
                                        </div>
                                        <div class="col-md-4 mb-3 image-container">
                                        <label>Aadhaar Front Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="addharFrontDoc" class="form-control mark_sheet" required >
                                            
                                        </div>

                                        <div class="col-md-4 mb-3 image-container">
                                        <label>Aadhaar Back Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="addharBackDoc" class="form-control mark_sheet" required >
                                            
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Address <span style="color:#C00">*</span></label>
                                            <input placeholder="Address" type="text" name="address" value="<?php echo $users[0]->address ?>" id="address" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>City <span style="color:#C00">*</span></label>
                                            <input placeholder="City" type="text" name="city" value="<?php echo $users[0]->city ?>" id="city" class="form-control" required="">
                                        </div>
                                        
                                        <div class="col-md-3 mb-3"><?=$users[0]->district?>
                                            <label>District <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="district" required>
                                            <option value="">Select District</option>
                                            <?php foreach($districtlist as $district){?>
                                        <option value="<?=$district?>" <?php echo ($users[0]->district == $district)?'selected':'';?>><?=$district?></option>
                                        <?php } ?>
                                              
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>PIN Code <span style="color:#C00">*</span></label>
                                            <input name="postcode" placeholder="PIN Code" value="<?php echo $users[0]->postcode ?>" type="text" maxlength="10"  id="typePasswordX" oninput="postcodeDynamic()" class="form-control" >
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>State <span style="color:#C00">*</span></label>
                                            <input placeholder="State" type="text" name="state" value="<?php echo $users[0]->state ?>" id="state" class="form-control" required="" readonly>
                                        </div>
                                        
                                        <!-- <div class="col-md-4 mb-3">-->
                                        <!--    <label>Password <span style="color:#C00">*</span></label>-->
                                        <!--    <input placeholder="District" type="password" name="password" class="form-control"  placeholder="Password" required>-->
                                        <!--</div>-->
                                        <br>
                                        <div class="col-md-12">
                                            <h5 class="card-title">NOMINEE DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Nominee Name <span style="color:#C00">*</span></label>
                                            <input type="text" name="nomineeName" class="form-control" value="<?php echo $users[0]->nomineeName ?>" placeholder="Nominee Name" required="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Relation with Nominee <span style="color:#C00">*</span></label>
                                            <select name="nomineeRelation" class="form-control" required="">
                                                <?php foreach($relation as $rel) { ?>
                                                    <option value="<?=$rel['relation']?>" <?php if($users[0]->nomineeRelation == $rel['relation']) {?>selected<?php } ?> ><?=$rel['relation']?></option>
                                                <?php } ?>
                                            </select>
                                            <!-- <input type="text" name="nomineeRelation" class="form-control" value="<?php echo $users[0]->nomineeRelation ?>" placeholder="Relation with Nominee" required=""> -->
                                        </div>

                                        <div class="col-md-12">
                                            <h5 class="card-title">BANK DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>IFSC Code <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="ifscCode" value="<?php echo $users[0]->ifscCode ?>" placeholder="IFSC Code" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Bank Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="bankName" value="<?php echo $users[0]->bankName ?>" placeholder="Bank Name" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>A/C Holder Name <span style="color:#C00">*</span></label>
                                            <input type="text" name="accountHolderName" class="form-control" value="<?php echo $users[0]->accountHolderName ?>" placeholder="A/C Holder Name" required="">
                                        </div>
                                        <br>

                                        <div class="col-md-4 mb-3">
                                            <label>A/C Type <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="accountType">
                                                <option>Select</option>
                                                <option value="current" <?php echo ($users[0]->accountType== 'current')?'selected':'';?>>Current</option>
                                                <option value="savings" <?php echo ($users[0]->accountType== 'savings')?'selected':'';?>>saving</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Branch <span style="color:#C00">*</span></label>
                                            <input type="text" name="branchName" class="form-control" placeholder="Branch" value="<?php echo $users[0]->branchName ?>" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>A/C Number <span style="color:#C00">*</span></label>
                                            <input type="text" name="accountNumber" class="form-control" placeholder="A/C Number" value="<?php echo $users[0]->accountNumber ?>" required="">
                                        </div>


                                        <div class="col-md-4 mb-3 image-container">
                                        <label>Passbook/Cancelled Cheque/Statement Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="accountProvedDoc" class="form-control mark_sheet" required >
                                            
                                        </div>
                                        <!--<div class="col-md-4 mb-3">-->
                                        <!--    <label>Amount</label><br><br>-->
                                        <!--    <input type="text" name="amount" class="form-control col-xs-8" placeholder="Amount" required="">-->
                                        <!--</div>-->
                                        <!--<div class="col-md-4 mb-3">-->
                                        <!--    <label>Payment Reference No</label><br><br>-->
                                        <!--    <input type="text" name="transRefNo" class="form-control col-xs-8" placeholder="Payment Reference No" required="">-->
                                        <!--</div>-->
                                        <!--<div class="col-md-4 mb-3">-->
                                        <!--    <label>Payment Reference Upload (310px X 200px)</label>-->
                                        <!--    <input type="file" name="transRefDoc" class="form-control col-xs-8">-->
                                        <!--</div>-->
                                        <div class="col-md-4 mb-3 image-container1">
                                            <label>Signature <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link1" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview1" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="signature" class="form-control user_adharback" required >
                                            
                                        </div>

                                        <div class="col-md-4 mb-3 image-container1">
                                        <label>Customar Image (310px X 200px) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link1" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview1" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="pic" class="form-control user_adharback" required >
                                            
                                        </div>
                                        <!-- <div class="col-md-12 mb-6">
                                            <label><input type="checkbox" value="yes" name="Terms_and_condition"> I agree to the <a href="#" target="_blank"><span>Terms &amp; Conditions</span></a> </label>
                                        </div>
                                        <br> -->

                                        <!-- <input type="hidden" name="userId" value="" id="userId"> -->
                                        <input type="hidden" name="parentId" value="" id="parentId">
                                        <div class="col-md-12 mb-6">
                                            <input name="submit" id="submit" value="Update" type="submit" class="btn btn-success">
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


<!-- pan card -->
<div class="modal fade" id="modal_crop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image Before Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="sample_image" />
                        </div>
                        <div class="col-md-4">
                                        <div class="preview"></div>
                                    </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop_and_upload" class="btn btn-primary">Crop</button>
            </div>
        </div>
    </div>
</div>
<!-- end pan card -->

<!-- adhar -->
<div class="modal fade" id="adharfrontedit" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image Before Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="adhar_front_edit" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="adhar_fron_edi" class="btn btn-primary">Crop</button>
            </div>
        </div>
    </div>
</div>
<!-- end adhar -->


<!-- adhar back-->
<div class="modal fade" id="modal_crops_adhar_back_edit" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image Before Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="adharfornt_edit" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop_and_upload_adhar_back_edit" class="btn btn-primary">Crop</button>
            </div>
        </div>
    </div>
</div>
<!-- end adhar back-->

<!-- passbooks strnatcasecmp -->
<div class="modal fade" id="modal_crops_passbook_edit" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image Before Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="passbookse_edit" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop_and_upload_passbooks" class="btn btn-primary">Crop</button>
            </div>
        </div>
    </div>
</div>
<!-- end passbooks -->

<!-- signture start -->
<div class="modal fade" id="modal_crops_siggedit" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image Before Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="signature_imag" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop_and_upload_sigs" class="btn btn-primary">Crop</button>
               
            </div>
        </div>
    </div>
</div>
<!-- end signature -->

<!-- image start -->
<div class="modal fade" id="modal_crops_pic_edit" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image Before Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="customarse" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop_and_upload_pics" class="btn btn-primary">Crop</button>
               
            </div>
        </div>
    </div>
</div>
<!-- end image -->
<style>
    #state,#typePasswordXz{
        text-transform: uppercase;
    }
    .image-link1{
        bottom: 28px !important;
    }
    @media(max-width:480px) {
        .image-link1{
            bottom: 3px !important;
        }
    }
</style>
