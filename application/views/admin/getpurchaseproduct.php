<style>
    .table thead th {
        background: #343a40;
        color: #fff;
    }
    .table tbody tr:hover {
        background: #f1f3f5;
        cursor: pointer;
    }
    .btn-success {
        border-radius: 8px;
        font-weight: 600;
    }
</style>

<div class="content-wrapper" style="min-height: 2080.26px;">
    <div class="card shadow-sm border-0 rounded-3 p-4" id="purchase_in">
        <h5 class="mb-3 text-center fw-bold text-secondary">Add Product Entry</h5>
        <form action="<?php echo base_url('admin/purchaseform'); ?>" method="post">
          <div class="row g-3" id="productFieldsContainer">

            <!-- Initial Product Fields (default) -->
            <div class="col-md-3">
              <label class="form-label">Product Name</label>
              <select name="products[0][product]" class="form-control product-select" onchange="getdpmrprecord(this, 0)" required >
                <option value="">Select</option>
                <?php foreach($products as $product){ ?>
                  <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-2">
              <label class="form-label">Quantity</label>
              <input type="number" name="products[0][quantity]" class="form-control" 
                placeholder="Enter Quantity" value="" min="0" 
                oninput="multiplydpmrp(0)" required>
            </div>
            <div class="col-md-2">
              <label class="form-label">MRP Price</label>
              <input type="text" name="products[0][mrpprice]" class="form-control" placeholder="Enter MRP Price" required>
            </div>

            <div class="col-md-2">
              <label class="form-label">DP Price</label>
              <input type="text" name="products[0][dpprice]" class="form-control" placeholder="Enter DP Price" required>
            </div>
            
            <div class="col-md-2">
              <label class="form-label">BV</label>
              <input type="text" name="products[0][bv]" class="form-control" placeholder="Enter BV" required>
            </div>

            <!-- Add Button Beside Fields -->
            <div class="col-md-1 d-flex align-items-end">
              <button type="button" id="addProductBtn" class="btn btn-info ">+Add</button>
            </div>

          </div>

          <div class="col-md-12 text-end mt-3">
            <button class="btn btn-success px-4">Submit</button>
          </div>

        </form>
      </div>

    <div class="card p-3 mt-2 shadow-sm border-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Product Purchase List</h4>
            <!-- Excel Download Button -->
            <button id="downloadExcel" class="btn btn-success btn-sm">
                <i class="fas fa-file-excel"></i> Download Excel
            </button>
        </div>

        <div class="table-responsive">
            <table id="purchaseTable" class="table table-striped table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>SL No.</th>
                        <th>Entry Date</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>DP Price</th>
                        <th>MRP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if($purchaseproduct){
                        $count = 1;
                        foreach($purchaseproduct as $product){
                        ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo date('d-m-Y H:i A',strtotime($product->createdAt)); ?></td>
                            <td><?php echo $product->product_name; ?></td>
                            <td><?php echo $product->quantity; ?></td>
                            <td><?php echo $product->total_dp_price; ?></td>
                            <td><?php echo $product->total_mrp_price; ?></td>
                        </tr>
                        <?php } 
                    }else{ ?>
                        <tr>
                            <td colspan="6" class="text-danger fw-bold">No Records Found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- JS for Excel Export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
document.getElementById("downloadExcel").addEventListener("click", function () {
    var table = document.getElementById("purchaseTable");
    var wb = XLSX.utils.table_to_book(table, { sheet: "Purchase List" });
    XLSX.writeFile(wb, "purchase_list.xlsx");
});
</script>

<!-- Some Styling -->


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery + Select2 JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
  // Initialize select2 for the product select dropdown
  $('.product-select').select2({
    tags: true,   // allows new entry
    placeholder: "Select or type product",
    width: '100%',
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
          <input type="number" name="products[${productCount}][quantity]" class="form-control" placeholder="Enter Quantity" value="" min="0" oninput="multiplydpmrp(${productCount})" required>
        </div>

        <div class="col-md-2">
          <label class="form-label">MRP Price</label>
          <input type="text" name="products[${productCount}][mrpprice]" class="form-control" placeholder="Enter MRP Price" required>
        </div>

        <div class="col-md-2">
          <label class="form-label">DP Price</label>
          <input type="text" name="products[${productCount}][dpprice]" class="form-control" placeholder="Enter DP Price" required>
        </div>

        <div class="col-md-2">
              <label class="form-label">BV</label>
              <input type="text" name="products[${productCount}][bv]" class="form-control" placeholder="Enter BV" required>
            </div>

        <!-- Remove Button Beside Fields -->
        <div class="col-md-1 d-flex align-items-end">
          <button type="button" class="btn btn-danger" onclick="removeProductRow(${productCount})">Remove</button>
        </div>
      </div>
    `;

    $('#productFieldsContainer').append(newProductField);
    $(`#productRow${productCount} .product-select`).select2({
      tags: true,
      placeholder: "Select or type product",
      width: '100%',
      allowClear: true
    });

    productCount++;
  });
});

// Function to remove a product row
function removeProductRow(rowId) {
  $(`#productRow${rowId}`).remove();
}

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
                $(`[name="products[${productIndex}][bv]"]`).val(data.bv);

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
                let bvIncrement = data.bv * quantity;

                // Update the DP and MRP fields
                $(`[name="products[${productIndex}][dpprice]"]`).val(dpIncrement.toFixed(2));
                $(`[name="products[${productIndex}][mrpprice]"]`).val(mrpIncrement.toFixed(2));
                $(`[name="products[${productIndex}][bv]"]`).val(bvIncrement.toFixed(2));
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }
}

</script>
