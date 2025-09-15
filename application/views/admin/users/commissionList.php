<style>
    #content h3 {
        font-size: 10px;
    }
</style>
<?php
// $link = $_SERVER['PHP_SELF'];
// $link_array = explode('/', $link);
// $page = end($link_array);
$page = $this->uri->segment(3);

if ($_SESSION['role'] == "vendor" && $page != $_SESSION['userId']) {
    header("Location: " . base_url('/dashboard'));
    die();
}

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
                    <!-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Commission List</li>
                    </ol> -->
                   <?php if($_GET['from'] =='' && $_GET['to'] =='' ){ ?>
                        <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                         <li class="breadcrumb-item active">Commission List</li>
                    </ol>
                      <?php  } else { ?>
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo site_url('users/commissions/'.$user_id); ?>" class="btn btn-primary">Back</a></li>
                            </ol> 

                       <?php }
                        ?>
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
                            <!-- <form method="get">
                                <label>From</label>
                                <input type="date" name="from" max="<?= date('Y-m-d'); ?>">
                                <label>To</label>
                                <input type="date" name="to" max="<?= date('Y-m-d'); ?>">
                                <button class="btn btn-danger" type="submit" name="sr" class="btn btn-default">Go</button>
                            </form> -->
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
                            <div class="d-flex justify-content-between responsive_view">
                        
                                    <div class="col-lg-9">
                                        <form method="get">
                                                <div class="row"><div class="col-lg-4 col-sm-4">
                                                <label>From</label>
                                                <input type="date" class="form-control" name="from" max="<?=date('Y-m-d'); ?>" value="<?=$_GET['from']?>"></div>
                                                <div class="col-lg-4 col-sm-4"><label>To</label>
                                                <input type="date" name="to" class="form-control"  max="<?=date('Y-m-d'); ?>" value="<?=$_GET['to']?>"></div>
                                                <div class="col-lg-1 col-sm-2"><label style="opacity:0;">From</label><button class="btn btn-primary" type="submit" name="sr" class="btn btn-default">Search</button></div></div>
                                        </form>
                                    </div>
                                    <div class="p-2 col-lg-3 text-right">
                                        <button type="button" class="btn btn-custom saveAsExcel"> <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                        <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                                    </svg> Excel </button>
                                                    <a class="btn btn-custom" href="<?php echo site_url('users/commissionspdf/'.$user_id); ?>" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                        <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                                    </svg> Pdf </a>
                                    </div>
                                </div>
                            <div class="card-tools">

                                <p class="pr-3">Total Commission:
                                <?php echo count($totalCommission) > 0 ? $totalCommission[0]->amount : 0; ?></p>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="content">
                                    <table class="table table-bordered exportable">

                                        <thead>
                                            <tr>
                                                <th style="width: 10px">SL.No</th>
                                                <th>Item</th>

                                                <th>Amount</th>

                                                <th>Date</th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                            $page = $this->input->get('per_page') ? $this->input->get('per_page') : 0; 
                                            $commissions = $data['result'];
                                            if (!empty($commissions)) { ?>
                                                <?php foreach ($commissions as $key => $c) {

                                                ?>
                                                    <tr>
                                                        <td><?php 
                                                        if($page == 0 || $page == 1){
                                                            echo $serial_number = ($page*10)+ $key + 1;
                                                        } else{
                                                            echo $serial_number = (($page-1)*10)+ $key + 1;
                                                        }
                                                       
                                                         ?></td>

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
                            <?php if (isset($data['pagination']))
                                {
                                    echo $data['pagination'];
                                } ?> 
<table class="table table-bordered exportable" id="mytable" style="display:none">

<thead>
    <tr>
        <th style="width: 10px">SL.No</th>
        <th>Item</th>

        <th>Amount</th>

        <th>Date</th>


    </tr>
</thead>
<tbody>

    <?php 
   
    $commissions = $data['alldata'];
    if (!empty($commissions)) { ?>
        <?php foreach ($commissions as $key => $c) {

        ?>
            <tr>
                <td><?php 
                echo $key + 1;
                 ?></td>

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
                    <!-- /.card -->


                </div>

            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>