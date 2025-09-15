<div class="content-wrapper" style="min-height: 2080.26px;">
    <div class="card">
        <div class="card-header">

<!-- <h3 class="card-title"></h3> -->
            <div class="card-title">
               
                <form method="get"> 
                    <div class="row">
                       
                        <div class="col-md-4">
                            <div class="input-group input-group-sm" >
                                <label>Service</label>
                                <select name="service" class="ml-2 form-control">
                                    <option value="">Select Service </option>
                                    <?php foreach($publishservice as $service) { ?>
                                        <option value="<?=$service->slug?>" <?=(isset($_GET['service']) &&  $_GET['service'] == $service->slug)?'selected':''?>><?=$service->name?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-sm" >
                                <input type="text" name="pancard_search" class="form-control float-right" value="<?=(isset($_GET['pancard_search'])?$_GET['pancard_search']:'')?>" placeholder="Pancard Search">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-sm" >
                                    <input type="text" name="name_search" class="form-control" placeholder="Name Search" value="<?=(isset($_GET['name_search'])?$_GET['name_search']:'')?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    Filter
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
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
                            <th style="width: 15px">Service Id</th>
                            
                            <th>Service name</th>
                            <th>Created By</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Pancard Number</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php if(!empty($serviceuser)) {?>
                    <tbody>
                        <?php  
                        $sno = $serviceuser['row']+1;
                        foreach( $serviceuser['result'] as $key => $value) { ?> 
                        <tr>
                            <td><?=$value->custom_id?></td> 
                            <td><?=$value->name?></td> 
                            <td><?=$value->firstName.' '.$value->lastName.'<br>'.$value->regId?></td> 
                            <td><?=$value->_name?></td> 
                            <td><?=$value->_email?></td> 
                            <td><?=$value->_phone?></td> 
                            <td><?=$value->_pancard?></td> 
                            <td><?=$value->status?></td> 
                            <td><?=$value->created_at?></td> 
                            <td><a href="<?=base_url('admin/serviceuser')?>/<?=$value->id?>"><i class="fa fa-eye"></i></a> <a href="<?=base_url('admin/editindex')?>/<?=$value->id?>"><i class="fa fa-pen"></i></a>
                            <?php if ($value->status == 'pending') { ?>
                                <button class="btn btn-success" onClick="ajax_service_status_change(<?php echo $value->id; ?>, 'approved')">Approve</button>
                                <button class="btn btn-danger" onClick="ajax_service_status_change(<?php echo $value->id; ?>, 'reject')">Reject</button>
                            <?php } ?>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <?php } ?>
                </table>
                <div style='margin-top: 10px;'>
                 <div class="text-right pagination"><?php if(isset($serviceuser['pagination'])) { echo $serviceuser['pagination']; }?></div>
                
                </div>
            </div>
                            
        </div>
    </div>
</div>
<style>
    .pagination a, .pagination strong{
       
        border: 1px solid;
        padding-left: 5px;
        padding-right: 5px;
        margin-left: 5px;
        margin-right: 5px;
    }
</style>
<script>
function ajax_service_status_change(serviceid, status) {
  $.ajax({
    url: base_url + "admin/serviceStatusChange",
    method: "POST",
    data: {
      serviceid: serviceid,
      status: status,
    },
    success: function (data) {
      console.log("data", data);
      window.location.reload();
    },
    error: function (error) {
      console.log("error", error);
    },
  });
}

</script>