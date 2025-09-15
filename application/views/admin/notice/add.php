<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">

                            <?php if ($this->session->flashdata('error') != '') { ?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('success') != '') { ?>
                                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                            <?php } ?>
                                <form action="<?php echo base_url('notice/postaddNotice') ?>" method="POST"  class="repeater validation-form-message" enctype="multipart/form-data">


                                    <div class="row">
                                       
                                        <div class="col-md-4 mb-3">
                                            <label>Notice <span style="color:#C00">*</span></label>
                                            <textarea class="form-control" name="notice" required="" placeholder="Notice"></textarea>
                                            
                                        </div>
                                       
                                        <div class="col-md-4 mb-3">
                                            <label>User Type <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="notice_for" required="">
                                                <option value="all">All</option>
                                                <option value="customer">Card Member</option>
                                                <option value="vendor">Franchiase</option>
                                                <option value="specific person">Specific Person</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="hide-section row" style="display:none">
                                        <div class="col-md-4 mb-3">
                                            <label>Introducer code <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="introducer_code" placeholder="Introducer code" id="sopnsercode" value="<?php echo $_SESSION['regId'] ?>" oninput="intrFunction()" required="">
                                        </div>

                                        <div id="match">

                                        </div>
                                            <div class="col-md-4 mb-3">
                                                <label>Sponsor / Introducer Name</label>
                                                <input type="text" class="form-control" name="sponsor" id="SponsorName" value="<?=$_SESSION['firstName'].' '.$_SESSION['lastName']?>" readonly="">
                                            </div>
                                        </div></div>
                                        <input type="hidden" name="userId" value="" id="userId">
                                        <input type="hidden" name="parentId" value="<?=$_SESSION['userId']?>" id="parentId">
                                       
                                       
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


<!-- end image -->

