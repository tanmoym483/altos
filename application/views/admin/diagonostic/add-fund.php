<div class="content-wrapper" style="min-height: 2080.26px;">
<style>
    img {
        display: block;
        max-width: 100%;
    }
    .preview {
        overflow: hidden;
        width: 160px; 
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
    .modal-lg{
        max-width: 1000px !important;
    }
</style>
<div class="container p-4">
    <div class="card p-3">
        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1>Fund Transfer</h1>
                </div>
            </div>
            <!-- <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link  btn btn-primary mr-3" id="introducerfundbtn" href="javascript:void(0)">Franchise Fund</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary " href="javascript:void(0)" id="customerfundbtn">Customer Fund</a>
                </li>
               
            </ul> -->
            <div id="introducerfund" style="display:none;">
               
               
            </div>
            <div id="customerfund" > 
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url("diagonostic/postaddcardfund") ?>">
                    <div class="row">
                    <div class="col-md-12 mb-3" id="customer_wallet_amount"></div>
                    
                        <div class="col-md-3 mb-3">
                            <label class="d-block h-50">Card number <span style="color:#C00">*</span></label>
                            <input type="text" name="customer_code" class="form-control col-xs-8" placeholder="Card number" required="" id="cardnumber_search" >
                        </div>
                        <div class="col-md-3 mb-3" id="memeber_select" style="display:none;">
                            <label class="d-block h-50">Card Member <span style="color:#C00">*</span></label>
                            <select class="form-control col-xs-8" required="" id="memeber_option" name="member">

                            </select>
                           
                        </div>

                        <input type="hidden" name="transType" value="deposite" >
                        <div class="col-md-3 mb-3">
                            <label class="d-block h-50">Amount <span style="color:#C00">*</span></label>
                            <input type="text"  name="amount" class="form-control col-xs-8" placeholder="Amount" id="amount" required="" >
                        </div>
                        
                        
                       
                       
                        
                        
                        <input type="hidden" name="userId" value="" id="userId">
                        
                        <div class="tile-footer col-md-12">
                            <div class="row">
                                <div class="col-md-12  m-1">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </main>
    </div>
</div>



            <style>
.main-footer{display: none;}

</style>