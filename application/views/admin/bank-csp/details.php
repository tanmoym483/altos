<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">

                            


                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="card-title">PERSONAL DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Enter Cardnumber </label>
                                            <input type="text" class="form-control" name="cardnumber" id="cucardnumber" placeholder="Cardnumber" readonly value="<?=$data->cardnumber?>">
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">First Name </label>
                                            <input type="text"  class="form-control" placeholder="First Name" name="firstName" id="firstName"  readonly value="<?=$data->firstName?>" />
                                        </div>

                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Middle Name </label>
                                            <input type="text" class="form-control" placeholder="Middle Name" name="middleName" id="middleName" value="<?=$data->middleName?>" readonly />
                                            
                                        </div>
                                        
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Last Name </label>
                                            <input type="text" class="form-control" id="lastName" placeholder="Last Name" name="lastName"  readonly value="<?=$data->lastName?>" />
                                        
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Email ID </label>
                                            <input type="text" class="form-control" name="email"  placeholder="Email ID" readonly value="<?=$data->email?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Mobile </label>
                                            <input type="number" class="form-control" name="phone" placeholder="Mobile" id="mobile" readonly  value="<?=$data->phone?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Whatsapp Number </label>
                                            <input type="number" class="form-control" name="whatsapp_phone" placeholder="Whatsapp Number"  readonly value="<?=$data->whatsapp_number?>" >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Office Number</label>
                                            <input type="number" class="form-control" name="officenumber" placeholder="Office Number" readonly value="<?=$data->office_number?>" >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Reference Number </label>
                                            <input type="number" class="form-control" name="reference_number" placeholder="Reference Number"  readonly value="<?=$data->referance_number?>"  >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Gender </label>
                                            <select class="form-control" name="gender" readonly>
                                                <option>--- Select--- </option>
                                                <option value="Male" <?php if($data->gender == 'Male'){ echo 'selected';}?>>Male</option>
                                                <option value="Female" <?php if($data->gender == 'Female'){ echo 'selected';}?>>Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Material Status </label>
                                            <select class="form-control" name="material_status" readonly>
                                                <option>--- Select--- </option>
                                                <option value="Married" <?php if($data->material_status == strtoupper('Married')){ echo 'selected';}?>>Married</option>
                                                <option value="Unmarried" <?php if($data->material_status == strtoupper('Unmarried')){ echo 'selected';}?>>Unmarried</option>
                                            </select>
                                        </div>
                                        
                                        <?php if($data->gender == 'Female' && $data->material_status == strtoupper('Married')){ ?>
                                        <div class="col-md-4 mb-3" id="husband-block" >
                                            <label>Husband's Name</label>
                                            <input type="text" class="form-control" name="husbandName" placeholder="Husband's Name" readonly value="<?=$data->husbandName?>" >
                                        </div>
                                        <?php } else {?>
                                        <div class="col-md-4 mb-3" id="father-block" >
                                            <label>Father's Name </label>
                                            <input type="text" class="form-control" name="fatherName" placeholder="Father's Name" readonly value="<?=$data->fatherName?>">
                                        </div>
                                        <?php } ?>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Birthday <span class="text-danger">*</span></label>
                                            <input type="text" id="birthday"  class="form-control" placeholder="mm/dd/yyyy" readonly name="birthday" readonly value="<?=$data->birthday?>" />
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Qualification type <span class="text-danger">*</span></label>
                                            <select class="form-control" name="qualificationType" readonly>
                                                <option>Select</option>
                                                
                                                <option value="H.S" <?php if($data->qualification_type == 'H.S'){ echo 'selected';}?>>H.S</option>
                                                <option value="Graduate" <?php if($data->qualification_type == 'Graduate'){ echo 'selected';}?>>Graduate</option>
                                                <option value="Post Graduate" <?php if($data->qualification_type == 'Post Graduate'){ echo 'selected';}?>>Post Graduate and above</option>
                                            </select>
                                           
                                        </div>
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Mark sheet </label>
                                          
                                            <a href="<?php echo base_url('uploads/' .$data->mark_sheet); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"> <div class="bg-primary profile rounded-circle" style="background-image: url(<?php echo base_url('uploads/' . $data->mark_sheet); ?>);"></div></a>
                                            <a href="<?php echo base_url('uploads/' . $data->mark_sheet); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a>
                                        </div>
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Qualification Certificate </label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <a href="<?php echo base_url('uploads/' .$data->qualification_certificate); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"> <div class="bg-primary profile rounded-circle" style="background-image: url(<?php echo base_url('uploads/' . $data->qualification_certificate); ?>);"></div></a>
                                            <a href="<?php echo base_url('uploads/' . $data->qualification_certificate); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a>
                                           
                                        </div>
                                        <br>

                                        

                                        <!--pattern="[A-Z]{5}[0-10]{4}[A-Z]{1}"-->
                                        <div class="col-md-4 mb-3">
                                            <label>PAN No</label>
                                            <input type="text" class="form-control PAN" name="panNo" placeholder="(ABCD1234P)" id="txtPANNumber" oninput="sdnsdjn()" onchange="this.value = this.value.toUpperCase()" maxlength="10" readonly value="<?=$data->panNo?>">
                                            <!--oninput="this.value = this.value.toUpperCase()"-->
                                            <div id="errors" style="color:red"></div>
                                            <div id="suc" style="color:#32a86d"></div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>PAN Upload (310px X 200px) </label>
                                            <a href="<?php echo base_url('uploads/' .$data->panDoc); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"> <div class="bg-primary profile rounded-circle" style="background-image: url(<?php echo base_url('uploads/' . $data->panDoc); ?>);"></div></a>
                                            <a href="<?php echo base_url('uploads/' . $data->panDoc); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a>
                                        </div>
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Voter card Upload (310px X 200px) </label>
                                            <a href="<?php echo base_url('uploads/' .$data->votercard); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"> <div class="bg-primary profile rounded-circle" style="background-image: url(<?php echo base_url('uploads/' . $data->votercard); ?>);"></div></a>
                                            <a href="<?php echo base_url('uploads/' . $data->votercard); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a>
                                           
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Aadhaar No</label>
                                            <input type="text" name="addharNo" class="form-control col-xs-8" pattern="(\d{4}\s?){4}" placeholder="&#8226;&#8226;&#8226;&#8226; &#8226;&#8226;&#8226;&#8226; &#8226;&#8226;&#8226;&#8226;" maxlength="14" readonly id="card_number" value="<?=$data->addharNo?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Aadhaar Front Upload (310px X 200px) </label>
                                            <a href="<?php echo base_url('uploads/' .$data->addharFrontDoc); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"> <div class="bg-primary profile rounded-circle" style="background-image: url(<?php echo base_url('uploads/' . $data->addharFrontDoc); ?>);"></div></a>
                                            <a href="<?php echo base_url('uploads/' . $data->addharFrontDoc); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a>

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>Aadhaar Back Upload (310px X 200px)</label>
                                            <a href="<?php echo base_url('uploads/' .$data->addharBackDoc); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"> <div class="bg-primary profile rounded-circle" style="background-image: url(<?php echo base_url('uploads/' . $data->addharBackDoc); ?>);"></div></a>
                                            <a href="<?php echo base_url('uploads/' . $data->addharBackDoc); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Customar Image (310px X 200px) </label>
                                            <a href="<?php echo base_url('uploads/' .$data->pic); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"> <div class="bg-primary profile rounded-circle" style="background-image: url(<?php echo base_url('uploads/' . $data->pic); ?>);"></div></a>
                                            <a href="<?php echo base_url('uploads/' . $data->pic); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Address </label>
                                            <input placeholder="Address" type="text" name="address" id="address" class="form-control" readonly value="<?=$data->uaddress?>">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>City / Village </label>
                                            <input placeholder="City / Village" type="text" name="city" id="city" class="form-control" readonly value="<?=$data->ucity?>">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Gram Panchayat/Tehsil </label>
                                            <input placeholder="Gram Panchayat/Tehsil" type="text" name="gram_panchayat" id="city" class="form-control" readonly value="<?=$data->ugram_panchayat?>">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>District </label>
                                            <select class="form-control" name="district" readonly>
                                            <option value="">Select District</option>
                                                <?php foreach($districtlist as $district){?>
                                                <option value="<?=$district?>" <?php if($data->udistrict == $district){ echo 'selected';}?>><?=$district?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>PIN Code </label>
                                            <input name="postcode" placeholder="PIN Code" type="number" maxlength="10" class="form-control" readonly value="<?=$data->postcode?>">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>State </label>
                                            <input placeholder="State" type="text" name="state" class="form-control" readonly value="<?=$data->state?>">
                                        </div>
                                        
                                        <!-- <div class="col-md-4 mb-3">-->
                                        <!--    <label>Password </label>-->
                                        <!--    <input placeholder="District" type="password" name="password" class="form-control"  placeholder="Password" required>-->
                                        <!--</div>-->
                                        <br>
                                        
                                        
                                        
                                        <div class="col-md-12">
                                            <h5 class="card-title">Bank CSP DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Link Branch Name </label>
                                            <select class="form-control" name="bankName" readonly>
                                                <option>Select</option>
                                                <option value="State Bank Of India" <?php if($data->bankName == strtoupper('State Bank Of India')){ echo 'selected';}?>>State Bank Of India</option>
                                                <option value="Bank Of India" <?php if($data->bankName == strtoupper('Bank Of India')){ echo 'selected';}?>>Bank Of India </option>
                                                <option value="Panjab National Bank" <?php if($data->bankName == strtoupper('Panjab National Bank')){ echo 'selected';}?>>Panjab National Bank</option>
                                                <option value="Indian Oversise Bank" <?php if($data->bankName == strtoupper('Indian Oversise Bank')){ echo 'selected';}?>>INDIAN OVERSISE BANK</option>
                                                <option value="Bank Of Boroda" <?php if($data->bankName == strtoupper('Bank Of Boroda')){ echo 'selected';}?>>Bank Of Boroda</option>
                                                <option value="UCO Bank" <?php if($data->bankName == strtoupper('UCO Bank')){ echo 'selected';}?>>UCO Bank</option>
                                                <option value="Indian bank" <?php if($data->bankName == strtoupper('Indian bank')){ echo 'selected';}?>>Indian bank</option>
                                                <option value="Central bank" <?php if($data->bankName == strtoupper('Central bank')){ echo 'selected';}?>>Central bank</option>
                                                <option value="Bangiya Gramin Vikash Bank" <?php if($data->bankName == strtoupper('Bangiya Gramin Vikash Bank')){ echo 'selected';}?>>Bangiya Gramin Vikash Bank</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Link Branch code</label>
                                            <input type="text" name="branchCode" id="branchCode" class="form-control" placeholder="Branch" readonly value="<?=$data->branchCode?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Branch Location </label>
                                            <input type="text" name="branchLocation" id="branchLocation" class="form-control" placeholder="Branch Location" readonly value="<?=$data->branchLocation?>">
                                        </div>
                                        
                                        <br>
                                        <div class="col-md-12">
                                            <h5 class="card-title">Kiosk Address</h5>
                                            <hr>
                                        </div>
                                        
                                        <div class="col-md-4 mb-3">
                                            <label>Address </label>
                                            <input placeholder="Address" type="text" name="kaddress" id="address" class="form-control" readonly value="<?=$data->kaddress?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Land Mark </label>
                                            <input placeholder="Land Mark" type="text" name="landmark" id="" class="form-control" readonly value="<?=$data->landmark?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>City/Village  </label>
                                            <input placeholder="City/Village" type="text" name="kcity" id="city" class="form-control" readonly value="<?=$data->kcity?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Gram Panchayat/Tehsil  </label>
                                            <input placeholder="Gram Panchayat/Tehsil" type="text" name="kgram_panchayat"  id="city" class="form-control" readonly value="<?=$data->kgram_panchayat?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>District </label>
                                            <select class="form-control" name="kdistrict" readonly>
                                            <option value="">Select District</option>
                                            <option value="Nadia" <?php if($data->kdistrict == strtoupper('Nadia')){ echo 'selected';}?>>Nadia</option>
                                                <option value="North 24 parganas" <?php if($data->kdistrict == strtoupper('North 24 parganas')){ echo 'selected';}?>>North 24 parganas </option>
                                                <option value="Hooghly" <?php if($data->kdistrict == strtoupper('Hooghly')){ echo 'selected';}?>>Hooghly</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>PIN Code </label>
                                            <input name="kpostcode" placeholder="PIN Code" type="number" maxlength="10" id="typePasswordX" oninput="postcodeDynamic()" class="form-control" readonly value="<?=$data->pincode?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>State </label>
                                            <input placeholder="State" type="text" name="kstate"  id="state" class="form-control" readonly value="<?=$data->kstate?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Status </label>
                                            <input  type="text"  id="state" class="form-control" readonly value="<?=$data->bstatus?>">
                                        </div>
                                        <?php if($data->applicationForm != '') {?>
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Application Form upload </label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <a href="<?php echo base_url('uploads/' .$data->applicationForm); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"> <div class="bg-primary profile rounded-circle" style="background-image: url(<?php echo base_url('uploads/' . $data->applicationForm); ?>);"></div></a>
                                            <a href="<?php echo base_url('uploads/' . $data->applicationForm); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a>
                                           
                                        </div>
                                        <?php } if($data->residenceCertificate != '') {?>
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Residence certificate </label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <a href="<?php echo base_url('uploads/' .$data->residenceCertificate); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"> <div class="bg-primary profile rounded-circle" style="background-image: url(<?php echo base_url('uploads/' . $data->residenceCertificate); ?>);"></div></a>
                                            <a href="<?php echo base_url('uploads/' . $data->residenceCertificate); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a>
                                           
                                        </div>
                                        <?php } ?>
                                        <?php if($data->policeVerification != '') {?>
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Police verfication report (PVR) </label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <a href="<?php echo base_url('uploads/' .$data->policeVerification); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"> <div class="bg-primary profile rounded-circle" style="background-image: url(<?php echo base_url('uploads/' . $data->policeVerification); ?>);"></div></a>
                                            <a href="<?php echo base_url('uploads/' . $data->policeVerification); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a>
                                           
                                        </div>
                                        <?php } ?>

                                        
                                       
                                        <br>
                                        </div>
                                        <?php if ($_SESSION['role'] === "superAdmin" && $data->bstatus != 'approve') {?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="<?php echo base_url('bankcsp/postupdatestatus') ?>" method="POST"  class="status_change validation-form-message" >            
                                                <input type="hidden" name="userId" value="<?=$data->userId?>" id="userId">
                                                <input type="hidden" name="id" value="<?=$data->bid?>" id="id">
                                                <div class="col-md-4 mb-3">
                                                    <label>Status <span style="color:#C00">*</span></label>
                                                    <select class="form-control" name="status" required>
                                                        <option>Select</option>
                                                        
                                                        <option value="processing" <?php if($data->bstatus == 'processing'){ echo 'selected';}?> <?php if($data->bstatus == 'verification' || $data->bstatus == 'branch processing'){ echo 'disabled';}?>>Processing</option>
                                                        <option value="verification" <?php if($data->bstatus == 'verification'){ echo 'selected';}?> <?php if($data->bstatus == 'branch processing'){ echo 'disabled';}?>>Verification</option>
                                                        <option value="branch processing" <?php if($data->bstatus == 'branch processing'){ echo 'selected';}?> >Branch Processing</option>
                                                        <option value="approve" <?php if($data->bstatus == 'approve'){ echo 'selected';}?>>Approve</option>
                                                        <option value="reject" <?php if($data->bstatus == 'reject'){ echo 'selected';}?>>Reject</option>
                                                    </select>
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

