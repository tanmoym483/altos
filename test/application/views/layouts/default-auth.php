<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Stox Biniyog</title>
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/ico/favicon.png'); ?>">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/templatemo-574-mexant.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css'); ?>">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">


    <link rel="stylesheet" href="<?php echo base_url('assets/css/stox_biniyog.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/lightbox/dist/css/lightbox.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/custom.css'); ?>">
    <!--

TemplateMo 574 Mexant

https://templatemo.com/tm-574-mexant

-->
</head>

<body>
    <div class="login_bg" style="background-image: url(<?php echo base_url('assets/images/login_img.jpg'); ?>);">
        <div class="overlay"></div>
        <?php $this->load->view($content,$data); ?>
    </div>

    <!-- ***** Main Banner Area End ***** -->


    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/isotope.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/owl-carousel.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/tabs.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/swiper.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/lightbox/dist/js/lightbox.min.js'); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
    <script src="<?php echo base_url('assets/custom.js'); ?>"></script>
    <script>
        var interleaveOffset = 0.5;

        var swiperOptions = {
            loop: true,
            speed: 1000,
            grabCursor: true,
            watchSlidesProgress: true,
            mousewheelControl: true,
            keyboardControl: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            on: {
                progress: function() {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        var slideProgress = swiper.slides[i].progress;
                        var innerOffset = swiper.width * interleaveOffset;
                        var innerTranslate = slideProgress * innerOffset;
                        swiper.slides[i].querySelector(".slide-inner").style.transform =
                            "translate3d(" + innerTranslate + "px, 0, 0)";
                    }
                },
                touchStart: function() {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = "";
                    }
                },
                setTransition: function(speed) {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = speed + "ms";
                        swiper.slides[i].querySelector(".slide-inner").style.transition =
                            speed + "ms";
                    }
                }
            }
        };

        var swiper = new Swiper(".swiper-container", swiperOptions);
    </script>
    <script>
        <?php
        $errorMessage = $this->session->flashdata('error');
        $successMessage = $this->session->flashdata('success');
        if ($errorMessage && $errorMessage !== "") { ?>
            swal('Oops!', '<?php echo $errorMessage; ?>', 'error');
        <?php }

        if ($successMessage && $successMessage !== "") { ?>
            swal('success!', '<?php echo $successMessage; ?>', 'success').then(() => {
                console.log(window.location.href);
                if (window.location.href.split("/").pop() === 'registration')
                    window.location.href = 'login';
            });
        <?php } ?>
    </script>

</body>

</html>