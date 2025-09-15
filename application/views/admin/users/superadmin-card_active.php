<div class="content-wrapper" style="min-height: 2080.26px;">
<style>
    img {
        display: block;
        max-width: 100%;
    }
    .preview {
        overflow: hidden;
        width: 160px; 
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
    .modal-lg{
        max-width: 1000px !important;
    }
</style>
<div class="container p-4">
    <div class="card p-3">
        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1>Activate Card</h1>
                </div>
            </div>
           
                <?php if ($this->session->flashdata('error') != '') { ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                <?php } ?>
                <?php if ($this->session->flashdata('success') != '') { ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                <?php } ?>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url("users/postadmincardactive") ?>" >
                    
                    <div class="row">
         
                       
                        <input type="hidden" name="transType" value="card_active">
                        <div class="col-md-3 mb-3">
                            <label class="d-block h-50">Card Number <span style="color:#C00">*</span></label>
                            <input type="text"  name="card_number" class="form-control col-xs-8" placeholder="Card Number" id="admin_carnumber" required="" >
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="d-block h-50">Amount <span style="color:#C00">*</span></label>
                            <input type="text"  name="amount" value="599" class="form-control col-xs-8" placeholder="Amount" readonly required="" >
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="d-block h-50">Payment From <span style="color:#C00">*</span></label>
                            <select class="form-control" name="payment_form" id="payment_form_admin"  required="">
                                <option value="own_wallet">card member wallet</option>
                                <option value="franchaise_wallet">franchaise wallet</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3" style="display:none;" id="regid">
                            <label class="d-block h-50">Franchaise RegId <span style="color:#C00">*</span></label>
                            <input type="text"  name="f_regid" class="form-control col-xs-8" placeholder="Franchaise RegId"  >
                        </div>
  
                    </div>
                    <div id="card-details"></div>
                        <div class="tile-footer">
                            <div class="row">
                                <div class="col-md-12 text-left m-1">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                </div>
                            </div>
                        </div>
                    
                </form>
           
           
        </main>
    </div>
</div>

<style>
    .main-footer{display: none;}
</style>
