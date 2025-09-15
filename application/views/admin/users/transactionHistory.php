
<div class="content-wrapper" style="min-height: 2080.26px;">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Wallet Transactions</h1>
                </div>
                <div class="col-sm-6">
                
                        
                        
                    
                <?php if($_GET['to'] == ''){ ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Wallet Transactions</li>
                    </ol>
                    <?php } else { ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('users/payHistory'); ?>" class="btn btn-primary">Back</a></li>
                        
                    </ol> 
                    <?php } ?>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
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
                            <th>Wallet Balance</th>
                            <th>Total Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                        <tr>
                            <td>Wallet Balence</td>
                            <td><?php if ($_SESSION['role'] === "vendor" || $_SESSION['role'] === "customer") { ?><?= (isset($users)) ? $users['amount'] : 0 ?><?php } else { ?><?= (isset($users['amount']) && $users['amount'] != 0) ? $users['amount'] : 0 ?><?php  } ?></td>
                            <td><?php if ($_SESSION['role'] === "vendor" || $_SESSION['role'] === "customer") { ?><?= (isset($users)) ? $users['amount'] : 0 ?><?php } else { ?><?= (isset($users['amount']) && $users['amount'] != 0) ? $users['amount'] : 0 ?><?php  } ?></td>
                        </tr>
                    
                    </tbody>
                </table>
                
            </div>
            
        </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-10">
                        <form method="get">
                                    <div class="row"><div class="col-lg-6 col-sm-4">
                                <label>From</label>
                                <input type="date" class="form-control" name="from" max="<?= date('Y-m-d'); ?>"></div>
                                <div class="col-lg-5 col-sm-4"><label>To</label>
                                <input type="date" name="to" class="form-control"  max="<?= date('Y-m-d'); ?>"></div>
                                <div class="col-lg-1 col-sm-2"><label style="opacity:0;">From</label><button class="btn btn-primary" type="submit" name="sr" class="btn btn-default">Search</button></div></div>
                        </form>
                    </div>
                    <div class="p-2 col-lg-2 text-right">
                            <button type="button" class="btn btn-custom saveAsExcel"> <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                    <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                                </svg> Excel </button>
                    </div>
                </div>
            </div>
                
        <div class="card-body">
                    
                    <div class="table-responsive" >
                            
                            <table class="table table-bordered exportable"  style="font-size:14px">
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
                                <?php $i = 0;
                                    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                                    foreach ($users['result'] as $key=>$u) { 
                                        
                                        ?>
                                    <tr>
                                    <td> <?php 
                                                        if($page == 0 || $page == 1){
                                                            echo $serial_number = ($page*10)+ $key + 1;
                                                        } else{
                                                            echo $serial_number = (($page-1)*10)+ $key + 1;
                                                        }
                                                        ?>  </td> 
                                        <td><?=$u->transaction_date?></td>
                                        <td><?=$u->transaction_type?></td>
                                        <td><?=$u->firstName.' '.$u->lastName?> - <?=$u->regId?> Transaction: <?=$u->transaction_id?></td>
                                        <td><?php if($u->transaction_type == "Credited"  ){ ?><?=$u->amount?><?php } ?></td>
                                        <td><?php if($u->transaction_type=="Debited"){ ?><?=$u->amount?><?php } ?></td>
                                        <td><?php echo $u->balance_after; ?></td>
                                    </tr>

                                    <?php $i++;} ?>
                                </tbody>
                            </table>
                            <div style='margin:0 auto'>
                                <div class="pagination"><?php if(isset($users['pagination'])) { echo $users['pagination']; }?></div>
                            </div>
                            <table id="mytable" style="display:none">
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
                                <?php $i = 0;
                                    foreach ($users['alldata'] as $key=>$u) { 
                                        
                                        ?>
                                    <tr> <td><?=$key+1?></td>
                                        <td><?=$u->transaction_date?></td>
                                        <td><?=$u->transaction_type?></td>
                                        <td> <?=$u->firstName.' '.$u->lastName?> - <?=$u->regId?> Transaction: <?=$u->transaction_id?>
                                       
                                          
                                        
                                    </td>
                                        <td><?php if($u->transaction_type == "Credited"  ){ ?><?=$u->amount?><?php } ?></td>
                                        <td><?php if($u->transaction_type=="Debited"){ ?><?=$u->amount?><?php } ?></td>
                                        <td><?php echo $u->balance_after; ?></td>
                                    </tr>

                                    <?php $i++;} ?>
                                </tbody>
                            </table>
                            </div>
                            
                        </div>
                    </div>
                </div></div></div>