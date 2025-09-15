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
                                <form action="<?php echo base_url('shopping/editShopping') ?>" method="POST"  class="repeater validation-form-message" enctype="multipart/form-data">


                                    <div class="row">
                                       
                                        <input type="hidden" name="id" value="<?=$data->id?>">
                                        <div class="col-md-4 mb-3">
                                            <label>Shopping Link <span style="color:#C00">*</span></label>
                                            <input type="text" name="link" class="form-control col-xs-8" placeholder="link" required="" value="<?=$data->link?>">
                                        </div>
                                      
                                        <div class="col-md-4 mb-3">
                                            <label>Special Offer <span style="color:#C00">*</span></label><br>
                                            <input type="radio" name="special_offer"  value="true" <?=($data->special_offer=='true')?'checked':''?> > Yes
                                            <input type="radio" name="special_offer" value="false" <?=($data->special_offer=='false')?'checked':''?> > No
                                        </div>
                                    
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Shopping Image <span style="color:#C00">*</span></label>
                                            <a href="<?php echo base_url('uploads/' .$data->image); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"> <div class="bg-primary profile rounded-circle" style="background-image: url(<?php echo base_url('uploads/' . $data->image); ?>);"></div></a>
                                            <a href="<?php echo base_url('uploads/' . $data->image); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="shopping_image" class="form-control mark_sheet" >
                                            
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Shopping Sub Texts </label>
                                            <textarea id="summernote" name="content"><?=$data->content?></textarea>
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

