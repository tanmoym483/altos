<div class="content-wrapper" style="min-height: 2080.26px;">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer list</h1>
                </div>
                <div class="col-sm-6">
                    <?php if(!isset($_GET['card_search'])){ ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Card Member list</li>
                    </ol>
                    <?php } else { ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/vendorcustomer'); ?>" class="btn btn-primary" >Back</a></li>
                        
                    </ol> 
                    <?php } ?>
                </div>
            </div>
        </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
    <div class="col-sm-12">
    <div class="card">
        <div class="card-header row">
            
                
            <div class="col-lg-10">
                <form method="get"> 
                    <div class="row">
                        
                        
                        
                        <div class="col-md-5">
                            <div class="input-group input-group-sm" >
                                <input type="text" name="card_search" class="form-control float-right" value="<?=(isset($_GET['card_search'])?$_GET['card_search']:'')?>" placeholder="Card number Search">
                            </div>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="input-group input-group-sm" >
                                    <input type="text" name="email_search" class="form-control" placeholder="Email Search" value="<?=(isset($_GET['email_search'])?$_GET['email_search']:'')?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-2 text-right">
                <button type="button" class="btn btn-custom saveAsExcel"> <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                        </svg> Excel </button>
            </div>
            
        </div> 
       
        <div class="card-body">
        <div class="table-responsive">
                            <table class="table table-bordered" style="font-size:14px;">
                                <thead>
                                    <tr>
                                    <th style="width: 10px">SI No</th>
                                        <th style="width: 10px">Card No.</th>
                                        <th>Name</th>
                                        <th>Created By</th>
                                        <th style="width: 10px">Email</th>
                                        <th>Phone</th>
                                        
                                        <th>Address</th>
                                        <th>DOB</th>
                                        <th>Pancard</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     
                                    <?php if (!empty($customerlist)) { ?>
                                        <?php 
                                        //$sno = $customers['row']+1;
                                        foreach ($customerlist['result'] as $key => $customer) {
                                       
                                        ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $customer->cardnumber; ?></td>
                                                <td><?php echo $customer->firstName.' '.$customer->lastName.'<br>'.$customer->regId; ?></td>
                                                <td><?php echo $customer->vfirstName.' '.$customer->vlastName.'<br>'.$customer->vregId ?></td>
                                                <td><?php echo $customer->email ?></td>
                                                <td><?php echo $customer->phone; ?></td>
                                                <td><?php echo $customer->address.' '.$customer->city.' '.$customer->district.' '.$customer->state.' '.$customer->postcode; ?></td>
                                                <td><?php echo date('d/m/Y',strtotime($customer->birthday)); ?></td>
                                                <td><?php echo $customer->panNo; ?></td>
                                                <td> <?php
                                                   
                                                   if($customer->card_status == 'active')
                                                   echo '<strong class="text-success">'.$customer->card_status.'</strong>';
                                                   if($customer->card_status == 'inactive')
                                                   echo '<strong style="color:red">'.$customer->card_status.'</strong>';?></td>
                                                <td><?php if($customer->card_status == 'inactive'){ ?><a href="<?=base_url('admin/customer_edit')?>/<?=$customer->id?>"><i class="fa fa-pen"></i></a><?php } else {?><a href="<?=base_url('user-details')?>/<?=$customer->id?>"><i class="fa fa-eye"></i></a><?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>


                                </tbody>
                            </table>
                            <div style='margin-top: 10px;'>
                                <div class="text-center pagination"><?php if(isset($customerlist['pagination'])) { echo $customerlist['pagination']; }?></div>
                            </div>
                            <table id="mytable" style="display:none;">
                                <thead>
                                    <tr>
                                    <th style="width: 10px">SI No</th>
                                        <th style="width: 10px">Card No.</th>
                                        <th>Name</th>
                                        <th>Created By</th>
                                        <th style="width: 10px">Email</th>
                                        <th>Phone</th>
                                        
                                        <th>Address</th>
                                        <th>DOB</th>
                                        <th>Pancard</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     
                                    <?php if (!empty($customerlist)) { ?>
                                        <?php 
                                        //$sno = $customers['row']+1;
                                        foreach ($customerlist['allcustomers'] as $key => $customer) {
                                       
                                        ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $customer->cardnumber; ?></td>
                                                <td><?php echo $customer->firstName.' '.$customer->lastName.'<br>'.$customer->regId; ?></td>
                                                <td><?php echo $customer->vfirstName.' '.$customer->vlastName.'<br>'.$customer->vregId ?></td>
                                                <td><?php echo $customer->email ?></td>
                                                <td><?php echo $customer->phone; ?></td>
                                                <td><?php echo $customer->address.' '.$customer->city.' '.$customer->district.' '.$customer->state.' '.$customer->postcode; ?></td>
                                                <td><?php echo date('d/m/Y',strtotime($customer->birthday)); ?></td>
                                                <td><?php echo $customer->panNo; ?></td>
                                                <td> <?php
                                                   
                                                   if($customer->card_status == 'active')
                                                   echo '<strong class="text-success">'.$customer->card_status.'</strong>';
                                                   if($customer->card_status == 'inactive')
                                                   echo '<strong class="text-danger">'.$customer->card_status.'</strong>';?></td>
                                                <td><?php if($customer->card_status == 'inactive'){ ?><a href="<?=base_url('admin/customer_edit')?>/<?=$customer->id?>"><i class="fa fa-pen"></i></a><?php } else {?><a href="<?=base_url('user-details')?>/<?=$customer->id?>"><i class="fa fa-eye"></i></a><?php } ?>
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
    </div>
                                        </div>