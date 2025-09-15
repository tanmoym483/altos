<div class="content-wrapper" style="min-height: 2080.26px;">
    

<div class="container ">
  <h6><a style="cursor: pointer;" id="backLink" class="btn btn-primary"> Back</a></h6>
  <div class="row">
    
    <div class="col-sm-12">
      <h4 class="mt-4"><b>CARD DETAILS</b></h4>
      <div class="card mt-2 rounded"> 
        <ul class="list-group list-group-flush ">
          <li class="list-group-item bg-light ">
            <div class="row">
            <div class="col-sm-6">
              <div class="row form-group mb-0">
              <label for="inputPassword" class="col-sm-12 col-form-label">Card Number</label>
              <div class="col-sm-12">
                <b><?php echo  $users->cardnumber ?></b>
              </div>
              </div>
             </div>
             <div class="col-sm-6">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Card Type</label>
                <div class="col-sm-12">
                  <b>Sliver</b>
                </div>
              </div>
             </div>
            </div>
          </li>
        </ul>
        <hr>
        
        <ul class="list-group list-group-flush ">
          <li class="list-group-item bg-light ">
            <div class="row">
            <div class="col-sm-3">
              <div class="row form-group mb-0">
              <label for="inputPassword" class="col-sm-12 col-form-label">Name</label>
              <div class="col-sm-12">
                <b><?php echo  $usercard->name; ?></b>
              </div>
              </div>
             </div>
             <div class="col-sm-3">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Gender</label>
                <div class="col-sm-12">
                  <b><?php echo  $usercard->gender ?></b>
                </div>
              </div>
             </div>
             <div class="col-sm-3">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Birthday</label>
                <div class="col-sm-12">
                  <b><?php echo  $usercard->birthday ?></b>
                </div>
              </div>
             </div>
             <div class="col-sm-3">
             <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Relation</label>
                <div class="col-sm-12">
                  <b><?php echo  $usercard->relation ?></b>
                </div>
              </div>
             </div>
             <?php if($usercard->pancardno != ''){?>
             <div class="col-sm-3">
             <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Pancard Number</label>
                <div class="col-sm-12">
                  <b><?php echo  $usercard->pancardno ?></b>
                </div>
              </div>
             </div><?php } ?>
            
             <div class="col-sm-3">
             <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Aadhar card front</label>
                <div class="col-sm-12">
                
                <a href="<?php echo base_url('uploads/' . $usercard->adharcardfront); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $usercard->adharcardfront); ?>" /></a>
                       <a href="<?php echo base_url('uploads/' . $usercard->adharcardfront); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a> 
                
               
                </div>
              </div>
             </div>
            
             <div class="col-sm-3">
             <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Aadhar card back </label>
                <div class="col-sm-12">
                <a href="<?php echo base_url('uploads/' . $usercard->adharcardback); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $usercard->adharcardback); ?>" /></a>
                       <a href="<?php echo base_url('uploads/' . $usercard->adharcardback); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a> 
                 
                </div>
              </div>
             </div>
             <?php
             if($usercard->pancard != '') { ?>
             <div class="col-sm-3">
             <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Pancard </label>
                <div class="col-sm-12">
                <a href="<?php echo base_url('uploads/' . $usercard->pancard); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $usercard->pancard); ?>" /></a>
                       <a href="<?php echo base_url('uploads/' . $usercard->pancard); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                       </a> 
                  
                </div>
              </div>
             </div>
             <?php } ?>
             <?php if($usercard->rationcard != '') { ?>
             <div class="col-sm-3">
             <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Rationcard </label>
                <div class="col-sm-12">
                <a href="<?php echo base_url('uploads/' . $usercard->rationcard); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $usercard->rationcard); ?>" /></a>
                       <a href="<?php echo base_url('uploads/' . $usercard->rationcard); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                       </a> 
                 
                </div>
              </div>
             </div>
             <?php } ?>
             <?php if($usercard->birthday_certificate != '' ) { ?>
             <div class="col-sm-3">
             <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Birthday certificate</label>
                <div class="col-sm-12">
                <a href="<?php echo base_url('uploads/' . $usercard->birthday_certificate); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $usercard->birthday_certificate); ?>" /></a>
                       <a href="<?php echo base_url('uploads/' . $usercard->birthday_certificate); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                       </a> 
                 
                </div>
              </div>
             </div>
             <?php }  ?>
            </div>
          </li>
        </ul>
      </div>
    </div>
             </div></div>
      