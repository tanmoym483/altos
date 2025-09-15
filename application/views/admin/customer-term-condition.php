<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
   #summernote{
    height:600px;
   } 
   .main-footer{
    display: none;
   }
</style>
<div class="content-wrapper" style="min-height: 2080.26px;">
<div class="container p-4">
    <div class="card p-3">
        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1>Customer terms and condition</h1>
                </div>
            </div>
            <?php if ($this->session->flashdata('error') != '') { ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
            <?php } ?>
            <?php if ($this->session->flashdata('success') != '') { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php } ?>
            
                <form method="post"  action="<?php echo base_url("admin/postpage") ?>" >
                    
                    <div class="row">
                        <input type="hidden" name="page_name" value="Customer Term & Condition" >
                        <input type="hidden" name="page_slug" value="customer-term-condition" >
                        <div style="width:100%; ">
                            <textarea id="summernote" name="content"><?=$content[0]['content']?></textarea>
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



