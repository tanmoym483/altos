<div class="content-wrapper" style="min-height: 2080.26px;">



<div class="container-fluid px-4 pb-0 pt-4">
    <?php if(isset($_GET['search'])){ ?> 
        
        <h6><a href="<?php echo site_url('admin/pincodelist'); ?>" class="btn btn-primary"> Back</a></h6>
    <?php }?>
    <div class="card p-3">

        <form method="get">
            <div  class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Offer name" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; }?>">
                </div>
                
                <div class="col-md-4">
                <input type="submit" value="search" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
    
</div>


        <div class="container-fluid px-4 pt-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Name</th>
                                        <th>Offer Type</th>
                                        <th>User</th>
                                        <th>From date</th>
                                        <th>To Date</th>
                                        <th>Offer </th>
                                        <th>Cashback </th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if ($_SESSION['role'] != "customer") { ?>
                                    <?php if (!empty($data)) { ?>
                                        <?php 
                                         $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                                        foreach ($data['result'] as $key => $u) {
                                       
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
                                                <td><?php echo $u->name; ?></td>
                                                <td><?php echo $u->offer_type; ?></td>
                                                <td>
                                                <?php if( $u->user_type == 'customer' || $u->user_type == 'all'){
                                                echo 'Card Member';
                                                }
                                                 ?>
                                                
                                                </td>
                                                <td><?php echo $u->from_date; ?></td>
                                                <td><?php echo $u->to_date; ?>
                                                </td>
                                                <td><?php echo $u->offer_amount; ?></td>
                                                <td><?php echo $u->amount.' '.$u->units; ?></td>
                                                <td><?php echo $u->purpose; ?></td>
                                               <td>
                                               <?php
                                                   
                                                   if($u->status == 'active')
                                                   echo '<strong class="text-success">'.$u->status.'</strong>';
                                                   if($u->status == 'inactive')
                                                   echo '<strong style="color:#d8a2a8">'.$u->status.'</strong>';?></td>
                                              
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php }?>

                                </tbody>
                            </table>
                            </div>
                            <div style='margin-top: 10px;'>
                                <div class="text-center pagination"><?php if(isset($data['pagination'])) { echo $data['pagination']; }?></div>
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