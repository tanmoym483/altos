<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">


                                <form action="<?php echo base_url("admin/postaddadmin") ?>" method="POST" class="validation-form-message" enctype="multipart/form-data">


                                    <div class="row">
                                       
                                    <div class="form-outline mb-4 col-sm-4">
                                        <label class="text-left">First Name <span class="text-danger">*</span></label>
                                        <input type="text"  class="form-control" placeholder="First Name" name="firstName" value="<?php echo set_value('firstName'); ?>"  required="" />
                                       
                                    </div>

                                    <div class="form-outline mb-4 col-sm-4">
                                        <label class="text-left">Middle Name <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" placeholder="Middle Name" name="middleName" value="<?php echo set_value('middleName'); ?>"  />
                                        
                                    </div>
                                    <div class="form-outline mb-4 col-sm-4">
                                        <label class="text-left">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Last Name" name="lastName" value="<?php echo set_value('lastName'); ?>" required="" />
                                       
                                    </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Mobile <span style="color:#C00">*</span></label>
                                            <input type="number" class="form-control" name="phone" placeholder="Mobile" id="mobile" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Email ID <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email ID" required="">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Address <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Address" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>PIN Code <span style="color:#C00">*</span></label>
                                            <input name="postcode" placeholder="PIN Code" type="number" maxlength="10" id="typePasswordX" oninput="postcodeDynamic()" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>City <span style="color:#C00">*</span></label>
                                            <input placeholder="City" type="text" name="city" value="" class="form-control" required="">
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
                                            <label>State <span style="color:#C00">*</span></label>
                                            <input placeholder="State" type="text" name="state" value="" id="state" class="form-control" required="" readonly>
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
