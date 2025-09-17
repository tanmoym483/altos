<!-- Bootstrap 5 CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Table Structure -->
<div class="content-wrapper" style="min-height: 2080.26px;">
    <div class="card shadow-sm border-0 rounded-3 p-4" id="sells_out">
        <form action="<?php echo base_url('admin/sellsform'); ?>" method="post">
        <h5 class="mb-3 text-center fw-bold text-secondary">Add Product Entry for Sales</h5>

        <!-- <h5 class="mb-3 text-center fw-bold text-secondary">Customer Details</h5> -->
          <div class="row">
            <div class="col-md-4">
              <label>Customer Name</label>
            <input type="text" name="customerName" class="form-control" placeholder="Custer Name" required>
                </div>
                <div class="col-md-4">
                  <label>Phone Number</label>
                  <input type="tel" name="phone" placeholder="Phone Number" maxlength="10" pattern="[0-9]{10}" class="form-control" required>
                </div>
                <div class="col-md-4">
                  <label>Distributor Id</label>
                  <input type="text" name="distributorCode" placeholder="Distributor Id" class="form-control">
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
              <label class="form-label">Total Stock</label>
              <input type="number" name="products[0][stockqty]" class="form-control" 
                placeholder="Stock" readonly >
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
            <div class="col-md-1 d-flex align-items-end">
              <button type="button" id="addProductBtnSells" class="btn btn-info ">+Add</button>
            </div>

          </div>

          <div class="col-md-12 text-end mt-3">
            <button class="btn btn-success px-4">Submit</button>
          </div>

        </form>
      </div>


    <div class="card p-3 mt-2 shadow-sm border-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Product Sold List</h4>
            <!-- Excel Download Button -->
            <button id="downloadExcel" class="btn btn-success btn-sm">
                <i class="fas fa-file-excel"></i> Download Excel
            </button>
        </div>

        <!-- Search Fields -->
        <div class="row mb-3">
    <div class="col-md-3">
        <input type="text" id="searchName" class="form-control" placeholder="Search by Customer Name">
    </div>
    <div class="col-md-3">
        <input type="text" id="searchPhone" class="form-control" placeholder="Search by Phone">
    </div>
    <div class="col-md-3">
        <input type="text" id="searchDistributor" class="form-control" placeholder="Search by Distributor Code">
    </div>
    <div class="col-md-1">
        <input type="date" id="fromDate" class="form-control">
    </div>
    <div class="col-md-1">
        <input type="date" id="toDate" class="form-control">
    </div>
    <div class="col-md-1">
        <button class="btn btn-primary w-100" style="opacity:0;" onclick="filterTable()">Search</button>
    </div>
