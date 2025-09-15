<div class="content-wrapper" style="min-height: 2080.26px;">
    <div class="container p-4">
        <div class="card p-3">
            <main class="app-content">
                <div class="app-title">
                    <div>
                        <h1>Add Commission</h1>
                    </div>
                </div>
                <form method="post" action="<?php echo base_url('admin/postaddcommision') ?>" enctype="multipart/form-data">
                    <div class="row">
                   
                            <div class="col-md-12 mb-3">
                                <label class="d-block h-25">Associate Designation <span style="color:#C00">*</span></label>
                                <input type="text" class="form-control" name="level_name" placeholder="Associate Designation"  required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="d-block h-25">Associate Target <span style="color:#C00">*</span></label>
                                <input type="text" class="form-control" name="target" placeholder="Associate Target"  required="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="d-block h-25">Associate Commision <span style="color:#C00">*</span></label>
                                <input type="text" class="form-control" name="commision" placeholder="Associate Commision"  required="">
                            </div>
                    
                        <div class="col-md-3 mb-3 mt-3">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                        </div>
                        
                
            </div></form></main>
        </div>
    </div>
</div>