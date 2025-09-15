<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">
                                <h5>Add Product</h5>
                            <?php if ($this->session->flashdata('error') != '') { ?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('success') != '') { ?>
                                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                            <?php } ?>
                                <form action="<?php echo base_url('shopping/postaddofflineProductupdate') ?>" method="POST"  class="repeater validation-form-message" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?=$data->id?>">
                                <div class="col-md-12 mb-3" >
                                    <div class="row">
                                       <?php if($_SESSION['role'] == 'superAdmin'){ ?>
                                        <div class="col-md-4 mb-3">
                                            <label>Shop name <span style="color:#C00">*</span></label>
                                            <input type="text"  name="shop" class="form-control col-xs-8" placeholder="Shop " required="" readonly value="<?=$shopdetails->center_name?>">
                                            <!-- <input type="text" name="link" class="form-control col-xs-8" placeholder="link" required=""> -->
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Shop Reg Id <span style="color:#C00">*</span></label>
                                            <input type="text"  name="link" class="form-control col-xs-8" placeholder="Shop Reg Id" required="" readonly value="<?=$shopdetails->regId?>">
                                        </div>
                                        <?php }  ?>
                                        <input type="hidden" name="shop_id"  value="<?=$data->shop_id?>">
                                        <div class="row">
                                            <div class="form-outline mb-4 col-sm-3">
                                                <label class="text-left">Product Type <span class="text-danger">*</span></label>
                                                <select class="form-control testName" name="test_name[0][product_category]" required >
                                                    <option>Select Product type</option>
                                                    <?php foreach($products as $p){?>
                                                        <option value="<?=$p['id']?>" <?php if($p['id'] == $data->product_category){ ?>selected<?php } ?> ><?=$p['test_category']?></option>
                                                    <?php } ?>
                                                </select></div>
                                                <div class="form-outline mb-4 col-sm-3">
                                                    <label class="text-left">Product Title <span class="text-danger">*</span></label>
                                                    <input type="text"  class="form-control" name="test_name[0][product]" required  value="<?=$data->product?>"/>
                                                </div>
                                                <div class="form-outline mb-4 col-sm-3"><label class="text-left">Product Brand <span class="text-danger">*</span></label><input type="text"  class="form-control" name="test_name[0][product_brand]" required value="<?=$data->product_brand?>" /></div>
                                                <div class="form-outline mb-4 col-sm-3"><label class="text-left">Product Model <span class="text-danger">*</span></label><input type="text"  class="form-control" name="test_name[0][product_model]" required value="<?=$data->product_model?>" /></div>
                                                <div class="form-outline mb-4 col-sm-3"><label class="text-left">Net Quantity <span class="text-danger">*</span></label><input type="text"  class="form-control" name="test_name[0][net_quantity]" required value="<?=$data->net_quantity?>" /></div>
                                                <div class="form-outline mb-4 col-sm-3"><label class="text-left">Expired Month <span class="text-danger">*</span></label><input type="month"  class="form-control" name="test_name[0][expired_month]" required value="<?=$data->expired_month?>" /></div>
                                                <div class="form-outline mb-4 col-sm-3"><label class="text-left">MRP Price <span class="text-danger">*</span></label><input type="number"  class="form-control mrp_amount" name="test_name[0][product_mrp]" required value="<?=$data->product_mrp?>" /></div
                                                ><div class="col-md-2 mb-3">
                                                    <label>Quantity <span style="color:#C00">*</span></label>
                                                <select class="form-control" name="test_name[0][quantity]" required="">
                                                    <option value="Piece" <?php if($data->quantity == 'Piece'){ ?>selected<?php } ?> >Piece</option>
                                                    <option value="gm" <?php if($data->quantity == 'gm'){ ?>selected<?php } ?>>GM</option>
                                                    <option value="kg" <?php if($data->quantity == 'kg'){ ?>selected<?php } ?>>KG</option>
                                                    <option value="lt" <?php if($data->quantity == 'lt'){ ?>selected<?php } ?>>Lt</option>
                                                </select></div>
                                                <div class="form-outline mb-4 col-sm-3"><label class="text-left">Special Offer <span class="text-danger">*</span></label><input type="number"  class="form-control offer_amount" name="test_name[0][product_offer]" required value="<?=$data->product_offer?>" /></div>
                                                <div class="col-md-1 mb-3"><label>Units <span style="color:#C00">*</span></label><select class="form-control units" name="test_name[0][units]" required=""><option value="percentage" <?=($test['units'] == 'percentage')?'selected':''?>>%</option>
                                                            <option value="rupee" <?=($test['units'] == 'rupee')?'selected':''?> >Rs.</option></select></div>
                                                <div class="form-outline mb-4 col-sm-3"><label class="text-left">Selling Price <span class="text-danger">*</span></label><input type="number"  class="form-control selling_amount" name="test_name[0][product_selling_price]" value="<?=$data->product_selling_price?>" required /></div>
                                                <div class="col-md-4 mb-3 image-container"><label>Product image <span style="color:#C00">*</span></label>
                                                <a href="<?php echo base_url('uploads/' . $data->product_image); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $data->product_image); ?>"/></a>
                                                <a href="<?php echo base_url('uploads/' . $data->product_image); ?>" download>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                    <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                                </svg>
                                                </a>
                                                <a href="#" class="image-link custom-link" data-fancybox="gallery"><img src="" alt="Image Preview" class="image-preview" style="display:none;"></a><input type="file" class="form-control user_adharfront"  name="test_name[0][product_image]" ></div><div class="form-outline mb-4 col-sm-3"><label class="text-left">Description <span class="text-danger">*</span></label><textarea  class="form-control" name="test_name[0][description]" required ><?=$data->description?></textarea></div>
                
                                        <div class="mb-6 col-md-12">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
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

<style>
    .custom-link{
        bottom:auto;
        top:27px;
    }
</style>
<!-- end image -->

