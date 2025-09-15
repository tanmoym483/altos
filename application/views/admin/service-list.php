<div class="content-wrapper" style="min-height: 2080.26px;">
<div class="card-body">

        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">SL.NO</th>
                                        
                                        <th>Name</th>
                                        <th>Create Form</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if (!empty($services)) { ?>
                                        <?php foreach ($services as $key => $service) {
                                       
                                        ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><div class="tooltip"><?php echo $service->name; ?><span class="tooltiptext">Create form and add commision for publish service</span></div></td>
                                                <td><?php if($service->parent_id == '') {?><a href="createform/<?=$service->id?>">Create Form</a><?php } else { ?><a href="editformview/<?=$service->id?>">Edit Form</a><?php } ?></td>
                                                <td><?php echo $service->status; ?></td>
                                                <td><a href="<?=base_url('admin/serviceedit')?>/<?=$service->id?>"><i class="fa fa-pen"></i></a><a style="margin-left:10px" href="<?=base_url('admin/commision_add_edit')?>/<?=$service->id?>"><i class="fas fa-cog"></i></a></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>


                                </tbody>
                            </table>
                            </div>
                            <?php //echo $this->pagination()->create_links(); 
                            ?>
                        </div>
                    </div>
<style>
    /* Tooltip container */
.tooltip {
  position: relative;
  display: inline-block;
  opacity: 1;
}

/* Tooltip text */
.tooltip .tooltiptext {
  visibility: hidden;
  width: 200px;
  background-color: black;
  color: #fff;
  text-align: center;
  padding: 5px 0;
  border-radius: 6px;
 
  /* Position the tooltip text - see examples below! */
  position: absolute;
  z-index: 1;
}

/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>