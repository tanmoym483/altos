<div class="content-wrapper" style="min-height: 2080.26px;">
    <div class="container p-4">
        <div class="card p-3">
            <main class="app-content">
                <div class="app-title">
                    <div>
                        <h1>Add <?=$service->name?> Commission</h1>
                    </div>
                </div>
               
                <form method="post" action="<?php echo base_url('admin/postaddeditcommision') ?>" enctype="multipart/form-data">
                    <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="d-block h-25">Commision Type <span style="color:#C00">*</span></label>
                                <select name="commision_type"  required="" class="form-control commision_type">
                                    <option value="fixed" <?=(!empty($service_commision) && $service_commision['service'][0]['commision_type'] == 'fixed')?'selected':''?>>Fixed</option>
                                    <option value="percentage" <?=(!empty($service_commision) && $service_commision['service'][0]['commision_type'] == 'percentage')?'selected':''?>>Percentage</option>
                                </select>
                            </div>
                            <input type="hidden" name="service-id" value="<?=$service->id?>" >
                            <div class="col-md-12 mb-3">
                            <table class="table table-bordered" style="width:50%">
                                <tr>
                                    <th >Level</th>
                                    <th class="commision">Commision in <?=(!empty($service_commision) && $service_commision['service'][0]['commision_type'] == 'percentage')?'%':'&#8377;'?> <span style="color:#C00">*</span></th>
                                </tr>
                           <?php for($i = 0; $i < 15; $i++) {?>
                            <tr>
                                <td >
                                <input type="hidden"  name="service[<?=$i?>][level_name]" value="Lavel <?=$i+1?>" >
                                Lavel <?=$i+1?>
                                </td>
                                <td >
                                <input type="number" min="0" class="form-control" name="service[<?=$i?>][commision]"  placeholder="Commision"  required="" value="<?php echo (!empty($service_commision)?$service_commision['service'][$i]['commision']: 0); ?>">
                                </td>
                           
                           
                           
                           </tr>
                        <?php } ?>
                           </table>
                           </div>
                        <div class="col-md-12 mb-3 mt-3">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                        </div>
                        
                
            </div></form></main>
        </div>
    </div>
</div>