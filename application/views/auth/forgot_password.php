<section class="vh-100 mt-0">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form id="loginFrm" action="<?php echo base_url('auth/forgot_password') ?>" method="post" accept-charset="utf-8">
                            <div><img class="img-responsive" src="<?php echo base_url('assets/images/login_logo.png'); ?>" /></div>
                            <h4 class="mt-2 mb-3">Forgot Password</h4>

                            <div class="form-outline mb-4">
                                <input type="text" id="typeEmailX-2" class="form-control form-control-lg" placeholder="UserName/Email" name="email" />
                                <?php echo form_error('email'); ?>
                            </div>


                            <!-- Checkbox -->
                            <div class="row mb-4">


                                <div class="col">
                                    <!-- Simple link -->
                                    <a href="<?php echo site_url('login') ?>">Login?</a>
                                </div>
                            </div>


                            <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>