</div>


        <div class="table-responsive">
            <table id="purchaseTable" class="table table-striped table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>SL No.</th>
                        <th>Entry Date</th>
                        <th>Customer Info</th>
                        <th>Distributor Code</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>DP Price</th>
                        <th>MRP</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP Loop to display products -->
                    <?php 
                    if($soldproduct){
                        $count = 1;
                        foreach($soldproduct as $product){
                        ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo date('d-m-Y H:i A',strtotime($product->createdAt)); ?></td>
                            <td><?php echo $product->name; ?><br><small><?php echo $product->phone; ?></small></td>
                            <td><?php echo $product->distributorCode; ?></td> <!-- Distributor Code -->
                            <td><?php echo $product->productName; ?></td>
                            <td><?php echo $product->quantity; ?></td>
                            <td><?php echo $product->total_dp_price; ?></td>
                            <td><?php echo $product->total_mrp_price; ?></td>
                            <!-- Action Column -->
                            <td>
                                <a href="javascript:void(0)" 
                                    class="pr-2 text-warning"
                                    onclick="openEditModal(this)"
                                    data-id="<?php echo $product->id; ?>"
                                    data-name="<?php echo $product->name; ?>"
                                    data-phone="<?php echo $product->phone; ?>"
                                    data-productId="<?php echo $product->productinfo_id; ?>"
                                    data-product="<?php echo $product->productName; ?>"
                                    data-quantity="<?php echo $product->quantity; ?>"
                                    data-dp="<?php echo $product->total_dp_price; ?>"
                                    data-mrp="<?php echo $product->total_mrp_price; ?>"
                                    data-distributor="<?php echo $product->distributorCode; ?>"> <!-- Distributor Code -->
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a href="<?php echo base_url('admin/deletesoldproduct/' . $product->id); ?>" 
                                class="text-danger" 
                                onclick="return confirm('Are you sure you want to delete this product?');">
                                <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } 
                    } else { ?>
                        <tr>
                            <td colspan="9" class="text-danger fw-bold">No Records Found</td>
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
          <h5 class="modal-title">Edit Product Sold</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <input type="hidden" id="editId" name="id">
          <input type="hidden" id="productId" name="productid">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Customer Name</label>
              <input type="text" id="editName" name="name" class="form-control" readonly required>
            </div>
            <div class="form-group col-md-6">
              <label>Phone</label>
              <input type="text" id="editPhone" name="phone" class="form-control" readonly required>
            </div>
            <div class="form-group col-md-6">
              <label>Distributor Code</label>
              <input type="text" id="editDistributorCode" name="distributorCode" class="form-control" readonly required>
            </div>
            <div class="form-group col-md-6">
              <label>Product Name</label>
              <input type="text" id="editProductName" name="productName" class="form-control" readonly required>
            </div>
            <div class="form-group col-md-3">
              <label>Quantity</label>
              <input type="number" id="editQuantity" name="quantity" oninput ="multiplydpmrp()" class="form-control" required>
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
          <button type="submit" class="btn btn-primary" onclick="updatesoldproduct()">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

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

// Name & Date Range Filter
// Attach live search events
document.getElementById("searchName").addEventListener("keyup", filterTable);
document.getElementById("searchPhone").addEventListener("keyup", filterTable);
document.getElementById("searchDistributor").addEventListener("keyup", filterTable);
document.getElementById("fromDate").addEventListener("change", filterTable);
document.getElementById("toDate").addEventListener("change", filterTable);

function filterTable() {
    var nameInput = document.getElementById("searchName").value.toLowerCase();
    var phoneInput = document.getElementById("searchPhone").value.toLowerCase();
    var distributorInput = document.getElementById("searchDistributor").value.toLowerCase();
    var fromDate = document.getElementById("fromDate").value;
    var toDate = document.getElementById("toDate").value;

    var table = document.getElementById("purchaseTable");
    var tr = table.getElementsByTagName("tr");

    for (var i = 1; i < tr.length; i++) {
        var tdName        = tr[i].getElementsByTagName("td")[2];
        var tdDistributor = tr[i].getElementsByTagName("td")[3];
        var tdDate        = tr[i].getElementsByTagName("td")[1];

        if (tdName && tdDate && tdDistributor) {
            var txtName        = tdName.textContent.toLowerCase();
            var txtPhone       = tdName.textContent.toLowerCase();
            var txtDistributor = tdDistributor.textContent.toLowerCase();
            var txtDate        = tdDate.textContent; // original "dd-mm-yyyy hh:mm AM"

            var show = true;

            // Customer Name filter
            if (nameInput && txtName.indexOf(nameInput) === -1) {
                show = false;
            }

            // Phone filter
            if (phoneInput && txtPhone.indexOf(phoneInput) === -1) {
                show = false;
            }

            // Distributor filter
            if (distributorInput && txtDistributor.indexOf(distributorInput) === -1) {
                show = false;
            }

            // Date range filter (fix)
            var tableDate = formatTableDate(txtDate);
            if (fromDate && tableDate < fromDate) {
                show = false;
            }
            if (toDate && tableDate > toDate) {
                show = false;
            }

            tr[i].style.display = show ? "" : "none";
        }
    }
}

function formatTableDate(dateStr) {
    // dateStr like "17-09-2025 11:30 AM"
    let parts = dateStr.split(" ")[0].split("-"); // [dd, mm, yyyy]
    return parts[2] + "-" + parts[1] + "-" + parts[0]; // yyyy-mm-dd
}


function openEditModal(el) {
    // Get values from data attributes
    let id          = el.getAttribute("data-id");
    let name        = el.getAttribute("data-name");
    let phone       = el.getAttribute("data-phone");
    let productId   = el.getAttribute("data-productId");
    let product     = el.getAttribute("data-product");
    let quantity    = el.getAttribute("data-quantity");
    let dp          = el.getAttribute("data-dp");
    let mrp         = el.getAttribute("data-mrp");
    let distributor = el.getAttribute("data-distributor");

    // Fill modal fields
    document.getElementById("editId").value          = id;
    document.getElementById("productId").value       = productId;
    document.getElementById("editName").value        = name;
    document.getElementById("editPhone").value       = phone;
    document.getElementById("editProductName").value = product;
    document.getElementById("editQuantity").value    = quantity;
    document.getElementById("editDP").value          = dp;
    document.getElementById("editMRP").value         = mrp;
    document.getElementById("editDistributorCode").value = distributor;

    // Show modal
    var editModal = new bootstrap.Modal(document.getElementById('editModal'));
    editModal.show();
}

// Handle form submit (AJAX request for edit)
document.getElementById("editForm").addEventListener("submit", function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    // Send data via AJAX (assuming updateProduct.php is your endpoint)
    fetch('updateProduct.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Product updated successfully!');
            location.reload(); // Reload the page to reflect changes
        } else {
            alert('Failed to update product.');
        }
    })
    .catch(error => console.error('Error:', error));

    // Close modal after save
    var editModal = new bootstrap.Modal(document.getElementById('editModal'));
    editModal.hide();
});

