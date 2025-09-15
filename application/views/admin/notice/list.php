<div class="content-wrapper" style="min-height: 2080.26px;">

<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Notice list</h1>
                </div>
                <div class="col-sm-6">
                    
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Notice List</li>
                    </ol>
                   
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

<div class="container-fluid px-4 pb-0 pt-4">
    <?php if(isset($_GET['search'])){ ?> 
        
        <h6><a href="<?php echo site_url('admin/pincodelist'); ?>" class="btn btn-primary"> Back</a></h6>
    <?php }?>
   
    
</div>


        <div class="container-fluid px-4 pt-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="<?php echo base_url('notice/add') ?>" class="btn btn-primary mb-3">Add</a>
                            <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Date</th>
                                        <th>Notice</th>
                                        <th>User </th>
                                        <th>User Reg Id</th>
                                       
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                              
                                   
                                        <?php 
                                         $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                                        foreach ($result as $key => $u) {
                                       
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
                                                <td><?php echo date('d-m-Y H:i:s',strtotime($u->createdAt)); ?></td>
                                                <td><?php echo $u->notice; ?></td>
                                              
                                                <td>
                                                <?php if( $u->user_type == 'customer'){
                                                echo 'Card Member';
                                                }
                                                 ?>
                                                 <?php if( $u->user_type == 'vendor'){
                                                echo 'Franchaise';
                                                }
                                                 ?>
                                                 <?php if( $u->user_type == 'all'){
                                                echo 'All';
                                                }
                                                 ?>
                                                 <?php if( $u->user_type == 'specific person'){
                                                echo $u->firstName.' '.$u->middleName.' '.$u->lastName;
                                                }
                                                 ?>
                                                
                                                </td>
                                                <td><?php
                                                if( $u->user_type == 'specific person'){
                                               echo $u->regId;
                                                }
                                                ?></td>
                                               
                                               <td>
                                               <?php
                                                   
                                                   if($u->status == 'active')
                                                   echo '<strong class="text-success">'.$u->status.'</strong>';
                                                   if($u->status == 'inactive')
                                                   echo '<strong style="color:#d8a2a8">'.$u->status.'</strong>';?></td>
                                                <td><?php if($u->status == 'active') { ?><a href="<?=base_url('notice/delete')?>/<?=$u->id?>" onclick="return checkDelete()" class="text-danger"><i class="fa fa-trash"></i></a><?php } ?></td>
                                              
                                            </tr>
                                        <?php } ?>
                                  
                                    

                                </tbody>
                            </table>
                            </div>
                            <div style='margin-top: 10px;'>
                                <?php if(isset($pagination)) { echo $pagination; }?>
                            </div>
                        </div>
                       
                    </div>
                    <!-- /.card -->


                </div>

            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    
   
</div>