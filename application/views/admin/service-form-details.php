<div class="content-wrapper" style="min-height: 2080.26px;">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Service</th>
                    <td><?=$serviceuser[0]->name?> (<?=$serviceuser[0]->custom_id?>)</td>
                </tr>
                <tr>
                    <th>Created By</th>
                    <td><?=$serviceuser[0]->firstName?> <?=$serviceuser[0]->lastName?> (<?=$serviceuser[0]->regId?>)</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><?=$serviceuser[0]->status?> </td>
                </tr>
                <?php foreach($formvalue as $key=>$form){ 
                    //print_r($form->form_value);
                    $extension = pathinfo($form->form_value, PATHINFO_EXTENSION);
                   
                    $dextension = ['pdf','doc','docx','xlsx'];
                    $imgextension = ['jpg','jpeg','png'];
                    
                    ?>
                <tr>
                    <th><?=ucfirst(str_replace('_',' ',$form->form_key))?></th>
                    <td>
                    <?php 
                    if($extension != '' && $extension != 'com' && $extension != 'COM' ) {
                       
                    if( in_array($extension,$dextension)){ ?>
                        <a href="<?php echo base_url('uploads/'.$form->form_value) ?>" target="_blank">View</a>
                        <?php } 
                        if(in_array($extension,$imgextension)){?>
                            <a href="<?php echo base_url('uploads/'.$form->form_value) ?>" target="_blank"><img src="<?php echo base_url('uploads/'.$form->form_value) ?>" width="200px" height="200px"  /></a> 
                            
                        <?php } } else { ?>   
                    
                    <?=$form->form_value?></td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>
               
        </div>
    </div>
</div>