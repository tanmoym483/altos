<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">


                            <form action="<?php echo base_url('admin/postaddtrustmember') ?>" method="post" class="validation-form-message" enctype="multipart/form-data">
                           
                            <h4 class="mt-2 mb-3">Trust Member Registration</h4>
                            <?php if ($this->session->flashdata('ferror') != '') { ?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('ferror'); ?></div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('flassuccess') != '') { ?>
                                <div class="alert alert-success"><?php echo $this->session->flashdata('flassuccess'); ?></div>
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
                                    <?php echo form_error('state'); ?>
                                </div>
                                <div class="form-outline mb-4 col-sm-4">
                                    <label>Payment From</label>
                                     <select class="form-control" name="payment_form">
                                        <option value="franchaise_wallet">Franchaise wallet</option>
                                     </select>
                                   
                                </div>
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
