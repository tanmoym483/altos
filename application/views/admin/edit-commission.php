<div class="content-wrapper" style="min-height: 2080.26px;">
    <div class="container p-4">
        <div class="card p-3">
            <main class="app-content">
                <div class="app-title">
                    <div>
                        <h1>Edit Commission</h1>
                    </div>
                </div>
                <form method="post" action="<?php echo base_url('admin/posteditcommision') ?>" enctype="multipart/form-data">
                    <div class="row">
                    <input type="hidden" name="commision_id" value="<?=$commision[0]->id?>">
                            <div class="col-md-12 mb-3">
                                <label class="d-block h-25">Associate Designation <span style="color:#C00">*</span></label>
                                <input type="text" class="form-control" name="level_name" placeholder="Associate Designation" value="<?=$commision[0]->level_name?>" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="d-block h-25">Associate Target <span style="color:#C00">*</span></label>
                                <input type="text" class="form-control" name="target" placeholder="Associate Target" value="<?=$commision[0]->target?>" required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="d-block h-25">Associate Commision <span style="color:#C00">*</span></label>
                                <input type="text" class="form-control" name="commision" placeholder="Associate Commision" value="<?=$commision[0]->commision?>" required="">
                            </div>
                    
                        <div class="col-md-3 mb-3 mt-3">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                        </div>
                        
                
            </div></form></main>
        </div>
    </div>
</div>