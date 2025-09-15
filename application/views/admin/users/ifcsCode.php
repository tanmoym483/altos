<div class="content-wrapper" style="min-height: 2080.26px;">


<div class="container p-4">
<?php if($search != ''){ ?> 
    
    <h6><a href="<?php echo site_url('admin/ifcsCodeView'); ?>" class="btn btn-primary" >Back</a></h6>
<?php }?>
    <div class="card p-3">
        <form method="post">
            <div  class="row">
                <div class="col-md-6">
                <input type="text" name="search" class="form-control" placeholder="IFSC COde" value="<?=$search?>">
                    </div>
                    <div class="col-md-3">
                <input type="submit" value="search" class="btn btn-primary">
                    </div>
            </div>
        </form>
    </div>
    <div class="card p-3">
        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1>Add Bank IFSC Code</h1>
                </div>
            </div>
            <form method="post" action="<?php echo base_url('admin/addIfccode') ?>" enctype="multipart/form-data">
                <div class="row">
                        <div class=" col-md-3 mb-3">
                            <label class="d-block h-50">IFSC Code <span style="color:#C00">*</span></label>
                            <input type="text" class="form-control" name="ifsc" placeholder="ifsc" required="">
                        </div>
     
                    <div class="col-md-3 mb-3">
                        <label class="d-block h-50">Branch</label>
                        <input type="text" name="branch" class="form-control col-xs-8" placeholder="Branch" required="">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="d-block h-50">Bank Name</label>
                        <input type="text" name="bank_name" class="form-control col-xs-8" placeholder="Bank Name" required="">
                    </div>
                    <div class="col-md-3 mb-3">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                    </div>
                    
            </form>
        </main>
    </div>
</div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">SL.NO</th>
                                        
                                        <th>IFCS Code</th>

                                        <th>Branch</th>

                                        <th>Bank Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if (!empty($users)) { ?>
                                        <?php foreach ($users['result'] as $key => $u) {
                                       
                                        ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $u->ifsc; ?></td>
                                                <td><?php echo $u->branch; ?></td>
                                                <td><?php echo $u->bank_name; ?>
                                                </td>

                                               
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>


                                </tbody>
                            </table>
                            <div style='margin-top: 10px;'>
                                <div class="text-center pagination"><?php if(isset($users['pagination'])) { echo $users['pagination']; }?></div>
                            </div>
                            </div>
                            <?php //echo $this->pagination()->create_links(); 
                            ?>
                        </div>
                       
                    </div>
                    <!-- /.card -->


                </div>

            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    


<!-- <label for="sitescreen">Organization</label>
<select id="sitescreen" class="chosen-select" name="sitescreen">
  <option id="norange" class="level_global" value="All">All Mass.Gov</option>
  <?php foreach($users as $user) { ?> 
    <option value="DAxBERKSHIREx "><?php echo $user->pincode ?></option>
    <?php } ?>
</select>
<button class="btn btn-success">Search</button>
<div id="asce">

</div> -->
  </div>