<div class="content-wrapper" style="min-height: 2080.26px;">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product list</h1>
                </div>
                <div class="col-sm-6">
                    
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Product List</li>
                    </ol>
                   
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="card">
        <div class="card-header row">
                <div class="col-lg-12">
                    <?php if($_SESSION['role']=='offline_shop' || $_SESSION['role']=='superAdmin' ) {?>
                    <div class="card-title mb-3">
                        <a class="btn btn-primary" href="<?php echo site_url('shopping/product_add') ?>">Add Product</a>
                    </div> 
                    <?php } ?>
                </div>
                <div class="col-lg-10">
                    <!-- <form method="get"> 
                        <div class="row">
                            
                            
                            
                            <div class="col-md-2">
                                <div class="input-group input-group-sm" >
                                    
                                    <select class="form-control" name="district_search" >
                                            <option value="">Select District</option>
                                            <?php foreach($districtlist as $district){?>
                                            <option value="<?=$district?>" <?php echo ($_GET['district_search']== $district)?'selected':'';?>><?=$district?></option>
                                            <?php } ?>
                                        </select>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="input-group input-group-sm" >
                                        <input type="text" name="pincode_search" class="form-control" placeholder="Pincode Search" value="<?=(isset($_GET['pincode_search'])?$_GET['pincode_search']:'')?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group input-group-sm" >
                                    <select class="form-control" name="state_search" >
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
                                   
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
                    </form> -->
                </div>
                <div class="p-2 col-lg-2 text-right">
                        <!-- <button type="button" class="btn btn-custom saveAsExcel"> <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                            </svg> Excel </button> -->
                </div>
            </div>
            
        
        <div class="card-body">
                <div class="table-responsive">
                            <table class="table table-bordered" style="font-size:14px">
                                <thead>
                                    <tr>
                                        <th>SI No</th>
                                        <th>Date</th>
                                        <?php if($_SESSION['role'] != 'offline_shop'){ ?>
                                        <th>Owner Reg Id</th>
                                        <th>Owner Name</th>
                                        <?php } ?>
                                        <th>Title</th>
                                        <th>Model</th>
                                        <th>Brand</th>
                                        <th>MRP Price</th>
                                        <th>Selling Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     
                                    <?php 
                                    
                                    if (!empty($result)) { ?>
                                        <?php 
                                        $page = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
                                        
                                        foreach ($result as $key => $customer) {
                                       
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
                                                <?php if($_SESSION['role'] != 'offline_shop'){ ?>
                                                <td><?php echo $customer->regId; ?></td>
                                               
                                                
                                              
                                                <td><?php echo $customer->firstName.' '.$customer->middleName.' '.$customer->lastName ?></td>
                                                <?php } ?>
                                                <td><?=$customer->product?></td>
                                                <td><?php echo $customer->product_model; ?></td>
                                                <td><?php echo $customer->product_brand; ?></td>
                                                <td><?php echo $customer->product_mrp; ?></td>
                                                
                                                <td><?php echo $customer->product_selling_price; ?></td>
                                                <td><?php
                                                   
                                                   if($customer->status == 'active')
                                                   echo '<strong class="text-success">'.$customer->status.'</strong>';
                                                   if($customer->status == 'inactive')
                                                   echo '<strong class="text-warning">'.$customer->status.'</strong>';?></td>
                                               
                                               
                                                <td>
                                                <!-- <a href="<?=base_url('shopping/shopview')?>/<?=$customer->id?>" class="text-primary">View</a> -->
                                                <?php if($customer->status == 'active'){ ?><a href="<?=base_url('shopping/productdelete')?>/<?=$customer->id?>" class="text-danger"><i class="fa fa-trash"></i></a><?php } ?>
                                                
                                                <a href="<?=base_url('shopping/product_edit')?>/<?=$customer->id?>" class="text-primary">Edit</a>
                                                
                                                <!-- <td><?php //echo $customer->status; ?></td> -->
                                               
                                               
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>


                                </tbody>
                            </table>
                            <div style='margin-top: 10px;'>
                                <div class="text-center pagination"><?php if(isset($pagination)) { echo $pagination; }?></div>
                            </div>
                            </div>
                            <?php //echo $this->pagination()->create_links(); 
                            ?>
                        </div>
                    </div>
                                        </div>