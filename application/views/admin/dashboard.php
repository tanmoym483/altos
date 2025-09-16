<div class="content-wrapper">
  <div class="content-header pb-1">
    <div class="container-fluid">

      <!-- Top Summary Cards -->
      <div class="row mb-4">
        <div class="col-md-4">
          <a href="<?php echo base_url('admin/getpurchaseproduct'); ?>">
          <div class="card shadow-sm border-0 rounded-3 text-center p-4">
            <h6 class="text-muted mb-2">Purchase / In</h6>
            <h3 class="fw-bold text-primary"><?php echo $purchaseQuantity?? 0; ?></h3>
          </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="<?php echo base_url('admin/getsoldproduct'); ?>">
          <div class="card shadow-sm border-0 rounded-3 text-center p-4">
            <h6 class="text-muted mb-2">Sells / Out</h6>
            <h3 class="fw-bold text-danger"><?php echo $soldquantity?? 0; ?></h3>
          </div>
          </a>
        </div>
       <?php $total = $purchaseQuantity - $soldquantity;?>
        <div class="col-md-4">
          <a href="<?php echo base_url('admin/getproductstock'); ?>">
          <div class="card shadow-sm border-0 rounded-3 text-center p-4">
            <h6 class="text-muted mb-2">Stock</h6>
            <h3 class="fw-bold text-success"><?php echo $total; ?></h3>
          </div>
          </a>
        </div>
      </div>

      <!-- Toggle Section -->
      <div class="card shadow-sm border-0 rounded-3 p-3 mb-4">
        <div class="d-flex justify-content-center gap-4">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="purchaseIn" oninput="toggleForms()">
            <label class="form-check-label fw-semibold" for="purchaseIn">Add Purchase Product</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="sellsout" oninput="toggleForms()">
            <label class="form-check-label fw-semibold" for="sellsout">Add Selling Product</label>
          </div>
        </div>
      </div>

      <!-- Form Section -->
      <div class="card shadow-sm border-0 rounded-3 p-4" id="purchase_in" style="display: none;">
        <h5 class="mb-3 text-center fw-bold text-secondary">Add Product Entry</h5>
        <form action="<?php echo base_url('admin/purchaseform'); ?>" method="post">
          <div class="row g-3" id="productFieldsContainer">

            <!-- Initial Product Fields (default) -->
            <div class="col-md-3">
              <label class="form-label">Product Name</label><br>
              <select name="products[0][product]" class="form-control product-select" onchange="getdpmrprecord(this, 0)" required>
                <option value="">Select</option>
                <?php foreach($products as $product){ ?>
                  <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-2">
              <label class="form-label">Quantity</label>
              <input type="number" name="products[0][quantity]" class="form-control" 
                placeholder="Enter Quantity" value="0" min="0" 
                oninput="multiplydpmrp(0)" required>
            </div>

            <div class="col-md-2">
              <label class="form-label">DP Price</label>
              <input type="text" name="products[0][dpprice]" class="form-control" placeholder="Enter DP Price" required>
            </div>

            <div class="col-md-2">
              <label class="form-label">MRP Price</label>
              <input type="text" name="products[0][mrpprice]" class="form-control" placeholder="Enter MRP Price" required>
            </div>

            <!-- Add Button Beside Fields -->
            <div class="col-md-2 d-flex align-items-end">
              <button type="button" id="addProductBtn" class="btn btn-info ">+Add</button>
            </div>

          </div>

          <div class="col-md-12 text-end mt-3">
            <button class="btn btn-success px-4">Submit</button>
          </div>

        </form>
      </div>


      <div class="card shadow-sm border-0 rounded-3 p-4" id="sells_out" style="display: none;">
        <form action="<?php echo base_url('admin/sellsform'); ?>" method="post">
        <h5 class="mb-3 text-center fw-bold text-secondary">Add Product Entry for Sales</h5>

        <!-- <h5 class="mb-3 text-center fw-bold text-secondary">Customer Details</h5> -->

          <div class="row">
            <div class="col-md-6">
              <label>Customer Name</label>
            <input type="text" name="customerName" class="form-control" placeholder="Custer Name" required>
                </div>
                <div class="col-md-6">
                  <label>Phone Number</label>
                  <input type="tel" name="phone" placeholder="Phone Number" maxlength="10" pattern="[0-9]{10}" class="form-control" required>
                </div>
          </div>

          <div class="row g-3" id="productFieldsContainerSells">

            <!-- Initial Product Fields (default) -->
            <div class="col-md-3">
              <label class="form-label">Product Name</label><br>
              <select name="products[0][product]" class="form-control product-select-sells" onchange="getdpmrprecord(this, 0)" required>
                <option value="">Select</option>
                <?php foreach($products as $product){ ?>
                  <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-2">
              <label class="form-label">Quantity</label>
              <input type="number" name="products[0][quantity]" class="form-control" 
                placeholder="Enter Quantity" value="0" min="0" 
                oninput="multiplydpmrpSells(0)" required>
            </div>

            <div class="col-md-2">
              <label class="form-label">DP Price</label>
              <input type="text" name="products[0][dpprice]" class="form-control" placeholder="Enter DP Price" readonly required>
            </div>

            <div class="col-md-2">
              <label class="form-label">MRP Price</label>
              <input type="text" name="products[0][mrpprice]" class="form-control" placeholder="Enter MRP Price" readonly required>
            </div>

            <!-- Add Button Beside Fields -->
            <div class="col-md-2 d-flex align-items-end">
              <button type="button" id="addProductBtnSells" class="btn btn-info ">+Add</button>
            </div>

          </div>

          <div class="col-md-12 text-end mt-3">
            <button class="btn btn-success px-4">Submit</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>

<!-- Including JS libraries -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
  // Initialize select2 for the product select dropdown
  $('.product-select').select2({
    tags: true,   // allows new entry
    placeholder: "Select or type product",
    allowClear: true
  });

  // Variable to track the number of product entries
  let productCount = 1;

  // Function to add a new product entry field
  $('#addProductBtn').click(function() {
    const newProductField = `
      <div class="row g-3 pl-2" id="productRow${productCount}">
        <div class="col-md-3">
          <label class="form-label">Product Name</label>
          <select name="products[${productCount}][product]" class="form-control product-select" onchange="getdpmrprecord(this, ${productCount})" required>
            <option value="">Select</option>
            <?php foreach($products as $product){ ?>
              <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="col-md-2 pr-2">
          <label class="form-label">Quantity</label>
          <input type="number" name="products[${productCount}][quantity]" class="form-control" placeholder="Enter Quantity" value="0" min="0" oninput="multiplydpmrp(${productCount})" required>
        </div>

        <div class="col-md-2">
          <label class="form-label">DP Price</label>
          <input type="text" name="products[${productCount}][dpprice]" class="form-control" placeholder="Enter DP Price" required>
        </div>

        <div class="col-md-2">
          <label class="form-label">MRP Price</label>
          <input type="text" name="products[${productCount}][mrpprice]" class="form-control" placeholder="Enter MRP Price" required>
        </div>

        <!-- Remove Button Beside Fields -->
        <div class="col-md-2 d-flex align-items-end">
          <button type="button" class="btn btn-danger" onclick="removeProductRow(${productCount})">Remove</button>
        </div>
      </div>
    `;

    $('#productFieldsContainer').append(newProductField);
    $(`#productRow${productCount} .product-select`).select2({
      tags: true,
      placeholder: "Select or type product",
      allowClear: true
    });

    productCount++;
  });
});

