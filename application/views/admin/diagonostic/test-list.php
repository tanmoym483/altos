<div class="content-wrapper" style="min-height: 2080.26px;">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Test List</h1>
                </div>
                <div class="col-sm-6">
                
                <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('diagonostic/report_list'); ?>" id="backbtn" style="display:none" class="btn btn-primary">Back</a></li>
                        
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
                                        <th>Sl No.</th>
                                        <th>Date</th>
                                        <th>Card Number</th>
                                        <th>Name</th>
                                        <th>Center Name</th>
                                        <th>Center Code</th>
                                        <th>Doctor Name</th>
                                       
                                        <th>Amount</th>
                                        
                                        <th>Status</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     
                                    <?php if (!empty($data)) { ?>
                                        <?php 
                                        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                                        foreach ($data as $key=>$customer) {
                                       if($customer->cardId == 0 ){
                                        $name = $customer->firstName. ' '.$customer->middleName. ' '. $customer->lastName;
                                        $phone_number = $customer->uphone;
                                       } else {
                                        $name = $customer->name;
                                        $phone_number = $customer->ucphone;
                                       }
                                       $amount = $customer->total_amount;
                                      
                                    
                     
                                        ?>
                                            <tr>
                                            <td> 
                                                    <?php 
                                                        if($page == 0 || $page == 1){
                                                            echo $serial_number = ($page*10)+ $key + 1;
                                                        } else{
                                                            echo $serial_number = (($page-1)*10)+ $key + 1;
                                                        }
                                                        ?>  
                                                </td>
                                            <td><?php echo date('d-m-Y H:i:s',strtotime($customer->date)); ?></td>
                                                <td><?php echo $customer->cardnumber; ?></td>
                                                
                                                <td><?php echo $name; ?></td>
                                              <td> <?=$customer->center_name?></td>
                                              <td><?=$customer->cregId?></td>
                                                <td><?php echo $customer->doctor_name ?></td>
                                                
                                                <td><?php echo ($customer->amount_with_gst != '')?$customer->amount_with_gst:$customer->total_amount; ?></td>
                                                
                                               
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
                                                <td>
                                                <?php
                                                    if($customer->payment_status == 'on emi')
                                                    echo '<strong class="text-warning">'.$customer->payment_status.'</strong>';
                                                   
                                                    if($customer->payment_status == 'nonpaid')
                                                    echo '<strong class="text-danger">'.$customer->payment_status.'</strong>';
                                                    if($customer->payment_status == 'paid' || $customer->payment_status == 'full payment')
                                                    echo '<strong class="text-success">'.$customer->payment_status.'</strong>';
                                                    ?>    
                                               </td>
                                                
                                                <!-- <td><?php //echo $customer->status; ?></td> -->

                                                <td>
                                                <?php if($customer->status == 'processing' || $_SESSION['role'] == 'superAdmin') { ?><a href="<?=site_url('diagonostic/report_edit')?>/<?=$customer->did?>" >Edit</a><?php } ?>
                                                <a href="<?=site_url('diagonostic/report_view')?>/<?=$customer->did?>"> View </a>
                                               
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