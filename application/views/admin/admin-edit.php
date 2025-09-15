<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">


                                <form action="<?php echo base_url("admin/posteditadmin") ?>" method="POST" class="validation-form-message" enctype="multipart/form-data">


                                    <div class="row">
                                       <input type="hidden" name="id" value="<?=$users[0]->id?>">
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
                                            <input type="number" class="form-control" name="phone" placeholder="Mobile" id="mobile" value="<?=$users[0]->phone?>" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Email ID <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email ID"  value="<?=$users[0]->email?>" required="">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Address <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?=$users[0]->address?>" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>PIN Code <span style="color:#C00">*</span></label>
                                            <input name="postcode" placeholder="PIN Code" type="number" maxlength="10" id="typePasswordX" oninput="postcodeDynamic()" class="form-control" required="" value="<?=$users[0]->postcode?>">
                                        </div>
                                        
                                        <div class="col-md-3 mb-3">
                                            <label>City <span style="color:#C00">*</span></label>
                                            <input placeholder="City" type="text" name="city" value="<?=$users[0]->city?>" class="form-control" required="">
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
                                            <label>State <span style="color:#C00">*</span></label>
                                            <input placeholder="State" type="text" name="state" id="state" class="form-control" required="" value="<?=$users[0]->state?>" readonly>
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
