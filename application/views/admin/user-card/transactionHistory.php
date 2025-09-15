<div class="content-wrapper" style="min-height: 2080.26px;">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Health Card Transactions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('usercard/cardtransaction'); ?>" id="backbtn" style="display:none" class="btn btn-primary">Back</a></li>
                        
                    </ol> 
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="container-fluid"><div class="col-sm-12">
<div class="card">
        <div class="card-header row">
            <div class="col-lg-12">
                <h4><strong><?php echo $_SESSION['firstName'].' '.$_SESSION['lastName']; ?></strong> ( <?php echo $_SESSION['regId']; ?> )</h4>
                <h5>Account Details</h5>
                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Account Type</th>
                            <th>Account Balance</th>
                            <th>Total Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($user->cardnumber != '' && $user->card_status != 'inactive'){ ?>
                        <tr>
                            <td>Health credit card - <?=$user->cardnumber?></td>
                            <td><?php 
                            if(empty($userbalence) && empty($usercardbalence)){
                                echo ($usercard + 1) * 15000;
                            } else {
                                $cardbalence = 0;
                                if(!empty($usercardbalence)){
                                    foreach($usercardbalence as $ubalence){
                                        
                                        $cardbalence = $cardbalence + $ubalence->balanceAfter;
                                    }
                                } 
                                echo $userbalence->balanceAfter + $cardbalence;
                               
                            } ?></td>
                            <td><?php if(empty($userbalence) && empty($usercardbalence)){
                                echo ($usercard + 1) * 15000;
                            } else {
                                $cardbalence = 0;
                                if(!empty($usercardbalence)){
                                    foreach($usercardbalence as $ubalence){
                                        
                                        $cardbalence = $cardbalence + $ubalence->balanceAfter;
                                    }
                                } 
                                echo $userbalence->balanceAfter + $cardbalence;
                               
                            } ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        
                                    <div class="row"><div class="col-lg-4 col-sm-4">
                                <label>From</label>
                                <input type="date" class="form-control" name="from" id="startDate" max="<?= date('Y-m-d'); ?>"></div>
                                <div class="col-lg-4 col-sm-4"><label>To</label>
                                <input type="date" name="to" class="form-control" id="endDate" max="<?= date('Y-m-d'); ?>"></div>
                                <div class="col-lg-1 col-sm-2"><label style="opacity:0;">From</label><button class="btn btn-primary" type="button" id="search_transactionbtn" >Search</button></div></div>
                       
                    </div>
                    <div class="col-lg-2">
                        <label>Member</label>
                        <select class="form-control" id="nameSearch">
                            <option>Select</option>
                            <option value="<?=$user->firstName.' '.$user->lastName?>" ><?=$user->firstName.' '.$user->lastName?></option>
                            <?php foreach( $usercarddetails as $usercard){?>
                            <option value="<?=$usercard['name']?>"><?=$usercard['name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="p-2 col-lg-4 text-right">
                    <label style="opacity:0">Member</label>
                            <button type="button" class="btn btn-custom saveAstransactionExcel"> <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                    <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                                </svg> Excel </button>
                            <a class="btn btn-custom" href="<?php echo site_url('usercard/transactionpdf'); ?>" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                            </svg> Pdf </a>
                                                
                    </div>
                </div>
            </div>
            <!-- <div class="p-2 text-right">
                    <button type="button" class="btn btn-danger saveAsExcel">Excel Download</button>
            </div> -->
        </div>
        <div class="card-body">

                    <div class="table-responsive" >
                            <table class="table table-bordered exportable" id="healthcard_transaction" data-ordering="false">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Date</th>
                                        <th>Mode</th>
                                        <th>Particulas</th>
                                        <th>Deposites</th>
                                        <th>Withdrawals</th>
                                        <th>Balence</th>
                                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach( $card_transaction_log as $key=>$logs){ 
                                        if($logs->cardmember_id == 0){
                                            $this->db->select('firstName,lastName,middleName')->from('users');
                                            $this->db->where('id', $logs->user_id);
                                            $query = $this->db->get();
                                            $username = $query->row(); 
                                            $name = $username->firstName.' '.$username->middleName.' '.$username->lastName;
                                        } else {
                                            $this->db->select('name')->from('user_card');
                                            $this->db->where('id', $logs->user_id);
                                           // $this->db->where('user_id', $logs->user_id);
                                            $query = $this->db->get();
                                            $username = $query->row(); 
                                            $name = $username->name;
                                        }
                                        
                                        ?>
                                        <tr> 
                                            <td></td>
                                        <td><?=$logs->transaction_date?></td>
                                        <td><?=$logs->transaction_type?></td>
                                        <td><?=$name?> - <?=$user->cardnumber?></td>
                                        <td><?php if($logs->transaction_type == 'credited'){ echo $logs->amount; } ?></td>
                                        <td><?php if($logs->transaction_type == 'debited'){ echo $logs->amount; } ?></td>
                                        <td><?=$logs->balance_after?></td>
                                    </tr>
                                    <?php } ?>
                                <?php if($user->cardnumber != '' && $user->card_status != 'inactive' ){ ?>
                                    <?php foreach( $usercarddetails as $usercard){?>
                                        <tr> 
                                            <td></td>
                                        <td><?=$usercard['created_at']?></td>
                                        <td>Credit</td>
                                        <td><?=$usercard['name']?> - <?=$user->cardnumber?></td>
                                        <td>15000</td>
                                        <td></td>
                                        <td>15000</td>
                                    </tr> <?php } ?>
                                    <tr> 
                                        <td></td>
                                        <td><?=$user->createdAt?></td>
                                        <td>Credit</td>
                                        <td><?=$user->firstName.' '.$user->lastName?> - <?=$user->cardnumber?></td>
                                        <td>15000</td>
                                        <td></td>
                                        <td>15000</td>
                                    </tr>
                                    
                                    <?php  } ?>
                                   
                                </tbody>
                            </table>
                           
                            </div>
                            
                        </div>
                    </div>
                </div></div></div>