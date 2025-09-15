<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-text">
                    <h2>Customer Term & Condition</h2>
                    <div class="div-dec"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container"> 
    <div class="row my-5">
      <?php
      $CI =& get_instance();
      $CI->load->model('Admin_model','modd');
      $pagecontent = $this->modd->pages('customer-term-condition');
      ?>  
    
    <?=$pagecontent[0]['content']?></div>
</div>