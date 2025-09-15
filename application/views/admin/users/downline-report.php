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
                    <h1>Left Downline Report</h1>
                </div>
                <div class="col-sm-6">
              
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('users/downlinereport'); ?>" id="backbtn" style="display:none" class="btn btn-primary">Back</a></li>
                        
                    </ol> 
               
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-sm-12">

                <!--<button> <a href="<?php echo base_url('users/userPdf') ?>">Generate PDF</a></button>-->
                <div class="col-md-12">
                    <div class="d-flex justify-content-between responsive_view">
                        <div class="p-2">
                            <!-- <form method="get">
                                <select name="registration" >
                                    <option value="all">All</option>
                                <?php if (!empty($vendorregid)) { ?>
                                        <?php foreach ($vendorregid as $u) {
                                       
                                        ?>
                                    <option value="<?php echo $u['regId']; ?>" <?php echo (!empty($_GET) && $_GET['registration'] == $u['regId'])?'selected':''; ?> ><?php echo $u['regId']; ?></option>
                                    <?php } }  ?>
                                </select>
                                
                                <button class="btn btn-danger" type="submit" name="sr" class="btn btn-default">Go</button>
                            </form> -->
                        </div>
                        <div></div>
                        <div class="p-2">
                        <button type="button" class="btn btn-custom saveAsExcel"><svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                            <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                        </svg> Excel</button>
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
                                
                            </div>
               
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="content">
                                    <div class="input-group input-group-sm" style="width: 250px;margin-bottom: 15px; ">
                                        <input type="text" name="search" id="myInputTextField" class="form-control float-right" placeholder="Search by ATF No." >
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary" id="inputbtn">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                    <table class="table table-bordered exportable" id="mydatatable" data-ordering="false">

                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>User Id</th>
                                                <th>Side</th>
                                                <th>Name</th>
                                                <th>Joining date</th>
                                                <th>Status</th>
                                               

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php // Call the recursive function with the root of the tree
                                           
                                            display_tree($user_tree); ?>


                                        </tbody>

                                    </table>
                                    <table id="mytable" style="display:none" >

                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>User Id</th>
                                                <th>Side</th>
                                                <th>Name</th>
                                                <th>Joining date</th>
                                                <th>Status</th>
                                            

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php // Call the recursive function with the root of the tree
                                        
                                            display_tree($user_tree); ?>


                                        </tbody>

                                    </table>
<?php $i = 0;
function display_tree($users) {
    if (!empty($users)) {
        
        foreach ($users as $user) {
            echo "<tr>";
           echo "<td></td>";
            echo "<td>" . $user->regId."</td>";
            echo "<td>" . $user->side."</td>";
            echo "<td>" . $user->firstName. ' ' . $user->middleName . ' ' . $user->lastName."</td>";
            echo "<td>".$user->createdAt."</td>";
            echo "<td><strong class='text-success'>".$user->status."</strong></td>";
            echo "</tr>";
            if (!empty($user->children)) {
                // Recursively display the children of the user
                display_tree($user->children);
                $i++;}
            //echo "</td>";
        }
        
    }
}
?>
                                </div>
                            </div>
                            <?php //echo $this->pagination()->create_links(); 
                            ?>
                        </div>
                        <!-- /.card-body -->
                       
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
