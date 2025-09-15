<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


  <title>Aponjon Trust</title>

  <!-- Le fav and touch icons -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/ico/favicon.png'); ?>">

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
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!--

TemplateMo 574 Mexant

https://templatemo.com/tm-574-mexant

-->
</head>

<body>
  <div class="login_bg" style="background-image: url(<?php echo base_url('assets/images/login_img.jpg'); ?>);">
    <div class="overlay"></div>
    <?php $this->load->view($content, $data); ?>
  </div>

  <!-- ***** Main Banner Area End ***** -->

  <div class="modal fade msg_box show" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header d-block text-center position-relative bg-success p-4">
          <span class="material-symbols-outlined d-block text-white">
            sentiment_satisfied
          </span>

          <h2 class="text-white">Thank You</h2>
          <button type="button" class="btn-close text-white w-40 h-40 bg-white rounded-circle" data-bs-dismiss="modal" aria-label="Close" style="opacity: 1;"></button>
        </div>
        <div class="modal-body text-center msg_box_content p-4">
          <h4><b>Your application has been submitted <br />
              successfully on date: <?php  echo($_SESSION['date']); ?> </b></h4>
          <h4 class="mt-4"><b>your reference id is: <?php  echo($_SESSION['regId']); ?></b></h4>

        </div>
        <div class="modal-footer d-block border-white">

          <a class="text-white" href="<?php echo base_url('login') ?>">
            <button type="button" class="btn btn-primary bg-success d-block w-100 p-3 rounded-pill">
              <h4 class="text-white"><b> OK</b></h4>
            </button>
          </a>

        </div>
      </div>
    </div>
  </div>



  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

  <!-- <script src="<?php //echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); 
                    ?>"></script> -->
                    <script>
                      var base_url = "<?php echo base_url('/'); ?>";
                    </script>
  <script src="<?php echo base_url('assets/admin/ajax.js'); ?>"></script>

  <script src="<?php echo base_url('assets/js/isotope.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/owl-carousel.js'); ?>"></script>

  <script src="<?php echo base_url('assets/js/tabs.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/swiper.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/lightbox/dist/js/lightbox.min.js'); ?>"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
  <script src="<?php echo base_url('assets/custom.js'); ?>"></script>
  
  <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css" />
    <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <script>
  jQuery.noConflict();
//  jQuery(document).ready(function($){
   
//   var $modal = $('#modal_crop');
//   var crop_image = document.getElementById('sample_image');
//   var cropper;
//   $('#upload_image').change(function(event){
//       var files = event.target.files;
//       var done = function(url){
//         jQuery.noConflict();
// // $('#prizePopup').modal('show');
//           crop_image.src = url;
//           $modal.modal('show');
//       };
//       if(files && files.length > 0)
//       {
//           reader = new FileReader();
//           reader.onload = function(event)
//           {
//               done(reader.result);
//           };
//           reader.readAsDataURL(files[0]);
//       }
//   });
//   $modal.on('shown.bs.modal', function() {
//       cropper = new Cropper(crop_image, {
//           aspectRatio: 1,
//           viewMode: 3,
//           preview:'.preview'
//       });
//       console.log('cropper',cropper)
//   }).on('hidden.bs.modal', function(){
//       cropper.destroy();
//       cropper = null;
//   });
//   $('#crop_and_upload').click(function(){
//       canvas = cropper.getCroppedCanvas({
//           width:400,
//           height:400
//       });
//       console.log('canvas',canvas)
//       canvas.toBlob(function(blob){
//           console.log('blob',blob)
//           url = URL.createObjectURL(blob);
//           console.log('blob',url)
//           var reader = new FileReader();
//           console.log('+++++++++++++',reader)
//           reader.readAsDataURL(blob);
//           reader.onloadend = function(){
//           var base64data = reader.result;
//         //    console.log(base64data)
//           $("#upload_imagess").val(base64data);
//           $("#panDoc").val(base64data);
          
//                 $modal.modal('hide');
//           };
          
