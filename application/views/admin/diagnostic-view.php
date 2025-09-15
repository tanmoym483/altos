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
                                       
                                    <div class="form-outline mb-4 col-sm-3">
                                        <label class="text-left">Owner First Name <span class="text-danger">*</span></label>
                                        <input type="text"  class="form-control" placeholder="First Name" name="firstName"  value="<?=$users[0]->firstName?>" readonly  />
                                       
                                    </div>

                                    <div class="form-outline mb-4 col-sm-3">
                                        <label class="text-left">Owner Middle Name <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" placeholder="Middle Name" name="middleName" value="<?=$users[0]->middleName?>"  readonly />
                                        
                                    </div>
                                    <div class="form-outline mb-4 col-sm-3">
                                        <label class="text-left">Owner Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Last Name" name="lastName" value="<?=$users[0]->lastName?>" readonly />
                                       
                                    </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Mobile </label>
                                            <input type="number" class="form-control" name="phone" placeholder="Mobile" id="mobile" value="<?=$users[0]->phone?>" readonly>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Email ID </label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email ID" value="<?=$users[0]->email?>" readonly >
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Center Name </label>
                                            <input type="text" class="form-control" value="<?=$usermember->center_name?>" name="center_name" id="center_name" placeholder="Center name" readonly>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Center Category </label>
                                            <input type="text" class="form-control" value="<?=$usermember->shop_category?>" name="shop_category" id="center_name" placeholder="Center name" readonly>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Business Category </label>
                                            <input type="text" class="form-control" value="<?=$usermember->business_category?>" name="center_name" id="center_name" placeholder="Center name" readonly>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Category Document Upload </label>
                                            <br>
                                            <a href="<?php echo base_url('uploads/' . $usermember->document); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1"><img class="img-responsive w-img" src="<?php echo base_url('uploads/' . $usermember->document); ?>"/></a>
                                                <a href="<?php echo base_url('uploads/' . $usermember->document); ?>" download>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                    <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                                </svg>
                                                </a>
                                        
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>GSTIN Number </label>
                                            <input type="text" class="form-control" name="gstin_number" id="gstin_number" value="<?=$usermember->gstin_number?>" placeholder="GSTIN Number" readonly>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>CIN / Certificate Number </label>
                                            <input type="text" class="form-control" name="cin_number" id="cin_number" value="<?=$usermember->cin_number?>" placeholder="CIN Number" readonly >
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>PANCARD Number <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="pancard_number" id="pancard_number" placeholder="PANCARD Number" value="<?=$usermember->pancard_number?>" readonly>
                                        </div>
                                        <div class=" col-md-3 mb-3">
                                            <label>Introducer code </label>
                                            <input type="text" class="form-control" name="introducer_code" placeholder="Introducer code" id="sopnsercode" value="<?php echo $created[0]->regId ?>" oninput="intrFunction()" readonly>
                                        </div>

                                        <div id="match">

                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Sponsor / Introducer Name</label>
                                            <input type="text" class="form-control" name="sponsor" id="SponsorName" value="<?=$created[0]->firstName.' '.$created[0]->lastName?>" readonly="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?=$users[0]->address?>" readonly>
                                        </div>
                                        
                                        <div class="col-md-3 mb-3">
                                            <label>City </label>
                                            <input placeholder="City" type="text" name="city" class="form-control" value="<?=$users[0]->city?>" readonly>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>District </label>
                                            <select class="form-control" name="district" readonly>
                                                <option value="">Select District</option>
                                                <?php foreach($districtlist as $district){?>
                                                <option value="<?=$district?>" <?php echo ($users[0]->district== $district)?'selected':'';?>><?=$district?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>PIN Code </label>
                                            <input name="postcode" placeholder="PIN Code" type="number" maxlength="10" id="typePasswordX" oninput="postcodeDynamic()" class="form-control" value="<?=$users[0]->postcode?>" readonly>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>State </label>
                                            <input placeholder="State" type="text" name="state" id="state" class="form-control" value="<?=$users[0]->state?>" readonly>
                                        </div>
                                        <!-- <div class="col-md-2 mb-3">
                                            <label>Payout/Commision </label>
                                            <input type="text" name="commision" readonly value="<?=$usermember->commision?>" class="form-control col-xs-8" placeholder="Payout/Commision" >
                                        </div>
                                        
                                        <div class="col-md-1 mb-3">
                                            <label>Units </label>
                                            <select class="form-control" name="units" readonly>
                                                <option value="percentage" <?=($usermember->units == 'percentage')?'selected':''?>>%</option>
                                                <option value="rupess" <?=($usermember->units == 'rupess')?'selected':''?> >Rs.</option>
                                            </select>
                                        </div> -->
                                        <div class="col-md-5 mb-3">
                                            <label>Center Image </label>
                                            <div class="preview-container" id="image-preview"></div>
                                           <?php foreach($gallery as $g){?>
                                            <a href="<?php echo base_url('uploads/' . $g->gallery); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1"><img class="img-responsive w-img" src="<?php echo base_url('uploads/' . $g->gallery); ?>"/></a>
                                                <a href="<?php echo base_url('uploads/' . $g->gallery); ?>" download>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                    <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                                </svg>
                                                </a>
                                            <?php } ?>
                                        </div>
                                        <?php if(isset($testcommision)) {?>
                                        <div class="col-md-12 mb-3">
                                            <label>Test Payout </label>
                                            <div class="col-lg-12">
                                            <?php 
                                           
                                            foreach($testcommision as $test){ ?>
                                                <div class=" row">
                                                    <div class="col-md-5 mb-3 "> 
                                                        <label>Test Type </label>       
                                                        <input type="text" class="form-control" value="<?=$test['test_category']?>" readonly>
                                                    </div>
                                                    <div class="col-md-5 mb-3 ">  
                                                        <label>Commision in percentage</label>      
                                                        <input type="number" class="form-control" value="<?=$test['commision']?>" readonly>
                                                    </div>
                                                    <div class="col-md-1 mb-3">
                                                        <label>Units </label>
                                                        <select class="form-control" name="units" readonly>
                                                            <option value="percentage" <?=($test['units'] == 'percentage')?'selected':''?>>%</option>
                                                            <option value="rupee" <?=($test['units'] == 'rupee')?'selected':''?> >Rs.</option>
                                                        </select>
                                                    </div>
                                                   
                                                </div>
                                            
                                            <?php } ?>
                                            </div>
                                            <!-- <div class="preview-container" id="image-preview"></div>
                                            <input type="file" class="form-control" name="center_image[]" required id="image-upload" multiple accept="image/*"> -->
                                        </div>
                                        <?php } ?>
                                        <div class="col-md-12">
                                            <h5 class="card-title">BANK DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>IFSC Code </label>
                                            <input type="text" class="form-control" name="ifscCode" placeholder="IFSC Code" readonly value="<?=$userbank[0]->ifscCode?>" oninput="ifcscode()" id="ifcscodeId">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Bank Name </label>
                                            <input type="text" class="form-control" name="bankName" placeholder="Bank Name" id="bankName" readonly value="<?=$userbank[0]->bankName?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Branch </label>
                                            <input type="text" name="branchName" id="branchName" class="form-control" placeholder="Branch" readonly value="<?=$userbank[0]->branchName?>">
                                        </div>
                                        <br>

                                        <div class="col-md-4 mb-3">
                                            <label>A/C Type </label>
                                            <select class="form-control" readonly name="accountType">
                                                <option>Select</option>
                                                <option value="current" <?=($userbank[0]->accountType == 'current')?'selected':''?> >Current</option>
                                                <option value="savings" <?=($userbank[0]->accountType == 'savings')?'selected':''?>>saving</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>A/C Holder Name </label>
                                            <input type="text" name="accountHolderName" class="form-control" id="accountHolderName" readonly placeholder="A/C Holder Name" value="<?=$userbank[0]->accountHolderName?>">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>A/C Number </label>
                                            <input type="text" name="accountNumber" class="form-control" placeholder="A/C Number" readonly value="<?=$userbank[0]->accountNumber?>">
                                        </div>


                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Passbook/Cancelled Cheque/Statement Upload (310px X 200px) </label>
                                            <a href="<?php echo base_url('uploads/' . $userbank['0']->accountProvedDoc); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1"><img class="img-responsive w-img" src="<?php echo base_url('uploads/' . $userbank['0']->accountProvedDoc); ?>"/></a>
                                                <a href="<?php echo base_url('uploads/' . $userbank['0']->accountProvedDoc); ?>" download>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                    <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                                </svg>
                                                </a>
                                            
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Status</label>
                                            <input type="text"  class="form-control" readonly value="<?=$users[0]->status?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Progress Status</label>
                                            <input type="text"  class="form-control" readonly value="<?=$usermember->progress_status?>">
                                        </div>
                                       
                                        <input type="hidden" name="parentId" value="<?=$_SESSION['userId']?>" id="parentId">
                                       

                                    </div>

                                    <?php if ($_SESSION['role'] === "superAdmin" && $usermember->progress_status != 'approve') {?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="<?php echo base_url('diagonostic/postdiaupdatestatus') ?>" method="POST"  class="status_change validation-form-message" >            
                                                <input type="hidden" name="userId" value="<?=$usermember->userId?>" id="userId">
                                                <input type="hidden" name="id" value="<?=$usermember->id?>" id="id">
                                                <div class="col-md-4 mb-3">
                                                    <label>Status <span style="color:#C00">*</span></label>
                                                    <select class="form-control" name="status" id="diastatus" required>
                                                        <option>Select</option>
                                                        
                                                        <option value="processing" <?php if($usermember->progress_status == 'processing'){ echo 'selected';}?> <?php if($usermember->progress_status == 'verification' || $usermember->progress_status == 'branch processing'){ echo 'disabled';}?>>Processing</option>
                                                        <option value="verification" <?php if($usermember->progress_status == 'verification'){ echo 'selected';}?> >Verification</option>
                                                        
                                                        <option value="approved" <?php if($usermember->progress_status == 'approved'){ echo 'selected';}?>>approved</option>
                                                        <option value="rejected" <?php if($usermember->progress_status == 'rejected'){ echo 'selected';}?>>rejected</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3" id="reject_reason" style="display:none;">
                                                    <label>Reason</label>
                                                    <input type="text"  class="form-control"  name="reason">
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
<script>
        const imageUploadInput = document.getElementById('image-upload');
        const imagePreviewContainer = document.getElementById('image-preview');

        // Limit the number of images to 5
        const MAX_IMAGES = 5;

        imageUploadInput.addEventListener('change', function(event) {
            // Clear previous previews
            imagePreviewContainer.innerHTML = '';

            // Get selected files
            const files = event.target.files;

            // Only proceed if there are files
            if (files.length > 0) {
                const fileList = Array.from(files).slice(0, MAX_IMAGES); // Limit to MAX_IMAGES

                fileList.forEach(file => {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result; // Set image source as the file data
                        imagePreviewContainer.appendChild(img);
                    }

                    reader.readAsDataURL(file);
                });
            }
        });
    </script>
    <style>
        .preview-container {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .preview-container img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
        .w-img{
            width:50px !important;
            height:50px;
            display: inline;
        }
    </style>