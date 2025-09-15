<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">


                                <form action="<?php echo base_url("admin/postaddcarddetails") ?>" method="POST" enctype="multipart/form-data">


                                    <div class="row">
                                       
                                        <div class="col-md-4 mb-3">
                                            <label>Introducer code <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="regid" id="name" placeholder="Introducer code" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Card Type <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="card_type"  id="mobile" value="Sliver" readonly>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label>Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="user[0][name]" id="name" placeholder="Name" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Mobile <span style="color:#C00">*</span></label>
                                            <input type="number" class="form-control" name="user[0][phone]" placeholder="Mobile" id="mobile" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Email ID <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="user[0][email]" id="email" placeholder="Email ID" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Age <span style="color:#C00">*</span></label>
                                            <input type="number" class="form-control" name="user[0][age]" id="email" placeholder="Age" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Relation <span style="color:#C00">*</span></label>
                                            <select name="user[0][relation]" class="form-control">
                                                <option value="Mother">Mother</option>
                                                <option value="Father">Father</option>
                                                <option value="Brother">Brother</option>
                                                <option value="Sister">Sister</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Adhar front image <span style="color:#C00">*</span></label>
                                           <input type="file" class="form-control" name="user[0][adharfront]">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Adhar Back image <span style="color:#C00">*</span></label>
                                           <input type="file" class="form-control" name="user[0][pancard]">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Pan card (Up 18 years)</label>
                                           <input type="file" class="form-control" name="user[0][pancard]">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Birth certificate (Below 18 years)</label>
                                           <input type="file" class="form-control" name="user[0][pancard]">
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label>Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="user[1][name]" id="name" placeholder="Name" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Mobile <span style="color:#C00">*</span></label>
                                            <input type="number" class="form-control" name="user[1][phone]" placeholder="Mobile" id="mobile" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Email ID <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="user[1][email]" id="email" placeholder="Email ID" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Age <span style="color:#C00">*</span></label>
                                            <input type="number" class="form-control" name="user[1][age]" id="email" placeholder="Age" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Relation <span style="color:#C00">*</span></label>
                                            <select name="user[1][relation]" class="form-control">
                                                <option value="Mother">Mother</option>
                                                <option value="Father">Father</option>
                                                <option value="Brother">Brother</option>
                                                <option value="Sister">Sister</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Adhar front image <span style="color:#C00">*</span></label>
                                           <input type="file" class="form-control" name="user[1][adharfront]">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Adhar Back image <span style="color:#C00">*</span></label>
                                           <input type="file" class="form-control" name="user[1][pancard]">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Pan card (Up 18 years)</label>
                                           <input type="file" class="form-control" name="user[1][pancard]">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Birth certificate (Below 18 years)</label>
                                           <input type="file" class="form-control" name="user[1][pancard]">
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label>Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="user[2][name]" id="name" placeholder="Name" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Mobile <span style="color:#C00">*</span></label>
                                            <input type="number" class="form-control" name="user[2][phone]" placeholder="Mobile" id="mobile" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Email ID <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="user[2][email]" id="email" placeholder="Email ID" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Age <span style="color:#C00">*</span></label>
                                            <input type="number" class="form-control" name="user[2][age]" id="email" placeholder="Age" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Relation <span style="color:#C00">*</span></label>
                                            <select name="user[0][relation]" class="form-control">
                                                <option value="Mother">Mother</option>
                                                <option value="Father">Father</option>
                                                <option value="Brother">Brother</option>
                                                <option value="Sister">Sister</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Adhar front image <span style="color:#C00">*</span></label>
                                           <input type="file" class="form-control" name="user[2][adharfront]">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Adhar Back image <span style="color:#C00">*</span></label>
                                           <input type="file" class="form-control" name="user[2][pancard]">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Pan card (Up 18 years)</label>
                                           <input type="file" class="form-control" name="user[2][pancard]">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Birth certificate (Below 18 years)</label>
                                           <input type="file" class="form-control" name="user[2][pancard]">
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label>Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="user[3][name]" id="name" placeholder="Name" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Mobile <span style="color:#C00">*</span></label>
                                            <input type="number" class="form-control" name="user[3][phone]" placeholder="Mobile" id="mobile" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Email ID <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="user[3][email]" id="email" placeholder="Email ID" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Age <span style="color:#C00">*</span></label>
                                            <input type="number" class="form-control" name="user[3][age]" id="email" placeholder="Age" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Relation <span style="color:#C00">*</span></label>
                                            <select name="user[3][relation]" class="form-control">
                                                <option value="Mother">Mother</option>
                                                <option value="Father">Father</option>
                                                <option value="Brother">Brother</option>
                                                <option value="Sister">Sister</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Adhar front image <span style="color:#C00">*</span></label>
                                           <input type="file" class="form-control" name="user[3][adharfront]">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Adhar Back image <span style="color:#C00">*</span></label>
                                           <input type="file" class="form-control" name="user[3][pancard]">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Pan card (Up 18 years)</label>
                                           <input type="file" class="form-control" name="user[3][pancard]">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Birth certificate (Below 18 years)</label>
                                           <input type="file" class="form-control" name="user[3][pancard]">
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label>Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="user[4][name]" id="name" placeholder="Name" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Mobile <span style="color:#C00">*</span></label>
                                            <input type="number" class="form-control" name="user[4][phone]" placeholder="Mobile" id="mobile" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Email ID <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="user[4][email]" id="email" placeholder="Email ID" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Age <span style="color:#C00">*</span></label>
                                            <input type="number" class="form-control" name="user[4][age]" id="email" placeholder="Age" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Relation <span style="color:#C00">*</span></label>
                                            <select name="user[4][relation]" class="form-control">
                                                <option value="Mother">Mother</option>
                                                <option value="Father">Father</option>
                                                <option value="Brother">Brother</option>
                                                <option value="Sister">Sister</option>
                                                <option value="Wife">Wife</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Adhar front image <span style="color:#C00">*</span></label>
                                           <input type="file" class="form-control" name="user[4][adharfront]">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Adhar Back image <span style="color:#C00">*</span></label>
                                           <input type="file" class="form-control" name="user[4][pancard]">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Pan card (Up 18 years)</label>
                                           <input type="file" class="form-control" name="user[4][pancard]">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Birth certificate (Below 18 years)</label>
                                           <input type="file" class="form-control" name="user[4][pancard]">
                                        </div>
                                    </div> 
                                    <div class="row">    
                                      
                                        <div class="col-md-12 mb-6">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                        </div>

                                    </div>





                                </form>
                            </div>

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>