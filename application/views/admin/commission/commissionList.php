<style>
    #content h3 {
        font-size: 10px;
    }
</style>
<?php
// $link = $_SERVER['PHP_SELF'];
// $link_array = explode('/', $link);
// $page = end($link_array);
// $page = $this->uri->segment(3);

// if ($_SESSION['role'] == "vendor" && $page != $_SESSION['userId']) {
//     header("Location: " . base_url('/dashboard'));
//     die();
// }

?>
<div class="content-wrapper" style="min-height: 2080.26px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Commission list</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Commission List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-sm-12">

                <div class="col-md-12">
                    <div class="d-flex justify-content-between responsive_view">
                        <div class="p-2">
                        
                        </div>
                        <div></div>
                        <div class="p-2">
                            <!-- <button type="button" class="btn btn-danger saveAsExcel">Excel Download</button> -->
                            <!-- <form id="frm_gen_bdo_pdf">
                    <div></div> -->
                            <!-- <button class="btn btn-danger" id="gen_user_list_pdf">PDF Download</button> -->
                            <!-- </form> -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">

                            <!-- <h3 class="card-title"></h3> -->
                            <div class="card-title">
                                <form method="post">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-tools">

                                Total Commission:
                                <?php echo count($totalCommission) > 0 ? $totalCommission[0]->amount : 0; ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="content">
                                    <table class="table table-bordered exportable" id="mytable">

                                        <thead>
                                            <tr>
                                                <th style="width: 10px">SL.No</th>
                                                <th>Item</th>

                                                <th>Amount</th>

                                                <th>Date</th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php if (!empty($commissions)) { ?>
                                                <?php foreach ($commissions as $key => $c) {

                                                ?>
                                                    <tr>
                                                        <td><?php echo $key + 1; ?></td>

                                                        <td><?php echo $c->reason; ?>
                                                        </td>
                                                        <td><?php echo $c->amount; ?>
                                                        </td>
                                                        <td><?php echo $c->createdAt; ?>
                                                        </td>


                                                    </tr>
                                            <?php }
                                            } ?>


                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <?php if (isset($pagination))
                                {
                                    echo $pagination;
                                } ?>        
                           
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