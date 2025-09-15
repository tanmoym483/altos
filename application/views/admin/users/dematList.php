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
                <div class="">
                <div class="card-header">

        <!-- <h3 class="card-title"></h3> -->
                    <div class="card-title">
                        Demat List
                    </div>
                            
                            
                    <div class="card-tools">
                        <form method="get">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control" placeholder="Search" value="<?=(isset($_GET['search'])?$_GET['search']:'')?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <?php if ($_SESSION['role'] === "superAdmin") { ?>
                                        <th>Membar Name</th>
                                        <th>Reg Id</th>
                                        <th>User Type</th>
                                    <?php  } ?>
                                    <th>Amount</th>
                                    <th>Trans Type</th>
                                    <?php if ($_SESSION['role'] === "superAdmin") { ?>
                                            <th>trans Ref No</th>

                                            <th>trans Ref Doc</th>
                                            <?php  } ?>
                                    <th>Status</th>
                                    <th>Requested at</th>
                                    <?php if ($_SESSION['role'] === "superAdmin") { ?>
                                        <th>Action</th>
                                    <?php  } ?>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php 
                                       // print_r($users);
                                        foreach ($dematlist as $key => $u) {
                                        ?>
                                            <tr>
                                                
                                                <?php if ($_SESSION['role'] === "superAdmin") {
                                                    $membarname =  $u->firstName . ' ' . $u->lastName;
                                                ?>
                                                    <td>
                                                        <?php echo $membarname ?>
                                                    </td>

                                                    <td><?php echo $u->regId; ?>
                                                    </td>
                                                    <td><?php echo ucfirst($u->role); 
                                                     ?>
                                                    </td>
                                                <?php } ?>

                                                <td>
                                                    <?php echo $u->amount; ?>
                                                </td>

                                                <td>
                                                    <?php if($u->transType=="demat"){ ?>
                                                    Demat
                                                    <?php } ?>
                                                    
                                                   
                                                </td>
                                                <?php if ($_SESSION['role'] === "superAdmin") { ?>
                                                <td><?php echo $u->transRefNo ?></td>

                                                <td>
                                                    <?php if($u->transRefDoc != '') {?>
                                                    <a href="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1">
                                                        <img src="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" width="100" height="70" crossorigin="" />
                                                    </a>
                                                    <a href="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" download>

                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                    <?php } ?>
                                                </td>
                                                <?php } ?>
                                                <td><?php echo ucfirst($u->tstatus); ?></td>
                                                <td><?php echo $u->createdAt; ?></td>
                                                <?php if ($_SESSION['role'] === "superAdmin") { ?>
                                                    <td><?php if ($u->tstatus == 'pending') { ?>
                                                            <button class="btn btn-success" onClick="ajax_payment_status_change(<?php echo $u->tid; ?>, 'approved')">Approve</button>
                                                            <button class="btn btn-danger" onClick="ajax_payment_status_change(<?php echo $u->tid; ?>, 'reject')">Reject</button>
                                                        <?php } ?>
                                                       
                                                    </td>
                                                <?php } ?>

                                            </tr>
                                        <?php } ?>
                            </tbody>
                            
                        </table>
                        <div style='margin-top: 10px;'>
                        <div class="text-right pagination"><?php if(isset($serviceuser['pagination'])) { echo $serviceuser['pagination']; }?></div>
                        
                        </div>
                    </div>
                                    
                </div>
            </div>       
        </main>
    </div>
</div>
</div>