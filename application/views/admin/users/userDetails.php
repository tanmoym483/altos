<style type="text/css">
    .profile{
  height: 120px;
  width: 120px;
  margin: 0 auto;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  border: 4px solid #fff;
}
</style>
<div class="content-wrapper" style="min-height: 2080.26px;">
    

<div class="container p-3">
  <h6><a style="cursor: pointer;" id="backLink" class="btn btn-primary"> Back</a></h6>
  <div class="row">
    <div class="col-sm-3 text-center">
    <a href="<?php echo base_url('uploads/' .$users['0']->pic); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"> <div class="bg-primary profile rounded-circle" style="background-image: url(<?php echo base_url('uploads/' . $users['0']->pic); ?>);"></div></a>
   <?php if($_SESSION['role']=="superAdmin" || $_SESSION['role']=="admin" || $users['0']->regId == $_SESSION['regId']) { ?><a href="<?php echo base_url('uploads/' . $users['0']->pic); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a><?php } ?>
    </div>
    <div class="col-sm-9">
      <h4><b>PERSONAL DETAILS</b></h4>  
      <div class="card mt-2 rounded"> 
        <ul class="list-group list-group-flush ">
          <li class="list-group-item bg-light ">
            <div class="row">
            <div class="col-sm-4">
              <div class="row form-group mb-0">
              <label for="inputPassword" class="col-sm-12 col-form-label">Member Name</label>
              <div class="col-sm-12">
                <b><?php
                
                echo $users['0']->firstName.' '.(($users['0']->middleName != '')?$users['0']->middleName:'').' '.$users['0']->lastName?></b>
              </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Mobile</label>
                <div class="col-sm-12">
                  <b><?php echo $users['0']->phone ?></b>
                </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Email ID</label>
                <div class="col-sm-12">
                  <b><?php echo $users['0']->email ?></b>
                </div>
              </div>
             </div>
            </div>
          </li>
          <li class="list-group-item bg-light ">
            <div class="row">
            <div class="col-sm-4">
              <div class="row form-group mb-0">
              <label for="inputPassword" class="col-sm-12 col-form-label">Mother's Name </label>
              <div class="col-sm-12">
                <b><?php echo $users['0']->motherName ?></b>
              </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Father's Name</label>
                <div class="col-sm-12">
                  <b><?php echo $users['0']->fatherName ?></b>
                </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Gender</label>
                <div class="col-sm-12">
                  <b><?php echo $users['0']->gender ?></b>
                </div>
              </div>
              </div>
              <div class="col-sm-4">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Birthday</label>
                <div class="col-sm-12">
                  <b><?php echo date('d/m/Y',strtotime($users['0']->birthday)); ?></b>
                </div>
              </div>
             </div>
            </div>
          </li>
          </ul>
      </div>
      <h4 class="mt-4"><b>Documents Details</b></h4>
      <div class="card mt-2 rounded"> 
        <ul class="list-group list-group-flush ">
          <li class="list-group-item bg-light ">
            <div class="row">
            <div class="col-sm-3">
              <div class="row form-group mb-0">
              <label for="inputPassword" class="col-sm-12 col-form-label">PAN No</label>
              <div class="col-sm-12">
                <b><?php echo $users['0']->panNo ?></b>
              </div>
              </div>
             </div>
             <div class="col-sm-3">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">PAN Uploaded Photo</label>
                <div class="col-sm-12">
                  <?php if($users['0']->panDoc != ''){ ?>
                    <?php if($_SESSION['role']=="superAdmin" || $_SESSION['role']=="admin" || $users['0']->regId == $_SESSION['regId']) { ?> <a href="<?php echo base_url('uploads/' . $users['0']->panDoc); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $users['0']->panDoc); ?>"/></a>
                  <a href="<?php echo base_url('uploads/' . $users['0']->panDoc); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a><?php } } ?>
                </div>
              </div>
             </div>
             <div class="col-sm-2">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Addhar No</label>
                <div class="col-sm-12">
                  <b><?php echo $users['0']->addharNo ?></b>
                </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
                  <div class="col-sm-6">
                    <label for="inputPassword" class="col-sm-12 col-form-label"><b>Addhar Front Photo</b></label>
                    <div class="col-sm-12">
                      <div class="">
                      <?php if($_SESSION['role']=="superAdmin" || $_SESSION['role']=="admin" || $users['0']->regId == $_SESSION['regId']){ ?>
                      <?php if($users['0']->addharFrontDoc != ''){ ?>
                      <a href="<?php echo base_url('uploads/' . $users['0']->addharFrontDoc); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $users['0']->addharFrontDoc); ?>"/></a>
                       <a href="<?php echo base_url('uploads/' . $users['0']->addharFrontDoc); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a><?php }}  ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="inputPassword" class="col-sm-12 col-form-label"><b>Addhar Back Photo</b></label>
                    <div class="col-sm-12">
                      <div class="">
                      <?php if($_SESSION['role']=="superAdmin" || $_SESSION['role']=="admin"){ ?>
                      <?php if($users['0']->addharBackDoc != ''){ ?>
                      <a href="<?php echo base_url('uploads/' . $users['0']->addharBackDoc); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $users['0']->addharBackDoc); ?>" /></a>
                       <a href="<?php echo base_url('uploads/' . $users['0']->addharBackDoc); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a><?php } } ?>
                      </div>
                    </div>
                  </div>
              </div>
             </div>
            </div>
          </li>
          <li class="list-group-item bg-light ">
            <div class="row">
            <div class="col-sm-4">
              <div class="row form-group mb-0">
              <label for="inputPassword" class="col-sm-12 col-form-label">Address</label>
              <div class="col-sm-12">
                <b><?php echo $users['0']->address; ?></b>
              </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">City</label>
                <div class="col-sm-12">
                  <b><?php echo $users['0']->city; ?></b>
                </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">District</label>
                <div class="col-sm-12">
                  <b><?php echo $users['0']->district ?></b>
                </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
              <label for="inputPassword" class="col-sm-12 col-form-label">PIN Code</label>
              <div class="col-sm-12">
                <b><?php echo $users['0']->postcode ?></b>
              </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">State</label>
                <div class="col-sm-12">
                  <b><?php echo $users['0']->state ?></b>
                </div>
              </div>
             </div>
            </div>
          </li>
          </ul>
      </div>
      <?php if(count($usercards) > 0) {?>
      <h4 class="mt-4"><b>CARD DETAILS</b></h4>
      <div class="card mt-2 rounded"> 
        <ul class="list-group list-group-flush ">
          <li class="list-group-item bg-light ">
            <div class="row">
            <div class="col-sm-6">
              <div class="row form-group mb-0">
              <label for="inputPassword" class="col-sm-12 col-form-label">Card Number</label>
              <div class="col-sm-12">
                <b><?php echo  $users['0']->cardnumber ?></b>
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
        <?php $i = 1; foreach($usercards as $usercard) {?>
          <h5>Member <?=$i?></h5>
        <ul class="list-group list-group-flush ">
          <li class="list-group-item bg-light ">
            <div class="row">
            <div class="col-sm-3">
              <div class="row form-group mb-0">
              <label for="inputPassword" class="col-sm-12 col-form-label">Name</label>
              <div class="col-sm-12">
                <b><?php echo  $usercard['name'] ?></b>
              </div>
              </div>
             </div>
             <div class="col-sm-3">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Gender</label>
                <div class="col-sm-12">
                  <b><?php echo  $usercard['gender'] ?></b>
                </div>
              </div>
             </div>
             <div class="col-sm-3">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Birthday</label>
                <div class="col-sm-12">
                  <b><?php echo  $usercard['birthday'] ?></b>
                </div>
              </div>
             </div>
             <div class="col-sm-3">
             <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Relation</label>
                <div class="col-sm-12">
                  <b><?php echo  $usercard['relation'] ?></b>
                </div>
              </div>
             </div>
             <?php if($usercard['pancardno'] != ''){?>
             <div class="col-sm-3">
             <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Pancard Number</label>
                <div class="col-sm-12">
                  <b><?php echo  $usercard['pancardno'] ?></b>
                </div>
              </div>
             </div><?php } ?>
             <?php if($_SESSION['role']=="superAdmin" || $_SESSION['role']=="admin" || $users['0']->regId == $_SESSION['regId']) {?>
             <div class="col-sm-3">
             <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Aadhar card front</label>
                <div class="col-sm-12">
                
                <a href="<?php echo base_url('uploads/' . $usercard['adharcardfront']); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $usercard['adharcardfront']); ?>" /></a>
                       <a href="<?php echo base_url('uploads/' . $usercard['adharcardfront']); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a> 
                
               <!-- <a href="<?php  echo base_url('uploads/' . $usercard['adharcardfront']); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $usercard['adharcardfront']); ?>"/></a></b> -->
                </div>
              </div>
             </div>
             <?php } if($_SESSION['role']=="superAdmin" || $_SESSION['role']=="admin" || $users['0']->regId == $_SESSION['regId']) {?>
             <div class="col-sm-3">
             <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Aadhar card back </label>
                <div class="col-sm-12">
                <a href="<?php echo base_url('uploads/' . $usercard['adharcardback']); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $usercard['adharcardback']); ?>" /></a>
                       <a href="<?php echo base_url('uploads/' . $usercard['adharcardback']); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a> 
                  <!-- <b><a href="<?php echo base_url('uploads/' . $usercard['adharcardback']); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $usercard['adharcardback']); ?>"/></a></b> -->
                </div>
              </div>
             </div><?php } ?>
             <?php 
            if($_SESSION['role']=="superAdmin" || $_SESSION['role']=="admin" || $users['0']->regId == $_SESSION['regId'] ) {
             if($usercard['pancard'] != '') { ?>
             <div class="col-sm-3">
             <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Pancard </label>
                <div class="col-sm-12">
                <a href="<?php echo base_url('uploads/' . $usercard['pancard']); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $usercard['pancard']); ?>" /></a>
                       <a href="<?php echo base_url('uploads/' . $usercard['pancard']); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                       </a> 
                  <!--  <b><a href="<?php echo base_url('uploads/' . $usercard['pancard']); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $usercard['pancard']); ?>"/></a></b> -->
                </div>
              </div>
             </div>
             <?php } ?>
             <?php if($usercard['rationcard'] != '') { ?>
             <div class="col-sm-3">
             <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Rationcard </label>
                <div class="col-sm-12">
                <a href="<?php echo base_url('uploads/' . $usercard['rationcard']); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $usercard['rationcard']); ?>" /></a>
                       <a href="<?php echo base_url('uploads/' . $usercard['rationcard']); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                       </a> 
                  <!-- <b><a href="<?php echo base_url('uploads/' . $usercard['rationcard']); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $usercard['rationcard']); ?>"/></a></b> -->
                </div>
              </div>
             </div>
             <?php } ?>
             <?php if($usercard['birthday_certificate'] != '' ) { ?>
             <div class="col-sm-3">
             <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Birthday certificate</label>
                <div class="col-sm-12">
                <a href="<?php echo base_url('uploads/' . $usercard['birthday_certificate']); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $usercard['birthday_certificate']); ?>" /></a>
                       <a href="<?php echo base_url('uploads/' . $usercard['birthday_certificate']); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                       </a> 
                  <!-- <b><a href="<?php echo base_url('uploads/' . $usercard['birthday_certificate']); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $usercard['birthday_certificate']); ?>"/></a></b> -->
                </div>
              </div>
             </div>
             <?php } } ?>
            </div>
          </li>
        </ul><?php $i++; } ?>
      </div>
      <?php } ?>
      <?php if($_SESSION['role']!="vendor") { ?>
      <h4 class="mt-4"><b>NOMINEE DETAILS</b></h4>
      <div class="card mt-2 rounded"> 
        <ul class="list-group list-group-flush ">
          <li class="list-group-item bg-light ">
            <div class="row">
            <div class="col-sm-6">
              <div class="row form-group mb-0">
              <label for="inputPassword" class="col-sm-12 col-form-label">Nominee Name</label>
              <div class="col-sm-12">
                <b><?php echo  $users['0']->nomineeName ?></b>
              </div>
              </div>
             </div>
             <div class="col-sm-6">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Relation with Nominee</label>
                <div class="col-sm-12">
                  <b><?php echo $users['0']->nomineeRelation ?></b>
                </div>
              </div>
             </div>
            </div>
          </li>
          <?php } if($_SESSION['role']=="superAdmin" || $users['0']->regId == $_SESSION['regId']) { ?>
          <li class="list-group-item"><h5><b>BANK DETAILS</b></h5></li>
          <li class="list-group-item bg-light ">
            <div class="row">
            <div class="col-sm-4">
              <div class="row form-group mb-0">
              <label for="inputPassword" class="col-sm-12 col-form-label">IFSC Code</label>
              <div class="col-sm-12">
                <b><?php echo  $users['0']->ifscCode ?></b>
              </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Bank Name</label>
                <div class="col-sm-12">
                  <b><?php echo  $users['0']->bankName ?></b>
                </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">A/C Holder Name</label>
                <div class="col-sm-12">
                  <b><?php echo  $users['0']->accountHolderName ?></b>
                </div>
              </div>
             </div>
            </div>
          </li>
          <li class="list-group-item bg-light ">
            <div class="row">
            <div class="col-sm-4">
              <div class="row form-group mb-0">
              <label for="inputPassword" class="col-sm-12 col-form-label">A/C Type</label>
              <div class="col-sm-12">
                <!--<b><?php echo $users['0']->accountType ?></b>-->
                <?php if($users['0']->accountType=="savings") {?>
                <b>saving</b>
                <?php } ?>
              </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Branch </label>
                <div class="col-sm-12">
                  <b><?php echo $users['0']->branchName ?></b>
                </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">A/C Number</label>
                <div class="col-sm-12">
                  <b><?php echo $users['0']->accountNumber ?></b>
                </div>
              </div>
             </div>
            </div>
          </li>
          <li class="list-group-item bg-light ">
            <div class="row">
            <div class="col-sm-4">
              <div class="row form-group mb-0">
              <label for="inputPassword" class="col-sm-12 col-form-label">Passbook/Cancelled Cheque/Statement Upload</label>
              <div class="col-sm-12">
                <div class="w-50">
                <?php if($_SESSION['role']=="superAdmin" || $users['0']->regId == $_SESSION['regId']){ ?>
                <?php if($users['0']->accountProvedDoc != ''){ ?>
                <a href="<?php echo base_url('uploads/' . $users['0']->accountProvedDoc); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $users['0']->accountProvedDoc); ?>"/></a>
                <a href="<?php echo base_url('uploads/' . $users['0']->accountProvedDoc); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a><?php } } ?>
                </div>
              </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Amount </label>
                <div class="col-sm-12">
                  <b><?php echo $users['0']->amount ?></b>
                </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Payment Reference No</label>
                <div class="col-sm-12">
                  <b><?php echo $users['0']->transRefNo ?></b>
                </div>
              </div>
             </div>
            </div>
          </li>
          <li class="list-group-item bg-light ">
            <div class="row">
            <div class="col-sm-4">
              <div class="row form-group mb-0">
              <label for="inputPassword" class="col-sm-12 col-form-label">Payment Reference Upload</label>
              <div class="col-sm-12">
                <div class="w-50">
                <?php if($_SESSION['role']=="superAdmin" || $users['0']->regId == $_SESSION['regId']){ ?>
                <?php if($users['0']->transRefDoc != ''){ ?>
                <a href="<?php echo base_url('uploads/' . $users['0']->transRefDoc); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $users['0']->transRefDoc); ?>"/></a>
                <a href="<?php echo base_url('uploads/' . $users['0']->transRefDoc); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a><?php } } ?>
                </div>
              </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Signature</label>
                <div class="col-sm-12">
                  <div class="w-50">
                  <?php if($_SESSION['role']=="superAdmin" || $users['0']->regId == $_SESSION['regId']){ ?>
                  <?php if($users['0']->signature != ''){ ?>
                  <a href="<?php echo base_url('uploads/' . $users['0']->signature); ?>" data-toggle="lightbox" data-toggle="lightbox"  data-title="Image caption 1"><img class="img-responsive w-50" src="<?php echo base_url('uploads/' . $users['0']->signature); ?>"/></a>
                  <a href="<?php echo base_url('uploads/' . $users['0']->signature); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a><?php }} ?>
                  </div>
                </div>
              </div>
             </div>
             <div class="col-sm-4">
              <div class="row form-group mb-0">
                <label for="inputPassword" class="col-sm-12 col-form-label">Customar Image</label>
                <div class="col-sm-12">
                  <div class="w-50">
                  <?php if($_SESSION['role']=="superAdmin" || $users['0']->regId == $_SESSION['regId']){ ?>
                  <?php if($users['0']->pic != ''){ ?>
                  <a href="<?php echo base_url('uploads/' . $users['0']->pic); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1"><img  class="img-responsive w-50" src="<?php echo base_url('uploads/' . $users['0']->pic); ?>"/></a>
                  <a href="<?php echo base_url('uploads/' . $users['0']->pic); ?>" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                        </svg>
                                        </a><?php } } ?>
                  </div>
                </div>
              </div>
             </div>
            </div><?php } ?>
          </li>
          </ul>
      </div>
    </div>
  </div>
</div>


</div>