<div class="content-wrapper" style="min-height: 2080.26px;">
<div class="container">
  <div class="row">
      <div class="col-sm-12 card m-3 p-4">
      <main class="app-content">
  <div class="app-title">
    <div>
      <h1> Change Password</h1>
    </div>
   
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
          <div class="tile-body">
          <br/><br/>
         
          <div class="form-group row">
            <label class="control-label col-md-3">Current Password</label>
            <div class="col-md-8">
              <input class="form-control col-md-8" type="text" name="old_password" placeholder="Old Password" required>
            </div>
          </div>
         
          <div class="form-group row">
            <label class="control-label col-md-3">New Password</label>
            <div class="col-md-8">
              <input class="form-control col-md-8" type="text" name="new_password" placeholder="New Password" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Confirm Password</label>
            <div class="col-md-8">
              <input class="form-control col-md-8" type="text" name="confirm_password" placeholder="Confirm Password" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3"></label>
            <div class="col-md-8">
            <div class="tile-footer">
            <div class="row">
              <div class="col-md-8 col-md-offset-3">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                <a class="btn btn-secondary" href="<?=base_url('users/dashboard')?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a> </div>
            </div>
          </div>
      </div>
            </div>
          </div>
		  
      </form>
    </div>
  </div>
</main>
      </div>
  </div>
</div>

</div>
