<div class="content-wrapper" style="min-height: 2080.26px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">
                            
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <img class="img-responsive w-100" src="<?php echo base_url('uploads/' . $data->product_image); ?>">
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        
                                        <h5><?=$data->product?></h5>
                                        <h5><span style="font-weight:500">₹<?=$data->product_selling_price?></span> <span style="color: #878787;text-decoration: line-through;">₹<?=$data->product_mrp?></span> <span class="text-success"><?=($data->units=='percentage')?$data->product_offer.'%'.' off':'₹'.$data->product_offer.' off'?></span></h5>
                                        <div >
                                            <form method="post" class="row" action="<?=base_url('shopping/addtocart')?>">
                                                <input type="hidden" name="product_id" value="<?=$data->id?>">
                                                <input type="hidden" name="shop_id" value="<?=$data->shop_id?>">
                                                <input type="hidden" name="user_id" value="<?=$_SESSION['userId']?>">
                                                <input type="hidden" name="amount" value="<?=$data->product_selling_price?>">

                                                <div class="col-md-3">
                                                    <div class="input-group">
                                                        <input type="button" value="-" class="button-minus" data-field="quantity">
                                                        <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field">
                                                        <input type="button" value="+" class="button-plus" data-field="quantity">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 input-group">
                                                    <button class="btn btn-primary add_to_cart" type="submit">Add To Cart</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td style="color:#878787">Description</td>
                                                        <td><?=$data->description?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <h6>General</h6>
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td style="color:#878787">Brand</td>
                                                        <td><?=$data->product_brand?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="color:#878787">Model</td>
                                                        <td><?=$data->product_model?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="color:#878787">Quantity</td>
                                                        <td><?=$data->net_quantity?><?=$data->quantity?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="color:#878787">Expired Month</td>
                                                        <td><?=date('F Y',strtotime($data->expired_month))?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                               
                                 
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    <style>
        svg{width:15px;}
        input,
textarea {
  border: 1px solid #eeeeee;
  box-sizing: border-box;
  margin: 0;
  outline: none;
  padding: 10px;
}

input[type="button"] {
  -webkit-appearance: button;
  cursor: pointer;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
}

.input-group {
  clear: both;
  margin: 15px 0;
  position: relative;
}

.input-group input[type='button'] {
  background-color: #eeeeee;
  min-width: 38px;
  width: auto;
  transition: all 300ms ease;
}

.input-group .button-minus,
.input-group .button-plus {
  font-weight: bold;
  height: 38px;
  padding: 0;
  width: 38px;
  position: relative;
}

.input-group .quantity-field {
  position: relative;
  height: 38px;
  left: -6px;
  text-align: center;
  width: 62px;
  display: inline-block;
  font-size: 13px;
  margin: 0 0 5px;
  resize: vertical;
}

.button-plus {
  left: -13px;
}

input[type="number"] {
  -moz-appearance: textfield;
  -webkit-appearance: none;
}

    </style>