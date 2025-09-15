<div class="content-wrapper" style="min-height: 2080.26px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4 p-4">
                        <section>
                            <div class="scooter-upload p-2">
                           
                                <div class="row">
                                <?php foreach($result as $d) {?>
                                    <div class="col-md-3 mb-3 shop-box">
                                        
                                        <a href="<?=base_url('shopping/product_view/')?><?=$d->id?>" target="_blank">
                                            <img class="img-responsive w-100 h-75" src="<?php echo base_url('uploads/' . $d->product_image); ?>">
                                        </a>
                                        
                                        <p class="info-box-text"><?=$d->product?></p>
                                        <h5><span style="font-weight:500">₹<?=$d->product_selling_price?></span> <span style="color: #878787;text-decoration: line-through;">₹<?=$d->product_mrp?></span> <span class="text-success"><?=($d->units=='percentage')?$d->product_offer.'%'.' off':'₹'.$d->product_offer.' off'?></span></h5>
                                        
                                        
                                    </div>
                                <?php } ?>
                                <?php if (isset($pagination))
                                {
                                    echo $pagination;
                                } ?>   
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<style>
    .info-box-text{
        display: block;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    margin-top:10px;
    font-weight:500;
    }
    .shop-box{
        box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
    border-radius: .25rem;
    background-color: #fff;
    margin-right:1rem;
    margin-bottom: 1rem;
    min-height: 80px;
    padding: .5rem;
    position: relative;
    width: 100%;
    }
</style>