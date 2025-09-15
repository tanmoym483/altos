<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">


                                <form action="<?php echo base_url("admin/postupdateCustomer") ?>" method="post" class="validation-form-message" enctype="multipart/form-data">

                                    <input type="hidden" name="userId" value="<?php echo $users[0]->userId ?>">
                                    <div class="row">
                                       

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
                                        <!-- <div class="col-md-6 mb-3">
                                            <label>BDO RegisterId</label>
                                            <input type="text" class="form-control" name="regId" id="bdoregisterId" value="<?php echo $users[0]->regId ?>" required="" readonly>
                                        </div> -->



                                        <div class="col-md-12">
                                            <h5 class="card-title">PERSONAL DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">First Name <span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" placeholder="First Name" name="firstName"  required="" value="<?=$users[0]->firstName?>" />
                                       
                                        </div>

                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Middle Name <span class="text-danger"></span></label>
                                            <input type="text" class="form-control" placeholder="Middle Name" name="middleName"  value="<?=$users[0]->middleName?>"  />
                                            
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Last Name" name="lastName" required="" value="<?=$users[0]->lastName?>" />
                                        
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Mobile <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="phone" value="<?php print_r($users[0]->phone); ?>" placeholder="Mobile" id="mobile" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Email ID <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $users[0]->email ?>" placeholder="Email ID" required="">
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Birthday <span class="text-danger">*</span></label>
                                            <input type="text" id="birthday"  class="form-control" placeholder="mm/dd/yyyy" readonly name="birthday" required="" value="<?php echo $users[0]->birthday; ?>" />
                                            
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
                                                <option value="">--- Select--- </option>
                                                <option value="Male" <?php if($users[0]->gender == 'Male') { ?>selected<?php } ?>>Male</option>
                                                <option value="Female" <?php if($users[0]->gender == 'Female') { ?>selected<?php } ?>>Female</option>
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
                                            <input type="file" name="panDoc" class="form-control mark_sheet"  >
                                            
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Addhar No<span style="color:#C00">*</span></label>
                                            <input type="text" name="addharNo" value="<?php echo $users[0]->addharNo ?>" class="form-control col-xs-8" placeholder="&#8226;&#8226;&#8226;&#8226; &#8226;&#8226;&#8226;&#8226; &#8226;&#8226;&#8226;&#8226;" maxlength="14" id="card_number" required="">
                                        </div>
                                        <div class="col-md-4 mb-3 image-container">
                                        <label>Aadhaar Front Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="addharFrontDoc" class="form-control mark_sheet"  >
                                            
                                        </div>

                                        <div class="col-md-4 mb-3 image-container">
                                        <label>Aadhaar Back Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="addharBackDoc" class="form-control mark_sheet"  >
                                            
                                        </div>
                                        
                                        
                                        <div class="col-md-4 mb-3">
                                            <label>Address <span style="color:#C00">*</span></label>
                                            <input placeholder="Address" type="text" name="address" value="<?php echo $users[0]->address ?>" id="address" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>City <span style="color:#C00">*</span></label>
                                            <input placeholder="City" type="text" name="city" value="<?php echo $users[0]->city ?>" id="city" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>District <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="district" required>
                                            <option value="">Select District</option>
                                            <?php foreach($districtlist as $district){?>
                                            <option value="<?=$district?>" <?php echo ($users[0]->district== $district)?'selected':'';?>><?=$district?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>PIN Code <span style="color:#C00">*</span></label>
                                            <input name="postcode" placeholder="PIN Code" value="<?php echo $users[0]->postcode ?>" type="text" maxlength="10" id="pincode" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>State <span style="color:#C00">*</span></label>
                                            <input placeholder="State" type="text" name="state" value="<?php echo $users[0]->state ?>" id="states" class="form-control" required="">
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
                                                    <option value="<?=$rel['relation']?>" <?php if($users[0]->nomineeRelation == $rel['relation']) {?>selected<?php } ?>><?=$rel['relation']?></option>
                                                <?php } ?>
                                            </select>
                                            <!-- <input type="text" name="nomineeRelation" class="form-control" value="<?php echo $users[0]->nomineeRelation ?>" placeholder="Relation with Nominee" required=""> -->
                                        </div>
                                    <div style="background:#f2efef;border: 1px solid #ccc; margin: 15px;width:100%;">
                                        <div class="col-md-12">
                                            <h5 class="card-title">CARD DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Card Type <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="card_type">
                                                <option value="sliver">Sliver</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-12" id="carddetail-add">
                                            <?php $i = 0; foreach($usercards as $cards) {?>
                                                <div class="row" >
                                                    <div class="col-md-12 mb-3">
                                                       <h5>Memmber <?=$i+1?></h5>
                                                    </div>
                                                    <input type="hidden"  name="customer[<?=$i?>][user_id]" value="<?=$cards['user_id']?>" >
                                                    <input type="hidden"  name="customer[<?=$i?>][id]" value="<?=$cards['id']?>" >
                                                    <div class="col-md-4 mb-3">
                                                        <label>Name <span style="color:#C00">*</span></label>
                                                        <input type="text" class="form-control" name="customer[<?=$i?>][user_name]" value="<?=$cards['name']?>" id="name" placeholder="Name" required="">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label>Phone Number <span style="color:#C00">*</span></label>
                                                        <input type="text" class="form-control" name="customer[0][user_phone]" id="name" placeholder="Phone Number" value="<?=$cards['phone']?>" >
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label>Gender <span style="color:#C00">*</span></label>
                                                        <select class="form-control" name="customer[<?=$i?>][user_gender]" required="">
                                                            <option value="male" <?php if($cards['gender'] == 'male') { ?>selected<?php } ?>>Male</option>
                                                            <option value="female" <?php if($cards['gender'] == 'female') { ?>selected<?php } ?>>Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label>Birth Day <span style="color:#C00">*</span></label>
                                                        <input type="date" class="form-control" id="birthday" name="customer[<?=$i?>][user_birthday]" placeholder="Birth Day" required="" value="<?=$cards['birthday']?>">
                                                    </div>
                                                   
                                                    <div class="col-md-4 mb-3">
                                                        <label>Relation <span style="color:#C00">*</span></label>
                                                        <select name="customer[<?=$i?>][user_relation]" class="form-control">
                                                            <option value="Mother" <?php if($cards['relation'] == 'Mother') { ?>selected<?php } ?>>Mother</option>
                                                            <option value="Father" <?php if($cards['relation'] == 'Father') { ?>selected<?php } ?>>Father</option>
                                                            <option value="Brother" <?php if($cards['relation'] == 'Brother') { ?>selected<?php } ?> >Brother</option>
                                                            <option value="Sister" <?php if($cards['relation'] == 'Sister') { ?>selected<?php } ?> >Sister</option>
                                                            <option value="Wife" <?php if($cards['relation'] == 'Wife') { ?>selected<?php } ?> >Wife</option>
                                                            <option value="Son" <?php if($cards['relation'] == 'Son') { ?>selected<?php } ?> >Son</option>
                                                            <option value="Daughter" <?php if($cards['relation'] == 'Daughter') { ?>selected<?php } ?> >Daughter</option>
                                                            <option value="Husband" <?php if($cards['relation'] == 'Husband') { ?>selected<?php } ?> >Husband</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-md-4 mb-3" id="pannumber"  <?php if($cards['doc_type'] == 'Ration card'|| $cards['doc_type'] == 'Birth certificate') { ?>style="display:none"<?php } ?>>
                                                        <label>Pancard Number <span style="color:#C00">*</span></label>
                                                        <input type="text" class="form-control" id="pancardno" name="customer[<?=$i?>][user_pancardno]" placeholder="Pancard Number" value="<?=$cards['pancard']?>">
                                                    </div>
                                                    
                                                    <!-- <div class="col-md-4 mb-3">
                                                        <label>Aadhaar front image <span style="color:#C00">*</span></label>
                                                    <input type="file" class="form-control" name="customer[<?=$i?>][user_adharfront]" value="<?=$cards['adharcardfront']?>">
                                                    </div> -->
                                                    <div class="col-md-4 mb-3 image-container">
                                                        <label>Aadhaar front image <span style="color:#C00">*</span></label>
                                                        <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                                    <input type="file" class="form-control user_adharfront" name="customer[<?=$i?>][user_adharfront]" value="<?=$cards['adharcardfront']?>" >
       
                                                    </div>
                                                    <!-- <div class="col-md-4 mb-3">
                                                        <label>Aadhaar Back image <span style="color:#C00">*</span></label>
                                                    <input type="file" class="form-control" name="customer[<?=$i?>][user_adharback]" value="<?=$cards['adharcardback']?>" >
                                                    </div> -->
                                                    <div class="col-md-4 mb-3 image-container1">
                                                        <label>Aadhaar Back image <span style="color:#C00">*</span></label>
                                                        <a href="#" class="image-link1" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview1" style="display:none;">
                                                        </a>
                                                    <input type="file" class="form-control user_adharback" name="customer[<?=$i?>][user_adharback]" value="<?=$cards['adharcardback']?>">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                    <label>Document Name</label>
                                                        <select class="form-control" name="customer[<?=$i?>][doc_type]" required="" id="doc_type">
                                                            <option value="Pancard" <?php if($cards['doc_type'] == 'Pancard') { ?>selected<?php } ?>>Pancard</option>
                                                            <option value="Birth certificate" <?php if($cards['doc_type'] == 'Birth certificate') { ?>selected<?php } ?> >Birth certificate</option>
                                                            <option value="Ration card" <?php if($cards['doc_type'] == 'Ration card') { ?>selected<?php } ?>>Ration card</option>
                                                        </select>
                                                    </div>
                                                    <?php if($cards['doc_type'] == 'Pancard') { ?>
                                                    
                                                    <div class="col-md-4 mb-3 image-container2" >
                                                        <label>Document</label>
                                                        <a href="#" class="image-link2" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview2" style="display:none;">
                                                        </a>
                                                        <input type="file" class="form-control document" name="customer[<?=$i?>][document]"  value="<?=$cards['pancard']?>">
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($cards['doc_type'] == 'Ration card') { ?>
                                                 
                                                    <div class="col-md-4 mb-3 image-container2">
                                                        <label>Document</label>
                                                        <a href="#" class="image-link2" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview2" style="display:none;">
                                                        </a>
                                                        <input type="file" class="form-control document" name="customer[<?=$i?>][document]"  value="<?=$cards['rationcard']?>">
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($cards['doc_type'] == 'Birth certificate') { ?>
                                                   
                                                    <div class="col-md-4 mb-3 image-container2">
                                                        <label>Document</label>
                                                        <a href="#" class="image-link2" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview2" style="display:none;">
                                                        </a>
                                                        <input type="file" class="form-control document" name="customer[<?=$i?>][document]"  value="<?=$cards['birthday_certificate']?>">
                                                    </div>
                                                    <?php } ?>
                                                    
                                                    <div class="col-md-2 ">
                                                        <div class="action_label"><label>Action</label></div>
                                                        
                                                        <a class="btn btn-danger delete-btn" data-id="<?=$i+1?>"><i class="fa fa-trash"></i></a>
                                                    
                                                </div>
                                                </div>
                                                <?php $i++; } ?>  
                                            </div>
                                        
                                                <input type="button" value="Add" id="details-add" class="btn btn-primary my-3 ml-2"/>
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
                                                <option value="current" <?=($users[0]->accountType == 'current')?'selected':''?> >Current</option>
                                                <option value="savings" <?=($users[0]->accountType == 'savings')?'selected':''?>>saving</option>
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
                                            <input type="file" name="accountProvedDoc" class="form-control mark_sheet"  >
                                            
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
                                            <input type="file" name="signature" class="form-control user_adharback"  >
                                            
                                        </div>

                                        <div class="col-md-4 mb-3 image-container1">
                                        <label>Customar Image (310px X 200px) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link1" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview1" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="pic" class="form-control user_adharback"  >
                                            
                                        </div>
                                        <!-- <div class="col-md-12 mb-6">
                                            <label><input type="checkbox" value="yes" name="Terms_and_condition"> I agree to the <a href="#" target="_blank"><span>Terms &amp; Conditions</span></a> </label>
                                        </div> -->
                                        <br>

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

<style>
    #state,#typePasswordXz{
        text-transform: uppercase;
    }
    .image-link1{
        bottom: 28px !important;
    }
    @media(max-width:480px) {
        .image-link21{
            bottom: 3px !important;
        }
    }
</style>
