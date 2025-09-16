<div class="content-wrapper" style="min-height: 2080.26px;">

    <div class="card p-3 mt-2 shadow-sm border-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Product Sold List</h4>
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
                        <th>Customer Info</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>DP Price</th>
                        <th>MRP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if($soldproduct){
                        $count = 1;
                        foreach($soldproduct as $product){
                        ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo date('d-m-Y H:i A',strtotime($product->createdAt)); ?></td>
                            <td><?php echo $product->name;?><br><small><?php echo $product->phone; ?></small></td>
                            <td><?php echo $product->productName; ?></td>
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
