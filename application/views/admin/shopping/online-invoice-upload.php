<div class="content-wrapper" style="min-height: 2080.26px;">
    <div id="errorMessage"></div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-4">
                        <section>
                            <div class="scooter-upload p-2">

                            <?php if ($this->session->flashdata('error') != '') { ?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('success') != '') { ?>
                                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                            <?php } ?>
                                <form action="<?php echo base_url('shopping/postaddonlineInvoice') ?>" method="POST"  class="repeater validation-form-message" enctype="multipart/form-data">


                                    <div class="row">
                                       
                                        
                                        <div class="col-md-3 mb-3">
                                            <label>Platform <span style="color:#C00">*</span></label>
                                            <select class="form-control testType" required name="platform">
                                                <option value="">select</option>
                                                <option value="Flipkart">Flipkart</option>
                                                <option value="Amazon">Amazon</option>
                                                <option value="Meesho">Meesho</option>
                                                <option value="Myntra">Myntra</option>
                                                <option value="Nykaa">Nykaa</option>
                                                <option value="Ajio">Ajio</option>
                                                <option value="Shopsy">Shopsy</option>
                                                <option value="m caffeine">M caffeine</option>
                                                <option value="The derma">The derma</option>
                                                <option value="mamaerth">mamaerth</option>
                                                <option value="buykaro">buykaro</option>
                                                <option value="wow skine science">wow skine science</option>
                                                <option value="firstcry">firstcry</option>
                                                <option value="Udemy">Udemy</option>
                                                <option value="x xy xx">x xy xx</option>
                                                <option value="goibibo">goibibo</option>
                                                <option value="croma">croma</option>
                                                <option value="Dell Technology">Dell Technology</option>
                                                <option value="Bigrock">Bigrock</option>
                                                <option value="lotus botanicals">lotus botanicals</option>
                                                <option value="KindLife">KindLife</option>
                                                <option value="shyaway">shyaway</option>
                                                <option value="minimalist">minimalist</option>
                                                <option value="durex">durex</option>
                                                <option value="true Element">true Element</option>
                                                <option value="hands up for tail">hands up for tail</option>
                                                <option value="daily objects">daily objects</option>
                                                <option value="muscletetech">muscletetech</option>
                                                <option value="noise">noise</option>
                                                <option value="xx life">xx life</option>
                                                <option value="zandu">zandu</option>
                                                <option value="in nature 4 nature">in nature 4 nature</option>
                                                <option value="body care">boald care</option>
                                                <option value="tae">tae</option>
                                                <option value="the sleep company">the sleep company</option>
                                                <option value="hyugalife">hyugalife</option>
                                                <option value="fitspire">fitspire</option>
                                                <option value="booking.com">booking.com</option>
                                                <option value="tiara">tiara</option>
                                                <option value="enamor">enamor</option>
                                                <option value="levis">levis</option>
                                                <option value="labs">labs</option>
                                                <option value="medibuddy">medibuddy</option>
                                                <option value="kesxroc">kesxroc</option>
                                                <option value="tata cliq">tata cliq</option>
                                                <option value="oneplus">oneplus</option>
                                                <option value="libas">libas</option>
                                                <option value="make my trip">make my trip</option>
                                                <option value="body cupid">body cupid</option>
                                                <option value="health hk art">health hk art</option>
                                                <option value="mb">mb</option>
                                                <option value="clava">clava</option>
                                                <option value="Bombay shaving company">Bombay shaving company</option>
                                                <option value="Godaddy">Godaddy</option>
                                                <option value="Taxbuddy">Taxbuddy</option>
                                                <option value="Pee safe">Pee safe</option>
                                                <option value="Blue tea">Blue tea</option>
                                                <option value="Hidesign">Hidesign</option>
                                                <option value="Shopclues">Shopclues</option>
                                                <option value="Hostinger">Hostinger</option>
                                                <option value="Accessorize">Accessorize</option>
                                                <option value="Krishival nuts">Krishival nuts</option>
                                                <option value="Sova.health">Sova.health</option>
                                                <option value="Hk vitals">Hk vitals</option>
                                                <option value="Infire">Infire</option>
                                                <option value="Vlcc">Vlcc</option>
                                                <option value="Ustraa">Ustraa</option>

                                                <option value="Natufe derma">Natufe derma</option>
                                                <option value="Giva">Giva</option>
                                                <option value="Dot & key skin care">Dot & key skin care</option>
                                                <option value="Puma">Puma</option>
                                                <option value="Ssbeauty">Ssbeauty</option>
                                                <option value="The man company">The man company</option>
                                                <option value="Timespirme">Timespirme</option>
                                                <option value="All">All</option>
                                                <option value="puer">puer</option>
                                                <option value="qater">qater</option>
                                                <option value="ryze">ryze</option>
                                                <option value="Hyphen">Hyphen</option>
                                                <option value="Smytten">Smytten</option>
                                                <option value="Blissclub">Blissclub</option>
                                                <option value="Koparo clean">Koparo clean</option>
                                                <option value="Vaaraa">Vaaraa</option>
                                                <option value="Avast">Avast</option>
                                                <option value="Samsung">Samsung</option>
                                                <option value="Po & BLOOM">Po & BLOOM</option>
                                                <option value="FOXTALE">FOXTALE</option>
                                                <option value="KAYAK">KAYAK</option>
                                                <option value="CLOVE DENTAL">CLOVE DENTAL</option>
                                                <option value="ACKO">ACKO</option>
                                                <option value="LETSSHAVE">LETSSHAVE</option>
                                                <option value="MPOKKET">MPOKKET</option>
                                                <option value="INDULEKHA">INDULEKHA</option>
                                                <option value="NANO CLEAN">NANO CLEAN</option>
                                                <option value="PEPPERFRY">PEPPERFRY</option>
                                                <option value="DOVE">DOVE</option>
                                                <option value="HAPPY CULTRES">HAPPY CULTRES</option>
                                                <option value="IGP">IGP</option>
                                                <option value="TRESEMME">TRESEMME</option>
                                                <option value="FNP">FNP</option>
                                                <option value="NBASTORE.IN">NBASTORE.IN</option>
                                                <option value="LENOVO">LENOVO</option>
                                                <option value="FOREST ESSENTALS">FOREST ESSENTALS</option>
                                                <option value="CANDERE KALYAN">CANDERE KALYAN</option>
                                                <option value="BOROSLE">BOROSLE</option>
                                                <option value="ACER">ACER</option>
                                                <option value="UPAKARMA">UPAKARMA</option>
                                                <option value="SETU">SETU</option>
                                                <option value="SAVANA BY URBANIC">SAVANA BY URBANIC</option>
                                                <option value="MYGLAMM">MYGLAMM</option>
                                                <option value="JUST HERBS">JUST HERBS</option>
                                                <option value="BEYOUNG">BEYOUNG</option>
                                                <option value="KIWI">KIWI</option>
                                                <option value="CLEARTRIP">CLEARTRIP</option>
                                                <option value="KURLON">KURLON</option>
                                                <option value="FIXDERMA">FIXDERMA</option>
                                                <option value="QSURVEOO">QSURVEOO</option>
                                                <option value="SPRINGFIT">SPRINGFIT</option>
                                                <option value="SALTY">SALTY</option>
                                                <option value="INDIGO">INDIGO</option>
                                                <option value="HAPPY EASYGO">HAPPY EASYGO</option>
                                                <option value="KAYA CLINIC">KAYA CLINIC</option>
                                                <option value="SLEEPWELL">SLEEPWELL</option>
                                                <option value="MY TRIDENT">MY TRIDENT</option>
                                                <option value="SOVLFLOWER">SOVLFLOWER</option>
                                                <option value="PHILIPS">PHILIPS</option>
                                                <option value="QUICK HEAL">QUICK HEAL</option>
                                                <option value="UNIQLO">UNIQLO</option>
                                                <option value="STRCK">STRCK</option>
                                                <option value="KLRO CLEAN BEAUTY">KLRO CLEAN BEAUTY</option>
                                                <option value="KAPIVA">KAPIVA</option>
                                                <option value="OCTA">OCTA</option>
                                                <option value="GOOGLE WORKSPACE">GOOGLE WORKSPACE</option>
                                                <option value="LG">LG</option>
                                                <option value="ceozur">ceozur</option>
                                                <option value="ARATA">ARATA</option>
                                                <option value="SALT ATTIRE">SALT ATTIRE</option>
                                                <option value="LENSKART">LENSKART</option>
                                                <option value="APNA">APNA</option>
                                                <option value="PLAM">PLAM</option>
                                                <option value="RENEE">RENEE</option>
                                                <option value="MY MUSE">MY MUSE</option>
                                                <option value="ASHPVEDA">ASHPVEDA</option>
                                                <option value="W">W</option>
                                                <option value="AVON">AVON</option>
                                                <option value="BOAT">BOAT</option>
                                                <option value="EXPEDIA">EXPEDIA</option>
                                                <option value="PINION BUREAU TM">PINION BUREAU TM</option>
                                                <option value="NUA">NUA</option>
                                                <option value="NETMEDS.COM">NETMEDS.COM</option>
                                                <option value="SNITCH">SNITCH</option>
                                                <option value="AJIOGRAM">AJIOGRAM</option>
                                                <option value="PORTRONICS">PORTRONICS</option>
                                                <option value="AIR INDIA">AIR INDIA</option>
                                                <option value="JBL">JBL</option>
                                                <option value="NUA">ORGANIC INDIA</option>
                                                <option value="PEPE GEANS LONDON">PEPE GEANS LONDON</option>
                                                <option value="PHARMEASY">PHARMEASY</option>
                                                <option value="BELL VITA ORGANIC NEW AGE AYURVEDA">BELL VITA ORGANIC NEW AGE AYURVEDA</option>
                                              

                                            </select>
                                        </div>
                                      
                                        <div class="col-md-3 mb-3">
                                            <label>Amount <span style="color:#C00">*</span></label>
                                            <input name="amount" placeholder="Amount" type="number" class="form-control" required="">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Order Date <span style="color:#C00">*</span></label>
                                            <input type="date" name="order_date" class="form-control" required="" >
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Invoice Id </label>
                                            <input name="invoice_id" placeholder="Invoice Id" type="text" class="form-control" >
                                        </div>
                                    
                                        <div class="col-md-3 mb-3 image-container">
                                            <label>Invoice Upload <span style="color:#C00">*</span></label>
                                            <a href="#" class="image-link" data-fancybox="gallery">
                                                            <img src="" alt="Image Preview" class="image-preview" style="display:none;">
                                                        </a>
                                            <!-- <input type="file" name="panDo" class="form-control col-xs-8 crop_image" id="upload_image" onClick="panCard()"> -->
                                            <input type="file" name="invoice" class="form-control " required >
                                            
                                        </div>
                                        
                                        <div class="col-md-12 mb-6">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
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


<!-- end image -->

