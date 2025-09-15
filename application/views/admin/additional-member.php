<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <div class="col-md-12">
                            <h3 class="card-title p-3">Add Card Member</h3>
                        </div>
                        <section>
                            <div class="scooter-upload p-2">

                                            
                                <form action="<?php echo base_url("admin/postaddcardmember") ?>" method="POST"  class="validation-form-message" enctype="multipart/form-data">

                                    <input type="hidden" name="userid"  />
                                    
                                    <div class="col-md-12">
                                        <div class="row">
                                            
                                            <div class="col-md-4 mb-3">
                                                <label>Enter Card number <span style="color:#C00">*</span></label>
                                                <input type="text" class="form-control" name="cardmember" id="card_member" placeholder="Card number" required="">
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label style="opacity:0">Enter Card number</label>
                                                <button type="button" id="cardmember_search" class="btn btn-primary">Search</button>
                                            </div>
                                            <div id="useracard-addblock" class="row" style="display:none">
                                                <div class="form-outline mb-4 col-sm-4">
                                                <input type="hidden" name="userid" id="userId" />
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

                                                <div style="background:#f2efef;border: 1px solid #ccc; margin: 15px; width:100%;" >
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
                                                    <!-- <div class="col-lg-12">
                                                        <div class="row" id="member-list"></div>
                                                    </div> -->
                                                        
                                                    <div class="col-lg-12" id="carddetail-add">
                                                        
                                                    </div>
                                                
                                                    <input type="button" value="Add" id="details-add" class="btn btn-primary my-3 ml-2 "/>
                                                </div>
                                            
                                                <div class="col-md-12 mb-6">
                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                                </div>
                                            </div>
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

