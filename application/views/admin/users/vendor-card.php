<div class="content-wrapper" style="min-height: 2080.26px;">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Card Member list</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">My card</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="card-body">
       
        <div class="table-responsive" id="mytable">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">Reg. NO</th>
                                        <th>Card Number</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     
                                   
                                            <tr>
                                                <td><?php echo $user->regId; ?></td>
                                                <td><?php echo $user->cardnumber; ?></td>
                                                <td><?php echo $user->firstName.' '.$user->lastName; ?></td>
                                                
                                                <td><?php echo $user->email ?></td>
                                                <td><?php echo $user->phone; ?></td>
                                               
                                                <td>
                                                
                                                     
                                                <a href="<?=base_url('user-details')?>/<?=$user->id?>"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <?php foreach($usercard as $userc) { 
                                                ?>
                                            <tr>
                                                <td><?php echo $user->regId; ?></td>
                                                <td><?php echo $user->cardnumber; ?></td>
                                                <td><?php echo $userc['name']; ?></td>
                                                <td><?php echo $user->email; ?></td>
                                                <td><?php echo $userc['phone']; ?></td>
                                                <td><a href="<?=base_url('users/vendorcarddetails')?>/<?=$userc['id']?>"><i class="fa fa-eye"></i></a></td>
                                            </tr>
                                        <?php } ?>


                                </tbody>
                            </table>
                            <div style='margin-top: 10px;'>
                                <div class="text-right pagination"><?php if(isset($customers['pagination'])) { echo $customers['pagination']; }?></div>
                            </div>
                            </div>
                            <?php //echo $this->pagination()->create_links(); 
                            ?>
                        </div>
                    </div>