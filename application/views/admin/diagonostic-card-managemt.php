<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">
                                <form method="GET" >
                                    <div class="col-md-12 mb-6">
                                        <input type="text" class="form-control" name="cardnumber"  <?php if(!empty($_GET['cardnumber'])) { ?>value="<?=$_GET['cardnumber']?>"<?php } ?>>
                                    </div>
                                    <div class="col-md-12 mb-6 mt-3">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                    </div>
                                </form>
                                <?php if(!empty($_GET['cardnumber']) ) { ?>
                                <table class="table mt-3 table-bordered">
                                    <tr>
                                        <th>Card Number</th>
                                        <th>Name</th>
                                        <th>Number of member</th>
                                        <th>Available Balence</th>
                                    </tr>
                                    <?php  
                                    $sql ="SELECT users.*, count(*) as user_member_count FROM users left join user_card on user_card.user_id = users.id where users.cardnumber = ".$_GET['cardnumber']." GROUP BY users.id";
                                    $query = $this->db->query($sql);
                                    $carddata = $query->row();
                                   
                             ?>
                                    <tr>
                                        <td><?php echo $carddata->cardnumber ?></td>
                                        <td><?php echo $carddata->firstName.' '.$carddata->lastName; ?></td>
                                        
                                        <td><?php echo $carddata->user_member_count ?></td>
                                        <td><?php echo $carddata->wallet ?></td>
                                    </tr>
                                </table>
                               
                                <h3>Bill Add</h3>
                                <form method="POST">
                                    <input type="hidden" value="<?php echo $carddata->id ?>">
                                    <div id="billammount"></div>
                                    <button class="btn btn-primary" id="billaddbtn" type="button">Add</button>
                                    <div class="col-md-12 mb-6 mt-3">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                    </div>
                                </form>
                                <?php } ?>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>