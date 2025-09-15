<section class="vh-100 mt-0">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form id="loginFrm" action="<?php echo base_url('auth/login') ?>" method="post" accept-charset="utf-8">
                            <?php if ($this->session->flashdata('error') != '') { ?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('success') != '') { ?>
                                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                            <?php } ?>
                            <div><img class="img-responsive" src="<?php echo base_url('assets/images/login_logo.png'); ?>" /></div>
                            <h4 class="mt-2 mb-3">Login</h4>

                            <div class="form-outline mb-4">
                                <input type="text" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Email/ Username" name="username" />
                                <?php echo form_error('username'); ?>
                            </div>

                            <div class="form-outline mb-4 position-relative">
                                <input type="password" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Password" name="password" />
                                <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
                                <?php echo form_error('password'); ?>
                            </div>

                            <div class="form-outline mb-4">
                                <a href="<?php echo base_url('registration') ?>">New Registation ?</a>
                            </div>

                            <!-- Checkbox -->
                            <div class="row mb-4">
                                <div class="col d-flex justify-content-center">
                                    <!-- Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <!-- Simple link -->
                                    <a href="<?php echo site_url('forgot-password') ?>">Forgot password?</a>
                                </div>
                            </div>


                            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                             <button class="btn btn-success btn-lg btn-block"><a class="text-white" href="<?php echo base_url('') ?>">Home</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
.password-toggle-icon {
  position: absolute;
  top: 75%;
  right: 10px;
  transform: translateY(-50%);
  cursor: pointer;
}

.password-toggle-icon i {
  font-size: 18px;
  line-height: 1;
  color: #333;
  transition: color 0.3s ease-in-out;
  margin-bottom: 20px;
}

.password-toggle-icon i:hover {
  color: #000;
}
</style>
<script>
const passwordField = document.getElementById("typePasswordX-2");
const togglePassword = document.querySelector(".password-toggle-icon i");

togglePassword.addEventListener("click", function () {
  if (passwordField.type === "password") {
    passwordField.type = "text";
    togglePassword.classList.remove("fa-eye");
    togglePassword.classList.add("fa-eye-slash");
  } else {
    passwordField.type = "password";
    togglePassword.classList.remove("fa-eye-slash");
    togglePassword.classList.add("fa-eye");
  }
});
</script>