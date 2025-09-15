<?php $session_id = $this->session->has_userdata('userId');
if($session_id == ''){
    redirect('login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aponjon Trust</title>

     <!-- Le fav and touch icons -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/ico/favicon.png'); ?>">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/jqvmap/jqvmap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/ekko-lightbox/ekko-lightbox.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/adminlte.min.css'); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/daterangepicker/daterangepicker.css'); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/summernote/summernote-bs4.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/custom.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets/css/style.css'); ?>">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url('assets/images/logo.png'); ?>" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php $this->load->view('commons/admin/nav'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('commons/admin/sidebar'); ?>


        <!-- Content Wrapper. Contains page content -->
        <?php $this->load->view($content, $data); ?>
        <!-- /.content-wrapper -->

        <?php $this->load->view('commons/admin/footer'); ?>


    </div>
    <!-- ./wrapper -->
    <div class="modal fade msg_box show" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header d-block text-center position-relative bg-success p-4">
          <span class="material-symbols-outlined d-block text-white">
            sentiment_satisfied
          </span>

          <h2 class="text-white">Thank You</h2>
          <button type="button" class="btn-close text-white w-40 h-40 bg-white rounded-circle" data-bs-dismiss="modal" aria-label="Close" style="opacity: 1;">X</button>
        </div>
        <div class="modal-body text-center msg_box_content p-4">
          <h4><b>Your application has been submitted <br />
              successfully on date: <?php print_r($_SESSION['date']); ?> </b></h4>
          <h4 class="mt-4"><b>your reference id is: <?php print_r($_SESSION['fregId']); ?></b></h4>

        </div>
        <div class="modal-footer d-block border-white">
        <a class="text-white" href="<?php echo base_url('admin/trustmembercreate') ?>">
            <button type="button" class="btn btn-primary bg-success d-block w-100 p-3 rounded-pill">
                <h4 class="text-white"><b> OK</b></h4>
            </button>
        </a>
        </div>
      </div>
    </div>
  </div>
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/admin/plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url('assets/admin/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url('assets/admin/plugins/chart.js/Chart.min.js'); ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url('assets/admin/plugins/sparklines/sparkline.js'); ?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('assets/admin/plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url('assets/admin/plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/ekko-lightbox/ekko-lightbox.min.js'); ?>"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url('assets/admin/plugins/moment/moment.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url('assets/admin/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/admin/dist/js/adminlte.js'); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?php echo base_url('assets/admin/dist/js/demo.js'); ?>"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url('assets/admin/dist/js/pages/dashboard3.js'); ?>"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        var base_url = "<?php echo base_url('/'); ?>";
    </script>
    <script src="<?php echo base_url('assets/admin/ajax.js'); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css" />
    <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>

    <!-- excel script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <!-- <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url('assets/admin/dist/js/jquery.repeater.min.js'); ?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <!-- end script -->
    <!-- pdf script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <!-- end pdf script -->
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>
    <style>
  .modal-header .btn-close {
    position: absolute;
    top: -11px;
    right: -7px;
    font-size: 20px;
    width: 30px;
    height: 30px;
}
.msg_box .material-symbols-outlined {
    font-size: 120px;
}
</style>
   <script>
        const bankDetails ={
            "STATE BANK OF INDIA":{
                "bank_name": "STATE BANK OF INDIA",
                "registration_charge": "3500",
                "traing_others": "20000",
                "total_charge": "55000"
            },
            "INDIAN OVERSISE BANK":{
                "bank_name": "INDIAN OVERSISE BANK",
                "registration_charge": "15000",
                "traing_others": "10000",
                "total_charge": "25000"
            },
            "BANK OF BORODA":{
                "bank_name": "BANK OF BORODA",
                "registration_charge": "30000",
                "traing_others": "15000",
                "total_charge": "45000"
            },
            "BANK OF INDIA":{
                "bank_name": "BANK OF INDIA",
                "registration_charge": "20000",
                "traing_others": "10000",
                "total_charge": "30000"
            },
            "UCO BANK":{
                "bank_name": "UCO BANK",
                "registration_charge": "20000",
                "traing_others": "10000",
                "total_charge": "30000"
            },
            "CENTIRL BANK OF INDIA":{
                "bank_name": "CENTIRL BANK OF INDIA",
                "registration_charge": "26500",
                "traing_others": "15000",
                "total_charge": "41500"
            },
            "INDIAN BANK":{
                "bank_name": "INDIAN BANK",
                "registration_charge": "2000",
                "traing_others": "10000",
                "total_charge": "30000"
            },
            "PANJAB NATATIONAL BANK":{
                "bank_name": "PANJAB NATATIONAL BANK",
                "registration_charge": "30000",
                "traing_others": "15000",
                "total_charge": "45000"
            },
            "BONGIO GRAMIN VIKASH BANK":{
                "bank_name": "BONGIO GRAMIN VIKASH BANK",
                "registration_charge": "25000",
                "traing_others": "15000",
                "total_charge": "40000"
            },
        };
        $(document).ready(function () {

            let table = new DataTable('#myTable',{
                bPaginate : $('#myTable tbody tr').length>10,
                dom: 'Btp',
                //iDisplayLength: 10,
               pageLength: 10,             // Default number of records per page
               lengthMenu: [10, 20, 30, 40]
            });
            
            $('#inputbtn').click(function(e){
                e.preventDefault();
                $('#myTable').DataTable().search($('#myInputTextField').val()).draw() ;
                $('#backbtn').show();
            });
            $('#inputbtn').click(function(e){
                e.preventDefault();
                $('#mydatatable').DataTable().search($('#myInputTextField').val()).draw() ;
                $('#backbtn').show();
            });
           
            
            $( "#birthday,.date" ).datepicker({
            //  dateFormat: 'dd/mm/yy',
              todayBtn: "linked",
              changeMonth: true,
              changeYear: true,
              yearRange: "c-100:c+0",
            });
            $('#paymenttype_method').on('change',function(){
                
                var that = $(this);
                var value = that.val();
                $('#payment_reference').removeClass('d-none');
                $('#payment_file').removeClass('d-none');
                $('#franchaise_code').hide();
                if(value == 'franchise_payment'){
                    $('#payment_reference').addClass('d-none');
                    $('#payment_file').addClass('d-none');
                    $('#franchaise_code').show();
                    
                }
            });
            
            jQuery.validator.addMethod("fullNamePattern", function(value, element) {
                return this.optional(element) || /^[a-zA-Z]+ [a-zA-Z]+$/i.test(value);
            }, "Please enter a valid full name (Firstname Lastname).");
            jQuery.validator.addMethod("validMobile", function(value, element) {
                return this.optional(element) || /^[6-9]\d{9}$/.test(value);
            }, "Please enter a valid mobile number.");

            
            // jQuery.validator.addMethod("validAadhaar", function(value, element) {
            //     return this.optional(element) || /^\d{12}$/.test(value);
            // }, "Please enter a valid 12-digit Aadhaar number.");
            $(".validation-form-message").validate({
                rules: {
                    phone: {
                        validMobile: true
                    },
                    // addharNo: {
                    //     validAadhaar: true
                    // },
                    membarName: {
                        fullNamePattern: true // Apply the custom full name pattern validation
                    },
                    name: {
                        fullNamePattern: true // Apply the custom full name pattern validation
                    },
                },
                messages: {
                    phone: {
                        validMobile: "Please enter a valid mobile number"
                    },
                    membarName: {
                        fullNamePattern: "Full name must contain only letters, with a space between first and last names."
                    },
                    name: {
                        fullNamePattern: "Full name must contain only letters, with a space between first and last names."
                    },
                    // addharNo: {
                    //     validAadhaar: "Please enter a valid Aadhaar number"
                    // }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
            
            var $repeater = $('.repeater').repeater({
                    show: function() {
                        $('[readonly]', this).removeAttr('readonly');
                        $('[disabled]', this).removeAttr('disabled');
                        $('[type="hidden"]', this).val('yes');
                        $('.action_label',this).removeClass('d-none');
                       // $('[type="hidden"]', this).find('.action_label').removeClass('d-none');
                        $('[type="hidden"]', this).prev().removeClass('d-none');
                        $('[type="hidden"]', this).parent('.action').removeClass('d-none');
                        $('.mandatory option[value="no"]', this).attr("selected","selected");
                        $('.field_type option[value="text"]', this).attr("selected","selected");
                        $(this).show();
                    }
                });
                $('#billaddbtn').on('click', function(){
                    var ml = $('#carddetail-add .row').length;
                    var billadd = `<div class="row"><div class="col-md-3 mb-3">
                                        <label>Test<span style="color:#C00">*</span></label>
                                        <input placeholder="Test name" type="text" name="bill[${ml}][test_name]" value="" class="form-control" required="" >
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label>Price<span style="color:#C00">*</span></label>
                                        <input placeholder="Price" type="text" name="bill[${ml}][price]" value="" class="form-control" required="" >
                                    </div></div>`;
                   
                        $('#billammount').append(billadd);
                        
                   
                });
                $('#gallery-add').on('click', function(){
                    var ml = $('#gallery-image-add .gallery').length;
                    var gallery_image = ` <div class="gallery image-${ml+1} row"><div class="col-md-6 mb-3 image-container1">
                                                        <label>Image <span style="color:#C00">*</span></label>
                                                        <a href="#" class="image-link1" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview1" style="display:none;">
                                                        </a>
                                                    <input type="file" class="form-control user_adharback" required name="center_image[${ml}]">
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <div class="action_label"><label>Action</label></div>
                                                        
                                                        <a class="btn btn-danger gallery-delete-btn" data-id="${ml+1}"><i class="fa fa-trash"></i></a>
                                                    
                                                    </div>
                                                    </div>`;
                    if(ml < 5){
                        $('#gallery-image-add').append(gallery_image);
                        
                    } else {
                        alert('You can not add greater than 5 images.');
                    }
                });
                $('#commision-add').on('click', function(){
                    var ml = $('#commision-section-add .row').length;
                    var gallery_image = ` <div class="image-${ml+1} row">
                                                    <div class="col-md-5 mb-3 "> 
                                                    <label>Test Type<span style="color:#C00">*</span></label>       
                                                    <select class="form-control testType" required name="commision[${ml}][test_category]">
                                                        <option value="Xray">Xray</option>
                                                        <option value="laboratory">laboratory</option>
                                                        <option value="USG">USG</option>
                                                        <option value="CT Scan">CT Scan</option>
                                                        <option value="MRI">MRI</option>
                                                        <option value="Teeth Operation & package">Teeth Operation & package</option>
                                                        <option value="Eye Operation & package">Eye Operation & package</option>
                                                    </select>
                                                    </div>
                                                    <div class="col-md-3 mb-3 ">  
                                                    <label>Payout<span style="color:#C00">*</span></label>      
                                                    <input type="number" class="form-control" placeholder="Payout" required name="commision[${ml}][commision]">
                                                    </div>
                                                    <div class="col-md-1 mb-3">
                                                        <label>Units <span style="color:#C00">*</span></label>
                                                        <select class="form-control" name="commision[${ml}][units]" >
                                                            <option value="percentage">%</option>
                                                            <option value="rupee">Rs.</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <div class="action_label"><label>Action</label></div>
                                                        
                                                        <a class="btn btn-danger commision-delete-btn" data-id="${ml+1}"><i class="fa fa-trash"></i></a>
                                                    
                                                    </div>
                                                    </div>`;
                    
                    $('#commision-section-add').append(gallery_image);
                        
                    initializeSelect();
                });
                $('#shop-commision-add').on('click', function(){
                    var ml = $('#shop-commision-section-add .row').length;
                    var gallery_image = ` <div class="image-${ml+1} row">
                                                    <div class="col-md-5 mb-3 "> 
                                                    <label>Shop Type<span style="color:#C00">*</span></label>       
                                                    <select class="form-control testType" required name="commision[${ml}][test_category]">
                                                        <option value="Grocery & Food">Grocery</option>
                                                        <option value="Medicine">Medicine</option>
                                                        <option value="Garment">Garment</option>
                                                        <option value="Toys and Games">Toys and Games</option>
                                                        <option value="Food and Confectionery - Sweets">Food and Confectionery - Sweets</option>
                                                        <option value="Spa & Wellness Centre">Spa & Wellness Centre</option>
                                                        <option value="Fitness Gear Haven">Fitness Gear Haven</option>
                                                        <option value="UTENSILS SHOP">UTENSILS SHOP</option>
                                                        <option value="MEDICAL SHOP">MEDICAL SHOP</option>
                                                        <option value="(MEAT SHOP)butcher shop">(MEAT SHOP)butcher shop</option>
                                                        <option value="FLOWER SHOP">FLOWER SHOP</option>
                                                        <option value="cybercafe xerox + printing center">cybercafe xerox & printing center</option>
                                                        <option value="online mobile shop">online mobile shop</option>
                                                        <option value="BUILDERS & CONSTRUCTION">BUILDERS & CONSTRUCTION</option>
                                                        <option value="Bike and Car">Bike and Car</option>
                                                        <option value="Hardware Shop">Hardware Shop</option>
                                                        <option value="Home Telecome">Home Telecome</option>
                                                        <option value="Footwear Shop">Footwear Shop</option>
                                                        <option value="Plumbing Works">Plumbing Works</option>
                                                        <option value="VEGETABLE SHOP">VEGETABLE SHOP</option>
                                                        <option value="Fishery">Fishery</option>
                                                        <option value="Optical house">Optical house</option>
                                                        <option value="Event Hall">Event Hall</option>
                                                        <option value="Agriculture">Agriculture</option>
                                                        <option value="PUJA SAMGARHI">PUJA SAMGARHI</option>
                                                        <option value="Dental Care">Dental Care</option>
                                                        <option value="FRUIT SHOP">FRUIT SHOP</option>
                                                        <option value="Event Management & Catering Service">Event Management & Catering Service</option>
                                                        <option value="Cosmetics and body car">Cosmetics and body car</option>
                                                        <option value="Electronics and Gadgets">Electronics and Gadgets</option>
                                                        <option value="Health and Wellness">Health and Wellness</option>
                                                        <option value="Health & Beauty">Health & Beauty</option>
                                                        <option value="Books & Stationery">Books & Stationery</option>
                                                        <option value="Jewelry & Accessories">Jewelry & Accessories</option>
                                                        <option value="Home and Furniture">Home and Furniture</option>
                                                        <option value="Gifts & Specialty Items">Gifts & Specialty Items</option>
                                                        <option value="Pet Supplies">Pet Supplies</option>
                                                        <option value="Automotive">Automotive</option>
                                                        <option value="Sports & Outdoors">Sports & Outdoors</option>
                                                        <option value="Home Improvement">Home Improvement</option>
                                                        <option value="Travel and Luggage">Travel and Luggage</option>
                                                        <option value="Digital Goods and Services">Digital Goods and Services</option>
                                                        <option value="Arts and Crafts">Arts and Crafts</option>
                                                    </select>
                                                    </div>
                                                    <div class="col-md-3 mb-3 ">  
                                                    <label>Payout<span style="color:#C00">*</span></label>      
                                                    <input type="number" class="form-control" placeholder="Payout" required name="commision[${ml}][commision]">
                                                    </div>
                                                    <div class="col-md-1 mb-3">
                                                        <label>Units <span style="color:#C00">*</span></label>
                                                        <select class="form-control" name="commision[${ml}][units]" >
                                                            <option value="percentage">%</option>
                                                            <option value="rupee">Rs.</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <div class="action_label"><label>Action</label></div>
                                                        
                                                        <a class="btn btn-danger commision-delete-btn" data-id="${ml+1}"><i class="fa fa-trash"></i></a>
                                                    
                                                    </div>
                                                    </div>`;
                    
                    $('#shop-commision-section-add').append(gallery_image);
                        
                    initializeSelect();
                });
                
                $(document).on('click', '.gallery-delete-btn', function() {
                    var that = $(this);
                    var value = that.data('id');
                    $('#gallery-image-add .image-'+value+'').remove();
                });
                $(document).on('click', '.commision-delete-btn', function() {
                    var that = $(this);
                    var value = that.data('id');
                    $('#commision-section-add .image-'+value+'').remove();
                });
                $('#details-add').on('click', function(){
                    var ml = $('#carddetail-add .row').length;
                    var card_detail =  `<div class="row customer-${ml+1}" >
                                                    <div class="col-md-12 mb-3">
                                                    <h5>Memmber ${ml+1}</h5>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label>Name <span style="color:#C00">*</span></label>
                                                        <input type="text" class="form-control" name="customer[${ml}][user_name]" id="name" placeholder="Name" required="">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label>Phone Number </label>
                                                        <input type="text" class="form-control" name="customer[${ml}][user_phone]" id="name" placeholder="Phone Number" pattern="[7-9]{1}[0-9]{9}" >
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label>Gender <span style="color:#C00">*</span></label>
                                                        <select class="form-control" name="customer[${ml}][user_gender]" required="">
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label>Birth Day <span style="color:#C00">*</span></label>
                                                        <input type="text" placeholder="mm/dd/yyyy" class="form-control birthday" readonly name="customer[${ml}][user_birthday]"  required="">
                                                    </div>
                                                   
                                                    <div class="col-md-4 mb-3">
                                                        <label>Relation <span style="color:#C00">*</span></label>
                                                        <select name="customer[${ml}][user_relation]" class="form-control">
                                                            <option value="Mother">Mother</option>
                                                            <option value="Father">Father</option>
                                                            <option value="Brother">Brother</option>
                                                            <option value="Sister">Sister</option>
                                                            <option value="Wife">Wife</option>
                                                            <option value="Son">Son</option>
                                                            <option value="Daughter">Daughter</option>
                                                            <option value="Husband">Husband</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 mb-3" id="pannumber">
                                                        <label>Pancard Number <span style="color:#C00">*</span></label>
                                                        <input type="text" id="pancard_number" class="form-control" required name="customer[${ml}][user_pancardno]" placeholder="Pancard Number">
                                                    </div>
                                                    <div class="col-md-4 mb-3 image-container">
                                                        <label>Aadhaar front image <span style="color:#C00">*</span></label>
                                                        <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                                    <input type="file" class="form-control user_adharfront" required name="customer[${ml}][user_adharfront]" >
       
                                                    </div>
                                                    <div class="col-md-4 mb-3 image-container1">
                                                        <label>Aadhaar Back image <span style="color:#C00">*</span></label>
                                                        <a href="#" class="image-link1" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview1" style="display:none;">
                                                        </a>
                                                    <input type="file" class="form-control user_adharback" required name="customer[${ml}][user_adharback]">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                    <label>Document Name <span style="color:#C00">*</span></label>
                                                        <select class="form-control" name="customer[${ml}][doc_type]" id="doc_type" required="">
                                                            <option value="Pancard">Pancard</option>
                                                            <option value="Birth certificate">Birth certificate</option>
                                                            <option value="Ration card">Ration card</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 mb-3 image-container2">
                                                        <label>Document <span style="color:#C00">*</span></label>
                                                        <a href="#" class="image-link2" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview2" style="display:none;">
                                                        </a>
                                                        <input type="file" class="form-control document" name="customer[${ml}][document]" required="">
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <div class="action_label"><label>Action</label></div>
                                                        
                                                        <a class="btn btn-danger delete-btn" data-id="${ml+1}"><i class="fa fa-trash"></i></a>
                                                    
                                                    </div>
                                                </div> `;
                    if(ml < 4){
                        $('#carddetail-add').append(card_detail);
                        
                    } else {
                        alert('You can not add greater than 4 member.');
                    }
                    initializeDatepicker();
                });
                function initializeDatepicker() {
                    $( ".birthday" ).datepicker({
                        dateFormat: 'dd/mm/yy',
                        todayBtn: "linked",
                        changeMonth: true,
                        changeYear: true,
                        yearRange: "c-100:c+0",
                    }); // Initialize jQuery UI Datepicker
                }
               
                $(document).on('change', '.user_adharfront', function() {
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
                $(document).on('change', '.qualification_certificate', function() {
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
                $(document).on('change', '.applicationForm', function() {
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
                $(document).on('change', '.residenceCertificate', function() {
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
                $(document).on('change', '.policeVerification', function() {
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
                $(document).on('change', '.votercard', function() {
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
                $(".statusalert").click(function () {
                    alert("Are you really want to change status");
                    $('.status_change').submit();
                });
                $(document).on('click', '.download_btn', function() {
                    
                    let that = $(this);
                    let id = that.data('id');
                    $.ajax({
                        url: base_url + "bankcsp/download",
                        type: "POST",
                        data:{id : id},
                        success: function (response) {
                            //let sponser = JSON.parse(response);
                       
                           window.location.reload();
                        }
                    });
                });
                
               
                $(document).on('change', '.user_adharback', function() {
                        var input = this;
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var container = $(input).closest('.image-container1');
                                container.find('.image-preview1').attr('src', e.target.result).show();
                                container.find('.image-link1').attr('href', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                });
                $(document).on('change', '.document', function() {
                        var input = this;
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var container = $(input).closest('.image-container2');
                                container.find('.image-preview2').attr('src', e.target.result).show();
                                container.find('.image-link2').attr('href', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                });
                $(document).on('change', '.accountProvedDoc', function() {
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
                $(document).on('change', '.signature', function() {
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
                $(document).on('change', '.ibfCertificate', function() {
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
                $(document).on('change', '.transRefDoc', function() {
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
                
                // Initialize Fancybox (or your chosen lightbox)
                $('[data-fancybox="gallery"]').fancybox({
                    // Your fancybox options here
                });
                
                
                $(document).on('click', '.delete-btn', function() {
                    var that = $(this);
                    var value = that.data('id');
                    $('#carddetail-add .customer-'+value+'').remove();
                });
                $(document).on('change', '.birthday', function() {
                   
                    let that = $(this);
                    let birthday = that.val();
                    let currentRow = that.closest('.row');
                  
                    if (birthday) {
                       
                        var age = calculateAge(birthday);
                        
                        if(age < 18){
                            $('#pannumber',currentRow).hide();
                            $('#pancard_number',currentRow).removeAttr('required');
                            $("select#doc_type option:contains('Birth certificate')",currentRow).removeAttr("disabled","disabled").attr("selected","selected");
                            $("select#doc_type option:contains('Ration card')",currentRow).removeAttr("disabled","disabled");
                            $("select#doc_type option:contains('Pancard')",currentRow).attr("disabled","disabled").removeAttr("selected","selected");                          
                        } else {
                            $('#pannumber',currentRow).show();
                            $('#pancard_number',currentRow).attr('required','required');
                            $("select#doc_type option:contains('Birth certificate')",currentRow).attr("disabled","disabled").removeAttr("selected","selected");
                            $("select#doc_type option:contains('Ration card')",currentRow).attr("disabled","disabled");
                            $("select#doc_type option:contains('Pancard')",currentRow).removeAttr("disabled","disabled").attr("selected","selected");
                        }
                        $('#ageDisplay').text('Your age is: ' + age);
                    } else {
                        $('#ageDisplay').text(''); // Clear the age display if no birthday is entered
                    }
                });

                function calculateAge(birthday) {
                    var parts = birthday.split("/");

                    // Rearrange parts into a new Date object (year, month - 1, day)
                    var birthDate = new Date(parts[2], parts[1] - 1, parts[0]);
                    //var birthDate = new Date(birthday);
                    var today = new Date();
                    
                    var age = today.getFullYear() - birthDate.getFullYear();
                    var monthDiff = today.getMonth() - birthDate.getMonth();
                    
                    // Adjust if birthday hasn't occurred yet this year
                    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                        age--;
                    }

                    return age;
                }

            $('#cardnumber').on('change',function(){ 
                let value = $('#cardnumber').val();
                $.ajax({
                    url: base_url + "users/cardnumber",
                    type: "POST",
                    data:{card : value},
                    success: function (response) {
                        const arrayValue = JSON.parse(response);
                        let sponser = JSON.parse(response)['card'][0];
                        let sponser1 = JSON.parse(response)['user'][0];
                       console.log(sponser);
                        if(sponser.id > 0){
                        var html = '';
                        html+= `<table class="table table-bordered">
                            <tr>
                                <th>Card Member name</th>
                                <th>Wallet holder name</th>
                                <th>Wallet balence</th>
                            </tr>
                        `;
                        html+= '<tr><td>'+sponser.firstName+'  '+sponser.lastName+'</td><td><?php echo $this->session->userdata('firstName').' '.$this->session->userdata('lastName'); ?></td><td>Rs.'+sponser1.wallet+'</td></tr></table>';
                        
                        $('#card-details').html(html);
                        } else {
                                $('#card-details').html('Card number invalid.'); 
                            }
                        
                    }
                });
            });
            $('#admin_carnumber').on('change',function(){ 
                let value = $('#admin_carnumber').val();
                let fromdata = $('#payment_form_admin').val();
                if(fromdata == 'own_wallet'){
                    $.ajax({
                        url: base_url + "users/admincardnumber",
                        type: "POST",
                        data:{card : value},
                        success: function (response) {
                            const arrayValue = JSON.parse(response);
                            if(arrayValue.length > 0){
                            let sponser = JSON.parse(response)[0];
                           
                           
                            if(sponser.id > 0){
                            var html = '';
                            html+= `<table class="table table-bordered">
                                <tr>
                                    <th>Card Member name</th>
                                    <th>Wallet holder name</th>
                                    <th>Wallet balence</th>
                                </tr>
                            `;
                            html+= '<tr><td>'+sponser.firstName+'  '+sponser.lastName+'</td><td>'+sponser.firstName+'  '+sponser.lastName+'</td><td>Rs.'+sponser.wallet+'</td></tr></table>';
                            
                            $('#card-details').html(html);
                            } else {
                                $('#card-details').html('Card number invalid.'); 
                            }
                        } else {
                                $('#card-details').html('Card number invalid.'); 
                            }
                            
                        }
                    });
                }
                
            });
            $('#payment_form_admin').on('change',function(){ 
                let fromdata = $('#payment_form_admin').val();
                let value = $('#admin_carnumber').val();
                $('#regid').hide();
                $('#card-details').html(''); 
                if(fromdata == 'franchaise_wallet'){
                    $('#card-details').html(''); 
                    $('#regid').show();
                }
            });
            $('[name=f_regid').on('change',function(){ 
                let fromdata = $('#payment_form_admin').val();
                let value = $('#admin_carnumber').val();
                let regid = $('[name=f_regid]').val();
                if(fromdata == 'franchaise_wallet'){
                  
                    
                    $.ajax({
                        url: base_url + "users/adminfrancardnumber",
                        type: "POST",
                        data:{card : value, regid : regid},
                        success: function (response) {
                            const arrayValue = JSON.parse(response);
                           // if(arrayValue.length > 0){
                            let sponser = JSON.parse(response)['card'][0];
                            let sponser1 = JSON.parse(response)['user'][0];
                           console.log( JSON.parse(response));
                            
                            if(sponser.id > 0){
                            var html = '';
                            html+= `<table class="table table-bordered">
                                <tr>
                                    <th>Card Member name</th>
                                    <th>Wallet holder name</th>
                                    <th>Wallet balence</th>
                                </tr>
                            `;
                            html+= '<tr><td>'+sponser.firstName+'  '+sponser.lastName+'</td><td>'+sponser1.firstName+'  '+sponser1.lastName+'</td><td>Rs.'+sponser1.wallet+'</td></tr></table>';
                            
                            $('#card-details').html(html);
                            } else {
                                $('#card-details').html('Card number invalid.'); 
                            }
                        // } else {
                        //         $('#card-details').html('Card number invalid.'); 
                        //     }
                            
                        }
                    });
                }

            });
            $(document).on('click', '#cardmember_search', function() {
                debugger;
                var card = $("#card_member").val();
                let $this = $(this);
                let $form = $this.closest('form');
                
                $.ajax({
                    url: base_url + "admin/getcarddetail",
                    type: "POST",
                    data: {card: card},
                    success: function (response) {
                        
                        let arrayValue = JSON.parse(response);
                        let sponser = JSON.parse(response)[0];
                        //console.log(sponser);
                      if(sponser.user_id != null){
                        $(`[name=userid]`).val(sponser.user_id).prop("readonly", true);
                      } else {
                        $(`[name=userid]`).val(sponser.uid).prop("readonly", true);
                      }
                        
                       $(`[name=firstName]`).val(sponser.firstName).prop("readonly", true);
                       $(`[name=lastName]`).val(sponser.lastName).prop("readonly", true);
                       $(`[name=middleName]`).val(sponser.middleName).prop("readonly", true);
                        
                       
                        $('#useracard-addblock').show();
                       
                        var key = 0;
                        let html = '';
                        if(arrayValue[0].name != null){
                            while(value = arrayValue[key++]){
                                html +='<div class="row"><div class="col-md-2" > Member '+key+'</div>';
                                html +='<div class="col-md-6" >Name: '+value.name+'</div>';
                                html +='<div class="col-md-4" >Relation: '+value.relation+'</div></div>';
                            }
                        }
                        $('#carddetail-add').html(html);
                        
                    },
                    error: function (data) {
                        
                    },
                });
            });
            $(document).on('click', '#emi-calculator', function() {
                var gstamount = $('.amount_with_gst').val();
                if(gstamount == ''){
                    var amount = $(".emiamount").val();
                } else {
                    var amount = gstamount;
                }
                
                let $this = $(this);
               // let $form = $this.closest('form');
                
                $.ajax({
                    url: base_url + "diagonostic/emireport",
                    type: "POST",
                    data: {amount: amount},
                    success: function (response) {
                        
                       // let arrayValue = JSON.parse(response);
                        let sponser = JSON.parse(response);
                       
                        var today = new Date();
                        var day = today.getDate();
                        var month = today.getMonth(); // 0-based (0 = January, 11 = December)
                        var year = today.getFullYear();

                        // Determine the EMI payment date
                        var emiPaymentDate;

                        // If today is before the 20th, set EMI payment to next month's 5th
                        if (day <= 20) {
                            // Set to the 5th of the next month
                            month = (month + 1) % 12; // Move to next month (rollover to January if December)
                            if (month === 0) { 
                                year++; // Increment the year if month was December
                            }
                            emiPaymentDate = new Date(year, month, 5); // 5th of next month
                        } else {
                             // Otherwise, set the EMI payment to the 3rd of the second next month
                            month = (month + 2) % 12; // Move to the second next month (rollover to January if December)
                            if (month === 0) { 
                                year++; // Increment the year if month was December
                            }
                            emiPaymentDate = new Date(year, month, 3); // 3rd of the second next month
                        }
                       
                        // Format the date to display it in YYYY-MM-DD format
                        var formattedDate =  ('0' + emiPaymentDate.getDate()).slice(-2) + '-' + ('0' + (emiPaymentDate.getMonth() + 1)).slice(-2) + '-'+ emiPaymentDate.getFullYear();
                        
                        let html = '';
                        //console.log(formattedDate);
                       if($('input[name="round_figure"]:checked').val() == 1){
                        var amount = sponser.downpayment_amount;
                        var downpayment_amount = Math.ceil(amount);
                        var emi = sponser.f_emi_amount;
                        var emi_amount = Math.ceil(emi);
                        var total_amount = downpayment_amount * (sponser.emi_timing + 1);
                       } else {
                       
                        var downpayment_amount = sponser.downpayment_amount;
                        var emi_amount = sponser.f_emi_amount;
                        var total_amount = downpayment_amount * (sponser.emi_timing + 1);
                       }
                        html +='<tr><td> '+downpayment_amount+'</td>';
                        html +='<td>'+emi_amount+'</td> <td>'+sponser.emi_timing+'</td><td>'+formattedDate+'</td></tr>';
                        $('#emi-calculator-display > tbody').html(html);
                        $('#emi-calculator-display').show();
                        $('#payment-method').show();
                        $('#round-figure').show();
                        $('#emi-calculator-section').show();
                        $('#downpayment_amount').val(downpayment_amount);
                        $('[name=total_round_figure]').val(total_amount);
                        
                    },
                    error: function (data) {
                        
                    },
                });
            });
            $(document).on('click', '#emi-calculator-btn', function() {
                
                var amount = $(".emi-amount").val();
                
                
                let $this = $(this);
               // let $form = $this.closest('form');
                
                $.ajax({
                    url: base_url + "diagonostic/emireport",
                    type: "POST",
                    data: {amount: amount},
                    success: function (response) {
                        
                       // let arrayValue = JSON.parse(response);
                        let sponser = JSON.parse(response);
                       
                        var today = new Date();
                        var day = today.getDate();
                        var month = today.getMonth(); // 0-based (0 = January, 11 = December)
                        var year = today.getFullYear();

                        // Determine the EMI payment date
                        var emiPaymentDate;

                        // If today is before the 20th, set EMI payment to next month's 5th
                        if (day <= 20) {
                            // Set to the 5th of the next month
                            month = (month + 1) % 12; // Move to next month (rollover to January if December)
                            if (month === 0) { 
                                year++; // Increment the year if month was December
                            }
                            emiPaymentDate = new Date(year, month, 5); // 5th of next month
                        } else {
                             // Otherwise, set the EMI payment to the 3rd of the second next month
                            month = (month + 2) % 12; // Move to the second next month (rollover to January if December)
                            if (month === 0) { 
                                year++; // Increment the year if month was December
                            }
                            emiPaymentDate = new Date(year, month, 3); // 3rd of the second next month
                        }
                       
                        // Format the date to display it in YYYY-MM-DD format
                        var formattedDate =  ('0' + emiPaymentDate.getDate()).slice(-2) + '-' + ('0' + (emiPaymentDate.getMonth() + 1)).slice(-2) + '-'+ emiPaymentDate.getFullYear();
                        
                        let html = '';
                        //console.log(formattedDate);
                      
                       
                        var downpayment_amount = sponser.downpayment_amount;
                        var emi_amount = sponser.f_emi_amount;
                        var total_amount = downpayment_amount * (sponser.emi_timing + 1);
                       
                        html +='<tr><td> '+downpayment_amount+'</td>';
                        html +='<td>'+emi_amount+'</td> <td>'+sponser.emi_timing+'</td><td>'+formattedDate+'</td></tr>';
                        $('#emi-calculator-display-section > tbody').html(html);
                        $('#emi-calculator-display-section').show();
                       
                        
                    },
                    error: function (data) {
                        
                    },
                });
            });
            $(document).on('change', '#gst_amount', function() {
                // var gst = $(this).val();
                // var tamount = $(".emiamount").val();
                // var gstamount = ((tamount * gst)/100);
                // let amount = parseInt(tamount) + parseInt(gstamount);
                // $('.amount_with_gst').val(amount);
                gstcalculate();
                $('#gst-amount').show();
            });
            function gstcalculate(){
                var gst = $('#gst_amount').val();
                var tamount = $(".emiamount").val();
                var gstamount = ((tamount * gst)/100);
                let amount = parseInt(tamount) + parseInt(gstamount);
                $('.amount_with_gst').val(amount);
            }
            $(document).on('change','[name=payment_method]',function(){
                $('#reference').hide();
                if($(this).val() == 'online' || $(this).val() == 'card'){
                    $('#reference').show();
                }
            });
            $(document).on('change','[name=payment_type]',function(){
                $('#emi-calculator').hide();
                $('#emi-calculator-display').hide();
                $('#payment-method').show();
                $('#round-figure').hide();
                if($(this).val() == 'on emi'){
                    $('#emi-calculator').show();
                    $('#emi-calculator-display').show();
                    $('#round-figure').show();
                    //$('#payment-method').show();
                }
               
            });
            $(document).on('click','#apply-now-btn',function(){
                $('#card_enter').show();
            });
            $(document).on('change','#cardnumber_search',function(){
                let cardnumber = $('#cardnumber_search').val();
                
                $.ajax({
                    url: base_url + "diagonostic/carddetails",
                    type: "POST",
                    data: {card: cardnumber},
                    success: function (response) {
                        let arrayValue = JSON.parse(response);
                        let sponser = JSON.parse(response)[0];
                        let name = arrayValue[0].firstName +' '+ arrayValue[0].middleName+' '+ arrayValue[0].lastName;
                        var newOption = $('<option>', {
                        value: arrayValue[0].id, // Value of the option
                        text: name // Text displayed for the option
                        });
                        $('#memeber_option').append(newOption);
                        $('#userId').val(arrayValue[0].id);
                        var key = 0;
                        while(value = arrayValue[1][key++]){
                            var newOption = $('<option>', {
                            value: value.id, // Value of the option
                            text: value.name // Text displayed for the option
                            });
                            $('#memeber_option').append(newOption);
                        }
                        // Append the new option to the select element
                       // $('#memeber_option').append(newOption);
                        $('#memeber_select').show();
                    }
                });
            });
            
            $(document).on('click','#search_btn',function(){
                let cardnumber = $('#cardnumber_field').val();
                $.ajax({
                    url: base_url + "diagonostic/carddetails",
                    type: "POST",
                    data: {card: cardnumber},
                    success: function (response) {
                        let arrayValue = JSON.parse(response);
                        let sponser = JSON.parse(response)[0];
                        
                        let name = arrayValue[0].firstName +' '+ arrayValue[0].middleName+' '+ arrayValue[0].lastName;
                        let balence = arrayValue[0].balanceAfter ? arrayValue[0].balanceAfter : 15000;
                        var key = 0;
                        let html = '';
                        html += '<div class="row"><input type="radio" name="userid" value="'+arrayValue[0].id+'" checked ><div class="form-outline mb-4 col-sm-5"><label class="text-left">Name </label><input type="text"  class="form-control"  value="'+name+'"   /></div>';
                        html += '<div class="form-outline mb-4 col-sm-5"><label class="text-left">Credit Balence </label><input type="text"  class="form-control"  value="'+balence+'"   /></div></div>';
                       
                        if(arrayValue[1].length == 0){
                        html += '<input type="hidden" name="muserid" value="'+arrayValue[0].id+'" >';
                        }
                        
                        while(value = arrayValue[1][key++]){
                            let userbalence = value.balanceAfter ? value.balanceAfter : 15000;
                            html += '<div class="row"><input type="hidden" name="muserid" value="'+arrayValue[0].id+'" ><input type="radio" name="userid" value="'+value.id+'" ><div class="form-outline mb-4 col-sm-5"><label class="text-left">Name </label><input type="text"  class="form-control"  value="'+value.name+'"   /></div>';
                            html += '<div class="form-outline mb-4 col-sm-5"><label class="text-left">Credit Balence </label><input type="text"  class="form-control"  value="'+userbalence+'"   /></div></div>';
                        }
                      
                        $('#member-details').html(html);
                        $('#member-details').show();
                        $('#report-details').show();
                        $('#test_section').show();
                        
                    },
                    error: function (response) {
                        
                    },
                });
            });
            $(document).on('click','#test_add_btn',function(){
                var diagonostictest = sessionStorage.getItem('diagonostictest');
                let diagonostic = JSON.parse(diagonostictest);
                
                
                if(diagonostictest == null){
                    $.ajax({
                        url: base_url + "diagonostic/testdetails",
                        type: "POST",
                        success: function (response) {
                            let arrayValue = JSON.parse(response);
                        // let sponser = JSON.parse(response)[0];
                        console.log(JSON.stringify(arrayValue));
                        sessionStorage.setItem('diagonostictest', JSON.stringify(arrayValue));
                        addTestitem();

                        }
                    });
                } else {
                    addTestitem();
                }
                $('#submit_section').show();
            });
            $(document).on('click','#product_add_btn',function(){
                debugger;
                let user = $('#shop_id').val();
                var shopProduct = sessionStorage.getItem('shopProduct');
                let shopproducts = JSON.parse(shopProduct);
                
                
                if(shopproducts == null){
                    $.ajax({
                        url: base_url + "shopping/productdetails",
                        type: "POST",
                        data: {user: user},
                        success: function (response) {
                            let arrayValue = JSON.parse(response);
                        // let sponser = JSON.parse(response)[0];
                        console.log(JSON.stringify(arrayValue));
                        sessionStorage.setItem('shopProduct', JSON.stringify(arrayValue));
                        addProductitem();

                        }
                    });
                } else {
                    addProductitem();
                }
                $('#submit_section').show();
            });
            function addProductitem(){
                var ml = $('#product_add_section .row').length;
                let html = '';
                var shopProduct = sessionStorage.getItem('shopProduct');
                let shopproduct = JSON.parse(shopProduct);
                let selectedValue = $('.testName').val();
                html +='<div class="row"><div class="form-outline mb-4 col-sm-3"><label class="text-left">Product Type <span class="text-danger">*</span></label><select class="form-control testName" name="test_name['+ml+'][product_category]" required ><option>Select Product type</option>';
                for (var i = 0; i < shopproduct.length; i++) {
                    //let valueAlreadyUsed = (selectedValue && selectedValue.indexOf(diagonostic[i].id)) >= 0 ? "disabled" : "";
                    html +='<option value="'+shopproduct[i].id+'" >'+shopproduct[i].test_category+'</option>';
                }
                
                html += '</select></div><div class="form-outline mb-4 col-sm-3"><label class="text-left">Product Title <span class="text-danger">*</span></label><input type="text"  class="form-control" name="test_name['+ml+'][product]" required /></div><div class="form-outline mb-4 col-sm-3"><label class="text-left">Product Brand <span class="text-danger">*</span></label><input type="text"  class="form-control" name="test_name['+ml+'][product_brand]" required /></div><div class="form-outline mb-4 col-sm-3"><label class="text-left">Product Model <span class="text-danger">*</span></label><input type="text"  class="form-control" name="test_name['+ml+'][product_model]" required /></div><div class="form-outline mb-4 col-sm-3"><label class="text-left">Net Quantity <span class="text-danger">*</span></label><input type="text"  class="form-control" name="test_name['+ml+'][net_quantity]" required /></div><div class="form-outline mb-4 col-sm-3"><label class="text-left">Expired Month <span class="text-danger">*</span></label><input type="month"  class="form-control" name="test_name['+ml+'][expired_month]" required /></div><div class="form-outline mb-4 col-sm-3"><label class="text-left">MRP Price <span class="text-danger">*</span></label><input type="number"  class="form-control mrp_amount" name="test_name['+ml+'][product_mrp]" required /></div><div class="col-md-2 mb-3"><label>Quantity <span style="color:#C00">*</span></label><select class="form-control" name="test_name['+ml+'][quantity]" required=""><option value="Piece">Piece</option><option value="gm">GM</option><option value="kg">KG</option><option value="lt">Lt</option> </select></div><div class="form-outline mb-4 col-sm-3"><label class="text-left">Special Offer <span class="text-danger">*</span></label><input type="number"  class="form-control offer_amount" name="test_name['+ml+'][product_offer]" required /></div><div class="col-md-1 mb-3"><label>Units <span style="color:#C00">*</span></label><select class="form-control units" name="test_name['+ml+'][units]" required=""><option value="percentage">%</option><option value="rupess">Rs.</option></select></div><div class="form-outline mb-4 col-sm-3"><label class="text-left">Selling Price <span class="text-danger">*</span></label><input type="number"  class="form-control selling_amount" name="test_name['+ml+'][product_selling_price]" required /></div><div class="col-md-4 mb-3 image-container"><label>Product image <span style="color:#C00">*</span></label><a href="#" class="image-link custom-link" data-fancybox="gallery"><img src="" alt="Image Preview" class="image-preview" style="display:none;"></a><input type="file" class="form-control user_adharfront" required name="test_name['+ml+'][product_image]" ></div><div class="form-outline mb-4 col-sm-3"><label class="text-left">Description <span class="text-danger">*</span></label><textarea  class="form-control" name="test_name['+ml+'][description]" required /></textarea></div><div class="remove-div btn btn-danger text-left" style="cursor: pointer;height: 38px; margin: 33px 0 10px 10px;" ><i class="fa fa-trash"></i></div></div>';
                
                $('#product_add_section').append(html);
                initializeSelect2();
            }
            function addTestitem(){
                var ml = $('#test_add_section .row').length;
                let html = '';
                var diagonostictest = sessionStorage.getItem('diagonostictest');
                let diagonostic = JSON.parse(diagonostictest);
                let selectedValue = $('.testName').val();
                html +='<div class="row"><div class="form-outline mb-4 col-sm-3"><label class="text-left">Test Type <span class="text-danger">*</span></label><select class="form-control testName" name="test_name['+ml+'][test_category]" required ><option>Select Test type</option>';
                for (var i = 0; i < diagonostic.length; i++) {
                    //let valueAlreadyUsed = (selectedValue && selectedValue.indexOf(diagonostic[i].id)) >= 0 ? "disabled" : "";
                    html +='<option value="'+diagonostic[i].id+'" >'+diagonostic[i].test_category+'</option>';
                }
                
                html += '</select></div><div class="form-outline mb-4 col-sm-4"><label class="text-left">Test Name <span class="text-danger">*</span></label><input type="text"  class="form-control" name="test_name['+ml+'][name]" required /></div><div class="form-outline mb-4 col-sm-3"><label class="text-left">Amount <span class="text-danger">*</span></label><input type="number"  class="form-control amount" name="test_name['+ml+'][amount]" required /></div><div class="col-sm-2 remove-div btn btn-danger" style="cursor: pointer;height: 38px; margin: auto;" >Remove</div></div>';
                
                $('#test_add_section').append(html);
                initializeSelect2();
            }
            // $(document).on('focus click','.testName', function() {
            //     let selectFields = $('.testName');
            //     let selectedValue = [];
            //     selectFields.each(function(idx, elm) {
            //         selectedValue.push($(elm).val());  // Get the selected value of the dropdown
            //     });
            //     $('option', $(this)).each(function(idx, elm){
            //         let val = $(elm).prop('value');
            //         if(selectedValue.indexOf(val) >= 0){
            //             $(elm).prop('disabled', true);
            //         }
            //         else{
            //             $(elm).removeProp('disabled');
            //         }
            //     })
            // });
            // $(document).on('change','.testName',function(){
            //     var diagonostictest = sessionStorage.getItem('diagonostictest');
            //     let diagonostic = JSON.parse(diagonostictest);
            //     let val = $(this).val();
            //     let thisParent = $(this).closest('.row');
            //     let matchedTest = diagonostic.find(test => test.id === val);
            //     let amountData = matchedTest.amount ? matchedTest.amount : 0;
            //     $('.testAmount', thisParent).val(amountData);
            // });
            $(document).on('change','.offer_amount',function(){
                debugger;
                let mrp_amount = $('.mrp_amount').val();
                let offer_amount = $('.offer_amount').val();
                let units = $('.units').val();
                let sale_amount = 0;
                if(units == 'percentage'){
                    sale_amount = mrp_amount -((mrp_amount * offer_amount)/100);
                } else {
                    sale_amount = mrp_amount - offer_amount;
                }
                
                $('.selling_amount').val(Math.round(sale_amount)).prop("readonly", true);
            });
            $(document).on('click','.remove-div',function(){
                let thisParent = $(this).closest('.row');
                thisParent.remove();
                calculateTotal();
                gstcalculate();
            });
            $(document).on('input', '.amount', function() {
                calculateTotal();
                gstcalculate();
                $('.totalytestamount').show();
            });
            $(document).on('change','#diastatus',function(){
                let val = $(this).val();
                $('#reject_reason').hide();
                if(val == 'rejected'){
                    $('#reject_reason').show();
                }
            });
            $(document).on('change','#invoicestatus',function(){
                let val = $(this).val();
                $('#reject_reason').hide();
                if(val == 'rejected'){
                    $('#reject_reason').show();
                }
                if(val == 'approved'){
                    $('#approve_invoice').show();
                }
                
            });
            $(document).on('click','#bank_edit_button',function(){
                $('#bank-edit-section').show();
            });
            $(document).on('click','.location-edit',function(){
                $('#location-edit-section').show();
            });
            $(document).on('click','.mobile-edit',function(){
                $('#mobile-edit-section').show();
            });
            
            function calculateTotal() {
                // let existing = $('#totalAmount').val();
                // if(existing > 0){
                //     var total = existing;
                // } else {
                //     var total = 0;
                // }
                let total = 0;
               
                // Iterate over each input field with the class 'amount'
                $('.amount').each(function() {
                // Add the value of each input to the total (parse as float)
                total += parseFloat($(this).val()) || 0; // Use 0 if value is NaN or empty
                });
               
                let payment_type = $('[name=payment_type]').val();
                if(total >= 1000 && payment_type == 'on emi'){
                    $('#emi-calculator').show();
                } else {
                    $('#emi-calculator').hide();
                }
                
                // Update the total in the DOM
                $('#totalAmount').val(total.toFixed(2)); // Optionally format the total to 2 decimal places
            }
            $(document).on('click', '.image-edit i',function(){
              
                let image = $(this).data('id');
                $('.edit-'+image).show();
                $('.galleryimage-'+image).hide();
            });
         
            
            
            $(document).on('change', '#cucardnumber', function() {
                
                var customercard = $("#cucardnumber").val();
                let $this = $(this);
                let $form = $this.closest('form');
                let $docFields = ['mark_sheet' , 'qualification_certificate' , 'votercard' , 'panDoc' , 'addharFrontDoc' , 'addharBackDoc' , 'pic']
                $.ajax({
                    url: base_url + "bankcsp/getcardmemberdetail",
                    type: "POST",
                    data: {customercard: customercard},
                    success: function (response) {
                        console.log(response);
                        const arrayValue = JSON.parse(response);
                        let sponser = JSON.parse(response)[0];
                        //console.log(sponser);
                        if(sponser.id && sponser.id > 0)
                        {
                            $.each(sponser, function(key, value) {
                                let fieldName = key;
                                var inputType = $(`[name=${key}]`).attr('type');

                                if ($docFields.indexOf(key) > -1 ){
                                    if(value){
                                            $(`[name=${key}]`, $form).hide();
                                            $(`[name=${key}]`, $form).removeAttr('required');
                                        }
                                        else{
                                            $(`[name=${key}]`, $form).show();
                                            $(`[name=${key}]`, $form).attr('required');
                                        }
                                }
                                if(inputType != 'file'){
                                    $(`[name=${key}]`).val(value).prop("readonly", true);
                                }
                                
                            });
                           
                            
                        }
                        else{
                            $('[type="file"]', $form).show();
                            $('[type="file"]', $form).attr('required');
                        }
                       
                        
                    },
                    error: function (data) {
                        
                    },
                });
            });  
            $(document).on('change', '#application_cardnumber', function() {
                var customercard = $("#application_cardnumber").val();
                let $this = $(this);
                let $form = $this.closest('form');
               
                $.ajax({
                    url: base_url + "bankcsp/getapplicationuserdetails",
                    type: "POST",
                    data: {customercard: customercard},
                    success: function (response) {
                        
                      
                        let sponser = JSON.parse(response);
                        //console.log(sponser);
                        if(sponser.id && sponser.id > 0)
                        {
                            $.each(sponser, function(key, value) {
                                $(`[name=${key}]`).val(value).prop("readonly", true);
                                if(key == 'bankName'){
                                    $('[name="bankName"]').trigger('change');
                                }
                            });
                           
                            
                        }
                      
                       
                        
                    },
                    error: function (data) {
                        
                    },
                });
            }); 
            $(document).on('change','[name="bankName"]', function(){
             
                let bankName = $(this).val();
                bankName = bankName ? bankName.trim().toUpperCase() : bankName;
                currentBankDetails = bankDetails[bankName];
                if (currentBankDetails){
                    $('[name="amount"]').val(currentBankDetails.total_charge).prop("readonly", true);
                }
            });
           $(document).on('click','#cashback-btn', function(){
           
                $('#cashbackdata-section').show();
           });
           $(document).on('click','.cashback-apply', function(){
                let cashback = $(this).data('id');
                $.ajax({
                    url: base_url + "offer/details",
                    type: "POST",
                    data:{cashback : cashback},
                    success: function (response) {
                        let sponser = JSON.parse(response);
                        $('.cashback_input').show();
                        $('#offer_id').val(cashback);
                        $('#amount').val(sponser.offer_amount).prop("readonly", true);
                        $('#cashback_amount').val(sponser.amount).prop("readonly", true);
                       // $('#balence').text('Wallet balence Rs:'+ response);
                    }
                });
           });
           
            $('#payment_form').on('change',function(){ 
                let payment = $('#payment_form').val();
                let value = $('#card_number').val();
                $.ajax({
                    url: base_url + "users/walletamount",
                    type: "POST",
                    data:{card : value,payment: payment},
                    success: function (response) {
                       
                        $('#balence').text('Wallet balence Rs:'+ response);
                    }
                });
            }); 
            var card_number = document.getElementById("card_number");
            if(card_number != ''){
                card_number.addEventListener('keyup',function (e) {
                // console.log(e.keyCode);
                if (e.keyCode !== 8) {
                    if (this.value.length === 4 || this.value.length === 9) {
                    this.value = this.value += ' ';
                    }
                }
                });
            }
            $(document).on('change', 'input[name=firstName],input[name=middleName],input[name=lastName]', function() {
                let membarName = $('input[name=firstName]').val()+' '+$('input[name=middleName]').val()+' '+$('input[name=lastName]').val();
                $('input[name=accountHolderName]').val(membarName).prop("readonly", true);
            });
            
            $(document).on('change', '#cardemail', function() {
                var email = $("#cardemail").val();
                let $this = $(this);
                let $form = $this.closest('form');
                $.ajax({
                    url: base_url + "admin/getdetail",
                    type: "POST",
                    data: {email: email},
                    success: function (response) {
                        console.log(response);
                        const arrayValue = JSON.parse(response);
                        let sponser = JSON.parse(response)[0];
                        //console.log(sponser);
                        if(sponser.id && sponser.id > 0)
                        {
                            $('[type="file"]', $form).hide();
                            ('[type="file"]', $form).removeAttr('required');
                            if(sponser.hasOwnProperty('middleName')){
                            var membarName =
                            sponser.firstName + ' '+ sponser.middleName + ' '+ sponser.lastName;
                            } else {
                            var membarName =
                            sponser.firstName + ' '+ sponser.lastName;
        }
                            sponser.membarName = membarName;
                        }
                        else{
                            $('[type="file"]', $form).show();
                            $('[type="file"]', $form).attr('required');
                        }
                       
                        $.each(sponser, function(key, value) {
                            $(`[name=${key}]`).val(value).prop("readonly", true);
                            
                        });
                        $(`[name=gender]`).attr("readonly", true);
                        $(`[name=nomineeRelation]`).attr("readonly", true);
                        $(`[name=accountType]`).attr("readonly", true);
                        $(`[name=district]`).attr("readonly", true);
                    },
                    error: function (data) {
                        
                    },
                });
            });
            $(document).on('change', '#cucardnumber', function() {
                debugger;
                var customercard = $("#cucardnumber").val();
                let $this = $(this);
                let $form = $this.closest('form');
                let $docFields = ['mark_sheet' , 'qualification_certificate' , 'votercard' , 'panDoc' , 'addharFrontDoc' , 'addharBackDoc' , 'pic']
                $.ajax({
                    url: base_url + "bankcsp/getcardmemberdetail",
                    type: "POST",
                    data: {customercard: customercard},
                    success: function (response) {
                        console.log(response);
                        const arrayValue = JSON.parse(response);
                        let sponser = JSON.parse(response)[0];
                        //console.log(sponser);
                        if(sponser.id && sponser.id > 0)
                        {
                            $.each(sponser, function(key, value) {
                                let fieldName = key;
                                var inputType = $(`[name=${key}]`).attr('type');
debugger;
                                if ($docFields.indexOf(key) > -1 ){
                                    if(value){
                                            $(`[name=${key}]`, $form).hide();
                                            $(`[name=${key}]`, $form).removeAttr('required');
                                        }
                                        else{
                                            $(`[name=${key}]`, $form).show();
                                            $(`[name=${key}]`, $form).attr('required');
                                        }
                                }
                                if(inputType != 'file'){
                                    $(`[name=${key}]`).val(value).prop("readonly", true);
                                }
                                
                            });
                           
                            
                        }
                        else{
                            $('[type="file"]', $form).show();
                            $('[type="file"]', $form).attr('required');
                        }
                       
                        
                    },
                    error: function (data) {
                        
                    },
                });
            });  

    });
        jQuery(document).ready(function() {
            jQuery('#summernote').summernote({
                
            });
        });
        jQuery(document).on('change', '.commision_type', function(){
            var that = $(this).val();
            if(that == 'fixed'){
                $('.commision').html('Commission in &#8377; <span style="color:#C00">*</span>');
            }
            if(that == 'percentage'){
                $('.commision').html('Commission in % <span style="color:#C00">*</span>');
            }
        });
        jQuery(document).on('change', '[name=material_status]', function(){
            var that = $(this).val();
            var gender =$(`[name=gender]`).val();
            $('#father-block').show();
            $('#husband-block').hide();
            if(that == 'Married' &&  gender == 'Female'){
                $('#father-block').hide();
                $('#husband-block').show();
            }
          
        });
        /*jQuery('select.field_type').on('change', function() {
                alert(this.value); 
                // if(this.value == 'checkbox' || this.value == 'radio' || this.value == 'select' ){
                //     jQuery('.option_array').removeClass('d-none');
                // }
               
            });*/
        jQuery(document).on('change', '.field_type', function(){
            let $parent = $(this).parents('.row');
            let $val = $(this).val();
            if($val == 'select' || $val == 'radio' || $val == 'checkbox' || $val == 'file'){
                $('.option_array', $parent).removeClass('d-none');
            }
            else{
                $('.option_array', $parent).addClass('d-none');
            }
            if($val == 'file'){
                
                $('.option_array textarea', $parent).prop('placeholder','ex: .pdf, .docx, .jpg');
            }
        });
        var baseUrl = "<?php echo base_url(); ?>";

        function crop(op) {
            // $(document).ready(function() {

            // })
            document.getElementsByClassName('crop').addEventLister('click', () => {
                alert($(this).attr('name'));
            })
        }

        function addPayment() {
            $(document).ready(function() {

                var $modal = $('#modal_crop');
                console.log('add payment', $modal);
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
                        viewMode: 3,
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
                            $("#upload_imagess").val(base64data);

                            $modal.modal('hide');
                        };

                    });
                });
            });
        }
        function copy(element_id){
               
                var textToCopy = $('#'+element_id+'').text();
                var tempTextarea = $('<textarea>');
                $('body').append(tempTextarea);
                tempTextarea.val(textToCopy).select();
                document.execCommand('copy');
                tempTextarea.remove();
        }

        

        

        
      
     $(document).ready(function() {
        $('.withdraw-btn').click(function(){
           
            var formData = $('#withdrawform').serialize(); 
            
            //var formData = new FormData($('#withdrawform')[0]);
            $.ajax({
    url: base_url + "users/withdrawcustomer",
    method: "POST",
    data: formData,
    beforeSend: function() {
        // setting a timeout
        $(this).text('loading');
        $(this).attr('disabled', 'disabled');
    },
    success: function (data) {
        $('#withdrawform')[0].reset();
        $(this).html('<i class="fa fa-fw fa-lg fa-check-circle"></i>Submit');
        $(this).attr('disabled', '');
        $('.alert-success').show();
        $('.alert-success').text('Withdraw request send sucessfully. Please wait for 72 working hours.');
      // console.log("data", data);
     // $('.withdraw-btn').text('loading');
     // window.location.reload();
        
    },
    error: function (error) {
      console.log("error", error);
    },
  });
        });
        });


        function passbookse() {
            $(document).ready(function() {

                var $modal = $('#modal_crops_passbook');
                var crop_images = document.getElementById('passbookse');
                var cropper;
                $('#passbokks').change(function(event) {
                    console.log("addhar");
                    var files = event.target.files;

                    var done = function(url) {
                        crop_images.src = url;
                        $modal.modal('show');
                    };
                    //    console.log("bler kaj",done)
                    if (files && files.length > 0) {
                        reader = new FileReader();
                        reader.onload = function(event) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(files[0]);
                    }
                });
                $modal.on('shown.bs.modal', function() {
                    cropper = new Cropper(crop_images, {
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
                $('#crop_and_upload_passbook').click(function() {
                    canvas = cropper.getCroppedCanvas({
                        width: 400,
                        height: 400
                    });

                    canvas.toBlob(function(blob) {

                        url = URL.createObjectURL(blob);

                        var reader = new FileReader();

                        reader.readAsDataURL(blob);
                        reader.onloadend = function() {
                            var base64data = reader.result;
                            //    console.log(base64data)
                            $("#accountProvedDoc").val(base64data);

                            $modal.modal('hide');
                        };

                    });
                });
            });
        }

        function signat() {
            $(document).ready(function() {

                var $modal = $('#modal_crops_sig');
                var crop_images = document.getElementById('signat');
                var cropper;
                $('#signatureImage').change(function(event) {
                    console.log("addhar");
                    var files = event.target.files;

                    var done = function(url) {
                        crop_images.src = url;
                        $modal.modal('show');
                    };
                    //    console.log("bler kaj",done)
                    if (files && files.length > 0) {
                        reader = new FileReader();
                        reader.onload = function(event) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(files[0]);
                    }
                });
                $modal.on('shown.bs.modal', function() {
                    cropper = new Cropper(crop_images, {
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
                $('#crop_and_upload_sig').click(function() {
                    canvas = cropper.getCroppedCanvas({
                        width: 400,
                        height: 400
                    });

                    canvas.toBlob(function(blob) {

                        url = URL.createObjectURL(blob);

                        var reader = new FileReader();

                        reader.readAsDataURL(blob);
                        reader.onloadend = function() {
                            var base64data = reader.result;
                            //    console.log(base64data)
                            $("#signature").val(base64data);

                            $modal.modal('hide');
                        };

                    });
                });
            });
        }

        function customar() {
            $(document).ready(function() {

                var $modal = $('#modal_crops_pic');
                var crop_images = document.getElementById('customars');
                var cropper;
                $('#customarImg').change(function(event) {
                    console.log("addhar");
                    var files = event.target.files;

                    var done = function(url) {
                        crop_images.src = url;
                        $modal.modal('show');
                    };
                    //    console.log("bler kaj",done)
                    if (files && files.length > 0) {
                        reader = new FileReader();
                        reader.onload = function(event) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(files[0]);
                    }
                });
                $modal.on('shown.bs.modal', function() {
                    cropper = new Cropper(crop_images, {
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
                $('#crop_and_upload_pic').click(function() {
                    canvas = cropper.getCroppedCanvas({
                        width: 400,
                        height: 400
                    });

                    canvas.toBlob(function(blob) {

                        url = URL.createObjectURL(blob);

                        var reader = new FileReader();

                        reader.readAsDataURL(blob);
                        reader.onloadend = function() {
                            var base64data = reader.result;
                            //    console.log(base64data)
                            $("#pic").val(base64data);

                            $modal.modal('hide');
                        };

                    });
                });
            });
        }

        //edit crop
        function panDocEdit() {
            $(document).ready(function() {

                var $modal = $('#modal_crop');
                var crop_image = document.getElementById('sample_image');
                var cropper;
                $('#panDocEdits').change(function(event) {
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
                        // dragMode: 'move',
                    });
                    console.log('cropper', cropper)
                }).on('hidden.bs.modal', function() {
                    cropper.destroy();
                    cropper = null;
                });
                $('#crop_and_upload').click(function() {
                    canvas = cropper.getCroppedCanvas({

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
                            $("#panDoc").val(base64data);

                            $modal.modal('hide');
                        };

                    });
                });
            });
        }

        function addharFrontDocEdit() {
            $(document).ready(function() {

                var $modal = $('#adharfrontedit');
                var crop_image = document.getElementById('adhar_front_edit');
                var cropper;
                $('#addharFrontDocEdits').change(function(event) {
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
                $('#adhar_fron_edi').click(function() {
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
                            $("#addharFrontDoc").val(base64data);

                            $modal.modal('hide');
                        };

                    });
                });
            });
        }

        function addharBackDocEdit() {
            $(document).ready(function() {

                var $modal = $('#modal_crops_adhar_back_edit');
                var crop_image = document.getElementById('adharfornt_edit');
                var cropper;
                $('#addharBackDocEdits').change(function(event) {
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
                $('#crop_and_upload_adhar_back_edit').click(function() {
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
                            $("#addharBackDoc").val(base64data);

                            $modal.modal('hide');
                        };

                    });
                });
            });
        }

        function accountProvedDocedit() {
            $(document).ready(function() {

                var $modal = $('#modal_crops_passbook_edit');
                var crop_image = document.getElementById('passbookse_edit');
                var cropper;
                $('#accountProvedDocEdits').change(function(event) {
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
                $('#crop_and_upload_passbooks').click(function() {
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
                            $("#accountProvedDoc").val(base64data);

                            $modal.modal('hide');
                        };

                    });
                });
            });
        }

        function signatureEdit() {
            $(document).ready(function() {

                var $modal = $('#modal_crops_siggedit');
                var crop_image = document.getElementById('signature_imag');
                var cropper;
                $('#signatureEdits').change(function(event) {
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
                $('#crop_and_upload_sigs').click(function() {
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
                            $("#signature").val(base64data);

                            $modal.modal('hide');
                        };

                    });
                });
            });
        }

        function picEdit() {
            $(document).ready(function() {

                var $modal = $('#modal_crops_pic_edit');
                var crop_image = document.getElementById('customarse');
                var cropper;
                $('#picedits').change(function(event) {
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
                $('#crop_and_upload_pics').click(function() {
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
                            $("#pic").val(base64data);

                            $modal.modal('hide');
                        };

                    });
                });
            });
        }

        function paymentListEdit() {
            $(document).ready(function() {

                var $modal = $('#modal_crop_payment');
                var crop_image = document.getElementById('sample_image_sss');
                var cropper;
                $('#transRefDoc').change(function(event) {
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
                $('#payment_list').click(function() {
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
                            $("#transRefDocs").val(base64data);

                            $modal.modal('hide');
                        };

                    });
                });
            });
        }
        //end edit crop

        // excel sheet download 
        $(document).ready(function() {
            $(".saveAsExcel-bdo").click(function() {
                var workbook = XLSX.utils.book_new();

                //var worksheet_data  =  [['hello','world']];
                //var worksheet = XLSX.utils.aoa_to_sheet(worksheet_data);

                var worksheet_data = document.getElementById("mytable");
                var worksheet = XLSX.utils.table_to_sheet(worksheet_data);

                workbook.SheetNames.push("Test");
                workbook.Sheets["Test"] = worksheet;

                exportExcelFile(workbook);


            });
        })

        function exportExcelFile(workbook) {
            return XLSX.writeFile(workbook, "apojontrust-bdo-list.xlsx");
        }


        //end excel sheet download
        
        // user Admin download 
        // $(document).ready(function() {
        //     $(".saveAsExcel").click(function() {
        //         var workbook = XLSX.utils.book_new();

        //         //var worksheet_data  =  [['hello','world']];
        //         //var worksheet = XLSX.utils.aoa_to_sheet(worksheet_data);

        //         var worksheet_data = document.getElementById("mytable");
        //         console.log(worksheet_data);
        //         var worksheet = XLSX.utils.table_to_sheet(worksheet_data, {raw:true});

        //         workbook.SheetNames.push("Test");
        //         workbook.Sheets["Test"] = worksheet;

        //         exportExcelFile_user(workbook);


        //     }); 
        // });
        $(document).ready(function() {
       

            // Button click event to download Excel file
            $('.saveAsExcel').click(function() {
                // Get all data from the DataTable
                // Get the HTML table element
                var table = document.getElementById('mytable');

                // Convert HTML table to a SheetJS workbook
                var workbook = XLSX.utils.table_to_book(table, {sheet: "Sheet1"});


                // Export the workbook to Excel file
                exportExcelFile_user(workbook);
                //XLSX.writeFile(wb, "DataTable_Data.xlsx");
            });
        });
       

        function exportExcelFile_user(workbook) {
            return XLSX.writeFile(workbook, "apojontrust-user-list.xlsx");
        }


        //end excel sheet download

        //pdf download 

        var doc = new jsPDF();
        var specialElementHandlers = {
            '#editor': function(element, renderer) {
                return true;
            }
        };

        $('#cmd').click(function() {
            doc.fromHTML($('#content').html(), 15, 15, {
                'width': 170,
                'elementHandlers': specialElementHandlers
            });
            doc.save('sample-file.pdf');
        });

        //end pdf download




        // $("#studtable").table2excel({
        //     filename: "excel_sheet-name.xls"
        // });

        // end test crop
       
    </script>

    <script>
        var base_url = "<?php echo base_url('/'); ?>"

        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });
            $('#checkoutModalFormSubmitCashBtn').on('click',()=>{
                $('#formCashbackPayout').rules( "transactionId", {
                    required: true,
                  
                    messages: {
                        required: "Required input",
                        minlength: jQuery.validator.format("Transaction id is required")
                    }
                });
                if($("#formCashbackPayout").valid()){
                    if(window.confirm("Are you sure?")){
                    console.log($('#formCashbackPayout').serialize())
                    $.ajax({
                        url :baseUrl+ 'cashback/payoutSubmit',
                        data : $('#formCashbackPayout').serialize() ,
                        method: 'POST',
                        success: (data)=>{
                            console.log(data);
                            const response = JSON.parse(data);
                            alert(response?.message)
                                $("#formCashbackPayout")[0].reset();
                                $('#payoutModal').modal('hide')
                            if(response?.status){
                                window.location.reload();
                            }
                        
                        },
                        error: (err)=>{
                            console.log(err)
                            $("#formCashbackPayout")[0].reset();
                            $('#payoutModal').modal('hide');
                        }
                    })
                    }
                }
            });
            $('#checkoutModalFormSubmitBtn').on('click',()=>{
                
                $('#formPayout').rules( "transactionId", {
                    required: true,
                  
                    messages: {
                        required: "Required input",
                        minlength: jQuery.validator.format("Transaction id is required")
                    }
                });
               
                if($("#formPayout").valid()){
                    if(window.confirm("Are you sure?")){
                    console.log($('#formPayout').serialize())
                    $.ajax({
                        url :baseUrl+ 'commission/payoutSubmit',
                        data : $('#formPayout').serialize() ,
                        method: 'POST',
                        success: (data)=>{
                            console.log(data);
                            const response = JSON.parse(data);
                            alert(response?.message)
                                $("#formPayout")[0].reset();
                                $('#payoutModal').modal('hide')
                            if(response?.status){
                                window.location.reload();
                            }
                        
                        },
                        error: (err)=>{
                            console.log(err)
                            $("#formPayout")[0].reset();
                            $('#payoutModal').modal('hide');
                        }
                    })
                    }
                }
            });
            $('#checkoutModalFormSubmitBtn1').on('click',()=>{
                
                $('#formEditPayout').rules( "transactionId", {
                    required: true,
                  
                    messages: {
                        required: "Required input",
                        minlength: jQuery.validator.format("Transaction id is required")
                    }
                });
               
                if($("#formEditPayout").valid()){
                    if(window.confirm("Are you sure?")){
                    console.log($('#formEditPayout').serialize())
                    $.ajax({
                        url :baseUrl+ 'commission/payoutEditSubmit',
                        data : $('#formEditPayout').serialize() ,
                        method: 'POST',
                        success: (data)=>{
                            console.log(data);
                            const response = JSON.parse(data);
                            alert(response?.message)
                                $("#formEditPayout")[0].reset();
                                $('#payoutEditModal').modal('hide');
                            if(response?.status){
                                window.location.reload();
                            }
                        
                        },
                        error: (err)=>{
                            console.log(err)
                            $("#formEditPayout")[0].reset();
                            $('#payoutEditModal').modal('hide');
                        }
                    })
                    }
                }
            })
            $('#checkoutModalFormSubmitBtn2').on('click',()=>{
                
                $('#formTotalPayout').rules( "transactionId", {
                    required: true,
                  
                    messages: {
                        required: "Required input",
                        minlength: jQuery.validator.format("Transaction id is required")
                    }
                });
               
                if($("#formTotalPayout").valid()){
                    if(window.confirm("Are you sure?")){
                    console.log($('#formTotalPayout').serialize())
                    $.ajax({
                        url :baseUrl+ 'commission/totalPayment',
                        data : $('#formTotalPayout').serialize() ,
                        method: 'POST',
                        success: (data)=>{
                            console.log(data);
                            const response = JSON.parse(data);
                            alert(response?.message)
                                $("#formTotalPayout")[0].reset();
                                $('#payoutEditModal').modal('hide');
                            if(response?.status){
                                window.location.reload();
                            }
                        
                        },
                        error: (err)=>{
                            console.log(err)
                            $("#formTotalPayout")[0].reset();
                            $('#payoutEditModal').modal('hide');
                        }
                    })
                    }
                }
            })
            
        })

        function payOutPaymentClick (id,date){
           
            $('#payoutModal #userID').val(id);
            $('#payoutModal #date').val(date);
            $('#payoutModal').modal('show');
        }
        function editPaymentClick(id,transaction){
           
           $('#payoutEditModal #transId').val(id);
         
           $('#payoutEditModal #exampleInputPassword2').val(transaction);
           $('#payoutEditModal').modal('show');
       }
       function totalPaymentClick(id,amount){
        $('#totalPayoutModal #tuserId').val(id);
        $('#totalPayoutModal #amount').val(amount);
        $('#totalPayoutModal').show();
       }
        function cashbackpayOutPaymentClick (uid, id,date){
        
            $('#payoutModal #userID').val(uid);
            $('#payoutModal #date').val(date);
            $('#payoutModal #paymentID').val(id);
            $('#payoutModal').modal('show');
        }
        function payoutModalClose(){
            $("#formPayout")[0].reset();
            $('#payoutModal').modal('hide');
        }
        function payoutEditModalClose(){
            $("#formEditPayout")[0].reset();
            $('#payoutEditModal').modal('hide');
        }
        function totalPayoutModalClose(){
            
            $("#formTotalPayout")[0].reset();
            $('#totalPayoutModal').hide();
        }
        $(document).ready(function() {
            $('#mydatatable').DataTable({
                "dom": 'Btp',
                "bPaginate" : $('#mydatatable tbody tr').length>10,
                "order": [], // Disable initial sorting if needed
                "columnDefs": [{
                    "targets": 0,  // Target the first column (Serial Number column)
                    "orderable": false // Make it non-sortable
                }],
                "createdRow": function(row, data, dataIndex) {
                    // Add serial number to the first column
                    $('td', row).eq(0).html(dataIndex + 1); // dataIndex gives the row index
                }
            });
        });
        
    </script>
    <script>
        $(document).ready(function() {
           
  // Initialize DataTable
    var table = $('#trasactionTable').DataTable();

    // Date filtering logic
   

    // Custom filtering logic for DataTable
    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
        var startDate = $('#start-date').val();
        var endDate = $('#end-date').val();
        var dateColumn = data[0]; // Assuming the date is in the first column (index 0)

        // Convert the date column and input dates into Date objects for comparison
        var date = new Date(dateColumn);
        var start = startDate ? new Date(startDate) : null;
        var end = endDate ? new Date(endDate) : null;

        // Check if the row should be included based on the date range
        if (
        (start && date < start) || 
        (end && date > end)
        ) {
        return false; // Exclude the row if it doesn't match the filter
        }

        return true; // Include the row if it matches the filter
    });
});
function incrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal)) {
    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

function decrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal) && currentVal > 0) {
    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

$('.input-group').on('click', '.button-plus', function(e) {
  incrementValue(e);
  var fieldId = $(e.target).data('id');
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
  $.ajax({
            url :baseUrl+ 'shopping/updatecart',
            data:{cart_id : fieldId, quantity: currentVal},
            method: 'POST',
            success: function (response) {
              //  console.log(data);
              //  const response = JSON.parse(data);
                
                
                window.location.reload();
               
            
            },
            
        });
  
});

$('.input-group').on('click', '.button-minus', function(e) {
  decrementValue(e);
  var fieldId = $(e.target).data('id');
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
  $.ajax({
            url :baseUrl+ 'shopping/updatecart',
            data:{cart_id : fieldId, quantity: currentVal},
            method: 'POST',
            success: function (response) {
              //  console.log(data);
              //  const response = JSON.parse(data);
                
                
                window.location.reload();
               
            
            },
            
        });
});

    </script>
    <script>
        <?php
        $errorMessage = $this->session->flashdata('error');
        $ferrorMessage = $this->session->flashdata('ferror');
        $successMessage = $this->session->flashdata('success');
        $successMessageF = $this->session->flashdata('flassuccess');

        if ($errorMessage && $errorMessage !== "") { ?>
            swal('Sorry!', '<?php echo $errorMessage.' Please contact your nearest office.'; ?>', 'error');
        <?php }
   
        if ($successMessage && $successMessage !== "") { ?>
            swal('success!', '<?php echo $successMessage; ?>', 'success');
        <?php }  
        if ($successMessageF && $successMessageF !== "") { ?>
              $('.msg_box').modal('show');
    <?php } ?>
    </script>

    <script>
        (function($, undefined) {

            $.widget("ui.combobox", {

                version: "@VERSION",

                widgetEventPrefix: "combobox",

                uiCombo: null,
                uiInput: null,
                _wasOpen: false,

                _create: function() {

                    var self = this,
                        select = this.element.hide(),
                        input, wrapper;

                    input = this.uiInput =
                        $("<input />")
                        .insertAfter(select)
                        .addClass("ui-widget ui-widget-content ui-corner-left ui-combobox-input")
                        .val(select.children(':selected').text())
                        .attr('tabindex', select.attr('tabindex'))
                        .width($(this.element).width());

                    wrapper = this.uiCombo =
                        input.wrap('<span>')
                        .parent()
                        .addClass('ui-combobox')
                        .insertAfter(select);

                    input
                        .autocomplete({

                            delay: 0,
                            minLength: 0,
                            autoFocus: true,


                            appendTo: wrapper,
                            source: $.proxy(this, "_linkSelectList"),
                            select: function(event, ui) {
                                //var selectedObj = ui.item;              
                                $(this).attr('title', ui.item.value);
                            }
                        });

                    $("<button>")
                        .attr("tabIndex", -1)
                        .attr("type", "button")
                        .insertAfter(input)
                        .button({
                            icons: {
                                primary: "ui-icon-triangle-1-s"
                            },
                            text: false
                        })
                        .removeClass("ui-corner-all")
                        .addClass("ui-corner-right ui-button-icon ui-combobox-button");


                    // Our items have HTML tags.  The default rendering uses text()
                    // to set the content of the <a> tag.  We need html().
                    input.data("ui-autocomplete")._renderItem = function(ul, item) {

                        return $("<li>")
                            .attr('class', item.option.className)
                            .append($("<a>").html(item.label))
                            .appendTo(ul);

                    };

                    this._on(this._events);

                },


                _linkSelectList: function(request, response) {

                    var matcher = new RegExp($.ui.autocomplete.escapeRegex(request.term), 'i');
                    //response( this.element.children('option').map(function() {
                    response(this.element.children('option:not([style*="display: none"])').map(function() {
                        var text = $(this).text();

                        if (this.value && (!request.term || matcher.test(text))) {
                            var optionData = {
                                label: text,
                                value: text,
                                option: this
                            };
                            if (request.term) {
                                optionData.label = text.replace(
                                    new RegExp(
                                        "(?![^&;]+;)(?!<[^<>]*)(" +
                                        $.ui.autocomplete.escapeRegex(request.term) +
                                        ")(?![^<>]*>)(?![^&;]+;)", "gi"),
                                    "<strong>$1</strong>");
                            }
                            return optionData;
                        }
                    }));
                },

                _events: {

                    "autocompletechange input": function(event, ui) {

                        var $el = $(event.currentTarget);
                        var changedOption = ui.item ? ui.item.option : null;
                        if (!ui.item) {

                            var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex($el.val()) + "$", "i"),
                                valid = false,
                                matchContains = null,
                                iContains = 0,
                                iSelectCtr = -1,
                                iSelected = -1,
                                optContains = null;
                            if (this.options.autofillsinglematch) {
                                matchContains = new RegExp($.ui.autocomplete.escapeRegex($el.val()), "i");
                            }


                            this.element.children("option").each(function() {
                                var t = $(this).text();
                                if (t.match(matcher)) {
                                    this.selected = valid = true;
                                    return false;
                                }
                                if (matchContains) {
                                    // look for items containing the value
                                    iSelectCtr++;
                                    if (t.match(matchContains)) {
                                        iContains++;
                                        optContains = $(this);
                                        iSelected = iSelectCtr;
                                    }
                                }
                            });

                            if (!valid) {
                                // autofill option:  if there is just one match, then select the matched option
                                if (iContains == 1) {
                                    changedOption = optContains[0];
                                    changedOption.selected = true;
                                    var t2 = optContains.text();
                                    $el.val(t2);
                                    $el.data('ui-autocomplete').term = t2;
                                    this.element.prop('selectedIndex', iSelected);
                                    console.log("Found single match with '" + t2 + "'");
                                } else {
                                    $("#asce").append(
                                        `
                        <div class="container p-4">
    <div class="card p-3">
        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1>Add PinCode</h1>
                </div>
            </div>
            <form method="post" action="<?php echo base_url('admin/addpincode') ?>" enctype="multipart/form-data">
                <div class="row">
                        <div class=" col-md-3 mb-3">
                            <label class="d-block h-50">State <span style="color:#C00">*</span></label>
                            <input type="text" class="form-control" name="state" placeholder="State" required="">
                        </div>
     
                    <div class="col-md-3 mb-3">
                        <label class="d-block h-50">District</label>
                        <input type="text" name="district" class="form-control col-xs-8" placeholder="District" required="">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="d-block h-50">pincode</label>
                        <input type="number" name="pincode" class="form-control col-xs-8" placeholder="Pincode" required="">
                    </div>
                    <div class="col-md-3 mb-3">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                    </div>
                    
            </form>
        </main>
    </div>
</div>
                        `
                                    )

                                    // remove invalid value, as it didn't match anything
                                    $el.val('');

                                    // Internally, term must change before another search is performed
                                    // if the same search is performed again, the menu won't be shown
                                    // because the value didn't actually change via a keyboard event
                                    $el.data('ui-autocomplete').term = '';

                                    this.element.prop('selectedIndex', -1);
                                }
                            }
                        }

                        this._trigger("change", event, {
                            item: changedOption
                        });

                    },

                    "autocompleteselect input": function(event, ui) {

                        ui.item.option.selected = true;
                        this._trigger("select", event, {
                            item: ui.item.option
                        });

                    },

                    "autocompleteopen input": function(event, ui) {

                        this.uiCombo.children('.ui-autocomplete')
                            .outerWidth(this.uiCombo.outerWidth(true));
                    },

                    "mousedown .ui-combobox-button": function(event) {
                        this._wasOpen = this.uiInput.autocomplete("widget").is(":visible");
                    },

                    "click .ui-combobox-button": function(event) {

                        this.uiInput.focus();

                        // close if already visible
                        if (this._wasOpen)
                            return;

                        // pass empty string as value to search for, displaying all results
                        this.uiInput.autocomplete("search", "");

                    },

                    "click input": function(event) {
                        this.uiInput.focus().val('');

                        // pass empty string as value to search for, displaying all results
                        this.uiInput.autocomplete("search", "");

                    }

                },

                value: function(newVal) {
                    var select = this.element,
                        valid = false,
                        selected;

                    if (!arguments.length) {
                        selected = select.children(":selected");
                        console.log("null")
                        return selected.length > 0 ? selected.val() : null;
                    }

                    select.prop('selectedIndex', -1);
                    select.children('option').each(function() {
                        if (this.value == newVal) {
                            this.selected = valid = true;
                            return false;
                        }
                    });

                    if (valid) {
                        this.uiInput.val(select.children(':selected').text());
                        this.uiInput.attr('title', select.children(':selected').text())
                    } else {
                        console.log("null")
                        this.uiInput.val("");
                        this.element.prop('selectedIndex', -1);
                    }

                },

                _destroy: function() {
                    this.element.show();
                    this.uiCombo.replaceWith(this.element);
                },

                widget: function() {
                    return this.uiCombo;
                },

                _getCreateEventData: function() {

                    return {
                        select: this.element,
                        combo: this.uiCombo,
                        input: this.uiInput
                    };
                }

            });


        }(jQuery));

        $(function() {
            $("#sitescreen").combobox();
            $("#toggle").click(function() {
                $("#sitescreen").toggle();
            });
        });
        function getvalue(data){
           
            $.ajax({
                url: base_url+"admin/input_autofill/"+data,
                method:"POST",
                data: { data : data },
                success:function(response){
                    
                   
                    var url = base_url + 'admin/customer_add';
                    if(response === '' || response === null || response === undefined){
                        var my_html = '<a href="'+url+'">Add New</a>';
                       
                        $('.emptydata').html(my_html);
                    } else { 
                        var result = JSON.parse(response);
                        let name = result.firstName + ' ' + result.lastName;
                        $('#input_name').val(name).attr('readonly', true);
                        $('#input_email').val(result.email).attr('readonly', true);
                        $('#input_phone').val(result.phone).attr('readonly', true);
                        $('[name=customer_id]').val(result.id);
                    }
                    
                   
                    
                    // $.each(result, function (i, item) {
                    //     console.log(i);
                    //     console.log(item); 
                    //     //$('#myTable tbody').append('<tr><td>' + item.Firstname + '</td><td>' + item.Lastname + '</td></tr>');
                    // });
                   // $('.list-search-user-chat').html(response);
                    //$('#user_details').html(data);
                }
            });
        }
        $(document).ready(function() {
            $(document).on('keydown', '#input_pancard_number', function(e){
                
            //$('.search-input').keypress(function (e) {
                var key = e.which;
                if(key == 13)  // the enter key code
                {
                    var value = $('#input_pancard_number').val();
                   // console.log(value); debugger;
                    getvalue(value);
                }
            });
            $(document).on('click', '.form-submit', function(e){
                $('.service-form').submit();
            });
            
        });
        
    </script>
    <script>
 $(document).ready(function(){
    $('#introducerfund').show();
    $('#introducerfundbtn').addClass('active');
    $('#introducerfundbtn').on('click',function(){
        $('#introducerfund').show();
        $('#customerfund').hide();
        $('#customerfundbtn').removeClass('active');
    });
    $('#customerfundbtn').on('click',function(){
        $('#introducerfundbtn').removeClass('active');
        $('#customerfundbtn').addClass('active');
        $('#introducerfund').hide();
        $('#customerfund').show();
    });
    $("#backLink").click(function(event) {
        event.preventDefault();
        history.back(1);
    });     
 });
 
</script>
<script>
        // Initialize selected values array
        let selectedValues = [];

        // Function to initialize select2 and handle filtering
        function initializeSelect2() {
            $('.testName').select2({
                placeholder: "Select an item",
                allowClear: true,
               // tags: true
            });
            

            // Initially filter the options based on selected values
           
        }
        function initializeSelect() {
            $('.testType').select2({
                placeholder: "Select an item",
                allowClear: true,
                tags: true
            });
        }
       

        
       
        // Initialize select2 on page load
        $(document).ready(function () {
            initializeSelect2();
            initializeSelect();
            $(document).on('select2:select', '.testName', function (e) {
                var newOption = e.params.data.text; // Get the selected or entered text
                debugger;
                // Check if it's a new option
                if (newOption && e.params.data.id === undefined) {
                    $.ajax({
                        url: 'diagonostic/add_option',  // Call the method to add new option
                        method: 'POST',
                        data: { new_option: newOption },
                        success: function(response) {
                            if (response.status === 'success') {
                                alert('New option added successfully!');
                                // Optionally, you can reload the options here
                            }
                        }
                    });
                }
                setTimeout(() => {
                    var select2 = $(this).data('select2');
                    select2.close();
                }, 0); // Delay execution to prevent infinite loop
            });
            var gstinPattern = /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/;
            
            $('#gstin_number').on('input', function() {
                var gstin = $("#gstin_number").val().toUpperCase();
                if (gstin.length == 15) {
                    if (gstinPattern.test(gstin)) {
                        $("#gerrors").html("");
                        $("#gsuc").html("GSTIN Number Match");
                    } else {
                        $("#gsuc").html("");
                        $("#gerrors").html("Invalid GSTIN Number");
                    }
                } else {
                    $("#gsuc").html("");
                    $("#gerrors").html("Invalid GSTIN Number");
                }
           });
        });
    </script>
<script>
$(document).ready(function() {
  // Initialize the DataTable
  //var table = $('#healthcard_transaction').DataTable();
  var table = new DataTable('#healthcard_transaction',{
        bPaginate : $('#healthcard_transaction tbody tr').length>10,
        //iDisplayLength: 10,
        dom: 'Btp',
        pageLength: 10,             // Default number of records per page
        lengthMenu: [10, 20, 30, 40],
        "columnDefs": [{
            "targets": 0,  // Target the first column (Serial Number column)
            "orderable": false // Make it non-sortable
        }],
        "createdRow": function(row, data, dataIndex) {
            // Add serial number to the first column
            $('td', row).eq(0).html(dataIndex + 1); // dataIndex gives the row index
        },
        buttons: [
          {
            extend: 'excelHtml5',  // Excel export
            text: 'Export to Excel', // Button text
            title: 'Exported Data', // Title for the Excel file
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6]  // Specify columns to export (optional)
            }
          }
        ]
    });
    $('#nameSearch').on('change', function() {
        table.column(2).search(this.value).draw(); // Column 0 is the 'Name' column
        $('#backbtn').show();
    });
    // $('#startDate').datepicker({
    //     format: 'dd-mm-yyyy',
    //     autoclose: true
    // });
    // $('#endDate').datepicker({
    //     format: 'dd-mm-yyyy',
    //     autoclose: true
    // });
    $('#startDate, #endDate').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD-MM-YYYY', // Set format to dd-mm-yyyy
        },
        autoApply: true,  // Automatically apply the selection
        autoUpdateInput: true,
        opens: 'right'
    }).val('');
    function clearTime(date) {
        // Set hours, minutes, seconds, and milliseconds to zero for comparison
        date.setHours(0, 0, 0, 0);
        return date;
      }
    $('#search_transactionbtn').on('click', function() {
    debugger;
    // Get start and end date values
    
    var startDate = $('#startDate').val();
    var endDate = $('#endDate').val();
    if(!startDate || !endDate){
        return;
    }
    let sDate = startDate.slice(3,5)+ '-' + startDate.slice(0,2) + '-' + startDate.slice(6,10);
    let eDate = endDate.slice(3,5)+ '-' + endDate.slice(0,2) + '-' + endDate.slice(6,10);
    // Convert date string to Date object for comparison
    var minDate = new Date(sDate);
    var maxDate = new Date(eDate);
      // Remove time portion for comparison
    // minDate = clearTime(minDate);
    // maxDate = clearTime(maxDate);
    // Filter the DataTable based on date range
    table.rows().every(function() {
      var data = this.data(); // Get row data
      var rowDate = new Date(data[0].slice(3,5)+ '-' + data[0].slice(0,2) + '-' + data[0].slice(6,10)); // The date column index (5th column, zero-indexed)
    //   rowDate = clearTime(rowDate);
      // Check if row date is within the selected range
      if ((isNaN(minDate) || rowDate >= minDate) && (isNaN(maxDate) || rowDate <= maxDate)) {
          $(this.node()).show(); // Show the row
        } else {
            $(this.node()).hide(); // Hide the row
        }
    });

    // Redraw the table to apply changes
    table.draw();
    //$('#backbtn').show();
  });
  $('.saveAstransactionExcel').click(function() {
                // Get all data from the DataTable
                // Get the HTML table element
                var table = document.getElementById('healthcard_transaction');

                // Convert HTML table to a SheetJS workbook
                var workbook = XLSX.utils.table_to_book(table, {sheet: "Sheet1"});


                // Export the workbook to Excel file
                exportExcelFile_user(workbook);
                //XLSX.writeFile(wb, "DataTable_Data.xlsx");
            });
    
   
});
</script>
<script>
$(document).ready(function(){
  $('.online-shop').owlCarousel({
loop:true,
margin:10,
nav:false,
autoplay:true,

responsive:{
    0:{
        items:1
    },
    600:{
        items:3
    },
    1000:{
        items:5
    }
}
})
});
$(document).ready(function() {
       $('[name=notice_for]').on('change',function(){
        let notice = $(this).val();
        $('.hide-section').hide();
            if(notice == 'specific person'){
                $('.hide-section').show();
            }
            
        
       });
       $(document).on('change','.shop_name', function (e) {
                debugger;
                // Handle the selection change here
                var selectedData = $(this).val(); // Get the selected data object
                //console.log('Selected item: ', selectedData);
                $.ajax({
                    url: base_url + "shopping/getregid",
                    type: "POST",
                    data:{data : selectedData},
                    success: function (response) {
                        let sponser = JSON.parse(response);
                       
                        $('#shop_regid').val(sponser[0].regId);
                        $('#shop_id').val(sponser[0].id);
                    }
                });
            });          
        });
</script>
<style>
    .brand-link{
        text-align:center;
    }
    .brand-link img{
        width: 100px !important;
        height: 100px;
        box-shadow:none !important;
    }
    .d-none{
        display:none;
    }
    #state,#typePasswordXz{
        text-transform: uppercase;
    }
    .image-container, .image-container1, .image-container2 {
    margin-bottom: 15px;
}
.form-control{
    text-transform: uppercase;
}
.image-preview1, .image-preview, .image-preview2 {
    max-width: 50px;
    max-height: 30px;
    display: block;
    margin-top: 10px;
}

.image-link, .image-link1 , .image-link2 {
    display: inline-block;
    position: absolute;
    right: 12px;
    bottom: 3px;
}
.table,.select2-container{
    text-transform: uppercase;
}
.dropdown-header span#email{
    width: 75%;
    display: inline-block;
    text-overflow: ellipsis;
    margin-right: 1%;
    overflow: hidden;
    vertical-align: text-bottom;
}
.pagination strong, .dataTables_paginate .paginate_button.current{
    color: #007bff !important;
    background: #fff  !important;
    padding: 5px 10px;
    border: 1px solid #007bff;
}
.pagination a, .dt-paging-button,.paginate_button{
    background: #007bff !important;
    border: 1px solid #007bff !important;
    color: #fff !important;
    padding: 5px !important;
    cursor: pointer;
    font-weight: bold;
    margin-right: 4px;
    border-radius: 5px;
}
.pagination b{
    margin-right: 4px;
    border-radius: 5px;
    border: 1px solid #007bff !important;
    padding: 5px !important;
}
.pagination{
    width:250px;
    margin: 0 auto;
}
.table td, .table th{
    padding: .5rem;
}

.btn-custom{
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    box-shadow: none;
    border-radius: 9px;
}
.btn-custom svg{
    fill: white;
}
div.dt-container div.dt-layout-row div.dt-layout-cell.dt-layout-end{
    width:100%;
}
.dataTables_paginate{
    margin:10px auto;
    text-align:center;
}
.nav-sidebar .nav-link p{
    font-size:.9rem;
}
.sidebar-mini .main-sidebar .nav-link, .sidebar-mini-md .main-sidebar .nav-link, .sidebar-mini-xs .main-sidebar .nav-link{
    width: calc(260px - .5rem* 2);
}
.main-sidebar{
    background-color: #53568b !important;
}
.sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
    background-color: #464675 !important;
    color: #fff !important;
}
.sidebar .nav-link p,.sidebar .nav-link .nav-icon{
    color: #fff !important;
}
.nav-sidebar .menu-open>.nav-treeview{
    background: #464675 !important;
}
.info-box-icon svg{
    height: 30px;
}
.select2-container .select2-selection--single{
    height: 40px;
}
.owl-carousel .owl-item img {
    height: 200px;
}
.card-title{
    font-size: .9rem;
    font-weight: bold;
}
@supports not (-webkit-touch-callout:none) {
    .layout-fixed .wrapper .sidebar {
        height: calc(100vh - 9rem);
    }
}
</style>
</body>

</html>