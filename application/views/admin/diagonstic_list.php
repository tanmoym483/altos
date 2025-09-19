<div class="content-wrapper" style="min-height: 2080.26px;">
<div class="card">
        <div class="card-header">
            <!-- <div class="card-title">
                <a class="btn btn-default" href="<?php echo site_url('admin/diagnosticcreate') ?>">Add Diagnostic</a>
            </div> -->
            
        </div>
        <div class="card-body">
                <div class="table-responsive">
                            <table class="table table-bordered" style="font-size:14px">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">SI No</th>
                                        <th style="width: 10px">Date</th>
                                        <th style="width: 15px">Center Reg. NO</th>
                                        
                                        <th>Center Name</th>
                                       
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Progress Status</th> 
                                        <th>Status</th> 
                                       <?php if($_SESSION['role'] == 'vendor'){ ?><th>Reference Id</th><?php } else {?><th>Reference Id</th><th>Action</th><?php } ?>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     
                                    <?php if (!empty($customers)) { ?>
                                        <?php 
                                        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                                        $sno = $customers['row']+1;
                                        foreach ($customers['result'] as $key => $customer) {
                                       
                                        ?>
                                            <tr>
                                                <td> <?php 
                                                        if($page == 0 || $page == 1){
                                                            echo $serial_number = ($page*10)+ $key + 1;
                                                        } else{
                                                            echo $serial_number = (($page-1)*10)+ $key + 1;
                                                        }
                                                        ?>  </td>
                                                <td><?=date('d-m-Y H:i:s',strtotime($customer->createdAt))?></td>
                                                <td><?php echo $customer->regId; ?></td>
                                                <td><?php echo $customer->center_name; ?></td>
                                              
                                                <td><?php echo $customer->email ?></td>
                                                <td><?php echo $customer->phone; ?></td>
                                                <td><?php echo $customer->address.' '.$customer->city.' '.$customer->district.' '.$customer->state.' '.$customer->postcode; ?></td>
                                                <td>
                                                <?php
                                                    if($customer->progress_status == 'processing')
                                                    echo '<strong class="text-warning">'.$customer->progress_status.'</strong>';
                                                    if($customer->progress_status == 'verification')
                                                    echo '<strong class="text-primary">'.$customer->progress_status.'</strong>';
                                                    if($customer->progress_status == 'reject')
                                                    echo '<strong class="text-danger">'.$customer->progress_status.'</strong>';
                                                    if($customer->progress_status == 'approved')
                                                    echo '<strong class="text-success">'.$customer->progress_status.'</strong>';
                                                   ?>
                                                </td>
                                                <td>
                                                <?php
                                                   
                                                   if($customer->status == 'active')
                                                   echo '<strong class="text-success">'.$customer->status.'</strong>';
                                                   if($customer->status == 'inactive')
                                                   echo '<strong class="text-warning">'.$customer->status.'</strong>';?></td>
                                                <!-- <td><?php //echo $customer->status; ?></td> -->
                                                <?php if($_SESSION['role'] != 'vendor'){ ?><td><?=$customer->cregId?></td><?php } ?>
                                                <td><?php if($_SESSION['role'] != 'vendor'){ ?>
                                                <a href="<?=base_url('admin/diagnosticview')?>/<?=$customer->id?>" class="text-primary">View</a>
                                                <?php if($customer->status == 'active'){ ?><a href="<?=base_url('admin/diagnosticdelete')?>/<?=$customer->id?>" class="text-danger"><i class="fa fa-trash"></i></a><?php } else {?><a href="<?=base_url('admin/diagnosticStatus')?>/<?=$customer->id?>" class="text-danger">Active</a><?php } ?>
                                                <?php } else { echo $_SESSION['regId'];} ?>
                                                
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>


                                </tbody>
                            </table>
                            <div style='margin-top: 10px;'>
                                <div class="text-center pagination"><?php if(isset($customers['row']) && $customers['row'] > 0) { echo $customers['pagination']; }?></div>
                            </div>
                            </div>
                            <?php //echo $this->pagination()->create_links(); 
                            ?>
                        </div>
                    </div>
                                        </div>