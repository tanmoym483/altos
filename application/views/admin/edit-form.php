<div class="content-wrapper" style="min-height: 2080.26px;">
    <div class="card-body">
       
    <form method="post" class="repeater" action="<?php echo base_url('admin/posteditform') ?>">
        <input type="hidden"  name="service_id" value="<?=$formdetails[0]->parent_id?>">
        <input type="hidden"  name="form_id" value="<?=$formdetails[0]->id?>">
        <div  data-repeater-list="field" >
        <?php 
        $formfielddetails = json_decode($formdetails[0]->content);
        if (!empty($formfielddetails)) { 
            foreach ($formfielddetails as $key =>$formfield) { 
            ?>
    
            <div data-repeater-item>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label >Label name</label>
                            <input  type="text" class="form-control" placeholder="Label name" name="label_name" value="<?=$formfield->label_name?>">
                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label >Input name</label>
                            <input readonly type="text" class="form-control" placeholder="Input name" name="input_name" value="<?=$formfield->input_name?>" >
                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label >Field Type</label>
                            <select  readonly class="form-control field_type" name="field_type" >
                            <option value="" >Default</option>
                            <option value="text" <?php if($formfield->field_type == 'text'){ ?>selected <?php } ?>>Text</option>
                            <option value="radio" <?php if($formfield->field_type == 'radio'){ ?>selected <?php } ?>>Radio</option>
                            <option value="checkbox" <?php if($formfield->field_type == 'checkbox'){ ?>selected <?php } ?> >Checkbox</option>
                            <option value="textarea" <?php if($formfield->field_type == 'textarea'){ ?>selected <?php } ?>>Textarea</option>
                            <option value="email" <?php if($formfield->field_type == 'email'){ ?>selected <?php } ?>>email</option>
                            <option value="select" <?php if($formfield->field_type == 'select'){ ?>selected <?php } ?>>Select</option>
                            <option value="password" <?php if($formfield->field_type == 'password'){ ?>selected <?php } ?>>Password</option>
                            <option value="date" <?php if($formfield->field_type == 'date'){ ?>selected <?php } ?>>Date</option>
                            <option value="url" <?php if($formfield->field_type == 'url'){ ?>selected <?php } ?>>Url</option>
                            <option value="file" <?php if($formfield->field_type == 'file'){ ?>selected <?php } ?>>File</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label >Required </label>
                            <select readonly class="form-control mandatory" name="required">
                            <option value="yes" <?php if($formfield->required == 'yes'){ ?>selected <?php } ?> >Yes</option>
                            <option value="no" <?php if($formfield->required == 'no'){ ?>selected <?php } ?>>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label >Placeholder</label>
                            <input  type="text" class="form-control" placeholder="Placeholder" name="placeholder"  value="<?=$formfield->placeholder?>">
                        </div>
                    </div>
                    <div class="col-md-2 option_array <?php if($formfield->option_array == '') { ?> d-none <?php } ?>">
                    <div class="form-group">
                        <label >Option (separated by ', ')</label>
                        <textarea  col="1" row="1" style="height: 36px;" class="form-control" name="option_array" Placeholder="ex: red, blue"><?=$formfield->option_array?></textarea>
                    </div>
                    </div>
                    <div class="col-md-1 ">
                        <div class="action_label d-none"><label>Action</label></div>
                        <?php if(isset($formfield) && $formfield->showAction == 'yes'){ ?>
                            <label>Action</label>
                            <input data-repeater-delete type="button" class="btn-primary" value="-" style="display:block;border: none;" />
                        <?php } ?>
                        <input data-repeater-delete type="button" class="btn-primary d-none" value="-" style="display:block;border: none;" />
                        <input type="hidden" name='showAction' value='<?=$formfield->showAction?>'/>
                    </div>
                </div>
                </div>
               <?php } } ?>
               </div>
                    <input data-repeater-create type="button" value="+" class="btn btn-primary mt-3"/>
               
                
            </div>
                      
                      <div class="col-md-12 mt-3">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                      </div>
                    </form>
                    </div>
</div>

