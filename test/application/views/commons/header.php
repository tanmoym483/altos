<header class="header-area header-sticky">
    <div class="container">
        <div class="">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="<?php echo site_url(''); ?>" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="<?php echo site_url(''); ?>" <?php if ($this->uri->segment(1) == "/" || $this->uri->segment(1) == "") {
                                                                                                echo 'class="active"';
                                                                                            } ?>>Home</a></li>
                        <li class="scroll-to-section"><a href="<?php echo site_url('aboutus'); ?>" <?php if ($this->uri->segment(1) == "aboutus") {
                                                                                                        echo 'class="active"';
                                                                                                    } ?>>About</a></li>
                        <li class="has-sub" <?php if ($this->uri->segment(1) == "services") {
                                                echo 'class="active"';
                                            } ?>>
                            <a href="javascript:void(0)">Services</a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo site_url('services/demat'); ?>">Demat Account</a></li>
                                <li><a href="<?php echo site_url('services/mutualfund'); ?>">Mutual Fund</a></li>
                                <!-- <li><a href="<?php echo site_url('services/demat'); ?>">Systematic Investment Plan (SIP)</a></li>
                                <li><a href="<?php echo site_url('services/demat'); ?>">Life insurance</a></li>
                                <li><a href="<?php echo site_url('services/demat'); ?>">General Insurance</a></li> -->
                            </ul>
                        </li>

                        <li><a href="<?php echo site_url('contactus'); ?>" <?php if ($this->uri->segment(1) == "contactus") {
                                                                                echo 'class="active"';
                                                                            } ?>>Contact Support</a></li>
                        <li><a target="_blank" href="https://angel-one.onelink.me/Wjgr/tpdq8364">Open Demat account</a></li>
                        <li class="has-sub login_heightlight" <?php if ($this->uri->segment(1) == "auth") {
                                                                    echo 'class="active"';
                                                                } ?>>
                            <a href="javascript:void(0)"><i class="fa fa-lock" aria-hidden="true"></i></a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo site_url('login'); ?>">Login</a></li>
                                <li><a href="<?php echo site_url('registration'); ?>">BDO Registration</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>