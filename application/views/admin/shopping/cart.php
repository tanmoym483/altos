<div class="content-wrapper" style="min-height: 2080.26px;">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cart list</h1>
                </div>
                <div class="col-sm-6">
                    
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Cart List</li>
                    </ol>
                   
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="card">
        <div class="card-header row">
                <div class="col-lg-12">
                    
                </div>
                <div class="col-lg-10">
                   
                </div>
                <div class="p-2 col-lg-2 text-right">
                        <!-- <button type="button" class="btn btn-custom saveAsExcel"> <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                <path d="M5.9 20.775q-1.1 0-1.875-.775-.775-.775-.775-1.875v-3.05H5.9v3.05h12.2v-3.05h2.65v3.05q0 1.1-.775 1.875-.775.775-1.875.775Zm6.125-4.6-6-6L7.9 8.3l2.8 2.8V3.075h2.65V11.1l2.8-2.8 1.875 1.875Z"></path>
                                            </svg> Excel </button> -->
                </div>
            </div>
            
        
        <div class="card-body">
                <div class="table-responsive">
                <?php if (!empty($cartitems)) { ?>
                            <table class="table table-bordered" style="font-size:14px">
                                <thead>
                                    <tr>
                                        <th >SI No</th>
                                        <th>Product Name</th>
                                        
                                        <th>Amount</th>
                                        <th>Qantity</th>
                                        <th>Total Amount</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     
                                    
                                        <?php 
                                        $page = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
                                        $total = 0;
                                        foreach ($cartitems as $key => $customer) {
                                       
                                        ?>
                                            <tr>
                                                <td> <?php 
                                                        if($page == 0 || $page == 1){
                                                            echo $serial_number = ($page*10)+ $key + 1;
                                                        } else{
                                                            echo $serial_number = (($page-1)*10)+ $key + 1;
                                                        }
                                                        ?>  </td>
                                               
                                                <td><?php echo $customer->product; ?></td>
                                               
                                                
                                              
                                                <td><?php echo $customer->amount; ?></td>
                                                <td>
                                                    <!-- <form method="post" action="<?=base_url('shopping/updatecart')?>"> -->
                                                        <input type="hidden" name="cart_id" value="<?php echo $customer->id; ?>">
                                                        <div class="input-group cart-quantity">
                                                            <input type="button" value="-" class="button-minus" data-field="quantity" data-id="<?php echo $customer->id; ?>">
                                                            <input type="number" step="1" max="" value="<?php echo $customer->quantity; ?>" name="quantity" class="quantity-field" >
                                                            <input type="button" value="+" class="button-plus" data-field="quantity" data-id="<?php echo $customer->id; ?>">
                                                        </div>
                                                        <!-- <button type="submit" class="btn btn-primary">Update</button> -->
                                                    <!-- </form> -->
                                                </td>
                                                <td><?php echo $total_amount = $customer->quantity * $customer->amount; $total = $total + $total_amount;  ?></td>
                                                <td><a href="<?=base_url('shopping/cartdelete')?>/<?=$customer->id?>" class="text-danger" ><i class="fa fa-trash"></i></a>
                                                
                                                </td>
                                               
                                               
                                                
                                                <!-- <td><?php //echo $customer->status; ?></td> -->
                                               
                                                
                                            </tr>
                                        <?php } ?>
                                   


                                </tbody>
                            </table>
                            <h5 style="text-align:right"><strong>Total: <?php echo $total; ?></strong></h5>
                            <a href="<?=base_url('shopping/checkout')?>" style="float:right" class="btn btn-primary">Place order</a> 
                            <?php } else {?>
                                        <p class="text-align:center">No Product in cart</p>
                                    <?php } ?>
                                 
                            </div>
                            <?php //echo $this->pagination()->create_links(); 
                            ?>
                        </div>
                    </div>
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
.cart-quantity{
  min-width: 75px;
}
.input-group {
  clear: both;
  margin: 15px 0;
  position: relative;
}

.input-group input[type='button'] {
  background-color: #2da0ed;
  min-width: 21px;
  width: auto;
  transition: all 300ms ease;
  color:#fff;
}

.input-group .button-minus,
.input-group .button-plus {
  font-weight: bold;
  height: 38px;
  padding: 0;
  width: 38px;

}

.input-group .quantity-field {
  height: 38px;
  left: -6px;
  text-align: center;
  width: 31px;
  display: inline-block;
  font-size: 13px;
  margin: 0 0 5px;
  resize: vertical;
  padding:0 !important;
}

.button-plus {
  left: -13px;
}

input[type="number"] {
  -moz-appearance: textfield;
  -webkit-appearance: none;
}

    </style>