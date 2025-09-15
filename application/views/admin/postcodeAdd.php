<div class="content-wrapper" style="min-height: 2080.26px;">



<div class="container p-4">
<?php if(isset($_GET['search'])){ ?> 
    
    <h6><a href="<?php echo site_url('admin/pincodelist'); ?>" class="btn btn-primary"> Back</a></h6>
<?php }?>
<div class="card p-3">

<form method="get">
    <div  class="row">
        <div class="col-md-4">
            <input type="Number" name="search" class="form-control" placeholder="Pincode" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; }?>">
        </div>
        <div class="col-md-4">
        <input type="text" name="district" class="form-control" placeholder="District" value="<?php if(isset($_GET['district'])){ echo $_GET['district']; }?>">
        </div>
        <div class="col-md-4">
          <input type="submit" value="search" class="btn btn-primary">
        </div>
    </div>
</form></div>
    <div class="card p-3">
        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1>Add PinCode</h1>
                </div>
            </div>
            <form method="post" action="<?php echo base_url('admin/addpincode') ?>" enctype="multipart/form-data">
                <div class="row">
                        <div class=" col-md-3 mb-3">
                            <label class="d-block h-50">State <span style="color:#C00">*</span></label>
                            <input type="text" class="form-control" name="state" placeholder="State" required="">
                        </div>
     
                    <div class="col-md-3 mb-3">
                        <label class="d-block h-50">District <span style="color:#C00">*</span></label>
                        <input type="text" name="district" class="form-control col-xs-8" placeholder="District" required="">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="d-block h-50">Pincode <span style="color:#C00">*</span></label>
                        <input type="number" name="pincode" class="form-control col-xs-8" placeholder="Pincode" required="">
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
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">SL.NO</th>
                                        
                                        <th>State</th>

                                        <th>Disticts</th>

                                        <th>Pincode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if (!empty($users)) { ?>
                                        <?php foreach ($users['result'] as $key => $u) {
                                       
                                        ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $u->state; ?></td>
                                                <td><?php echo $u->district; ?></td>
                                                <td><?php echo $u->pincode; ?>
                                                </td>

                                               
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>


                                </tbody>
                            </table>
                            </div>
                            <div style='margin-top: 10px;'>
                                <div class="text-center pagination"><?php if(isset($users['pagination'])) { echo $users['pagination']; }?></div>
                            </div>
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