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
                    <h1>Fund Transfer</h1>
                </div>
            </div>
            <!-- <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link  btn btn-primary mr-3" id="introducerfundbtn" href="javascript:void(0)">Franchise Fund</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary " href="javascript:void(0)" id="customerfundbtn">Customer Fund</a>
                </li>
               
            </ul> -->
            <div id="introducerfund" style="display:none;">
               
               
            </div>
            <div id="customerfund" > 
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url("users/postaddfund") ?>">
                    <div class="row">
                    <div class="col-md-12 mb-3" id="customer_wallet_amount"></div>
                    
                        <div class="col-md-3 mb-3">
                            <label class="d-block h-50">Customer card number <span style="color:#C00">*</span></label>
                            <input type="text" name="customer_code" class="form-control col-xs-8" placeholder="Customer card number" required="" id="customercode" oninput="vregintrFunction()" required="">
                        </div>
                        <?php if ($_SESSION['role'] === "superAdmin") { ?>
                            <div class="col-md-3 mb-3" id="franchaise_code" style="display:none">
                                <label class="d-block h-50">Franchise code <span style="color:#C00">*</span></label>
                                <input type="text" class="form-control" name="introducer_code" placeholder="Introducer code" id="vsopnsercode"  required="">
                            </div>
        
                            
                        <?php } ?>

                        <input type="hidden" name="transType" value="deposite" >
                        <div class="col-md-3 mb-3">
                            <label class="d-block h-50">Amount <span style="color:#C00">*</span></label>
                            <input type="text"  name="amount" class="form-control col-xs-8" placeholder="Amount" id="amount" required="" >
                        </div>
                        <?php if ($_SESSION['role'] === "vendor") { ?>
                            <input type="hidden" name="offer_id" value="" id="offer_id">
                            <div class="col-md-2 mb-3 h-50 cashback_input" style="display:none">
                                <label class="d-block ">Cashback Amount <span style="color:#C00">*</span></label>
                                <input type="number"  name="cashback_amount" class="form-control col-xs-8" placeholder="Cashback Amount" id="cashback_amount" >
                            </div>
                        <?php } ?>
                        <div class="col-md-3 mb-3">
                            <label class="d-block h-50">Type <span style="color:#C00">*</span></label>
                            <select class="form-control" name="paymenttype" id="paymenttype_method">
                                <option value="direct_payment">Customer wallet</option>
                                <option value="franchise_payment" >Franchise wallet payment</option>
                            </select>
                            <!-- <input type="text"  name="amount" class="form-control col-xs-8" placeholder="Amount" required="" > -->
                        </div>
                        <div class="col-md-3 mb-3" id="payment_reference">
                            <label class="d-block h-50">Payment Reference No <span style="color:#C00">*</span></label>
                            <input type="text" name="transRefNo" class="form-control col-xs-8" placeholder="Payment Reference No" ><br />
                        </div>
                        <!-- <div class="col-md-3 mb-3" >
                            <label class="d-block h-50">Payment Reference Upload (310px X 200px) <span style="color:#C00">*</span></label>
                            <input type="file" name="transRefDoc"  class="form-control col-xs-8 " value="" id="upload_image" >
                            <input type="text" name="transRefDocs" class="form-control col-xs-8"  id="upload_imagess" style="display:none">
                            <input type="hidden" name="transRefDoc" id="transRefDocId">
                        </div> -->
                        <div class="col-md-4 mb-3 h-50  image-container" id="payment_file">
                            <label>Payment Reference Upload (310px X 200px) <span style="color:#C00">*</span></label>
                            <a href="#" class="image-link" data-fancybox="gallery">
                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                        </a>
                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                            <input type="file" name="transRefDoc" class="form-control transRefDoc" >
                            
                        </div>
                        <?php if ($_SESSION['role'] === "vendor" && !empty($alloffers)) { ?>
                            <div class="col-md-1 my-3">
                                <a class="btn btn-yellow blink" id="cashback-btn">Cashback</a>
                            </div>
                        <?php } ?>
                        <div id="hoccena"></div>
                        <input type="hidden" name="vuserId" value="" id="vuserId">
                        <input type="hidden" name="cuserId" value="" id="cuserId">
                        <div class="tile-footer col-md-12">
                            <div class="row">
                                <div class="col-md-12  m-1">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                </div>
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
                                         $this->db->where('user_type', 'customer');
                                         $this->db->where('createdBy', $_SESSION['userId']);
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
                                                <td><?php echo ($u->units == 'percentage')?$u->amount.'%': '₹ '.$u->amount; ?></td>
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
            </div>
        </main>
    </div>
</div>

<div class="modal fade show" id="modal_crop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crop Image Before Upload</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="img-container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img src="" id="sample_image" />
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="crop_and_upload" class="btn btn-primary">Crop</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
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