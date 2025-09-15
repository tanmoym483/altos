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
                    <h1>Settings</h1>
                </div>
            </div>
            <?php if ($this->session->flashdata('error') != '') { ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
            <?php } ?>
            <?php if ($this->session->flashdata('success') != '') { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php } ?>
            
                <form method="post"  action="<?php echo base_url("admin/postsetting") ?>" >
                    <h6>Customer Bonus</h6>
                    <div class="row">
         
                        <input type="hidden" name="user_type" value="customer">
                        <input type="hidden" name="transaction_type" value="bonus">
                        
                        <div class="col-md-3 mb-3">
                            <label class="d-block h-50">Per month bonus %<span style="color:#C00">*</span></label>
                            <input type="number"  name="per_month" class="form-control col-xs-8" value="<?=$setting[0]['per_month']?>" required="" >
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="d-block h-50">Per year bonus %<span style="color:#C00">*</span></label>
                            <input type="number"  name="per_year" class="form-control col-xs-8"  value="<?=$setting[0]['per_year']?>" required="" >
                        </div>
                        
                    </div>
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



