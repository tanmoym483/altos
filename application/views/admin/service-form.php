<div class="content-wrapper" style="min-height: 2080.26px;">
    <div class="container p-4">
        <div class="card p-3">
            <form class="service-form" method="GET" action="" >
                <select name="service_name" class="form-control">
                    <option value="" >Default</option>
                    <?php foreach($services as $service) {?>
                    <option value="<?=$service->slug?>" <?php if(isset($_GET['service_name']) && $_GET['service_name'] == $service->slug ) { ?>selected<?php } ?>><?=$service->name?></option>
                    <?php } ?>
                </select>
                <button class="btn btn-primary mt-3" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
            </form>
        </div>
        <?php 
            
        if(!empty($formdetails)){ ?>
        <div class="card p-3">
            
            <form method="post" class="service-form" action="<?php echo base_url('admin/postserviceform') ?>" enctype="multipart/form-data" >
               <input type="hidden" name="user_id" value="<?=$this->session->userdata('userId')?>" >
               <input type="hidden" name="service_id" value="<?=$formdetails[0]->parent_id?>"  >
               <input type="hidden" name="form_id" value="<?=$formdetails[0]->id?>"  >
               <input type="hidden" name="customer_id" value=""  >
                <div class="row">
                <div class="col-lg-12 emptydata"></div>
                <?php 
                    $inputdetails = json_decode($formdetails[0]->content);
                  
                foreach($inputdetails as $input){
                   
                    if($input->field_type == 'textarea') { ?>
                     <div class="col-md-12">
                        <label><?=$input->label_name?> <?php if($input->required == 'yes'){?><span style="color:#C00">*</span><?php } ?></label>
                       <textarea placeholder="<?=$input->placeholder?>" <?php echo ($input->required == 'yes')?'required':''?> name="form[<?=$input->input_name?>]" class="form-control mb-3" ></textarea>
                    </div>
                   <?php } if($input->field_type == 'radio' ){  ?>
                    <div class="col-md-3">
                        <label><?=$input->label_name?> <?php if($input->required == 'yes'){?><span style="color:#C00">*</span><?php } ?></label><br>
                        <?php $arr = $input->option_array; 
                             $option_arr = explode(", ",$arr);
                             foreach( $option_arr as $option) { ?>
                       <input type="<?=$input->field_type?>" value="<?=$option?>"  name="form[<?=$input->input_name?>]" class="mr-1" ><?=$option?>
                    
                       <?php } ?></div>
                  <?php } if($input->field_type == 'select'){ ?>
                        <div class="col-md-3">
                        <label><?=$input->label_name?> <?php if($input->required == 'yes'){?><span style="color:#C00">*</span><?php } ?></label>
                        <select name="form[<?=$input->input_name?>]" class="form-control mb-3" <?php echo ($input->required == 'yes')?'required':''?> >
                        <?php $arr = $input->option_array; 
                             $option_arr = explode(", ",$arr);
                             foreach( $option_arr as $option) { ?>
                       <option value="<?=$option?>" ><?=$option?></option>
                       
                    
                       <?php } ?>
                        </select></div>
                  <?php } if($input->field_type == 'text' || $input->field_type == 'email' || $input->field_type == 'password' || $input->field_type == 'date' || $input->field_type == 'url'){ ?>
                    <div class="col-md-3">
                       <label><?=$input->label_name?> <?php if($input->required == 'yes'){?><span style="color:#C00">*</span><?php } ?></label>
                       <input type="<?=$input->field_type?>" <?php echo ($input->required == 'yes')?'required':''?> placeholder="<?=$input->placeholder?>" name="form[<?=$input->input_name?>]" id="input_<?=$input->input_name?>" class="form-control mb-3" >
                       
                   </div>
                   <?php  } if($input->field_type == 'checkbox'){ ?>
                    <div class="col-md-12">
                        <label><?=$input->label_name?> </label>
                        <?php $arr = $input->option_array; 
                             $option_arr = explode(", ",$arr);
                             foreach( $option_arr as $option) { ?>
                       <input type="<?=$input->field_type?>" value="<?=$option?>"  name="form[<?=$input->input_name?>][]" class="mr-1" ><?=$option?>
                    
                       <?php } ?></div>
                 <?php  } if($input->field_type == 'file'){ ?>
                    <div class="col-md-12">
                        <label><?=$input->label_name?> </label>
                        
                       <input accept="<?=$input->option_array?>" type="<?=$input->field_type?>" <?php echo ($input->required == 'yes')?'required':''?> placeholder="<?=$input->placeholder?>" name="form[<?=$input->input_name?>]" class="form-control mb-3"  >
                    
                       </div>
                 <?php }  } ?>
                 </div>
                  <div class="col-md-12 mt-3">
                    <button class="btn btn-primary form-submit" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                   </div>
            </form>
         </div>
        <?php } ?>
       
    </div>
</div>
