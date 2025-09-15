<div class="content-wrapper" style="min-height: 2080.26px;">
<div class="card">
        <div class="card-header">
            <!-- <div class="card-title">
                <a class="btn btn-default" href="<?php echo site_url('admin/admincreate') ?>">Add Sub Admin</a>
            </div> -->
            
        </div>
        <div class="card-body">
                <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">SI No</th>
                                        <th style="width: 10px">Reg. NO</th>
                                        
                                        <th>Name</th>
                                       
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        
                                       <th>Status</th> 
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     
                                    <?php if (!empty($customers)) { ?>
                                        <?php 
                                        $sno = $customers['row']+1;
                                        foreach ($customers['result'] as $key => $customer) {
                                       
                                        ?>
                                            <tr><td><?=$key+1?></td>
                                                <td><?php echo $customer->regId; ?></td>
                                                <td><?php echo $customer->firstName . ' ' . $customer->middleName . ' ' . $customer->lastName; ?></td>
                                              
                                                <td><?php echo $customer->email ?></td>
                                                <td><?php echo $customer->phone; ?></td>
                                                <td><?php echo ucfirst($customer->status); ?></td>
                                                <!-- <td><?php //echo $customer->status; ?></td> -->

                                                <td><?php if($customer->status == 'active'){ ?><a href="<?=base_url('admin/adminedit')?>/<?=$customer->id?>" class="text-danger"><i class="fa fa-pen"></i></a>
                                                <a href="<?=base_url('admin/userdelete')?>/<?=$customer->id?>" class="text-danger"><i class="fa fa-trash"></i></a><?php } ?>
                                                
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>


                                </tbody>
                            </table>
                            <div style='margin-top: 10px;'>
                                <div class="text-right pagination"><?php if(isset($customers['pagination'])) { echo $customers['pagination']; } ?></div>
                            </div>
                            </div>
                            <?php //echo $this->pagination()->create_links(); 
                            ?>
                        </div>
                    </div>
                                        </div>