//       });
//   });
// });
 jQuery(document).ready(function($) {
             
            $( "#birthday" ).datepicker({
            //  dateFormat: 'dd/mm/yy',
              todayBtn: "linked",
              changeMonth: true,
              changeYear: true,
              yearRange: "c-100:c+0",
            });
           
            jQuery.validator.addMethod("validMobile", function(value, element) {
                return this.optional(element) || /^[6-9]\d{9}$/.test(value);
            }, "Please enter a valid mobile number.");
            jQuery.validator.addMethod("validAadhaar", function(value, element) {
                return this.optional(element) || /^\d{12}$/.test(value);
            }, "Please enter a valid 12-digit Aadhaar number.");
            $(".validation-form-message").validate({
                rules: {
                    phone: {
                        validMobile: true
                    },
                    addharNo: {
                        validAadhaar: true
                    }
                },
                messages: {
                    phone: {
                        validMobile: "Please enter a valid mobile number"
                    },
                    addharNo: {
                        validAadhaar: "Please enter a valid Aadhaar number"
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
            $(document).on('change', '.mark_sheet', function() {
                        var input = this;
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var container = $(input).closest('.image-container');
                                container.find('.image-preview').attr('src', e.target.result).show();
                                container.find('.image-link').attr('href', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                });
                var $modal = $('#modal_crop');
                console.log('add payment',$modal);
                var crop_image = document.getElementById('sample_image');
                var cropper;
                $('#upload_image').change(function(event) {
                    var files = event.target.files;
                    var done = function(url) {
                        crop_image.src = url;
                        $modal.modal('show');
                    };
                    if (files && files.length > 0) {
                        reader = new FileReader();
                        reader.onload = function(event) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(files[0]);
                    }
                });
                $modal.on('shown.bs.modal', function() {
                    cropper = new Cropper(crop_image, {
                        aspectRatio: 0,
                        viewMode: 0,
                        preview: '.preview',
                        zoomable: false,
                    });
                    console.log('cropper', cropper)
                }).on('hidden.bs.modal', function() {
                    cropper.destroy();
                    cropper = null;
                });
                $('#crop_and_upload').click(function() {
                    canvas = cropper.getCroppedCanvas({
                        width: 400,
                        height: 400
                    });
                    console.log('canvas', canvas)
                    canvas.toBlob(function(blob) {
                        console.log('blob', blob)
                        url = URL.createObjectURL(blob);
                        console.log('blob', url)
                        var reader = new FileReader();
                        console.log('+++++++++++++', reader)
                        reader.readAsDataURL(blob);
                        reader.onloadend = function() {
                            var base64data = reader.result;
                            $("#transRefDoc").val(base64data);

                            $modal.modal('hide');
                        };

                    });
                });
            });
    
  </script>
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
    $successMessageF = $this->session->flashdata('flassuccess');
    
    if ($errorMessage && $errorMessage !== "") { ?>
      swal('Sorry!', '<?php echo $errorMessage.' Please contact your nearest office.'; ?>', 'error');
    <?php }

    if ($successMessageF && $successMessageF !== "") { ?>
    //  $('#modal').modal('show')
      swal('success!', '<?php echo $successMessageF; ?>', 'success').then(() => {
        console.log(window.location.href);
        if (window.location.href.split("/").pop() === 'registration')
          window.location.href = 'login';
      });
    <?php } ?>

    jQuery.noConflict();

    jQuery(document).ready(function($) {
        <?php 
if ($successMessage && $successMessage !== "") { ?>
 $('#modal').modal('show')
//   swal('success!', '<?php echo $successMessage; ?>', 'success').then(() => {
//     console.log(window.location.href);
//     if (window.location.href.split("/").pop() === 'registration')
//       window.location.href = 'login';
//   });
<?php } ?>
    
    })
  </script>
<style>
  .image-container, .image-container1, .image-container2 {
    margin-bottom: 15px;
}

.image-preview1, .image-preview, .image-preview2 {
    max-width: 50px;
    max-height: 30px;
    display: block;
    margin-top: 3px;
}

.image-link, .image-link1 , .image-link2 {
    display: inline-block;
    position: absolute;
    right: 44px;
    bottom: auto;
}
</style>

</body>

</html>