// Function to remove a product row
function removeProductRow(rowId) {
  $(`#productRow${rowId}`).remove();
}



$(document).ready(function() {
  // Initialize select2 for the product select dropdown
  $('.product-select-sells').select2({
    tags: false,   // allows new entry
    placeholder: "Select or type product",
    allowClear: true
  });

  // Variable to track the number of product entries
  let productCount = 1;

  // Function to add a new product entry field
  $('#addProductBtnSells').click(function() {
    const newProductField = `
      <div class="row g-3 pl-2" id="productRow${productCount}">
        <div class="col-md-3">
          <label class="form-label">Product Name</label>
          <select name="products[${productCount}][product]" class="form-control product-select-sells" onchange="getdpmrprecord(this, ${productCount})" required>
            <option value="">Select</option>
            <?php foreach($products as $product){ ?>
              <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="col-md-2 pr-2">
          <label class="form-label">Quantity</label>
          <input type="number" name="products[${productCount}][quantity]" class="form-control" placeholder="Enter Quantity" value="0" min="0" oninput="multiplydpmrpSells(${productCount})" required>
        </div>

        <div class="col-md-2">
          <label class="form-label">DP Price</label>
          <input type="text" name="products[${productCount}][dpprice]" class="form-control" placeholder="Enter DP Price" readonly required>
        </div>

        <div class="col-md-2">
          <label class="form-label">MRP Price</label>
          <input type="text" name="products[${productCount}][mrpprice]" class="form-control" placeholder="Enter MRP Price" readonly required>
        </div>

        <!-- Remove Button Beside Fields -->
        <div class="col-md-2 d-flex align-items-end">
          <button type="button" class="btn btn-danger" onclick="removeProductRow(${productCount})">Remove</button>
        </div>
      </div>
    `;

    $('#productFieldsContainerSells').append(newProductField);
    $(`#productRow${productCount} .product-select-sells`).select2({
      tags: true,
      placeholder: "Select or type product",
      allowClear: true
    });

    productCount++;
  });
});

