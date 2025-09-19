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
          <div class="d-flex">
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
          </div>
          <div class="d-flex align-items-end text-right mt-2">
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
            <?php if($this->session->userdata('role') == 'superAdmin'){?>
            <div>
              <select class="form-control" onchange="filterByAdmin(this.value)">
                  <option value="">Search by Sub Admin</option>
                  <?php foreach($adminuser as $user){ ?>
                      <option value="<?php echo $user->id; ?>" 
                          <?php echo ($selectedAdminId == $user->id) ? 'selected' : ''; ?>>
                          <?php echo $user->userName; ?>
                      </option>
                  <?php } ?>
              </select>
            </div>
            <?php } ?>
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
                        <th>Action</th>
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
                            <td>
                              <a href="javascript:void(0)" 
                                    class="pr-2 text-warning"
                                    onclick="openEditModal(this)"
                                    data-id="<?php echo $product->id; ?>"
                                    data-name="<?php echo $product->name; ?>"
                                    data-phone="<?php echo $product->phone; ?>"
                                    data-productId="<?php echo $product->productInfo_id; ?>"
                                    data-product="<?php echo $product->product_name; ?>"
                                    data-quantity="<?php echo $product->quantity; ?>"
                                    data-dp="<?php echo $product->total_dp_price; ?>"
                                    data-mrp="<?php echo $product->total_mrp_price; ?>"
                                    data-distributor="<?php echo $product->distributorCode; ?>"> <!-- Distributor Code -->
                                    <i class="fa fa-pen"></i>
                                </a>
                                <?php if($_SESSION['role'] == 'superAdmin'){?>
                                <a href="<?php echo base_url('admin/deletepurchaseproduct/' . $product->id); ?>" 
                                class="text-danger" 
                                onclick="return confirm('Are you sure you want to delete this product?');">
                                <i class="fas fa-trash"></i>
                                </a>
                                <?php } ?>
                            </td>
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


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <form id="editForm">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Edit Product Purchase</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <input type="hidden" id="editId" name="id">
          <input type="hidden" id="productId" name="productid">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Product Name</label>
              <input type="text" id="editProductName" name="productName" class="form-control" readonly required>
            </div>
            <div class="form-group col-md-3">
              <label>Quantity</label>
              <input type="number" id="editQuantity" name="quantity" oninput ="multiplydpmrpp()" class="form-control" required>
            </div>
            <div class="form-group col-md-3">
              <label>DP Price</label>
              <input type="number" id="editDP" name="total_dp_price" class="form-control" readonly required>
            </div>
            <div class="form-group col-md-3">
              <label>MRP</label>
              <input type="number" id="editMRP" name="total_mrp_price" class="form-control" readonly required>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" onclick="updatePurchaseproduct()">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS for Excel Export -->
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery + Select2 JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

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
          <button type="button" class="btn btn-danger" onclick="removeProductRow(${productCount})">-</button>
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

function openEditModal(el) {
    // Get values from data attributes
    let id          = el.getAttribute("data-id");
    let productId   = el.getAttribute("data-productId");
    let product     = el.getAttribute("data-product");
    let quantity    = el.getAttribute("data-quantity");
    let dp          = el.getAttribute("data-dp");
    let mrp         = el.getAttribute("data-mrp");

    // Fill modal fields
    document.getElementById("editId").value          = id;
    document.getElementById("productId").value       = productId;
    document.getElementById("editProductName").value = product;
    document.getElementById("editQuantity").value    = quantity;
    document.getElementById("editDP").value          = dp;
    document.getElementById("editMRP").value         = mrp;

    // Show modal
    var editModal = new bootstrap.Modal(document.getElementById('editModal'));
    editModal.show();
}

function multiplydpmrpp() {
    let quantity = parseFloat($("#editQuantity").val());
    let productId = $("#productId").val();

    if (productId && quantity && quantity > 0) {
        $.ajax({
            url: "<?php echo base_url('admin/getfetchdpmrp'); ?>", // Make sure this PHP base_url works in your setup
            method: "POST",
            data: { productId: productId },
            success: function(response) {
                try {
                    const data = JSON.parse(response);

                    if (data.dpprice && data.mrpprice) {
                        let dpIncrement = data.dpprice * quantity;
                        let mrpIncrement = data.mrpprice * quantity;

                        $("#editDP").val(dpIncrement.toFixed(2));
                        $("#editMRP").val(mrpIncrement.toFixed(2));
                    } else {
                        console.error("Invalid price data:", data);
                        alert("Error: Could not fetch DP/MRP price.");
                    }
                } catch (e) {
                    console.error("Parsing error:", e);
                    alert("Error: Failed to parse response.");
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                alert("Error: Failed to fetch product prices.");
            }
        });
    } else {
        $("#editDP").val("0.00");
        $("#editMRP").val("0.00");
    }
}

function updatePurchaseproduct() {
    event.preventDefault(); // Prevent default form submission behavior

    var formData = $("#editForm").serialize();

    $.ajax({
        url: "<?php echo base_url('admin/updatepurchaseproduct'); ?>",
        method: "POST",
        data: formData,
        success: function(response) {
            var res = JSON.parse(response); // Only if server doesn't return proper JSON header
            if (res.status === 'success') {
                alert(res.message);
                $('#editModal').modal('hide');
                location.reload(); // ✅ Corrected typo here
            } else {
                alert(res.message);
            }
        },
        error: function(xhr, status, error) {
            console.error("Error occurred:", error);
            alert("Failed to update product. Please try again.");
        }
    });
}

</script>
<script>
function filterByAdmin(adminId) {
    let url = "<?php echo base_url('admin/getpurchaseproduct'); ?>";
    if (adminId) {
        window.location.href = url + "?adminId=" + adminId;
    } else {
        window.location.href = url;
    }
}
</script>