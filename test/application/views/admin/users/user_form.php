<div class="content-wrapper" style="min-height: 2080.26px;">
<div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">


                                <form action="<?php echo base_url("Users/addMember") ?>" method="post" enctype="multipart/form-data">
                               

                                    <div class="row">
                                        <div class="col-md-12">

                                            <h5 class=" card-title ">PERSONAL DETAILS</h5>
                                            <hr>
                                        </div>

                                        <div class=" col-md-3 mb-3">
                                            <label>Introducer code <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="introducer_code" placeholder="Introducer code" id="sopnsercode" value="<?php echo $_SESSION['regId']?>"  oninput="intrFunction()" required="">
                                        </div>

                                        <div id="match">

                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Sponsor / Introducer Name</label>
                                            <input type="text" class="form-control" name="sponsor" id="SponsorName" value="" rendoly="">
                                        </div>

                                      <div class="col-md-2 ">
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
                                      </div>
                                        <!--<input type="text" id="notmatch">-->
                                        <div class="col-md-4 mb-3">
                                            <label>BDO RegisterId</label>
                                            <input type="text" class="form-control" name="regId" id="bdoregisterId" value="" oninput="registerOn()" required="">
                                        </div>



                                        <div class="col-md-12">
                                            <h5 class="card-title">PERSONAL DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Member Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="membarName" id="name" placeholder="Member Name" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Mobile <span style="color:#C00">*</span></label>
                                            <input type="number" class="form-control" name="phone" placeholder="Mobile" id="mobile" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Email ID <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email ID" required="">
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
                                            <select class="form-control" name="gender">
                                                <option>--- Select--- </option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>

                                        <!--pattern="[A-Z]{5}[0-10]{4}[A-Z]{1}"-->
                                        <div class="col-md-3 mb-3">
                                            <label>PAN No<span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="panNo" placeholder="PAN No" required="">
                                            <label style="color:#C00">Five Capitals Character And Four Digit And One Captals Character</label>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>PAN Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <input type="file" name="panDoc" class="form-control col-xs-8">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Addhar No<span style="color:#C00">*</span></label>
                                            <input type="number" name="addharNo" class="form-control col-xs-8" placeholder="Addhar No" maxlength="12" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Addhar Front Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <input type="file" name="addharFrontDoc" class="form-control col-xs-8">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label>Addhar Back Upload (310px X 200px)<span style="color:#C00">*</span></label>
                                            <input type="file" name="addharBackDoc" class="form-control col-xs-8">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>PIN Code <span style="color:#C00">*</span></label>
                                            <input name="postcode" placeholder="PIN Code" type="number" maxlength="10" id="pincode" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>District <span style="color:#C00">*</span></label>
                                            <input placeholder="District" type="text" name="district" value="" id="district" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>State <span style="color:#C00">*</span></label>
                                            <input placeholder="State" type="text" name="state" value="" id="states" class="form-control" required="">
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
                                            <input type="text" name="nomineeRelation" class="form-control" placeholder="Relation with Nominee" required="">
                                        </div>

                                        <div class="col-md-12">
                                            <h5 class="card-title">BANK DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>IFSC Code <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="ifscCode" placeholder="IFSC Code" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Bank Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="bankName" placeholder="Bank Name" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>A/C Holder Name <span style="color:#C00">*</span></label>
                                            <input type="text" name="accountHolderName" class="form-control" placeholder="A/C Holder Name" required="">
                                        </div>
                                        <br>

                                        <div class="col-md-4 mb-3">
                                            <label>A/C Type <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="accountType">
                                                <option>Select</option>
                                                <option value="current">Current</option>
                                                <option value="saving">Savving</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Branch <span style="color:#C00">*</span></label>
                                            <input type="text" name="branchName" class="form-control" placeholder="Branch" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>A/C Number <span style="color:#C00">*</span></label>
                                            <input type="text" name="accountNumber" class="form-control" placeholder="A/C Number" required="">
                                        </div>


                                        <div class="col-md-4 mb-3">
                                            <label>Passbook/Cancelled Cheque/Statement Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <input type="file" name="accountProvedDoc" class="form-control col-xs-8">
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
                                        <div class="col-md-4 mb-3">
                                            <label>Signature <span style="color:#C00">*</span></label>
                                            <input type="file" name="signature" class="form-control col-xs-8">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Customar Image (310px X 200px) <span style="color:#C00">*</span></label>
                                            <input type="file" name="pic" class="form-control col-xs-8">
                                            <?php echo form_error('pic'); ?>
                                        </div>
                                        <div class="col-md-12 mb-6">
                                            <label><input type="checkbox" value="yes" name="Terms_and_condition"> I agree to the <a href="#" target="_blank"><span>Terms &amp; Conditions</span></a> </label>
                                        </div>
                                        <br>

                                        <input type="hidden" name="userId" value="" id="userId">
                                        <input type="hidden" name="parentId" value="" id="parentId">
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