// Function to remove a product row
function removeProductRow(rowId) {
  $(`#productRow${rowId}`).remove();
}

// Fetch DP and MRP prices based on the product selected
function getdpmrprecord(selectElement, productIndex) {
    const productId = selectElement.value;
    if (productId) {
        $.ajax({
            url: "<?php echo base_url('admin/getfetchdpmrp'); ?>",  // Ensure this URL is correct
            method: "POST",
            data: { productId: productId },  // Send productId in the request
            success: function(response) {
                console.log(response); // Inspect the response
                const data = JSON.parse(response); // Assuming the response is JSON with DP Price and MRP Price data

                // Update DP and MRP fields for the correct row
                $(`[name="products[${productIndex}][dpprice]"]`).val(data.dpprice);
                $(`[name="products[${productIndex}][mrpprice]"]`).val(data.mrpprice);

                // Set default quantity to 1 when product is selected
                $(`[name="products[${productIndex}][quantity]"]`).val(1);
                multiplydpmrp(productIndex); // Recalculate DP and MRP after selection
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    } else {
        alert("Please select a valid product.");
    }
}

// Function to multiply DP and MRP prices based on quantity
function multiplydpmrp(productIndex) {
    let quantity = $(`[name="products[${productIndex}][quantity]"]`).val();
    let productId = $(`[name="products[${productIndex}][product]"]`).val();

    if (productId && quantity) {
        $.ajax({
            url: "<?php echo base_url('admin/getfetchdpmrp'); ?>",  // Ensure this URL is correct
            method: "POST",
            data: { productId: productId },  // Send productId in the request
            success: function(response) {
                console.log(response); // Inspect the response
                const data = JSON.parse(response); // Assuming the response is JSON with DP Price and MRP Price data

                // Calculate the new DP and MRP based on the quantity
                let dpIncrement = data.dpprice * quantity;
                let mrpIncrement = data.mrpprice * quantity;

                // Update the DP and MRP fields
                $(`[name="products[${productIndex}][dpprice]"]`).val(dpIncrement.toFixed(2));
                $(`[name="products[${productIndex}][mrpprice]"]`).val(mrpIncrement.toFixed(2));
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }
}

function multiplydpmrpSells(productIndex) {
    let quantity = $(`#sells_out [name="products[${productIndex}][quantity]"]`).val();
    let productId = $(`#sells_out [name="products[${productIndex}][product]"]`).val();

    if (productId && quantity) {
        $.ajax({
            url: "<?php echo base_url('admin/getfetchdpmrp'); ?>",
            method: "POST",
            data: { productId: productId },
            success: function(response) {
                const data = JSON.parse(response);

                let dpIncrement = data.dpprice * quantity;
                let mrpIncrement = data.mrpprice * quantity;

                $(`#sells_out [name="products[${productIndex}][dpprice]"]`).val(dpIncrement.toFixed(2));
                $(`#sells_out [name="products[${productIndex}][mrpprice]"]`).val(mrpIncrement.toFixed(2));
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }
}


// Toggle forms
function toggleForms() {
    if ($('#purchaseIn').prop('checked')) {
        $('#purchase_in').show();
        $('#sellsout').prop('checked', false); // <-- FIXED
        $('#sells_out').hide();
    } else {
        $('#purchase_in').hide();
    }

    if ($('#sellsout').prop('checked')) {
        $('#sells_out').show();
        $('#purchaseIn').prop('checked', false); // <-- keep them exclusive
        $('#purchase_in').hide();
    } else {
        $('#sells_out').hide();
    }
}




</script>
