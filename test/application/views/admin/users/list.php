<div class="content-wrapper" style="min-height: 2080.26px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User list</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">User List</li>
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
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-tools">

                                <a href="<?php echo site_url('users/add');  ?>" class="btn btn-default">ADD</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Member Details</th>

                                        <th>Side</th>

                                        <th>Intro</th>
                                        <th>Upliner</th>
                                        <th>DOJ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($users)) { ?>
                                        <?php foreach ($users as $key => $u) {

                                        ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('user-details/' . $u->id); ?>">
                                                        <?php echo $u->firstName . ' ' . $u->middleName . ' ' . $u->lastName; ?><br><?php echo $u->regId; ?></a>
                                                </td>

                                                <td><?php echo $u->side; ?>
                                                </td>

                                                <td><?php print($_SESSION['regId']) ?></td>
                                                <td><?php print($_SESSION['regId']) ?></td>

                                                <td><?php echo date('d-m-Y', strtotime($u->createdAt)); ?></td>
                                                <!--<td><?php echo $u->status; ?></td>-->

                                                <!--<td><?php if ($u->status == 'pending') { ?>-->
                                                <!--        <button class="btn btn-success" onClick="ajax_bdo_status_change(<?php echo $u->id; ?>, 'approved')">Approve</button>-->
                                                <!--        <button class="btn btn-danger" onClick="ajax_bdo_status_change(<?php echo $u->id; ?>, 'reject')">Reject</button>-->
                                                <!--    <?php } ?>-->
                                                <!--</td>-->
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>


                                </tbody>
                            </table>
                            <?php //echo $this->pagination()->create_links(); 
                            ?>
                        </div>
                        <!-- /.card-body -->
                        <!-- <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div> -->
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