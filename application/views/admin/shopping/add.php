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
                                <form action="<?php echo base_url('shopping/postaddonlineLink') ?>" method="POST"  class="repeater validation-form-message" enctype="multipart/form-data">


                                    <div class="row">
                                       
                                        
                                        <div class="col-md-4 mb-3">
                                            <label>Shopping Link <span style="color:#C00">*</span></label>
                                            <input type="text" name="link" class="form-control col-xs-8" placeholder="link" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Special Offer <span style="color:#C00">*</span></label><br>
                                            <input type="radio" name="special_offer"  value="true"  > Yes
                                            <input type="radio" name="special_offer" value="false" checked > No
                                        </div>
                                      

                                    
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Shopping Image <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="shopping_image" class="form-control mark_sheet" required >
                                            
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Shopping Sub Texts </label>
                                            <textarea id="summernote" name="content"></textarea>
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


<!-- end image -->

