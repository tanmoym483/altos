<div class="content-wrapper" style="min-height: 2080.26px;">
<style>
    img {
        display: block;
        max-width: 100%;
    }
    .preview {
        overflow: hidden;
        width: 160px; 
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
    .modal-lg{
        max-width: 1000px !important;
    }
</style>
<div class="container p-4">
    <div class="card p-3">
        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1>Add Fund</h1>
                </div>
            </div>
           
                <?php if ($this->session->flashdata('error') != '') { ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                <?php } ?>
                <?php if ($this->session->flashdata('success') != '') { ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                <?php } ?>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url("users/addcustomerfund") ?>" >
                    
                    <div class="row">
         
                        <input type="hidden" name="userId" value="<?=$_SESSION['userId']?>">
                        <input type="hidden" name="transType" value="deposite">
                        <div class="col-md-3 mb-3">
                            <label class="d-block h-50">Amount <span style="color:#C00">*</span></label>
                            <input type="number" id="amount"  name="amount" class="form-control col-xs-8" placeholder="Amount" required="" >
                        </div>
                       
                        <input type="hidden" name="offer_id" value="" id="offer_id">
                        <div class="col-md-2 mb-3 cashback_input h-50" style="display:none">
                            <label class="d-block ">Cashback Amount <span style="color:#C00">*</span></label>
                            <input type="number"  name="cashback_amount" class="form-control col-xs-8" placeholder="Cashback Amount" id="cashback_amount" >
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label class="d-block h-50">Payment Reference No <span style="color:#C00">*</span></label>
                            <input type="text" name="transRefNo" class="form-control col-xs-8" placeholder="Payment Reference No" required=""><br />
                        </div>
                        <div class="col-md-3 mb-3  image-container">
                            <label>Payment Reference Upload (310px X 200px) <span style="color:#C00">*</span></label>
                            <a href="#" class="image-link" data-fancybox="gallery">
                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                        </a>
                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                            <input type="file" name="transRefDoc" class="form-control transRefDoc"  required="">
                            
                        </div>
                        <?php if (!empty($alloffers)) { ?>
                            <div class="col-md-1 my-3 h-50">
                                <a class="btn btn-yellow blink" id="cashback-btn">Cashback</a>
                            </div>
                        <?php } ?>
                        <div class="col-md-12 mb-3">
                            <input type="checkbox" required name="checked" value="1" >  I agree to the <a href="<?php echo base_url("customer_term_condition") ?>" target="_blank" >Terms & Conditions</a>
                        </div>
                    </div>
                        <div class="tile-footer">
                            <div class="row">
                                <div class="col-md-12 text-left m-1">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                </div>
                            </div>
                        </div>
                    
                </form>
                <div id="cashbackdata-section" style="display:none">
                <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <!-- <th>Select</th> -->
                                        <th>Offer Name</th>
                                        <th>Offer Type</th>
                                        <th>User</th>
                                        <th>From date</th>
                                        <th>To Date</th>
                                        <th>Offer Amount</th>
                                        <th>Cashback </th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Apply Now</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                               
                                    <?php if (!empty($alloffers)) { ?>
                                        <?php foreach ($alloffers as $key => $u) {
                                         $this->db->select('createdAt as created_date')->from('cashback_offer');
                                         $this->db->where('offer_id', $u->id);
                                         $this->db->where('userId', $_SESSION['userId']);
                                         $query = $this->db->get();
                                         $offer = $query->row();
                                        ?>
                                            <tr>
                                               <!-- <td><input type="radio" name="offer_select" value="<?php echo $u->id; ?>"/>Apply</td> -->
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
                                                <td><?php echo ($u->units == 'percentage')?$u->amount.'%':'₹ '.$u->amount; ?></td>
                                                <td><?php echo $u->purpose; ?></td>
                                               <td>
                                               <?php
                                                   if($u->status == 'active')
                                                   echo '<strong class="text-success">'.$u->status.'</strong>';
                                                   if($u->status == 'inactive')
                                                   echo '<strong style="color:#d8a2a8">'.$u->status.'</strong>';?></td>
                                                <td><?php if(date('Y-m-d',strtotime($offer->created_date)) != date('Y-m-d')) {?><a class="btn btn-primary cashback-apply" data-id="<?=$u->id?>">Apply</a><?php } ?></td>
                                              
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                   

                                </tbody>
                            </table>
                </div>
           
        </main>
    </div>
</div>

<style>
    .main-footer{display: none;}
    .blink {
  animation: blink-animation 1s steps(5, start) infinite;
  -webkit-animation: blink-animation 1s steps(5, start) infinite;
}
@keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
@-webkit-keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
.btn-yellow{
    color: #000;
    background-color: #ffc107;
    border-color: #ffc107;
}
</style>