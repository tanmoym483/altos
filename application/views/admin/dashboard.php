<style>
  .dashboard-card {
    border: none;
    border-radius: 15px;
    padding: 2rem;
    transition: transform 0.2s ease-in-out, box-shadow 0.2s;
  }

  .dashboard-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
  }

  .dashboard-icon {
    font-size: 2rem;
    margin-bottom: 0.5rem;
  }

  .bg-purchase {
    background: linear-gradient(to right, #c8e6ff, #e0f7ff);
    color: #0d6efd;
  }

  .bg-sell {
    background: linear-gradient(to right, #ffe0e0, #ffd6d6);
    color: #dc3545;
  }

  .bg-stock {
    background: linear-gradient(to right, #d0f8ce, #e0ffe6);
    color: #28a745;
  }

  .dashboard-title {
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.3rem;
  }

  .dashboard-value {
    font-size: 2rem;
    font-weight: 700;
  }

  .card-link {
    text-decoration: none;
  }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery + Select2 JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>


<div class="content-wrapper">
  <div class="content-header pb-1">
    <div class="container-fluid">

      <!-- Top Summary Cards -->
      <div class="row mb-4">
        <div class="col-md-4">
          <a href="<?php echo base_url('admin/getpurchaseproduct'); ?>" class="card-link">
            <div class="card dashboard-card bg-purchase text-center">
              <div class="dashboard-icon">
                <i class="bi bi-box-arrow-in-down"></i> <!-- Bootstrap Icon -->
              </div>
              <div class="dashboard-title">Purchase / In</div>
              <div class="dashboard-value"><?php echo $purchaseQuantity ?? 0; ?></div>
            </div>
          </a>
        </div>

        <div class="col-md-4">
          <a href="<?php echo base_url('admin/getsoldproduct'); ?>" class="card-link">
            <div class="card dashboard-card bg-sell text-center">
              <div class="dashboard-icon">
                <i class="bi bi-box-arrow-up"></i>
              </div>
              <div class="dashboard-title">Sells / Out</div>
              <div class="dashboard-value"><?php echo $soldquantity ?? 0; ?></div>
            </div>
          </a>
        </div>

        <div class="col-md-4">
          <a href="<?php echo base_url('admin/getproductstock'); ?>" class="card-link">
            <div class="card dashboard-card bg-stock text-center">
              <div class="dashboard-icon">
                <i class="bi bi-box-seam"></i>
              </div>
              <div class="dashboard-title">Stock</div>
              <div class="dashboard-value"><?php echo $purchaseQuantity - $soldquantity; ?></div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

