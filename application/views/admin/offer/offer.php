<div class="content-wrapper" style="min-height: 2080.26px;">



<div class="container-fluid p-4">
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
    <?php if ($_SESSION['role'] != "vendor" && $_SESSION['role'] != "customer") { ?>
    <div class="card p-3">
        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1>Add Offer</h1>
                </div>
            </div>
            <form method="post" action="<?php echo base_url('offer/postaddoffer') ?>" enctype="multipart/form-data" class="validation-form-message">
                <div class="row">
                        <div class=" col-md-3 mb-3">
                            <label class="d-block h-50">Offer Name <span style="color:#C00">*</span></label>
                            <input type="text" class="form-control" name="offer_name" placeholder="Name" required="">
                        </div>
                        <div class=" col-md-3 mb-3">
                            <label class="d-block h-50">Offer Type <span style="color:#C00">*</span></label>
                            <select class="form-control col-xs-8" name="offer_type" required="">
                                <option value="">Select Type</option>
                                <option value="Add Wallet">Add Wallet</option>
                                <option value="Health Card">Health Card</option>
                                <option value="Diagonostic">Diagonostic</option>
                                <option value="Bank CSP">Bank CSP</option> 
                            </select>
                        </div>
                    <div class="col-md-3 mb-3">
                        <label class="d-block h-50">From Date <span style="color:#C00">*</span></label>
                        <input type="text" name="from_date" class="form-control date col-xs-8" placeholder="mm/dd/yyyy" readonly required="">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="d-block h-50">To Date <span style="color:#C00">*</span></label>
                        <input type="text" name="to_date" class="form-control date col-xs-8" placeholder="mm/dd/yyyy" readonly required="">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="d-block h-25">Offer Amount <span style="color:#C00">*</span></label>
                        <input type="text" name="offer_amount" class="form-control col-xs-8" placeholder="Amount" required="">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="d-block h-25">Cashback Amount <span style="color:#C00">*</span></label>
                        <input type="text" name="amount" class="form-control col-xs-8" placeholder="Amount" required="">
                    </div>
                    
                    <div class="col-md-1 mb-3">
                        <label class="d-block h-25 ">Units <span style="color:#C00">*</span></label>
                        <select class="form-control" name="units" required="">
                            <option value="percentage">%</option>
                            <option value="rupess">Rs.</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="d-block h-25 ">User Type <span style="color:#C00">*</span></label>
                        <select class="form-control" name="user_type" required="">
                            <option value="all">All</option>
                            <option value="customer">Card Member</option>
                            <option value="vendor">Franchiase</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="d-block h-25 ">Description </label>
                        <textarea name="purpose" class="form-control" placeholder="Description"></textarea>
                        
                    </div>
                    <div class="col-md-3 mb-3">
                    <label class="d-block h-25" style="opacity:0">Description </label>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                    </div>
                    
            </form>
        </main>
    </div><?php } ?>
</div>


        <div class="container-fluid p-4">
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
                                        <th>Action</th>
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
                                               <td><?php if($u->status == 'active') { ?><a href="<?=base_url('offer/delete')?>/<?=$u->id?>" onclick="return checkDelete()" class="text-danger"><i class="fa fa-trash"></i></a><?php } ?></td>
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
<script type="text/javascript">
function checkDelete(){
  //  return confirm('Are you sure?');
    if (confirm("Are you sure?")) {
    return true;
  } else {
    return false;
  }
}
</script>