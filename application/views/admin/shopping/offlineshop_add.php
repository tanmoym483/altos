<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">

                                <h2>Shop Add Form</h2>
                                <form action="<?php echo base_url("shopping/postaddOfflineShop") ?>" class="validation-form-message" method="POST" enctype="multipart/form-data">


                                    <div class="row">
                                       
                                    <div class="form-outline mb-4 col-sm-3">
                                        <label class="text-left">Owner First Name <span class="text-danger">*</span></label>
                                        <input type="text"  class="form-control" placeholder="First Name" name="firstName"   required="" />
                                       
                                    </div>

                                    <div class="form-outline mb-4 col-sm-3">
                                        <label class="text-left">Owner Middle Name <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" placeholder="Middle Name" name="middleName"   />
                                        
                                    </div>
                                    <div class="form-outline mb-4 col-sm-3">
                                        <label class="text-left">Owner Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Last Name" name="lastName"  required="" />
                                       
                                    </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Mobile <span style="color:#C00">*</span></label>
                                            <input type="number" class="form-control" name="phone" placeholder="Mobile" id="mobile" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Email ID <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email ID" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Shop Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="center_name" id="center_name" placeholder="Shop name" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Shop Category <span style="color:#C00">*</span></label>
                                            <select class="form-control testType" required name="shop_category">
                                                <option value="">Select</option>
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
                                        <div class="col-md-3 mb-3">
                                            <label>Business Category <span style="color:#C00">*</span></label>
                                            <select class="form-control testType" required name="business_category">
                                                <option value="">Select</option>
                                                <option value="Indivitual">Indivitual</option>
                                                <option value="Partnership">Partnership</option>
                                                <option value="Proprietorship">Proprietorship</option>
                                                <option value="PVT Ltd">PVT Ltd</option>
                                                <option value="Trust">Trust</option>
                                                <option value="NGO">NGO</option>
                                                <option value="Ltd">Ltd</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Category Document Upload <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link image-gallery-box" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="document" class="form-control accountProvedDoc"   required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>GSTIN Number </label>
                                            <input type="text" class="form-control" name="gstin_number" id="gstin_number" placeholder="GSTIN Number" onchange="this.value = this.value.toUpperCase()">
                                            <div id="gerrors" style="color:red"></div>
                                            <div id="gsuc" style="color:#32a86d"></div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>CIN / Certificate Number </label>
                                            <input type="text" class="form-control" name="cin_number" id="cin_number" placeholder="CIN Number" >
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>PANCARD Number <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control PAN" name="pancard_number" placeholder="(ABCD1234P)" id="txtPANNumber" oninput="sdnsdjn()" onchange="this.value = this.value.toUpperCase()" maxlength="10" required="">
                                            <div id="errors" style="color:red"></div>
                                            <div id="suc" style="color:#32a86d"></div>
                                        </div>
                                        <div class=" col-md-3 mb-3">
                                            <label>Introducer code <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="introducer_code" placeholder="Introducer code" id="sopnsercode" value="<?php echo $_SESSION['regId'] ?>" oninput="intrFunction()" required="">
                                        </div>

                                        <div id="match">

                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Sponsor / Introducer Name</label>
                                            <input type="text" class="form-control" name="sponsor" id="SponsorName" value="<?=$_SESSION['firstName'].' '.$_SESSION['lastName']?>" readonly="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Address<span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Address" required="">
                                        </div>
                                        
                                        <div class="col-md-3 mb-3">
                                            <label>City <span style="color:#C00">*</span></label>
                                            <input placeholder="City" type="text" name="city" value="" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>District <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="district" required>
                                                <option value="">Select District</option>
                                                <?php foreach($districtlist as $district){?>
                                                <option value="<?=$district?>"><?=$district?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>PIN Code <span style="color:#C00">*</span></label>
                                            <input name="postcode" placeholder="PIN Code" type="number" maxlength="10" id="typePasswordX" oninput="postcodeDynamic()" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>State <span style="color:#C00">*</span></label>
                                            <input placeholder="State" type="text" name="state" value="" id="state" class="form-control" required="" readonly>
                                        </div>
                                        <!-- <div class="col-md-2 mb-3">
                                            <label>Payout/Commision <span style="color:#C00">*</span></label>
                                            <input type="text" name="commision" class="form-control col-xs-8" placeholder="Payout/Commision" >
                                        </div>
                                        
                                        <div class="col-md-1 mb-3">
                                            <label>Units <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="units" >
                                                <option value="percentage">%</option>
                                                <option value="rupess">Rs.</option>
                                            </select>
                                        </div> -->
                                        <div class="col-md-12 mb-3">
                                            <label>Shop Image <span style="color:#C00">*</span></label>
                                            <div class="col-lg-12" id="gallery-image-add">
                                                 
                                            </div>
                                        
                                            <input type="button" value="Add" id="gallery-add" class="btn btn-primary my-3 ml-2 "/>
                                            <!-- <div class="preview-container" id="image-preview"></div>
                                            <input type="file" class="form-control" name="center_image[]" required id="image-upload" multiple accept="image/*"> -->
                                        </div>
                                        <div class="col-md-12">
                                            <h5 class="card-title">PAYOUT</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Payout Add <span style="color:#C00">*</span></label>
                                            <div class="col-lg-12" id="shop-commision-section-add">
                                               
                                            </div>
                                        
                                            <input type="button" value="Add" id="shop-commision-add" class="btn btn-primary my-3 ml-2 "/>
                                            <!-- <div class="preview-container" id="image-preview"></div>
                                            <input type="file" class="form-control" name="center_image[]" required id="image-upload" multiple accept="image/*"> -->
                                        </div>
                                        <div class="col-md-12">
                                            <h5 class="card-title">BANK DETAILS</h5>
                                            <hr>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>IFSC Code <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="ifscCode" placeholder="IFSC Code" required="" oninput="ifcscode()" id="ifcscodeId">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Bank Name <span style="color:#C00">*</span></label>
                                            <input type="text" class="form-control" name="bankName" placeholder="Bank Name" id="bankName" required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Branch <span style="color:#C00">*</span></label>
                                            <input type="text" name="branchName" id="branchName" class="form-control" placeholder="Branch" required="">
                                        </div>
                                        <br>

                                        <div class="col-md-4 mb-3">
                                            <label>A/C Type <span style="color:#C00">*</span></label>
                                            <select class="form-control" name="accountType">
                                                <option>Select</option>
                                                <option value="current">Current</option>
                                                <option value="savings">Savings </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>A/C Holder Name <span style="color:#C00">*</span></label>
                                            <input type="text" name="accountHolderName" class="form-control" id="accountHolderName" placeholder="A/C Holder Name" required="">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label>A/C Number <span style="color:#C00">*</span></label>
                                            <input type="text" name="accountNumber" class="form-control" placeholder="A/C Number" required="">
                                        </div>


                                        <div class="col-md-4 mb-3 image-container">
                                            <label>Passbook/Cancelled Cheque/Statement Upload (310px X 200px) <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="accountProvedDoc" class="form-control accountProvedDoc"   required="">
                                        </div>
                                        
                                        <div class="col-md-12 mb-6">
                                            <label><input type="checkbox" required value="yes" required name="Terms_and_condition">  I agree to the <a href="#" target="_blank"><span>Terms &amp; Conditions</span></a> <span style="color:#C00">*</span></label>
                                        </div>
                                        <br>
                                       
                                        <input type="hidden" name="parentId" value="<?=$_SESSION['userId']?>" id="parentId">
                                        <div class="col-md-12 mb-6">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add SHop</button>
                                        </div>

                                    </div>





                                </form>
                            </div>

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    <style>
        .preview-container {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .preview-container img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
        .image-gallery-box{
            top: 30px;
            bottom:auto !important;
        }
    </style>