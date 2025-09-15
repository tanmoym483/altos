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
                                <form action="<?php echo base_url('shopping/postaddonlineOrder') ?>" method="POST"  class="repeater validation-form-message" enctype="multipart/form-data">


                                    <div class="row">
                                       
                                       
                                        <div class="col-md-4 mb-3">
                                            <label>Shop name <span style="color:#C00">*</span></label>
                                            <select class="form-control  shop_name" name="shop" required>
                                                <option value="">Select Shop</option>
                                                <?php foreach($shop as $s) { ?>
                                                    <option value="<?=$s->id?>"><?=$s->center_name?></option>
                                                <?php } ?>
                                            </select>
                                            <!-- <input type="text" name="link" class="form-control col-xs-8" placeholder="link" required=""> -->
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Shop Reg Id <span style="color:#C00">*</span></label>
                                            <input type="text" id="shop_regid" name="link" class="form-control col-xs-8" placeholder="Shop Reg Id" required="" readonly>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Shopping Amount <span style="color:#C00">*</span></label>
                                            <input type="number" name="amount" class="form-control col-xs-8" placeholder="Shopping Amount" required="">
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

