<div class="content-wrapper" style="min-height: 2080.26px;">
    <div class="container p-4">
        <div class="card p-3">
            <main class="app-content">
                <div class="app-title">
                    <div>
                        <h1>Add Service</h1>
                    </div>
                </div>
                <form method="post" action="<?php echo base_url('admin/posteditservice') ?>" enctype="multipart/form-data">
                    <div class="row">
                            <input type="hidden" name="service_id" value="<?=$service->id?>">
                            <div class="col-md-12 mb-3">
                                <label class="d-block h-25">Service name <span style="color:#C00">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Name" required="" value="<?=$service->name?>">
                            </div>
   
                        <div class="col-md-3 mb-3 mt-3">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                        </div>
                        
                
            </div></form></main>
        </div>
    </div>
</div>