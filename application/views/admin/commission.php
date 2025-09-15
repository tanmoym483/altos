<div class="content-wrapper" style="min-height: 2080.26px;">
    <div class="card">
        <div class="card-header">

            <h3 class="card-title">Commision List</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            
                            
                            <th>Associate Designation</th>
                            <th>Associate Target</th>
                            <th>Associate Commision</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php if(!empty($commisions)) {?>
                    <tbody>
                        <?php  
                        
                        foreach( $commisions as $key => $value) { ?> 
                        <tr>
                            <td><?=$value->level_name?></td> 
                            <td><?=$value->target?></td> 
                            <td><?=$value->commision?></td> 
                           
                            <td><a href="<?=base_url('admin/editcommision')?>/<?=$value->id?>"><i class="fa fa-pen"></i></a></td>
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