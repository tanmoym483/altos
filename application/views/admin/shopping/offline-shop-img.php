<div class="content-wrapper" style="min-height: 2080.26px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">
                            <?php if($_SESSION['role'] == 'superAdmin'){?><a href="<?=base_url('shopping/offline_add')?>" class="btn btn-primary mb-2">Add</a><?php } ?>
                                <div class="row">
                                <?php foreach($result as $d) {?>
                                    <div class="col-md-4 mb-3">
                                       
                                          <img class="img-responsive w-100" src="<?php echo base_url('uploads/' . $d->image); ?>">
                                        
                                        <h4><?=($d->units=='percentage')?$d->discount.'%':'Rs'.$d->discount?></h4>
                                        <?php if($_SESSION['role'] == 'superAdmin'){?>
                                        <a href="<?=base_url('shopping/offlineimgdelete')?>/<?=$d->id?>" class="text-danger" ><i class="fa fa-trash"></i></a>
                                        <a style="cursor:pointer" href="<?=base_url('shopping/offlineshopedit')?>/<?=$d->id?>" class="text-primary" ><i class="fa fa-pen"></i></a>
                                        
                                        <?php } ?>
                                       
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
<script>
        // Function to copy the link to the clipboard
        function copyLink(url) {
            navigator.clipboard.writeText
                (url);
                alert("Link copied to clipboard: " + url);
            // var copyText = url;

            // // Select the text field
            // copyText.select();
            // copyText.setSelectionRange(0, 99999); // For mobile devices

            // // Copy the text to the clipboard
            // document.execCommand("copy");

            // // Alert the user
            // alert("Link copied to clipboard: " + copyText);
        }

        // Function to share the link via social media
        function shareLink(url,platform) {
            var url = url;

            if (platform === 'facebook') {
                window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url), '_blank');
            } else if (platform === 'twitter') {
                window.open('https://twitter.com/intent/tweet?url=' + encodeURIComponent(url), '_blank');
            } else if (platform === 'linkedin') {
                window.open('https://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(url), '_blank');
            } else if (platform === 'whatsapp') {
                // Open WhatsApp with the shareable link
                window.open('https://wa.me/?text=' + encodeURIComponent(url), '_blank');
            }
        }
    </script>
    <style>
        svg{width:15px;}
    </style>