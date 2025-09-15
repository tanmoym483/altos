<div class="content-wrapper" style="min-height: 2080.26px;">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Wallet list</h1>
                </div>
                <div class="col-sm-6">
                   
                    
                    <?php if(!isset($_GET['search'])){ ?>
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Wallet list</li>
                    </ol>
                    <?php } else { ?>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('users/userWallet'); ?>" class="btn btn-primary" >Back</a></li>
                        
                    </ol> 
                    <?php } ?>
                </div>
            </div>
        </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
    <div class="col-sm-12">
    <div class="card">
        <div class="card-header row">
            
        <form method="get"> 
                    <div class="row">
                        <div class="col-md-8">
                            <div class="input-group" >
                                <input type="text" name="search" class="form-control float-right" value="<?=(isset($_GET['search'])?$_GET['search']:'')?>" placeholder="ATF Search">
                            </div>
                        </div>
                       
                        <div class="col-md-2">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
           
            
            
        </div> 
       
        <div class="card-body">
        <div class="table-responsive">
                            <table class="table table-bordered" style="font-size:14px;">
                                <thead>
                                    <tr>
                                    <th style="width: 10px">SI No</th>
                                        
                                        <th>Name</th>
                                        <th>Wallet</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     
                                    <?php if (!empty($userList)) { ?>
                                        <?php $i = 1;
                                        //$sno = $customers['row']+1;
                                        foreach ($userList as $customer) {
                                       
                                        ?>
                                            <tr>
                                               <td><?=$i?></td>
                                                <td><?php echo $customer->firstName.' '.$customer->middleName.' '.$customer->lastName.'<br>'.$customer->regId; ?></td>
                                                <td><?php echo $customer->wallet?></td>
                                            </tr>
                                        <?php $i++; } ?>
                                    <?php } ?>


                                </tbody>
                            </table>
                           
                            
                            </div>
                            <?php //echo $this->pagination()->create_links(); 
                            ?>
                        </div>
                    </div>
                </div>
    </div>
                                        </div>