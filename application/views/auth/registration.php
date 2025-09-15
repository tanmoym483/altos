<section class="mt-0 vh-100 " style="overflow-y: scroll;">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form action="<?php echo base_url('auth/submitRegistration') ?>" method="post" class="validation-form-message" enctype="multipart/form-data">
                            <div><img class="img-responsive reg-logo" src="<?php echo base_url('assets/images/login_logo.png'); ?>" /></div>
                            <h4 class="mt-2 mb-3">Trust Member Registration</h4>
                            <?php if ($this->session->flashdata('error') != '') { ?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('success') != '') { ?>
                                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                            <?php } ?>

                            <div class="row">
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">First Name <span class="text-danger">*</span></label>
                                    <input type="text" id="typeEmailX-2" class="form-control" placeholder="First Name" name="firstName" value="<?php echo set_value('firstName'); ?>"  required="" />
                                    <?php echo form_error('firstName'); ?>
                                </div>

                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Middle Name <span class="text-danger"></span></label>
                                    <input type="text" id="typemiddleX-2" class="form-control" placeholder="Middle Name" name="middleName" value="<?php echo set_value('middleName'); ?>"  />
                                    <?php echo form_error('middleName'); ?>
                                </div>
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" id="typelastX-2" class="form-control" placeholder="Last Name" name="lastName" value="<?php echo set_value('lastName'); ?>" required="" />
                                    <?php echo form_error('lastName'); ?>
                                </div>
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Email ID <span class="text-danger">*</span></label>
                                    <input type="email" id="typePasswordX-2" class="form-control" placeholder="Email ID" name="email" value="<?php echo set_value('email'); ?>" required="" />
                                    <?php echo form_error('email'); ?>
                                </div>
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" id="typephoneX-2" class="form-control" placeholder="Phone Number" name="phone" value="<?php echo set_value('phone'); ?>" required="" />
                                    <?php echo form_error('phone'); ?>
                                </div>
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Birthday <span class="text-danger">*</span></label>
                                    <input type="text" id="birthday"  class="form-control" placeholder="mm/dd/yyyy" readonly name="birthday" value="<?php echo set_value('birthday'); ?>" required="" />
                                    <?php echo form_error('birthday'); ?>
                                </div>
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Address <span class="text-danger">*</span></label>
                                    <input type="text" id="typePasswordX-2" class="form-control" placeholder="Address" name="address" value="<?php echo set_value('address'); ?>" required="" />
                                    <?php echo form_error('address'); ?>
                                </div>
                                
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo set_value('city'); ?>" required />
                                    <?php echo form_error('city'); ?>
                                </div>
                               
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">District <span class="text-danger">*</span></label>
                                    <select class="form-control" name="district" required>
										<option value="">Select District</option>
                                        <?php foreach($districtlist as $district){?>
                                        <option value="<?=$district?>"><?=$district?></option>
                                        <?php } ?>
                                   
                                    </select>
                                    
                                    <?php echo form_error('district'); ?>
                                </div>
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Pincode <span class="text-danger">*</span></label>
                                    <input type="text" id="typePasswordX" class="form-control" placeholder="Pincode" name="postcode" pattern="^[1-9][0-9]{5}$" oninput="postcodeDynamic()" value="<?php echo set_value('postcode'); ?>" required="" />
                                    <?php echo form_error('postcode'); ?>
                                </div>
                                <div class="form-outline mb-4 col-sm-4">
                                    <label>State</label>
                                    <input type="text"  class="form-control" placeholder="State" name="state" id="state" readonly>
                                     <!-- <select class="form-control" name="state">
                                         
                                        <option>---State---</option>
                                        <?php foreach($users as $u){ ?>
                                        <option value="<?php echo $u->name?>"><?php echo $u->name?></option>
                                        <?php } ?>
                                    </select> -->
                                    <!--<label class="text-left">State <span class="text-danger">*</span></label>-->
                                    <!--<input type="text" id="typePasswordX-2" class="form-control" placeholder="State" name="state" value="<?php echo set_value('state'); ?>" />-->
                                    <?php echo form_error('state'); ?>
                                </div>

                                
                                <h4 class="mt-2 mb-3">View Account Details.</h4>

                                    <div class="form-outline mb-4 col-sm-6">
                                        <h4 class="mb-2">Account Details.</h4>
                                        <hr>
                                        <label class="text-left mb-2">Bank name: <strong>HDFC Bank</strong> <span class="text-danger"></span></label>
                                        <label class="text-left mb-2">Holder Name: <strong>APONJON TRUST</strong> <span class="text-danger"></span></label>
                                        <label class="text-left mb-2">Account Number: <strong>50200032793951</strong> <span class="text-danger"></span></label>
                                        <label class="text-left mb-2">IFCS Code: <strong>HDFC0002422</strong> <span class="text-danger"></span></label>
                                    </div>
                                    <div class="form-outline mb-4 col-sm-6">
                                        <h4 class="mb-2">Transaction Image: </h4>
                                        <hr>
                                        <label class="text-left mb-2">Required <span class="text-danger">*</span></label>
                                    
                                        <div class="mb-3 col-sm-12 image-container">
                                        
                                                <a href="#" class="image-link" data-fancybox="gallery">
                                                                <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                            </a>
                                                <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                                <input type="file" name="transRefDoc" class="form-control  mark_sheet" required >
                                                
                                        </div>
                                    <div>

                                </div>
                                </div>
                                <div class="form-outline mb-4 col-sm-4">
                                    <h4 class="mb-2">Download & Scan</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-8" style="display: inline-block; margin: 0 auto;">
                                            <a href="<?php echo base_url('assets/images/Aponjon-Trust-scna.jpg'); ?>" data-lightbox="image-1">
                                                <img class="img-responsive" src="<?php echo base_url('assets/images/Aponjon-Trust-scna.jpg'); ?>" />
                                            </a>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url('assets/images/Aponjon-Trust-scna.jpg'); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        Download & Scan Pay</a>
                                </div>
                                <div class="form-outline mb-4 col-sm-8">
                                    <h4 class="mb-2">Transaction Details</h4>
                                    <hr>
                                    <div class="form-outline mb-4 col-sm-12">
                                        <label class="text-left">Transaction No./ UTR No. <span class="text-danger">*</span></label>
                                        <input type="text" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Transaction No./ UTR No." name="transRefNo" value="<?php echo set_value('transRefNo'); ?>" required="" />
                                        <?php echo form_error('transRefNo'); ?>
                                    </div>
                                    <div class="form-outline mb-4 col-sm-12">
                                        <label class="text-left">Amount <span class="text-danger">*</span></label>
                                        <input type="text" id="typePasswordX-2" readonly class="form-control form-control-lg" placeholder="599" name="amount" value="599"  />
                                        <?php echo form_error('amount'); ?>
                                    </div>
                                    <div class="">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                                        <br/>
                                        <div class="mt-4"></div>
                                        <hr>
                                        <p>Alredy Register ?</p>
                                        <button class="btn btn-primary btn-lg btn-block"><a class="text-white" href="<?php echo base_url('login') ?>">Login</a></button>
                                         <button class="btn btn-success btn-lg btn-block"><a class="text-white" href="<?php echo base_url('') ?>">Home</a></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
 <!-- pan card -->

<!-- end pan card -->

<div class="modal fade" id="modal_crop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crop Image Before Upload</h5>
                            <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                            <!--    <span aria-hidden="true">×</span>-->
                            <!--</button>-->
                            <button onClick="cancels()">x</button>
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
                            <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>-->
                           
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <style>
                .form-control{
                    text-transform: uppercase;
                }
                /* #typePasswordXz,#typePasswordX5,#typePasswordX-2{
                    text-transform: uppercase;
                } */
                .error{
                    color:#f00;
                }
            </style>
           
