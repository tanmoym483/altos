<div class="content-wrapper" style="min-height: 2080.26px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">
                            <?php if($_SESSION['role'] == 'superAdmin'){?><a href="<?=base_url('shopping/add')?>" class="btn btn-primary mb-2">Add</a><?php } ?>
                                <div class="row">
                                <?php foreach($result as $d) {?>
                                    <div class="col-md-4 mb-3">
                                        <a href="<?=$d->link?>" target="_blank">
                                            <img class="img-responsive w-100" src="<?php echo base_url('uploads/' . $d->image); ?>">
                                        </a>
                                        <?=$d->content?>
                                        <?php if($_SESSION['role'] == 'superAdmin'){?>
                                        <a href="<?=base_url('shopping/imgdelete')?>/<?=$d->id?>" class="text-danger" ><i class="fa fa-trash"></i></a>
                                        <a style="cursor:pointer" href="<?=base_url('shopping/edit')?>/<?=$d->id?>" class="text-primary" ><i class="fa fa-pen"></i></a>
                                        
                                        <?php } ?>
                                        <div class="row mt-3">
                                            <div class="col-4 col-md-4 mb-3">
                                                <button onclick="copyLink('<?php echo $d->link; ?>')" class="btn border border-dark rounded" style="padding:7px; "><i class="fas fa-copy" ></i> Copy </button>
                                            </div>
                                            <div class="col-4 col-md-4 mb-3">
                                                <button onclick="shareLink('<?php echo $d->link; ?>','facebook')" class="btn btn-primary border border-dark  rounded" style="fill:white;padding:7px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg> Share</button>
                                            </div>
                                            <div class="col-4 col-md-4 mb-3">
                                                <button onclick="shareLink('<?php echo $d->link; ?>','whatsapp')" class="btn btn-success border border-dark rounded" style="fill:white;padding:7px;" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg> Share </button>
                                            </div>
                                        </div>
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