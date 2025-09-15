<div class="content-wrapper" style="min-height: 2080.26px;">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Total Due Amount</h1>
                </div>
                <div class="col-sm-6">
                <?php if($_GET['to'] == ''){ ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Total Due Amount</li>
                    </ol>
                    <?php } else { ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('usercard/transactionHistory'); ?>" class="btn btn-primary">Back</a></li>
                        
                    </ol> 
                    <?php } ?>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?php  $role = $this->session->userdata('role'); ?>
<div class="container-fluid"><div class="col-sm-12">
<div class="card">
        <div class="card-header row">
            <div class="col-lg-12">
                <?php if($role != 'superAdmin'){?>
                <h4><strong><?php echo $_SESSION['firstName'].' '.$_SESSION['lastName']; ?></strong> ( <?php echo $_SESSION['regId']; ?> )</h4>
                <?php } ?>
                <h5>Account Details</h5>
                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Account Type</th>
                            <th>Spending Balance</th>
                            <th>Total due Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td>Total Due Amount</td>
                            <td><?php echo $total; ?></td>
                            <td><?php echo $total; ?></td>
                        </tr>
                   
                    </tbody>
                </table>
                
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        
                                    <div class="row"><div class="col-lg-4 col-sm-4">
                                <label>From</label>
                                <input type="text" class="form-control" name="from" id="startDate" placeholder="dd-mm-yyyy"></div>
                                <div class="col-lg-4 col-sm-4"><label>To</label>
                                <input type="text" name="to" class="form-control" id="endDate" placeholder="dd-mm-yyyy"></div>
                                <div class="col-lg-1 col-sm-2"><label style="opacity:0;">From</label><button class="btn btn-primary" type="button" id="search_transactionbtn" >Search</button></div></div>
                       
                    </div>
                    <div class="col-lg-2" style="display:none;">
                        <label>Member</label>
                        <select class="form-control" id="nameSearch">
                            <option>Select</option>
                            
                        </select>
                    </div>
                    <div class="p-2 col-lg-4 text-right">
                    <label style="opacity:0">Member</label>
                            <button type="button" class="btn btn-custom saveAstransactionExcel"> <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                    <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                                </svg> Excel </button>
                            <!-- <a class="btn btn-custom" href="<?php echo site_url('usercard/transactionpdf'); ?>" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                            </svg> Pdf </a> -->
                                                
                    </div>
                </div>
            </div>
                </div>
        <div class="card-body">
                    <div class="table-responsive" >
                            <table class="table table-bordered exportable"  id="healthcard_transaction" style="font-size:14px" data-ordering="false">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Date</th>
                                        <th>Mode</th>
                                        <th>Particulas</th>
                                        <th>Amount</th>
                                        <th>Withdrawals</th>
                                        <th>Balence</th>
                                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($data)) { ?>
                                        <?php 
                                        $total = 0;
                                        foreach ($data as $key=>$customer) {
                                       if($customer->cardId == 0 ){
                                        $name = $customer->firstName. ' '.$customer->middleName. ' '. $customer->lastName;
                                        
                                       } else {
                                        $name = $customer->name;
                                       
                                       }
                                       $amount = $customer->total_amount - $customer->paidamount;
                                       $total = $total + $amount;
                                       ?>
                                       <tr>
                                        <td><?=$key+1?></td>
                                        <td><?=date('d-m-Y H:i:s',strtotime($customer->date))?></td>
                                        <td>Due</td>
                                        <td><?=$name?> - <?=$customer->cardnumber?></td>
                                        <td><?=$amount?></td>
                                        <td></td>
                                        <td><?=$total?></td>
                                       </tr>
                                    
                                   <?php } } ?>
                                </tbody>
                            </table>
                            
                            </div>
                            
                        </div>
                    </div>
                </div></div></div>