// Delete product function
function deleteProduct(productId) {
    alert(productId);
    let isConfirmed = confirm('Do you want to delete the product?');
    if (isConfirmed) {
        $.ajax({
            url: "<?php echo base_url('admin/deletesoldproduct'); ?>",
            method: "POST",
            data: { productId: productId },
            success: function(response) {
                var res = JSON.parse(response); // Only if server doesn't return proper JSON header
                if (res.status === 'success') {
                    alert(res.message);
                    location.reload();
                } else {
                    alert(res.message);
                }
            },
            error: function(xhr, status, error) {
                alert("An error occurred while deleting the product.");
                console.error("Delete error:", error);
            }
        });
    }
}


function multiplydpmrp() {
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

function updatesoldproduct() {
    event.preventDefault(); // Prevent default form submission behavior

    var formData = $("#editForm").serialize();

    $.ajax({
        url: "<?php echo base_url('admin/updatesoldproduct'); ?>",
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

function deleteProduct(productId)
{
    let confirm = confirm('Do you want to delete the product?');
    if(confirm){
        $.ajax({
            url: "<?php echo base_url('admin/deletesoldproduct'); ?>",
            method: "POST",
            data: {productId: productId},
            success: function(response){
                var res = JSON.parse(response); // Only if server doesn't return proper JSON header
                if (res.status === 'success') {
                    alert(res.message);
                    location.reload(); // ✅ Corrected typo here
                }else{
                    alert(res.message);
                }
            }
        });
    }
}
</script>

<!-- Some Styling -->
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
<script>
$(document).ready(function() {
  // Initialize select2 for the product select dropdown
  $('.product-select-sells').select2({
    tags: false,   // allows new entry
    placeholder: "Select or type product",
    width: '100%',
    allowClear: true
  });

  // Variable to track the number of product entries
  let productCount = 1;

  // Function to add a new product entry field
  $('#addProductBtnSells').click(function() {
    const newProductField = `
      <div class="row g-3 pl-1" id="productRow${productCount}">
        <div class="col-md-3">
          <label class="form-label">Product Name</label>
          <select name="products[${productCount}][product]" class="form-control product-select-sells" onchange="getdpmrprecord(this, ${productCount})" required>
            <option value="">Select</option>
            <?php foreach($products as $product){ ?>
              <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="col-md-2">
              <label class="form-label">Total Stock</label>
              <input type="number" name="products[${productCount}][stockqty]" class="form-control" 
                placeholder="Enter Quantity" value="0" min="0" readonly >
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
        <div class="col-md-1 d-flex align-items-end">
          <button type="button" class="btn btn-danger" onclick="removeProductRow(${productCount})">Remove</button>
        </div>
      </div>
    `;

    $('#productFieldsContainerSells').append(newProductField);
    $(`#productRow${productCount} .product-select-sells`).select2({
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
                $(`[name="products[${productIndex}][stockqty]"]`).val(data.stockqty);

                // Set default quantity to 1 when product is selected
                const quantityInput = $(`[name="products[${productIndex}][quantity]"]`);
                quantityInput.val(0);
                quantityInput.attr('max', data.stockqty); // ✅ Set max

                multiplydpmrpSells(productIndex); 
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    } else {
        alert("Please select a valid product.");
    }
}

function multiplydpmrpSells(productIndex) {
    const qtyInput = $(`[name="products[${productIndex}][quantity]"]`);
    const maxQty = parseInt(qtyInput.attr('max'), 10);
    const qty = parseInt(qtyInput.val(), 10);

    if (qty > maxQty) {
        qtyInput.val(maxQty); // Reset to max if exceeded
        alert("Quantity cannot exceed available stock.");
    }
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

</script>