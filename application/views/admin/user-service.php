<div class="content-wrapper" style="min-height: 2080.26px;">
    <div class="card">
        <div class="card-body">
            

            <table class="table table-bordered">
                <thead>
                        <tr>
                            <th>Service Id</th>
                            <th>Service name</th>
                            <th>Service Status</th>
                            <th>Created By</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                </thead>
                <tbody>
                <?php if(!empty($serviceuser)) { 
                       
                   foreach( $serviceuser as  $value) { ?> 
                    <tr>
                        <td><?=$value->custom_id?></td> 
                        <td><?=$value->name?></td> 
                        <td><?=$value->status?></td> 
                        <td><?=$value->firstName.' '.$value->lastName.'<br>'.$value->regId?></td> 
                        <td><?=$value->created_at?></td> 
                        <td><a href="<?=base_url('admin/serviceuser')?>/<?=$value->id?>"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    <?php } } ?>
                </tbody>
               
            </table>
             
        </div>
    </div>
</div>