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
                                <form action="<?php echo base_url('bankcsp/postaddbankcspApplication') ?>" method="POST"  class="repeater validation-form-message" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?=$id?>" >
                                        <div class="row">
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Application Form upload <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="applicationForm" class="form-control applicationForm"  required="">
                                           
                                        </div>
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Residence certificate <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="residenceCertificate" class="form-control residenceCertificate"  required="">
                                           
                                        </div>
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Police verfication report (PVR) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="policeVerification" class="form-control policeVerification"  required="">
                                           
                                        </div>
                                        <div class="col-md-12 mb-6">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload</button>
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


