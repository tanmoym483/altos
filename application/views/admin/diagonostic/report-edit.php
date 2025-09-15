<div class="content-wrapper" style="min-height: 2080.26px;">

<div class="container p-4">
<h6><a style="cursor: pointer;" href="<?=base_url('diagonostic/report_list')?>"  class="btn btn-primary"> Back</a></h6>
    <div class="card p-3">
        <main class="app-content">
                <div class="app-title">
                    <div>
                        <h1>Report Details</h1>
                    </div>
                </div>
                <?php if ($this->session->flashdata('error') != '') { ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                <?php } ?>
                <?php if ($this->session->flashdata('success') != '') { ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                <?php } ?>
                <div class="card-body">
                <form method="post" action="<?php echo base_url('diagonostic/posteditDiagonostictest') ?>"  class="row">
                    <div class="col-md-12 mb-3" >
                        <div class="">
                            <div class="row" id="card_enter">
                                <div class="form-outline mb-4 col-sm-4">
                                    <input type="hidden" name="id"  value="<?=$data->did?>" readonly />
                                    <label class="text-left">Enter card number <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control" value="<?=$data->cardnumber?>" readonly />
                                </div>
                               
                            </div>
                            <div id="member-details" class="row" >
                                
                            <div class="row">
                                <input type="radio" name="userid" value="<?=$user[0]['id']?>" <?php if($data->userId == $user[0]['id']){ ?>checked<?php } ?>>
                                <input type="hidden" name="muserid" value="98">
                                <div class="form-outline mb-4 col-sm-5"><label class="text-left">Name </label><input type="text" class="form-control" value="<?=$user[0]['firstName'].' '.$user[0]['middleName'].' '.$user[0]['lastName']?>"></div>
                                <div class="form-outline mb-4 col-sm-5"><label class="text-left">Credit Balence </label><input type="text" class="form-control" value="15000"></div>
                            </div>
                            <input type="hidden" name="muserid" value="<?=$user[0]['id']?>">
                            <?php foreach($user[1] as $card) {?>
                                <div class="row">
                                <input type="hidden" name="muserid" value="<?=$user[0]['id']?>">
                                <input type="radio" name="userid" value="<?=$card['id']?>" <?php if($data->cardId == $card['id']){ ?>checked<?php } ?>>
                                <div class="form-outline mb-4 col-sm-5"><label class="text-left">Name </label><input type="text" class="form-control" value="<?=$card['name']?>"></div>
                                <div class="form-outline mb-4 col-sm-5"><label class="text-left">Credit Balence </label><input type="text" class="form-control" value="15000"></div>
                            </div>
                            <?php } ?>
                              <!-- <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Name <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control"  value="<?=$name?>" readonly />
                                </div>
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Phone <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control"  value="<?=$phone_number?>" readonly />
                                </div> -->
                            </div>
                            <div id="report-details" class="row" >
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Doctor Name <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control" name="doctor_name"  value="<?=$data->doctor_name?>" />
                                </div>
                                <div class="form-outline mb-4 col-sm-4">
                                    <label class="text-left">Report Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="report" ><?=$data->report_description?></textarea>
                                </div>
                               
                            </div>
                            <div id="test_section" class="row" >
                                
                                <div id="test_add_section">
                                    <?php 
                                    
                                    $i = 0;
                                    foreach($testnames as $tname){
                                       
                                    ?>
                                    <div class="row">
                                        <input type="hidden" value="<?=$tname['id']?>" name="test_name[<?=$i?>][testid]">
                                        <div class="form-outline mb-4 col-sm-3" style="text-transform:uppercase">
                                            <label class="text-left">Test Type </label>
                                            <select class="form-control testName" name="test_name[<?=$i?>][test_category]" required >
                                                <option>Select Test Type</option>
                                                <?php foreach($tests as $t) {?>
                                                    <option value="<?=$t['id']?>" <?php if($tname['tcategory'] == $t['id']) { echo 'selected';}?> ><?=$t['test_category']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-outline mb-4 col-sm-4">
                                            <label class="text-left">Test Name </label>
                                            <input type="text" name="test_name[<?=$i?>][name]" class="form-control amount"  value="<?=$tname['test_name']?>" />
                                        </div>
                                        <div class="form-outline mb-4 col-sm-3">
                                            <label class="text-left">Test price </label>
                                            <input type="number" name="test_name[<?=$i?>][amount]" class="form-control amount"  value="<?=$tname['test_amount']?>" />
                                        </div>
                                        <div class="col-sm-2 remove-div btn btn-danger" style="cursor: pointer;height: 38px; margin: auto;" >Remove</div>
                                    </div>
                                    <?php $i++; } ?>
                                </div>
                                <div id="test_add_section"></div>
                                <div class="col-md-12">
                                <a id="test_add_btn" class="btn btn-primary" style="height: 38px;">Add</a></div>
                                
                                <div class="col-md-12 totalytestamount" >
                                    <div class="row">
                                        <div class="col-md-4" >
                                            <label class="text-left">Total :</label> 
                                            <input type="text" class="form-control emiamount" name="total_amount" readonly id="totalAmount" value="<?=$data->total_amount?>" />
                                        </div>
                                        <div class="col-md-4" >
                                            <label class="text-left">Customer GST Number</label> 
                                            <input type="text" class="form-control" name="gstin_number" placeholder="Customer GSTIN Number" value="<?=$data->cgstin_number?>" id="gstin_number" onchange="this.value = this.value.toUpperCase()"  />
                                            <div id="gerrors" style="color:red"></div>
                                            <div id="gsuc" style="color:#32a86d"></div>
                                        </div>
                                        <div class="col-md-4" >
                                            <label class="text-left">GST in %</label> 
                                            <input type="number" class="form-control" name="gst_amount" id="gst_amount" placeholder="GST Amount" value="<?=$data->gst_amount?>" />
                                        </div>
                                        <!-- <div class="col-md-4" >
                                            <label style="opacity:0">GST in %</label> 
                                            <button type="button" class="btn btn-primary" id="gst-calculate"><i class="fa fa-fw fa-lg fa-check-circle"></i> Calculate</button>
                                            
                                        </div> -->
                                        <div class="col-md-4" id="gst-amount" >
                                            <label class="text-left">Amount With GST</label> 
                                            <input type="number" class="form-control amount_with_gst" name="amount_with_gst"  placeholder="Amount With GST" value="<?=$data->amount_with_gst?>" />
                                        </div>
                                        <div class="col-md-4" >
                                            <label class="text-left">Payment Type</label> 
                                            <select class="form-control" name="payment_type">
                                                <option value="">Select</option>
                                                <option value="on emi" <?php if($data->payment_status== 'on emi'){echo 'selected';} ?>>EMI</option>
                                                <option value="full payment" <?php if($data->payment_status== 'full payment'){echo 'selected';} ?> >Full Payment</option>

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
                                        <div class="col-md-2 mb-3" id="payment-method" >
                                            <input type="hidden" name="payment" value="" id="downpayment_amount" >
                                            <input type="hidden"  name="total_round_figure"  />
                                            <label class="d-block h-25">Payment Method <span class="text-danger">*</span></label>
                                            <select class="form-control" name="payment_method" required>
                                                <option value="">Select</option>
                                                <option value="online" <?php if($data->payment_method== 'online'){echo 'selected';} ?>>Online</option>
                                                <option value="cash" <?php if($data->payment_method== 'cash'){echo 'selected';} ?> >Cash</option>
                                                <option value="card" <?php if($data->payment_method== 'card'){echo 'selected';} ?> >Card</option>
                                            </select>
                                        </div>
                               
                                        <div class="col-md-3 mb-3" id="reference" >
                                            <label class="d-block h-25">Trans Ref No. <span class="text-danger">*</span></label>
                                            <input type="text" name="transrefno" class="form-control" placeholder="Trans Ref No." value="<?=$data->transRefno?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-4 mb-3" >
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