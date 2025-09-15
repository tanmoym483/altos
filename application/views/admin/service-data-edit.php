<div class="content-wrapper" style="min-height: 2080.26px;">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Service</th>
                    <td><?=$serviceuser[0]->name?></td>
                </tr>
                <tr>
                    <th>Created By</th>
                    <td><?=$serviceuser[0]->firstName?> <?=$serviceuser[0]->lastName?></td>
                </tr>
            </table>
               
                <?php 
                $inputdetails = json_decode($formdata[0]->content);
                  
                foreach($inputdetails as $key => $input){ ?>
                   <?php $CI =& get_instance();
                        $CI->load->model('Admin_model','modd');
                        $input_key = $input->input_name;
                        $post_id = $formdata[0]->form_value_id; 
                        $data = $CI->modd->get_field($input_key,$post_id);
                        $info = $data->row();
                        
                       // if(!empty($info)){
                         //$form_key = $data->row()->form_key;
                         $form = $data->row();
                         
                        if($form == '' || $form == null ){
                            $form_value = '';
                        } else {
                            $form_value = $data->row()->form_value;
                        }

                        $_option_arr = array();
                        if( ($input->field_type == 'select' || $input->field_type == 'checkbox' )) {
                         $_option_arr = explode(", ",$form_value);
                        }
                        
                      
                   ?>
                   
                 <form method="post" action="<?php echo base_url('admin/posteditformdata') ?>" enctype="multipart/form-data">
                 <input type="hidden" value="<?=$post_id?>" name="form_value_id" />
                  <?php   if($input->field_type == 'textarea') { ?>
                     <div class="col-md-12">
                        <label><?=$input->label_name?> <?php if($input->required == 'yes'){?><span style="color:#C00">*</span><?php } ?></label>
                       <textarea placeholder="<?=$input->placeholder?>" <?php echo ($input->required == 'yes')?'required':''?> name="form[<?=$input->input_name?>]" class="form-control mb-3" ><?=$form_value?></textarea>
                    </div>
                   <?php } if($input->field_type == 'radio' ){  ?>
                    <div class="col-md-12">
                        <label><?=$input->label_name?> </label>
                        <?php $arr = $input->option_array; 
                             $option_arr = explode(", ",$arr);
                             foreach( $option_arr as $option) { ?>
                       <input type="<?=$input->field_type?>" value="<?=$option?>"  name="form[<?=$input->input_name?>]" class="mr-1" <?=($option == $form_value)?'checked':''?> ><?=$option?>
                    
                       <?php } ?></div>
                  <?php } if($input->field_type == 'select'){ ?>
                        <div class="col-md-12">
                        <label><?=$input->label_name?> <?php if($input->required == 'yes'){?><span style="color:#C00">*</span><?php } ?></label>
                        <select name="form[<?=$input->input_name?>]" class="form-control mb-3" <?php echo ($input->required == 'yes')?'required':''?> >
                        <?php $arr = $input->option_array; 
                             $option_arr = explode(", ",$arr);
                             foreach( $option_arr as $option) { ?>
                       <option value="<?=$option?>" <?=(in_array($option,$_option_arr))?'selected':''?> ><?=$option?></option>
                       
                    
                       <?php } ?>
                        </select></div>
                  <?php } if($input->field_type == 'text' || $input->field_type == 'email' || $input->field_type == 'password' || $input->field_type == 'date' || $input->field_type == 'url'){ ?>
                    <div class="col-md-12">
                       <label><?=$input->label_name?> <?php if($input->required == 'yes'){?><span style="color:#C00">*</span><?php } ?></label>
                       <input type="<?=$input->field_type?>" <?php echo ($input->required == 'yes')?'required':''?> placeholder="<?=$input->placeholder?>" name="form[<?=$input->input_name?>]" class="form-control mb-3" value="<?=$form_value?>" >
                   </div>
                   <?php  } if($input->field_type == 'checkbox'){ ;?>
                    <div class="col-md-12">
                        <label><?=$input->label_name?> </label>
                        <?php $arr = $input->option_array; 
                             $option_arr = explode(", ",$arr);
                             foreach( $option_arr as $option) { ?>
                       <input type="<?=$input->field_type?>" value="<?=$option?>"  name="form[<?=$input->input_name?>][]" class="mr-1" <?=(in_array($option,$_option_arr))?'checked':''?> ><?=$option?>
                    
                       <?php } ?></div>
                 <?php  } if($input->field_type == 'file'  ){ 
                     
                      $extension = pathinfo($form_value, PATHINFO_EXTENSION);
                      
                      $dextension = ['pdf','doc','docx','xlsx'];
                      $imgextension = ['jpg','jpeg','png'];
                     
                    ?>
                    <div class="col-md-12">
                        <label><?=$input->label_name?> <?php if($input->required == 'yes'){?><span style="color:#C00">*</span><?php } ?></label>
                        <?php if(in_array($extension,$dextension)){ ?>
                        <a href="<?php echo base_url('uploads/'.$form_value) ?>" target="_blank">View</a>
                        <?php } if(in_array($extension,$imgextension)){ ?>
                            <a href="<?php echo base_url('uploads/'.$form_value) ?>" target="_blank"><img src="<?php echo base_url('uploads/'.$form_value) ?>" width="100px" height="100px" /></a> 
                            
                        <?php } ?>
                       <input accept="<?=$input->option_array?>" type="<?=$input->field_type?>"  placeholder="<?=$input->placeholder?>" name="form[<?=$input->input_name?>]" class="form-control mb-3" value="<?=$form_value?>" >
                    
                       </div>
                 <?php }   } ?>
                 <div class="col-md-3 mb-3 mt-3">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                 </div>

                 </form>
               
        </div>
    </div>
</div>