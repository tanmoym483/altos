<div class="content-wrapper">
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    
                
                <?php if($user['0']->pic != null) {?>  
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo base_url('uploads/' . $user['0']->pic); ?>"
                       alt="User profile picture">
                <?php } ?>
                </div>

                <h3 class="profile-username text-center"><?=$usermember->center_name?></h3>
                
                <p class="text-muted text-center"><?php if($this->session->userdata('role') != 'vendor' && $this->session->userdata('role') != 'customer') { echo ucfirst($this->session->userdata('role')); } if($this->session->userdata('role') == 'vendor') { echo 'Franchise'; } if($this->session->userdata('role') == 'customer') { echo 'Card Member'; }  ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <?php if($this->session->userdata('role') == 'diagonstic') {?>
                    <li class="list-group-item">
                      <b>Owner name</b> <a class="float-right"><?=$_SESSION['firstName']?> <?=$this->session->userdata('lastName')?></a>
                    </li>
                  <?php } ?>
                 
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right" ><?=$_SESSION['email']?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Username</b> <a class="float-right"><?=$_SESSION['regId']?></a>
                  </li>
                  <?php if($this->session->userdata('role') != 'diagonstic') {?>
                    <li class="list-group-item">
                      <b>Cardnumber</b> <a class="float-right"><?=$user['0']->cardnumber?></a>
                    </li>
                  
                    <li class="list-group-item">
                      <b>Birthday</b> <a class="float-right"><?=($user['0']->birthday != '')? date('d M Y',strtotime($user['0']->birthday)):''?></a>
                    </li>
                  <?php } ?>
                </ul>

               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php if($this->session->userdata('role') == 'diagonstic') {?>
                
            <?php } else { ?>
              <strong><i class="fas fa-money-check mr-1"></i> Wallet</strong>

                <p class="text-muted">
               <?=$user['0']->wallet?>
                </p><hr>
            <?php } ?>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                <a style="cursor:pointer" class="text-primary location-edit"><i class="fa fa-pen" data-id="<?=$_SESSION['userId']?>"></i></a>
                <p class="text-muted">
                <?=$user['0']->address.' '.$user['0']->city.' '.$user['0']->district.' '.$user['0']->state.' '.$user['0']->postcode?>
                </p>
                <div id="location-edit-section" style="display:none">
                  <form method="post" class="row" enctype="multipart/form-data" action="<?php echo base_url('profile/locationChange') ?>">
                      <div class="col-md-6 mb-3">
                          <label>Address<span style="color:#C00">*</span></label>
                          <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?=$user['0']->address?>" required="">
                      </div>
                      
                      <div class="col-md-6 mb-3">
                          <label>City <span style="color:#C00">*</span></label>
                          <input placeholder="City" type="text" name="city" class="form-control" value="<?=$user['0']->city?>" required="">
                      </div>
                      <div class="col-md-12 mb-3">
                          <label>District <span style="color:#C00">*</span></label>
                          <select class="form-control" name="district" required>
                              <option value="">Select District</option>
                              <?php foreach($districtlist as $district){?>
                              <option value="<?=$district?>" <?php echo ($users[0]->district == $district)?'selected':'';?> ><?=$district?></option>
                              <?php } ?>
                          </select>
                      </div>
                      <div class="col-md-4 mb-3">
                          <label>PIN Code <span style="color:#C00">*</span></label>
                          <input name="postcode" placeholder="PIN Code" type="number" value="<?=$user['0']->postcode?>" maxlength="10" id="typePasswordX" oninput="postcodeDynamic()" class="form-control" required="">
                      </div>
                      <div class="col-md-4 mb-3">
                          <label>State <span style="color:#C00">*</span></label>
                          <input placeholder="State" type="text" name="state" value="<?=$user['0']->state?>" id="state" class="form-control" required="" readonly>
                      </div>
                      <div class="col-md-12 mb-6">
                          <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                      </div>
                  </form>
                </div>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Mobile </strong>
                <a style="cursor:pointer" class="text-primary mobile-edit"><i class="fa fa-pen" data-id="<?=$_SESSION['userId']?>"></i></a>
                <p class="text-muted">
                  <?=$user['0']->phone?><br>
                  <?=$usermember->phone_number?>
                </p>
                <div id="mobile-edit-section" style="display:none">
                  <form method="post" class="row" enctype="multipart/form-data" action="<?php echo base_url('profile/mobileChange') ?>">
                      <div class="col-md-12 mb-3">
                          <label>Phone <span style="color:#C00">*</span></label>
                          <input type="text" name="phone" class="form-control" value="<?=$user['0']->phone?>" required="">
                      </div> 
                      <?php if($this->session->userdata('role') == 'diagonstic') {?><div class="col-md-12 mb-3">
                          <label>Another Phone <span style="color:#C00">*</span></label>
                          <input type="text" name="phone_number" class="form-control" value="<?=$usermember->phone_number?>" >
                      </div> <?php } ?>
                      <div class="col-md-12 mb-6">
                        <label style="opacity:0">Center Image<span style="color:#C00">*</span></label>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                      </div>          
                  </form>
                </div>
                

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                <?php if($this->session->userdata('role') != 'diagonstic') {?><li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">My Card</a></li><?php } ?>
                <?php if($this->session->userdata('role') == 'diagonstic') {?><li class="nav-item"><a class="nav-link active" href="#image" data-toggle="tab">Center Image</a></li><?php } ?>
                  <?php if ($_SESSION['role'] == "vendor"  ) { ?><li class="nav-item"><a class="nav-link" href="#certificate" data-toggle="tab">Certificate</a></li>
                    <li class="nav-item"><a class="nav-link" href="#vistingcard" data-toggle="tab">Visting Card</a></li>
                    <?php }?>
                    <li class="nav-item"><a class="nav-link" href="#bankdetails" data-toggle="tab">Change Bank Details</a></li>
                  <li class="nav-item"><a class="nav-link " href="#settings" data-toggle="tab">Edit</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                <div class="<?php if($this->session->userdata('role') == 'diagonstic') {?>active<?php } ?> tab-pane" id="image" style="text-align:center;">
                <div class="mb-3" style="display:inline">
                    <?php foreach($gallery as $g){?>
                      <a href="<?php echo base_url('uploads/' . $g->gallery); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1" width="150px" height="150px"><img class="img-responsive w-img galleryimage-<?=$g->id?>" src="<?php echo base_url('uploads/' . $g->gallery); ?>"/></a>
                      <a href="<?=base_url('profile/imgdelete')?>/<?=$g->id?>" class="text-danger" ><i class="fa fa-trash"></i></a>
                          <a style="cursor:pointer" class="text-primary image-edit" ><i class="fa fa-pen" data-id="<?=$g->id?>"></i></a>
                          <div class="edit-<?=$g->id?>" style="display:none;">
                          <form method="post" enctype="multipart/form-data" action="<?php echo base_url('profile/imgedit') ?>" >
                          <input type="hidden" name="id" value="<?=$g->id?>">
                          <div class="col-md-4 mb-3 image-container">
                            <label>Center Image<span style="color:#C00">*</span></label>
                            <a href="#" class="image-link" data-fancybox="gallery">
                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                        </a>
                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                            <input type="file" name="center_image" class="form-control votercard" >
                          
                        </div>
                        <div class="col-md-2 mb-6">
                          <label style="opacity:0">Center Image<span style="color:#C00">*</span></label>
                          <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit</button>
                        </div>
                        </form>
                        </div>
                      <?php } ?>

                  </div>
                       <?php if(count($gallery) < 5 ){?>
                        <form method="post" class="row" enctype="multipart/form-data" action="<?php echo base_url('profile/imgadd') ?>" >
                         
                          <div class="col-md-4 mb-3 image-container">
                            <label>Center Image<span style="color:#C00">*</span></label>
                            <a href="#" class="image-link" data-fancybox="gallery">
                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                        </a>
                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                            <input type="file" name="center_image" class="form-control votercard" >
                          
                          </div>
                          <div class="col-md-12 mb-6">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>
                          </div>
                        </form>
                       <?php } ?> 
                     
                      <!-- <div class="col-sm-6">
                       
                        <div id="capturebackDiv">
                          <img src="https://aponjontrust.stoxbiniyog.in/uploads/card-back.jpeg" alt="card-back">
                          <div class="card-blue-section">Member Id:  <?=$user['0']->cardnumber?> (<?=$_SESSION['firstName']?> <?=$user['0']->middleName?> <?=$this->session->userdata('lastName')?>)</div>
                        </div> -->
                        
                      
                  </div>
                  <div class="<?php if($this->session->userdata('role') != 'diagonstic') {?>active<?php } ?> tab-pane" id="activity">
                    <div class="text-right">
                      <button id="downloadBtn" class="btn btn-primary mb-3" >Download</button>
                      <button id="printBtn" class="btn btn-primary mb-3" >Print</button>
                    </div>
                   
                      <!-- Post -->
                      
                      
                        
                        <div id="capturefrontDiv" class="col-lg-12">
                          <div class="row">
                            <div class="col-lg-6">
                              <img src="<?=base_url('assets/images/card-front-new.jpeg')?>" alt="card-front">
                              <div class="card-blue-section">Member Id:  <?=$user['0']->cardnumber?> <span style="font-size:13px">(<?=$_SESSION['firstName']?> <?=$user['0']->middleName?> <?=$this->session->userdata('lastName')?>)</span></div>
                            </div>
                            <div class="col-lg-6">
                              <img src="<?=base_url('assets/images/card-back.jpeg')?>" alt="card-back">
                              <div class="card-blue-section">Member Id:  <?=$user['0']->cardnumber?> <span style="font-size:13px">(<?=$_SESSION['firstName']?> <?=$user['0']->middleName?> <?=$this->session->userdata('lastName')?>)</span></div>
                            </div>
                          </div>
                        </div>
                        
                     
                      <!-- <div class="col-sm-6">
                       
                        <div id="capturebackDiv">
                          <img src="https://aponjontrust.stoxbiniyog.in/uploads/card-back.jpeg" alt="card-back">
                          <div class="card-blue-section">Member Id:  <?=$user['0']->cardnumber?> (<?=$_SESSION['firstName']?> <?=$user['0']->middleName?> <?=$this->session->userdata('lastName')?>)</div>
                        </div> -->
                        
                      
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="certificate">
                  <div class="text-right">
                      <a href="<?=base_url('profile/generate')?>" target="_blank" class="btn btn-primary mb-3" >Download</a>
                      <a href="<?=base_url('profile/generate')?>" target="_blank" class="btn btn-primary mb-3" >Print</a>
                    </div>
                    <!-- <a href="<?=base_url('profile/generate')?>" target="_blank" class="btn btn-primary mb-3" >Download</a> -->
                   <?php 
                    $imagePath = base_url('assets/images/blank_certificate_new.jpeg');

                    // Check if the file exists and convert it to Base64
                    if (file_exists($imagePath)) {
                        $imageData = base64_encode(file_get_contents($imagePath));
                        $backgroundImage = 'data:image/jpg;base64,' . $imageData;
                    } else {
                        $backgroundImage = ''; // Fallback if the image is not found
                    }
                    $name = $user['0']->firstName. ' '. $user['0']->middleName. ' '. $user['0']->lastName;
                    $address = $user['0']->address. ' '. $user['0']->city. ' '. $user['0']->district. ' <br>'. $user['0']->state. ' '. $user['0']->postcode;
                    $date = date('d/m/Y',strtotime('+1 year', strtotime($user['0']->createdAt)));
                    $regId = $user['0']->regId;
                    echo $html =<<<EOD
                   <div style=" width: 100%; height: 1000px; position: relative; background-image: url('$imagePath');
                   background-size: cover;
                   background-position: center;"> 
                    <div style="float:right; width:87%; margin-top: 330px;padding-top: 20px; position: relative;">
                        
                        
                        <p style="font-size: 16px; width:90%; ">This is to certify that <strong>$name</strong></p>
                        <p style="font-size: 16px;">It is quantified that C/o Mr./Mrs./Ms. <strong>$name</strong></p>
                        <p style="font-size: 16px; line-height:30px">Address:-  <strong>$address</strong></p>
                      
                        <p style="font-size: 16px;"> is authorized to sell Health Card, All types of Medicines, Ayurvedic Medicines, 
                        Essential Products, FMCG, Bank CSP, Online & Offline Affiliate, Agricultural Products and Personal <br>Care by Apanjon Trust Franchise as per Company Rules.
                        </p>
                       <p style="font-size: 16px; color:red" >* This distributor will comply with all state government laws.</p>
                       <p style="font-size: 16px;" >Valid Upto <strong>$date</strong> Validity</p>
                       <p style="font-size: 16px;" >Distributor Id <strong>$regId</strong></p>
                    </div></div>
                  EOD;
                   
                   ?>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="vistingcard">
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="bankdetails">
                      <div class="row"> 
                            <div class="col-md-4 mb-3">
                                <label>IFSC Code </label>
                                <input type="text" class="form-control" name="ifscCode" placeholder="IFSC Code" readonly value="<?=$userbank[0]->ifscCode?>" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Bank Name </label>
                                <input type="text" class="form-control" name="bankName" placeholder="Bank Name"  readonly value="<?=$userbank[0]->bankName?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Branch </label>
                                <input type="text" name="branchName" class="form-control" placeholder="Branch" readonly value="<?=$userbank[0]->branchName?>">
                            </div>
                            <br>

                            <div class="col-md-4 mb-3">
                                <label>A/C Type </label>
                                <select class="form-control" readonly name="accountType">
                                    <option>Select</option>
                                    <option value="current" <?=($userbank[0]->accountType == 'current')?'selected':''?> >Current</option>
                                    <option value="savings" <?=($userbank[0]->accountType == 'savings')?'selected':''?>>saving</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>A/C Holder Name </label>
                                <input type="text" name="accountHolderName" class="form-control" id="accountHolderName" readonly placeholder="A/C Holder Name" value="<?=$userbank[0]->accountHolderName?>">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>A/C Number </label>
                                <input type="text" name="accountNumber" class="form-control" placeholder="A/C Number" readonly value="<?=$userbank[0]->accountNumber?>">
                            </div>


                            <div class="col-md-4 mb-3 image-container">
                                <label>Passbook/Cancelled Cheque/Statement Upload (310px X 200px) </label>
                                <a href="<?php echo base_url('uploads/' . $userbank['0']->accountProvedDoc); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1"><img class="img-responsive w-img" src="<?php echo base_url('uploads/' . $userbank['0']->accountProvedDoc); ?>"/></a>
                                    <a href="<?php echo base_url('uploads/' . $userbank['0']->accountProvedDoc); ?>" download>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                        <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z" />
                                    </svg>
                                    </a>
                                
                                <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                
                            </div>
                      </div>
                      <?php if (!empty($newbankDetails)) { ?>
                      <table class="table table-bordered exportable"  style="font-size:13px" >
                                <thead>
                                    <tr>
                                        
                                        <th>Date</th>
                                        <th>Bank Name</th>
                                        <th>IFSC Code</th>
                                        <th>Branch Name</th>
                                        <th>Account Number</th>
                                        <th>Account Holder Name</th>
                                        <th>Update Reason</th>
                                        <th>Bank Status</th>
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     
                                    
                                        <?php 
                                        
                                        foreach ($newbankDetails as $customer) {
                                        ?>
                                            <tr>
                                            <td><?php echo date('d-m-Y H:i:s',strtotime($customer->createdAt)); ?></td>
                                                
                                              <td> <?=$customer->bankName?></td>
                                              <td> <?=$customer->ifscCode?></td>
                                              <td> <?=$customer->branchName?></td>
                                              <td> <?=$customer->accountNumber?></td>
                                              <td> <?=$customer->accountHolderName?></td>
                                              <td> <?=$customer->purpose?></td>
                                               
                                                <td>
                                                <?php
                                                    if($customer->status == 'processing')
                                                    echo '<strong class="text-warning">'.$customer->status.'</strong>';
                                                    if($customer->status == 'verification')
                                                    echo '<strong class="text-primary">'.$customer->status.'</strong>';
                                                    if($customer->status == 'reject')
                                                    echo '<strong class="text-danger">'.$customer->status.'</strong>';
                                                    if($customer->status == 'approved')
                                                    echo '<strong class="text-success">'.$customer->status.'</strong>';
                                                   ?>   
                                               </td>
                                                
                                                <!-- <td><?php //echo $customer->status; ?></td> -->

                                                
                                            </tr>
                                        <?php } ?>
                                    


                                </tbody>
                            </table><?php } ?>
                        <a id="bank_edit_button" class="btn btn-primary">Edit</a>
                          <div id="bank-edit-section" style="display:none">
                            <form method="post" class="row" enctype="multipart/form-data" action="<?php echo base_url('profile/bankdetailedit') ?>">
                                <div class="col-md-4 mb-3">
                                    <label>IFSC Code <span style="color:#C00">*</span></label>
                                    <input type="text" class="form-control" name="ifscCode" placeholder="IFSC Code" required="" oninput="ifcscode()" id="ifcscodeId">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Bank Name <span style="color:#C00">*</span></label>
                                    <input type="text" class="form-control" name="bankName" placeholder="Bank Name" id="bankName" required="">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Branch <span style="color:#C00">*</span></label>
                                    <input type="text" name="branchName" id="branchName" class="form-control" placeholder="Branch" required="">
                                </div>
                                <br>

                                <div class="col-md-4 mb-3">
                                    <label>A/C Type <span style="color:#C00">*</span></label>
                                    <select class="form-control" name="accountType">
                                        <option>Select</option>
                                        <option value="current">Current</option>
                                        <option value="savings">Savings </option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>A/C Holder Name <span style="color:#C00">*</span></label>
                                    <input type="text" name="accountHolderName" class="form-control" id="accountHolderName" placeholder="A/C Holder Name" required="">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>A/C Number <span style="color:#C00">*</span></label>
                                    <input type="text" name="accountNumber" class="form-control" placeholder="A/C Number" required="">
                                </div>


                                <div class="col-md-4 mb-3 image-container">
                                    <label>Passbook/Cancelled Cheque/Statement Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                    <a href="#" class="image-link" data-fancybox="gallery">
                                                    <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                </a>
                                    <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                    <input type="file" name="accountProvedDoc" class="form-control accountProvedDoc"   required="">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Purpose <span style="color:#C00">*</span></label>
                                    <textarea class="form-control" placeholder="Purpose" name="purpose" required=""></textarea>
                                    
                                </div>
                                <div class="col-md-12 mb-6">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                </div>
                              </form>
                            </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                  <?php if($this->session->userdata('role') == 'diagonstic') {?>
                    <form class="form-horizontal" method="post" action="<?php echo base_url('profile/userdetailedit') ?>">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Center Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="center_name" value="<?=$usermember->center_name?>" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" value="<?=$_SESSION['email']?>" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Purpose</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="reason" id="inputExperience" placeholder="Purpose"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                    <?php } ?>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <style>
    .email-text{
        width: 75%;
        text-overflow: ellipsis;
        overflow: hidden;
    }
    #capturefrontDiv,#capturebackDiv {
            width: 100%;
            text-align: center;
        }
        img {
            max-width: 100%;
        }
        .card-blue-section{
          background:#0800fe;
          color:#fff;
          font-size:18px;
          font-weight:600;
          padding:3px;
         
        }
 </style> 
<script>
      document.getElementById('downloadBtn').addEventListener('click', function () {
          html2canvas(document.getElementById('capturefrontDiv')).then(canvas => {
              // Convert the canvas to a data URL and create a download link
              const link = document.createElement('a');
              link.download = 'card-front.png';
              link.href = canvas.toDataURL('image/png');
              link.click();
          });
          // html2canvas(document.getElementById('capturebackDiv')).then(canvas => {
          //     // Convert the canvas to a data URL and create a download link
          //     const link = document.createElement('a');
          //     link.download = 'card-back.png';
          //     link.href = canvas.toDataURL('image/png');
          //     link.click();
          // });
      });
      document.getElementById('printBtn').addEventListener('click', function () {
            html2canvas(document.getElementById('capturefrontDiv')).then(canvas => {
                // Convert the canvas to a data URL
                const imgData = canvas.toDataURL('image/png');

                // Open the image in a new window for printing
                const printWindow = window.open('', '_blank');
                printWindow.document.write('<html><head><title>Print Div</title></head><body>');
                printWindow.document.write('<img src="' + imgData + '" onload="window.print(); window.close();">');
                printWindow.document.write('</body></html>');
                printWindow.document.close();
            });
            
        });
      // document.getElementById('bdownloadBtn').addEventListener('click', function () {
          
      // });
</script>
<style>
   .w-img{
            width:200px;
            height:200px;
            margin-bottom: 20px;
            margin-right: 20px;
            display: inline;
        }
</style>