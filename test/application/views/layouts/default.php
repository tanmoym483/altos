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


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css'); ?>">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">

  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

  <!-- Owl Carousel Assets -->
  <link href="<?php echo base_url('assets/owl-carousel/owl.carousel.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/owl-carousel/owl.theme.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/lightbox.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/custom.css'); ?>">







  <link rel="stylesheet" href="<?php echo base_url('assets/css/stox_biniyog.css'); ?>">
  <!--

TemplateMo 574 Mexant

https://templatemo.com/tm-574-mexant

-->
</head>

<body>


  <!-- ***** Header Area Start ***** -->
  <?php $this->load->view('commons/header'); ?>
  <!-- ***** Header Area End ***** -->
  <?php $this->load->view($content); ?>

  <?php $this->load->view('commons/footer'); ?>

  <!-- <div id="modal">
    <div class="modalconent">
      <button id="button"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
      <div class="offer_img">
        <img class="img-responsive" src="assets/images/offer_img.jpg" alt="img" />
      </div>
    </div>
  </div> -->





  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>

  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/js/isotope.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/owl-carousel.js'); ?>"></script>

  <script src="<?php echo base_url('assets/js/tabs.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/swiper.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/lightbox-plus-jquery.min.js'); ?>"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <script src="<?php echo base_url('assets/owl-carousel/owl.carousel.js'); ?>"></script>
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
      autoplay: {
        delay: 5000,
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



  <style>

  </style>


  <script>
    $(document).ready(function() {

      //Sort random function
      function random(owlSelector) {
        owlSelector.children().sort(function() {
          //return Math.round(Math.random()) - 0.5;
        }).each(function() {
          $(this).appendTo(owlSelector);
        });
      }

      $("#owl-demo").owlCarousel({
        navigation: true,
        navigationText: [
          "<i class='icon-chevron-left icon-white'></i>",
          "<i class='icon-chevron-right icon-white'></i>"
        ],
        //Call beforeInit callback, elem parameter point to $("#owl-demo")
        beforeInit: function(elem) {
          // random(elem);
        }

      });


      $(document).ready(function() {

        $(window).scroll(function() {
          if ($(this).scrollTop() > 100) {
            $('.scroll-top').fadeIn();
          } else {
            $('.scroll-top').fadeOut();
          }
        });

        $('.scroll-top').click(function() {
          $("html, body").animate({
            scrollTop: 0
          }, 100);
          return false;
        });

      });

    });

    window.onload = function() {
      document.getElementById('button').onclick = function() {
        document.getElementById('modal').style.display = "none"
      };
    };
  </script>

  <script>
    <?php
    $errorMessage = $this->session->flashdata('error');
    $successMessage = $this->session->flashdata('success');
    if ($errorMessage && $errorMessage !== "") { ?>
      swal('Oops!', '<?php echo $errorMessage; ?>', 'error');
    <?php }

    if ($successMessage && $successMessage !== "") { ?>
      swal('success!', '<?php echo $successMessage; ?>', 'success');
    <?php } ?>
  </script>
</body>

</html>