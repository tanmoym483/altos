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
                        <h1>Emi calculator</h1>
                    </div>
                </div>
               
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="d-block h-25">Enter Amount <span style="color:#C00">*</span></label>
                            <input type="number" name="amount" class="form-control emi-amount col-xs-8"  required="">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="d-block h-25" style="opacity:0">Enter Amount </label>
                            <button class="btn btn-primary" type="button" id="emi-calculator-btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Calculate</button>
                        </div>
                        <div class="col-md-12 mb-3" >
                            <table class="table table-bordered" id="emi-calculator-display-section" style="display:none;">
                                <thead>
                                    <tr>
                                        <th>Down payment</th>
                                        <th>1st EMI</th>
                                        <th>Total EMI timing</th>
                                        <th>EMI Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                            <input type="hidden" name="payment" value="" id="downpayment_amount" >
                        </div>
                    </div>
        </main>
    </div>
</div>
<style>
    .main-footer{display: none;}
</style>