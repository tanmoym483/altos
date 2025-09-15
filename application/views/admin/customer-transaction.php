<div class="content-wrapper" style="min-height: 2080.26px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaction list</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Transaction list</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- <h3 class="card-title"></h3> -->
                            <div class="card-title">
                                <form method="post">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                          
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">SL.No</th>
                                            
                                            <th>Amount</th>
                                            <th>Created By</th>
                                            <th>trans Type</th>
                                            <th>trans Ref No</th>
                                            <th>trans Ref Doc</th>
                                            <th>status</th>
                                            <th>DOJ</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php 
                                       // print_r($users);
                                        foreach ($tansctionlist as $key => $u) {
                                        ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                           
                                                    <td>
                                                        <?php echo $u->amount ?>
                                                        
                                                    </td>
                                                    <td>
                                                    <?php
                                                        echo $u->cfirstName . ' ' . $u->clastName. '<br>'.$u->cregId;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo ucfirst($u->transType); ?>
                                                            
                                                        
                                                   
                                                    </td>

                                                <td><?php echo $u->transRefNo ?></td>

                                                <td>
                                                    <?php if($u->transRefDoc != '') { ?>
                                                    <a href="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" data-toggle="lightbox" data-toggle="lightbox" data-title="Image caption 1">
                                                        <img src="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" width="100" height="70" crossorigin="" />
                                                    </a>
                                                    <a href="<?php echo base_url('uploads/' . $u->transRefDoc); ?>" download>

                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo ucfirst($u->tstatus); ?></td>
                                                <td><?php echo $u->createdAt; ?></td>
                                              

                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                            <?php //echo $this->pagination()->create_links(); 
                            ?>
                        </div>

                    </div>
                    <!-- /.card -->

                    


                </div>

            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>

