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
                        <h1>Report Create</h1>
                    </div>
                </div>
                <?php if ($this->session->flashdata('error') != '') { ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                <?php } ?>
                <?php if ($this->session->flashdata('success') != '') { ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                <?php } ?>
                <div class="card-body">
                    
                    <form method="post" action="<?php echo base_url('diagonostic/postaddDiagonostictest') ?>"  class="row">
                    
                    
                    <div class="col-md-12 mb-3" >
                        <div class="">
                            <div class="row" id="card_enter">
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Enter card number <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control" placeholder="Enter card number" name="cardnumber" id="cardnumber_field" />
                                </div>
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="d-block" style="opacity:0">Enter Amount </label>
                                    <button class="btn btn-primary" type="button" id="search_btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Apply Now</button>
                                
                                </div>
                            </div>
                            <div id="member-details" class="row" style="display:none">
                               
                            </div>
                            <div id="report-details" class="row" style="display:none" >
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Doctor Name <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control" placeholder="Doctor Name" name="doctor_name" required />
                                </div>
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Report Description </label>
                                    <textarea class="form-control" placeholder="Report Description" name="report" ></textarea>
                                </div>
                               
                            </div>
                            <div id="test_section" class="row" style="display:none">
                                
                                <div id="test_add_section"></div>
                                <div class="col-md-12">
                                <a id="test_add_btn" class="btn btn-primary" style="height: 38px;">Add</a></div>
                                <div class="col-md-12 totalytestamount" style="display:none" >
                                    <div class="row">
                                        <div class="col-md-4" >
                                            <label class="text-left">Total :</label> 
                                            <input type="text" class="form-control emiamount" name="total_amount" readonly id="totalAmount" />
                                        </div>
                                        <div class="col-md-4" >
                                            <label class="text-left">Customer GST Number</label> 
                                            <input type="text" class="form-control" name="gstin_number" placeholder="Customer GSTIN Number" id="gstin_number" onchange="this.value = this.value.toUpperCase()"  />
                                            <div id="gerrors" style="color:red"></div>
                                            <div id="gsuc" style="color:#32a86d"></div>
                                        </div>
                                        <div class="col-md-4" >
                                            <label class="text-left">GST in %</label> 
                                            <input type="number" class="form-control" name="gst_amount" id="gst_amount" placeholder="GST Amount" />
                                        </div>
                                       
                                        <div class="col-md-4" id="gst-amount" style="display:none">
                                            <label class="text-left">Amount With GST</label> 
                                            <input type="number" class="form-control amount_with_gst" name="amount_with_gst"  placeholder="Amount With GST" />
                                        </div>
                                        <div class="col-md-4" >
                                            <label class="text-left">Payment Type</label> 
                                            <select class="form-control" name="payment_type">
                                                <option value="">Select</option>
                                                <option value="on emi">EMI</option>
                                                <option value="full payment">Full Payment</option>

                                            </select>
                                            
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="d-block " style="opacity:0">Enter Amount </label>
                                            <button class="btn btn-primary" type="button" id="emi-calculator"><i class="fa fa-fw fa-lg fa-check-circle"></i>EMI Calculate</button>
                                        </div>
                                    </div>
                                <div class="row">
                                <div class="col-md-7 mb-3" id="emi-calculator-section" style="display:none;">
                                    <table class="table table-bordered" id="emi-calculator-display" style="display:none;" >
                                        <thead>
                                            <tr>
                                                <th>Down payment</th>
                                                <th>1st EMI</th>
                                                <th>Total EMI timing</th>
                                                <th>EMI Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2 mb-3" id="round-figure" style="display:none;">
                                   <input type="checkbox" name="round_figure" value="1" > Round Figure
                               </div>
                                <div class="col-md-2 mb-3" id="payment-method" style="display:none;">
                                    <input type="hidden" name="payment" value="" id="downpayment_amount" >
                                    <input type="hidden"  name="total_round_figure"  />
                                    <label class="d-block h-25">Payment Method <span class="text-danger">*</span></label>
                                    <select class="form-control" name="payment_method" required>
                                        <option value="">Select</option>
                                        <option value="online">Online</option>
                                        <option value="cash">Cash</option>
                                        <option value="card">Card</option>
                                    </select>
                                </div>
                               
                                <div class="col-md-3 mb-3" id="reference" style="display:none;">
                                    <label class="d-block h-25">Trans Ref No. <span class="text-danger">*</span></label>
                                    <input type="text" name="transrefno" class="form-control" placeholder="Trans Ref No." >
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-4 mb-3" style="display:none" id="submit_section">
                        <label class="d-block h-25" style="opacity:0">Enter Amount </label>
                        <button class="btn btn-primary" type="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                    </div>

                    </form>
                </div>
        </main>
    </div>
</div>
<style>
    .main-footer{display: none;}
</style>