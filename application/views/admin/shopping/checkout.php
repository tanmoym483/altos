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
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                   
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="card">
        
            
        
        <div class="card-body">
                <div class="col-12 pb-3"><p><strong>Deliverd To</strong></p>
                <?php echo $userdetails->firstName.' '.$userdetails->middleName.' '.$userdetails->lastName.'</br>';
                echo $userdetails->address.' '.$userdetails->city.'</br>'.' '.$userdetails->district.' </br>';
                echo $userdetails->state.' - '.$userdetails->postcode;  ?></div>
                
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
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     
                                    
                                        <?php 
                                        $page = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
                                        $total = 0;
                                        $total_quatity = 0;
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
                                                <td><?php echo $customer->quantity; $total_quatity = $total_quatity + $customer->quantity; ?></td>
                                                <td><?php echo $total_amount = $customer->quantity * $customer->amount; $total = $total + $total_amount;  ?></td>
                                                
                                               
                                               
                                                
                                                <!-- <td><?php //echo $customer->status; ?></td> -->
                                               
                                                
                                            </tr>
                                        <?php } ?>
                                   


                                </tbody>
                            </table>
                            <p style="text-align:right">Price ( <?=$total_quatity?> items) :<?php echo number_format((float)$total, 2, '.', ''); ?></p>
                            <p style="text-align:right"> Delivery Charge : 0.00 </p>
                            <p style="text-align:right"> Total Charge : <?php echo number_format((float)$total, 2, '.', ''); ?></p>
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
  background-color: #eeeeee;
  min-width: 21px;
  width: auto;
  transition: all 300ms ease;
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