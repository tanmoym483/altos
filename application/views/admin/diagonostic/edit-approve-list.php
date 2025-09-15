<div class="content-wrapper" style="min-height: 2080.26px;">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Approve List</h1>
                </div>
                <div class="col-sm-6">
                
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Approve List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="card">
        <div class="card-header">
        
            <div class="card-title">
           
            </div>
            
        </div>
        <div class="card-body">
                <div class="table-responsive">
                            <div class="input-group input-group-sm" style="width: 250px;     margin-bottom: 15px;">
                                <input type="text" id="myInputTextField" class="form-control float-right" placeholder="Search by Card Number" >
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary" id="inputbtn">
                                        Search
                                    </button>
                                </div>
                            </div>
                            <table class="table table-bordered" id="myTable" style="font-size:14px" data-ordering="false">
                                <thead>
                                    <tr>
                                        
                                        <th>Date</th>
                                        <th>Center Name</th>
                                        
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     
                                    <?php if (!empty($data)) { ?>
                                        <?php 
                                        
                                        foreach ($data as $customer) {
                                        ?>
                                            <tr>
                                            <td><?php echo date('d-m-Y H:i:s',strtotime($customer->ncreatedAt)); ?></td>
                                                
                                              <td> <?=$customer->center_name?></td>
                                              
                                               
                                                <td>
                                                <?php
                                                    if($customer->bank_status == 'processing')
                                                    echo '<strong class="text-warning">'.$customer->bank_status.'</strong>';
                                                    if($customer->bank_status == 'verification')
                                                    echo '<strong class="text-primary">'.$customer->bank_status.'</strong>';
                                                    if($customer->bank_status == 'reject')
                                                    echo '<strong class="text-danger">'.$customer->bank_status.'</strong>';
                                                    if($customer->bank_status == 'approved')
                                                    echo '<strong class="text-success">'.$customer->bank_status.'</strong>';
                                                   ?>   
                                               </td>
                                                
                                                <!-- <td><?php //echo $customer->status; ?></td> -->

                                                <td>
                                                
                                                <a href="<?=site_url('diagonostic/edit_approve_view')?>/<?=$customer->id?>"> View </a>
                                               
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>


                                </tbody>
                            </table>
                            
                            </div>
                            <?php //echo $this->pagination()->create_links(); 
                            ?>
                        </div>
                    </div>
                                        </div>