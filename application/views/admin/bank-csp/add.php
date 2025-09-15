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
                                <form action="<?php echo base_url('bankcsp/postaddbankcsp') ?>" method="POST"  class="repeater validation-form-message" enctype="multipart/form-data">


                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="card-title">PERSONAL DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Enter Cardnumber <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="cardnumber" id="cucardnumber" placeholder="Cardnumber" required="">
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
                                    <div class="col-md-4 mb-3">
                                            <label>Email ID <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="email"  placeholder="Email ID" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Mobile <span style="color:#C00">*</span></label>
                                            <input type="number" class="form-control" name="phone" placeholder="Mobile" id="mobile" required=""  >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Whatsapp Number <span style="color:#C00">*</span></label>
                                            <input type="number" class="form-control" name="whatsapp_phone" placeholder="Whatsapp Number" id="mobile" required=""  >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Office Number</label>
                                            <input type="number" class="form-control" name="officenumber" placeholder="Office Number" id="mobile"  >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Reference Number <span style="color:#C00">*</span></label>
                                            <input type="number" class="form-control" name="reference_number" placeholder="Reference Number" id="mobile" required=""  >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Gender <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="gender">
                                                <option>--- Select--- </option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Material Status <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="material_status">
                                                <option>--- Select--- </option>
                                                <option value="Married">Married</option>
                                                <option value="Unmarried">Unmarried</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3" id="father-block" >
                                            <label>Father's Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="fatherName" placeholder="Father's Name" required="">
                                        </div>
                                        
                                        <div class="col-md-4 mb-3" id="husband-block" style="display:none;">
                                            <label>Husband's Name</label>
                                            <input type="text" class="form-control" name="husbandName" placeholder="Husband's Name" required="">
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Birthday <span class="text-danger">*</span></label>
                                            <input type="text" id="birthday"  class="form-control" placeholder="mm/dd/yyyy" readonly name="birthday" required="" />
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Qualification type <span class="text-danger">*</span></label>
                                            <select class="form-control" name="qualificationType">
                                                <option>Select</option>
                                                
                                                <option value="H.S">H.S</option>
                                                <option value="Graduate">Graduate</option>
                                                <option value="Post Graduate">Post Graduate and above</option>
                                            </select>
                                           
                                        </div>
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Mark sheet <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="mark_sheet" class="form-control mark_sheet"   required="">
                                            
                                        </div>
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Qualification Certificate <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="qualification_certificate" class="form-control  qualification_certificate" id="upload_image"  required="">
                                           
                                        </div>
                                        <br>

                                        

                                        <!--pattern="[A-Z]{5}[0-10]{4}[A-Z]{1}"-->
                                        <div class="col-md-4 mb-3">
                                            <label>PAN No<span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control PAN" name="panNo" placeholder="(ABCD1234P)" id="txtPANNumber" oninput="sdnsdjn()" onchange="this.value = this.value.toUpperCase()" maxlength="10" required="">
                                            <!--oninput="this.value = this.value.toUpperCase()"-->
                                            <div id="errors" style="color:red"></div>
                                            <div id="suc" style="color:#32a86d"></div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>PAN Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image crop" id="upload_image" onClick="panCard()" required=""> -->
                                            <input type="file" name="panDoc" id="panDoc" class="form-control col-xs-8" >
                                        </div>
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Voter card Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="votercard" class="form-control votercard"  required="">
                                           
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Aadhaar No<span style="color:#C00">*</span></label>
                                            <input type="text" name="addharNo" class="form-control col-xs-8" pattern="(\d{4}\s?){4}" placeholder="&#8226;&#8226;&#8226;&#8226; &#8226;&#8226;&#8226;&#8226; &#8226;&#8226;&#8226;&#8226;" maxlength="14" required="" id="card_number">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Aadhaar Front Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <!-- <input type="file" name="addharFrontDo" class="form-control col-xs-8 crop_image" id="addharFronts" onClick="addharFront()" required=""> -->
                                            <input type="file" name="addharFrontDoc" id="addharFrontDoc" class="form-control col-xs-8" >

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Aadhaar Back Upload (310px X 200px)<span style="color:#C00">*</span></label>
                                            <!-- <input type="file" name="addharBackDo" class="form-control col-xs-8 crop_image" id="AddharBacks" onClick="AddharBack()" required=""> -->
                                            <input type="file" name="addharBackDoc" id="addharBackDoc" class="form-control col-xs-8" >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Customar Image (310px X 200px) <span style="color:#C00">*</span></label>
                                            <!-- <input type="file" name="pi" class="form-control col-xs-8 crop_image" id="customarImg" onClick="customar()" required=""> -->
                                            <input type="file" name="pic" id="pic" class="form-control col-xs-8" >
                                            <?php echo form_error('pic'); ?>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Address <span style="color:#C00">*</span></label>
                                            <input placeholder="Address" type="text" name="address" value="" id="address" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>City / Village <span style="color:#C00">*</span></label>
                                            <input placeholder="City / Village" type="text" name="city" value="" id="city" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Gram Panchayat/Tehsil <span style="color:#C00">*</span></label>
                                            <input placeholder="Gram Panchayat/Tehsil" type="text" name="gram_panchayat" value="" id="city" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>District <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="district" required>
                                            <option value="">Select District</option>
                                                <?php foreach($districtlist as $district){?>
                                                <option value="<?=$district?>"><?=$district?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>PIN Code <span style="color:#C00">*</span></label>
                                            <input name="postcode" placeholder="PIN Code" type="number" maxlength="10" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>State <span style="color:#C00">*</span></label>
                                            <input placeholder="State" type="text" name="state" value="" class="form-control" required="" readonly>
                                        </div>
                                        
                                        <!-- <div class="col-md-4 mb-3">-->
                                        <!--    <label>Password <span style="color:#C00">*</span></label>-->
                                        <!--    <input placeholder="District" type="password" name="password" class="form-control"  placeholder="Password" required>-->
                                        <!--</div>-->
                                        <br>
                                        
                                        
                                        
                                        <div class="col-md-12">
                                            <h5 class="card-title">Bank CSP DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Link Branch Name <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="bankName">
                                                <option>Select</option>
                                                <option value="State Bank Of India">State Bank Of India</option>
                                                <option value="Bank Of India">Bank Of India </option>
                                                <option value="Panjab National Bank">Panjab National Bank</option>
                                                <option value="INDIAN OVERSISE BANK">INDIAN OVERSISE BANK</option>
                                                <option value="Bank Of Borod">Bank Of Boroda</option>
                                                <option value="UCO Bank">UCO Bank</option>
                                                <option value="Indian bank">Indian bank</option>
                                                <option value="Central bank">Central bank</option>
                                                <option value="Bangiya Gramin Vikash Bank">Bangiya Gramin Vikash Bank</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Link Branch code<span style="color:#C00">*</span></label>
                                            <input type="text" name="branchCode" id="branchCode" class="form-control" placeholder="Branch" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Branch Location <span style="color:#C00">*</span></label>
                                            <input type="text" name="branchLocation" id="branchLocation" class="form-control" placeholder="Branch Location" required="">
                                        </div>
                                        
                                        <br>
                                        <div class="col-md-12">
                                            <h5 class="card-title">Kiosk Address</h5>
                                            <hr>
                                        </div>
                                        
                                        <div class="col-md-4 mb-3">
                                            <label>Address <span style="color:#C00">*</span></label>
                                            <input placeholder="Address" type="text" name="kaddress" value="" id="address" class="form-control" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Land Mark <span style="color:#C00">*</span></label>
                                            <input placeholder="Land Mark" type="text" name="landmark" value="" id="address" class="form-control" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>City/Village  <span style="color:#C00">*</span></label>
                                            <input placeholder="City/Village" type="text" name="kcity" value="" id="city" class="form-control" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Gram Panchayat/Tehsil  <span style="color:#C00">*</span></label>
                                            <input placeholder="Gram Panchayat/Tehsil" type="text" name="kgram_panchayat" value="" id="city" class="form-control" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>District <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="kdistrict" required>
                                            <option value="">Select District</option>
                                            <option value="Nadia">Nadia</option>
                                                <option value="North 24 parganas">North 24 parganas </option>
                                                <option value="Hooghly">Hooghly</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>PIN Code <span style="color:#C00">*</span></label>
                                            <input name="kpostcode" placeholder="PIN Code" type="number" maxlength="10" id="typePasswordX" oninput="postcodeDynamic()" class="form-control" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>State <span style="color:#C00">*</span></label>
                                            <input placeholder="State" type="text" name="kstate" value="" id="state" class="form-control" required="" readonly>
                                        </div>
                                        

                                        
                                       
                                        <br>

                                        <input type="hidden" name="userId" value="" id="userId">
                                        
                                        <div class="col-md-12 mb-6">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Apply now</button>
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

<!-- Cropper -->
<div class="modal fade" id="my_cropper_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                        <div class="col-md-12">
                            <img src="" id="cropper_img" />
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="my_cropper_btn" class="btn btn-primary">Crop</button>
                
            </div>
        </div>
    </div>
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
<div class="modal fade" id="modal_crops" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                            <img src="" id="sample_images" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop_and_uploads" class="btn btn-primary">Crop</button>
               
            </div>
        </div>
    </div>
</div>
<!-- end adhar -->


<!-- adhar back-->
<div class="modal fade" id="modal_crops_adhar_back" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                            <img src="" id="adharfornt" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop_and_upload_adhar_back" class="btn btn-primary">Crop</button>
               
            </div>
        </div>
    </div>
</div>
<!-- end adhar back-->

<!-- passbooks strnatcasecmp -->
<div class="modal fade" id="modal_crops_passbook" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                            <img src="" id="passbookse" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop_and_upload_passbook" class="btn btn-primary">Crop</button>
                
            </div>
        </div>
    </div>
</div>
<!-- end passbooks -->

<!-- signture start -->
<div class="modal fade" id="modal_crops_sig" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                            <img src="" id="signat" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop_and_upload_sig" class="btn btn-primary">Crop</button>
                
            </div>
        </div>
    </div>
</div>
<!-- end signature -->

<!-- image start -->
<div class="modal fade" id="modal_crops_pic" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                            <img src="" id="customars" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop_and_upload_pic" class="btn btn-primary">Crop</button>
                
            </div>
        </div>
    </div>
</div>

<!-- end image -->
<style>
    .image-link {
    
    bottom: 12px !important;
}
</style>
