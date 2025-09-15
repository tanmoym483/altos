<div class="content-wrapper" style="min-height: 2080.26px;">
    <div class="card-body">
    <form method="post" class="repeater" action="<?php echo base_url('admin/postcreateform') ?>">
        <input type="hidden" value="<?=$id?>" name="service_id" >
    <div  data-repeater-list="field" >
    <div data-repeater-item>
            <div class="row">
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Label name</label>
                        <input  type="text" class="form-control" placeholder="Label name" name="label_name" value="Pancard number">
                        
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Input name</label>
                        <input readonly type="text" class="form-control" placeholder="Label name" name="input_name" value="pancard_number">
                        
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Field Type</label>
                        <select readonly class="form-control field_type" name="field_type" >
                        <option value="" >Default</option>
                        <option value="text" selected>Text</option>
                        <option value="radio">Radio</option>
                        <option value="checkbox" >Checkbox</option>
                        <option value="textarea">Textarea</option>
                        <option value="email">Email</option>
                        <option value="select">Select</option>
                        <option value="password">Password</option>
                        <option value="date">Date</option>
                        <option value="url">Url</option>
                        <option value="number">Number</option>
                        <option value="file">File</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Required </label>
                        <select readonly class="form-control mandatory" name="required">
                        <option value="yes" selected>Yes</option>
                        <option value="no">No</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Placeholder</label>
                        <input  type="text" class="form-control" placeholder="Placeholder" name="placeholder" value="Enter pancard number">
                    </div>
                    </div>
                    <div class="col-md-2 option_array d-none">
                    <div class="form-group">
                        <label >Option (separated by ', ')</label>
                        <textarea  row="1" style="height: 36px;" class="form-control" name="option_array" Placeholder="ex: red, blue"></textarea>
                    </div>
                    </div>
                    <div class="col-md-1 d-none action">
                    <label>Action</label>
                    <input data-repeater-delete type="button" class="btn-primary" value="-" style="display:block;border: none;" />
                        <input type="hidden" name='showAction' value='no'/>
                    </div>
                </div>
                </div> 
        <div data-repeater-item>
            <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label >Label name</label>
                            <input  type="text" class="form-control" placeholder="Label name" name="label_name" value="Name"/>
                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label >Input name</label>
                            <input readonly type="text" class="form-control" placeholder="Input name" name="input_name" value="name" />
                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label >Field Type</label>
                            <select  readonly class="form-control field_type" name="field_type"  >
                                <option value="" >Default</option>
                                <option value="text" selected >Text</option>
                                <option value="radio">Radio</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="textarea">Textarea</option>
                                <option value="email">Email</option>
                                <option value="select">Select</option>
                                <option value="password">Password</option>
                                <option value="date">Date</option>
                                <option value="url">Url</option>
                                <option value="number">Number</option>
                                <option value="file">File</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label >Required </label>
                            <select readonly class="form-control mandatory" name="required">
                                <option value="yes" selected >Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label >Placeholder</label>
                            <input  type="text" class="form-control" placeholder="Placeholder" name="placeholder" value="Enter Name" >
                        </div>
                    </div>
                    <div class="col-md-2 option_array d-none">
                    <div class="form-group" >
                        <label >Option (separated by ', ')</label>
                        <textarea  row="1" style="height: 36px;" class="form-control" name="option_array" Placeholder="ex: red, blue"></textarea>
                    </div>
                    </div>
                    <div class="col-md-1 d-none action">
                        <label>Action</label>
                        <input data-repeater-delete type="button" class="btn-primary" value="-" style="display:block;border: none;" />
                        <input type="hidden" name='showAction' value='no'/>
                    </div>
                </div>
            </div>
        <div data-repeater-item>
            <div class="row">
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Label name</label>
                        <input  type="text" class="form-control" placeholder="Label name" name="label_name" value="Email Address">
                        
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Input name</label>
                        <input readonly type="text" class="form-control" placeholder="Label name" name="input_name" value="email">
                        
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Field Type</label>
                        <select readonly class="form-control field_type" name="field_type"  >
                        <option value="" >Default</option>
                        <option value="text">Text</option>
                        <option value="radio">Radio</option>
                        <option value="checkbox">Checkbox</option>
                        <option value="textarea">Textarea</option>
                        <option value="email" selected>Email</option>
                        <option value="select">Select</option>
                        <option value="password">Password</option>
                        <option value="date">Date</option>
                        <option value="url">Url</option>
                        <option value="number">Number</option>
                        <option value="file">File</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Required </label>
                        <select readonly class="form-control mandatory" name="required">
                        <option value="yes" selected>Yes</option>
                        <option value="no">No</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label>Placeholder</label>
                        <input  type="text" class="form-control" placeholder="Placeholder" name="placeholder" value="Enter Email Address">
                    </div>
                    </div>
                    <div class="col-md-2 option_array d-none">
                    <div class="form-group">
                        <label >Option (separated by ', ')</label>
                        <textarea  row="1" col='1' style="height: 36px;" class="form-control" name="option_array" Placeholder="ex: red, blue"></textarea>
                    </div>
                    </div>
                    <div class="col-md-1 d-none action">
                    <label>Action</label>
                    <input data-repeater-delete type="button" class="btn-primary" value="-" style="display:block;border: none;" />
                        <input type="hidden" name='showAction' value='no'/>
                    </div>
                </div>
                </div> 
                <div data-repeater-item>
            <div class="row">
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Label name</label>
                        <input type="text"  class="form-control" placeholder="Label name" name="label_name" value="Phone Number">
                        
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Input name</label>
                        <input readonly type="text" class="form-control" placeholder="Input name" name="input_name" value="phone">
                        
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Field Type</label>
                        <select readonly class="form-control field_type" name="field_type">
                        <option value="" >Default</option>
                        <option value="text" selected>Text</option>
                        <option value="radio">Radio</option>
                        <option value="checkbox">Checkbox</option>
                        <option value="textarea">Textarea</option>
                        <option value="email">Email</option>
                        <option value="select">Select</option>
                        <option value="password">Password</option>
                        <option value="date">Date</option>
                        <option value="url">Url</option>
                        <option value="number">Number</option>
                        <option value="file">File</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Required </label>
                        <select readonly class="form-control mandatory" name="required">
                        <option value="yes" selected>Yes</option>
                        <option value="no">No</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Placeholder</label>
                        <input  type="text" class="form-control" placeholder="Placeholder" name="placeholder" value="Enter Phone Number">
                    </div>
                    </div>
                    <div class="col-md-2 option_array d-none" >
                    <div class="form-group">
                        <label >Option (separated by ', ')</label>
                        <textarea   row="1" col='1' style="height: 36px;" class="form-control" name="option_array" Placeholder="ex: red, blue"></textarea>
                    </div>
                    </div>
                    <div class="col-md-1 d-none action">
                    <label>Action</label>
                    <input data-repeater-delete type="button" class="btn-primary" value="-" style="display:block;border: none;" />
                        <input type="hidden" name='showAction' value='no'/>
                    </div>
                </div>
                </div> 
                
                <div data-repeater-item>
            <div class="row">
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Label name</label>
                        <input  type="text" class="form-control" placeholder="Label name" name="label_name" value="Amount">
                        
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Input name</label>
                        <input readonly type="text" class="form-control" placeholder="Label name" name="input_name" value="amount">
                        
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Field Type</label>
                        <select readonly class="form-control field_type" name="field_type" >
                        <option value="" >Default</option>
                        <option value="text" >Text</option>
                        <option value="radio">Radio</option>
                        <option value="checkbox" >Checkbox</option>
                        <option value="textarea">Textarea</option>
                        <option value="email">Email</option>
                        <option value="select">Select</option>
                        <option value="password">Password</option>
                        <option value="date">Date</option>
                        <option value="url">Url</option>
                        <option value="number" selected>Number</option>
                        <option value="file">File</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Required </label>
                        <select readonly class="form-control mandatory" name="required">
                        <option value="yes" selected>Yes</option>
                        <option value="no">No</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label >Placeholder</label>
                        <input  type="text" class="form-control" placeholder="Placeholder" name="placeholder" value="Enter Amount">
                    </div>
                    </div>
                    <div class="col-md-2 option_array d-none">
                    <div class="form-group">
                        <label >Option (separated by ', ')</label>
                        <textarea  row="1" style="height: 36px;" class="form-control" name="option_array" Placeholder=""></textarea>
                    </div>
                    </div>
                    <div class="col-md-1 d-none action">
                    <label>Action</label>
                    <input data-repeater-delete type="button" class="btn-primary" value="-" style="display:block;border: none;" />
                        <input type="hidden" name='showAction' value='no'/>
                    </div>
                </div>
                </div> 
                    </div>
                      <input data-repeater-create type="button" value="+" class="btn btn-primary mt-3"/>
                      <div class="col-md-12 mt-3">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                      </div>
                    </form>
                    </div>
</div>