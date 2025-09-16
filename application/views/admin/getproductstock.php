<div class="content-wrapper" style="min-height: 2080.26px;">

    <div class="card p-4 mt-3 shadow border-0">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3">
            <h4 class="mb-2 mb-md-0 fw-bold text-primary">📦 Total Stock</h4>
            
            <div class="d-flex gap-2 justify-content-between">
                <!-- Search Box -->

                
                <!-- Excel Download Button -->
                <button id="downloadExcel" class="btn btn-success btn-sm">
                    <i class="fas fa-file-excel"></i> Download Excel
                </button>
            </div>
        </div>
        <input type="text" id="searchInput" class="form-control form-control-sm" 
                       placeholder="🔍 Search by Product Name" style="border: 2px solid;">

        <div class="table-responsive">
            <table id="purchaseTable" class="table table-hover table-bordered text-center align-middle shadow-sm">
                <thead class="table-primary">
                    <tr>
                        <th>SL No.</th>
                        <th>Product Name</th>
                        <th>Purchase Quantity</th>
                        <th>Sold Quantity</th>
                        <th>Total Stock</th>
                        <!-- <th>Dp Rate(Single)</th> -->
                        <!-- <th>MRP Rate(Single)</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if($stock_data){
                        $count = 1;
                        foreach($stock_data as $product){
                        ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td class="fw-semibold text-dark"><?php echo $product['product_name']; ?><br>
                                <small><strong>DP:</strong><?php echo $product['single_dp']; ?></small><br>
                                <small><strong>MRP:</strong><?php echo $product['single_mrp']; ?></small>
                            </td>
                            <td class="text-primary fw-bold"><?php echo $product['purchase_qty']; ?></td>
                            <td class="text-danger fw-bold"><?php echo $product['sold_qty']; ?></td>
                            <td class="text-success fw-bold"><?php echo $product['stock_qty']; ?></td>
                            <!-- <td class="text-secondary fw-bold"><?php echo $product['single_dp']; ?></td> -->
                            <!-- <td class="text-warning fw-bold"><?php echo $product['single_mrp']; ?></td> -->
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
    var wb = XLSX.utils.table_to_book(table, { sheet: "Stock List" });
    XLSX.writeFile(wb, "stock_list.xlsx");
});

// 🔍 Search Filter
document.getElementById("searchInput").addEventListener("keyup", function () {
    var value = this.value.toLowerCase();
    var rows = document.querySelectorAll("#purchaseTable tbody tr");

    rows.forEach(function(row) {
        var productName = row.cells[1].textContent.toLowerCase();
        if (productName.indexOf(value) > -1) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
});
</script>

<!-- Custom Styling -->
<style>
    .card {
        border-radius: 12px;
    }
    .table thead th {
        background: linear-gradient(45deg, #007bff, #00c6ff);
        color: #fff;
        font-weight: bold;
        letter-spacing: 0.5px;
    }
    .table tbody tr:hover {
        background: #f8f9fa;
        transform: scale(1.01);
        transition: 0.2s;
    }
    .btn-success {
        border-radius: 8px;
        font-weight: 600;
        box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    }
    #searchInput {
        border-radius: 8px;
    }
</style>
