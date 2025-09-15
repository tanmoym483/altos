
<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">


                                <form action="<?php echo base_url("Users/addMember") ?>" class="validation-form-message" method="post" enctype="multipart/form-data">


                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--<input type="text" class="pan" id="txtPANNumbr" oninput="sdnsd()">-->
                                            <!--<button onclick="sdnsdj()">hh</button>-->
                                            <h5 class=" card-title ">PERSONAL DETAILS</h5>
                                            <hr>
                                        </div>

                                        <div class=" col-md-3 mb-3">
                                            <label>Introducer code <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="introducer_code" placeholder="Introducer code" id="sopnsercode" value="<?php echo $_SESSION['regId'] ?>" oninput="intrFunction()" required="">
                                        </div>

                                        <div id="match">

                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Sponsor / Introducer Name</label>
                                            <input type="text" class="form-control" name="sponsor" id="SponsorName" value="<?=$_SESSION['firstName'].' '.$_SESSION['lastName']?>" readonly="">
                                        </div>

                                        <div class="col-md-2 ">
                                            <div id="sideValue">
                                                <label>Side:</label>
                                                <div class="d-flex mb-3">
                                                    <?php if($vendor->leftChild == '') {?>
                                                    <div class="">
                                                        <div id="leftval">
                                                            <input type="radio" id="html" name="side" value="left">
                                                            <label for="left">Left</label><br>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($vendor->rightChild == '') {?>
                                                    <div class="" style="margin-left:10px;">
                                                        <div id="rightval">
                                                            <input type="radio" id="css" name="side" value="right">
                                                            <label for="right">Right</label>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>


                                            </div>
                                        </div>
                                        <!--<input type="text" id="notmatch">-->
                                        <div class="col-md-4 mb-3">
                                            <label>Franchise Registration Number</label>
                                            <input type="text" class="form-control" name="regId" id="bdoregisterId" value="" oninput="registerOn()" required="">
                                        </div>



                                        <div class="col-md-12">
                                            <h5 class="card-title">PERSONAL DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">First Name <span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" id="firstName" placeholder="First Name" name="firstName"  required="" />
                                       
                                        </div>

                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Middle Name <span class="text-danger"></span></label>
                                            <input type="text" class="form-control" id="middleName" placeholder="Middle Name" name="middleName"  />
                                            
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastName" required="" />
                                        
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Mobile <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="phone" placeholder="Mobile" id="mobile" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Email ID <span style="color:#C00">*</span></label>
                                            <input type="email" class="form-control" name="email" id="emailid" placeholder="Email ID" required="">
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Birthday <span class="text-danger">*</span></label>
                                            <input type="text" id="birthday"  class="form-control" placeholder="mm/dd/yyyy" readonly name="birthday" required="" />
                                            
                                        </div>
                                        <br>

                                        <div class="col-md-4 mb-3">
                                            <label>Mother's Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="motherName" placeholder="Mother's Name" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Father's Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="fatherName" placeholder="Father's Name" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Gender <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="gender" required="">
                                                <option>--- Select--- </option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>

                                        <!--pattern="[A-Z]{5}[0-10]{4}[A-Z]{1}"-->
                                        <div class="col-md-4 mb-3">
                                            <label>PAN No<span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control PAN" name="panNo" placeholder=" (ABCD1234P)" id="txtPANNumber" oninput="sdnsdjn()" onchange="this.value = this.value.toUpperCase()" maxlength="10" required="">
                                            <!--oninput="this.value = this.value.toUpperCase()"-->
                                            <div id="errors" style="color:red"></div>
                                            <div id="suc" style="color:#32a86d"></div>
                                        </div>
                                        <!-- <div class="col-md-3 mb-3">
                                            <label>PAN Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                             <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> 
                                            <input type="file" name="panDo" class="form-control col-xs-8 crop_image crop" id="upload_image" onClick="panCard()" required="">
                                            <input type="text" name="panDoc" id="panDoc" class="form-control col-xs-8" style="display:none">
                                        </div> -->
                                        <div class="col-md-4 mb-3 image-container">
                                        <label>PAN Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="panDoc" class="form-control mark_sheet" required >
                                            
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Aadhaar No<span style="color:#C00">*</span></label>
                                            <input type="text" name="addharNo" class="form-control col-xs-8"  placeholder="&#8226;&#8226;&#8226;&#8226; &#8226;&#8226;&#8226;&#8226; &#8226;&#8226;&#8226;&#8226;" maxlength="14" id="card_number" required="" >
                                        </div>
                                        <!-- <div class="col-md-3 mb-3">
                                            <label>Aadhaar Front Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <input type="file" name="addharFrontDo" class="form-control col-xs-8 crop_image" id="addharFronts" onClick="addharFront()" required="">
                                            <input type="text" name="addharFrontDoc" id="addharFrontDoc" class="form-control col-xs-8" style="display:none">

                                        </div> -->
                                        <div class="col-md-4 mb-3 image-container">
                                        <label>Aadhaar Front Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="addharFrontDoc" class="form-control mark_sheet" required >
                                            
                                        </div>

                                        <!-- <div class="col-md-4 mb-3">
                                            <label>Aadhaar Back Upload (310px X 200px)<span style="color:#C00">*</span></label>
                                            <input type="file" name="addharBackDo" class="form-control col-xs-8 crop_image" id="AddharBacks" onClick="AddharBack()" required="">
                                            <input type="text" name="addharBackDoc" id="addharBackDoc" class="form-control col-xs-8" style="display:none">
                                        </div> -->
                                        <div class="col-md-4 mb-3 image-container">
                                        <label>Aadhaar Back Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="addharBackDoc" class="form-control mark_sheet" required >
                                            
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Address <span style="color:#C00">*</span></label>
                                            <input placeholder="Address" type="text" name="address" value="" id="address" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>City <span style="color:#C00">*</span></label>
                                            <input placeholder="City" type="text" name="city" value="" id="city" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>District <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="district" required id="district">
                                                <option value="">Select District</option>
                                                <?php foreach($districtlist as $district){?>
                                            <option value="<?=$district?>"><?=$district?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>PIN Code <span style="color:#C00">*</span></label>
                                            <input name="postcode" placeholder="PIN Code" type="number" maxlength="10" id="pincode" oninput="postcodeDynamic()" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>State <span style="color:#C00">*</span></label>
                                            <input placeholder="State" type="text" name="state" value="" id="state" class="form-control" required="" readonly>
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
                                            <input type="text" name="nomineeName" class="form-control" placeholder="Nominee Name" required="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Relation with Nominee <span style="color:#C00">*</span></label>
                                            <select name="nomineeRelation" class="form-control" required="">
                                                <?php foreach($relation as $rel) { ?>
                                                    <option value="<?=$rel['relation']?>"><?=$rel['relation']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <h5 class="card-title">BANK DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>IFSC Code <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="ifscCode" placeholder="IFSC Code" required="" oninput="ifcscode()" id="ifcscodeId">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Bank Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="bankName" placeholder="Bank Name" id="bankName" required="">
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
                                            <input type="text" name="accountHolderName" class="form-control" id="accountHolderName" placeholder="A/C Holder Name" required="">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>A/C Number <span style="color:#C00">*</span></label>
                                            <input type="text" name="accountNumber" class="form-control" placeholder="A/C Number" required="">
                                        </div>


                                        <!-- <div class="col-md-4 mb-3">
                                            <label>Passbook/Cancelled Cheque/Statement Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <input type="file" name="accountProvedDo" class="form-control col-xs-8 crop_image" id="passbokks" onClick="passbookse()" required="">
                                            <input type="text" name="accountProvedDoc" id="accountProvedDoc" class="form-control col-xs-8" style="display:none">
                                        </div> -->
                                        <div class="col-md-4 mb-3 image-container">
                                        <label>Passbook/Cancelled Cheque/Statement Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="accountProvedDoc" class="form-control mark_sheet" required >
                                            
                                        </div>
                                        <!-- <div class="col-md-4 mb-3">
                                            <label>Signature <span style="color:#C00">*</span></label>
                                            <input type="file" name="signatur" class="form-control col-xs-8 crop_image" id="signatureImage" onClick="signat()" required="">
                                            <input type="text" name="signature" id="signature" class="form-control col-xs-8" style="display:none">
                                        </div> -->
                                        <div class="col-md-4 mb-3 image-container1">
                                        <label>Signature <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link1" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview1" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="signature" class="form-control user_adharback" required >
                                            
                                        </div>
                                        <!-- <div class="col-md-4 mb-3">
                                            <label>Customar Image (310px X 200px) <span style="color:#C00">*</span></label>
                                            <input type="file" name="pi" class="form-control col-xs-8 crop_image" id="customarImg" onClick="customar()" required="">
                                            <input type="text" name="pic" id="pic" class="form-control col-xs-8" style="display:none">
                                            <?php echo form_error('pic'); ?>
                                        </div> -->
                                        <div class="col-md-4 mb-3 image-container1">
                                        <label>Customar Image (310px X 200px) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link1" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview1" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="pic" class="form-control user_adharback" required >
                                            
                                        </div>
                                        <div class="col-md-12 mb-6">
                                            <label><input type="checkbox" value="yes" required name="Terms_and_condition"><span style="color:#C00">*</span> I agree to the <a href="#" target="_blank"><span>Terms &amp; Conditions</span></a> </label>
                                        </div>
                                        <br>

                                        <input type="hidden" name="userId" value="" id="userId">
                                        <input type="hidden" name="parentId" value="<?=$_SESSION['userId']?>" id="parentId">
                                        <div class="col-md-12 mb-6">
                                            <input name="submit" id="submit" value="Add Member" type="submit" class="btn btn-success">
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
