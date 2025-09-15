<style>
    #content h3 {
        font-size: 10px;
    }
</style>
<div class="content-wrapper" style="min-height: 2080.26px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admin User list</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Admin User List</li>
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
                    <div class="d-flex justify-content-between responsive_view">
                   <div class="p-2">
                        <form method="get">
                    <label>From</label>
                    <input type="date" name="from" max="<?= date('Y-m-d'); ?>">
                    <label>To</label>
                    <input type="date" name="to" max="<?= date('Y-m-d'); ?>">
                    <button class="btn btn-danger" type="submit" name="sr" class="btn btn-default">Go</button>
                </form>
                   </div> 
                   <div></div>
                   <div class="p-2">
                        <button type="button" class="btn btn-danger saveAsExcel">Excel Download</button>
                <!-- <form id="frm_gen_bdo_pdf">
                    <div></div> -->
                <button class="btn btn-danger" id="gen_bdo_pdf">PDF Download</button>
                <!-- </form> -->
                   </div>
                </div>
                    <div class="card">
                        <div class="card-header">
                           
                            <!-- <h3 class="card-title"></h3> -->
                           
                            <!-- <div class="card-tools">

                                <a href="<?php //echo site_url('users/add');  
                                            ?>" class="btn btn-default">ADD</a>
                            </div> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="content">
                                    <table class="table table-bordered exportable" id="mytable">

                                        <thead>
                                            <tr>
                                                <th style="width: 10px">SL.No</th>
                                                <th>Member Details</th>

                                                <!-- <th>Side</th> -->

                                                <!-- <th>Intro</th> -->
                                                <!-- <th>Upliner</th> -->
                                                <th>DOJ</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php if (!empty($vendors)) { ?>
                                                <?php foreach ($vendors as $key => $u) {

                                                ?>
                                                    <tr>
                                                        <td><?php echo $key + 1; ?></td>
                                                        <td>
                                                            <a href="<?php echo site_url('user-details/' . $u->id); ?>">
                                                                <?php echo $u->firstName . ' ' . $u->middleName . ' ' . $u->lastName; ?><br><?php echo $u->regId; ?></a>
                                                        </td>





                                                        <td><?php echo $u->createdAt; ?></td>
                                                        <td><a href="<?php echo base_url('users/tree?v=' . base64_encode($u->regId)); ?>" target="_blank">Tree</a></td>



                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>


                                        </tbody>

                                    </table>
                                </div>
                            </div>
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