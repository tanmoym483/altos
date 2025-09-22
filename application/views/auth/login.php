<section class="vh-100 mt-0">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <!-- Normal Email / Password Login -->
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

              <!-- <div class="form-outline mb-4">
                <a href="<?php echo base_url('registration') ?>">New Registration?</a>
              </div> -->

              <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                  </div>
                </div>
                <div class="col">
                  <a href="<?php echo site_url('forgot-password') ?>">Forgot password?</a>
                </div>
              </div>

              <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
              <button class="btn btn-success btn-lg btn-block">
                <a class="text-white" href="<?php echo base_url('') ?>">Home</a>
              </button>
            </form>

            <hr>

            <!-- Firebase Phone Auth Section -->
            <h5 class="mt-4 mb-3">Or Login with Phone</h5>

            <div class="form-outline mb-4">
              <input type="text" id="phone-number" class="form-control form-control-lg" placeholder="+919876543210" />
            </div>

            <div id="recaptcha-container"></div>

            <button type="button" class="btn btn-warning btn-lg btn-block" id="send-otp-btn">Send OTP</button>

            <div class="form-outline mt-3" style="display:none;" id="otp-section">
              <input type="text" id="otp-code" class="form-control form-control-lg" placeholder="Enter OTP" />
              <button type="button" class="btn btn-success btn-lg btn-block mt-2" id="verify-otp-btn">Verify OTP</button>
            </div>

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

<!-- Firebase SDKs -->
<script src="https://www.gstatic.com/firebasejs/10.4.0/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/10.4.0/firebase-auth-compat.js"></script>

<script>
  // Firebase config
  const firebaseConfig = {
    apiKey: "AIzaSyBO2O84TeQHMYj6FQVKygmpTwpbeQjrFWE",
    authDomain: "ajobmartpushsms.firebaseapp.com",
    projectId: "ajobmartpushsms",
    storageBucket: "ajobmartpushsms.firebasestorage.app",
    messagingSenderId: "51167126408",
    appId: "1:51167126408:web:b0443428ecc1e5c07f903d",
    measurementId: "G-76GL3ZCF27"
  };

  firebase.initializeApp(firebaseConfig);

  // Password toggle
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

  let confirmationResult;

  // reCAPTCHA
  window.onload = function () {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
      size: 'invisible',
      callback: (response) => {
        console.log("reCAPTCHA solved");
      },
      'expired-callback': () => {
        alert('reCAPTCHA expired, please try again.');
      }
    });
  };

  // Format phone number to E.164
  function formatPhoneNumber(phone) {
    phone = phone.replace(/\D/g, ""); // remove non-digits
    if (phone.length === 10) {
      phone = "+91" + phone; // default India
    } else if (!phone.startsWith("+")) {
      phone = "+" + phone;
    }
    return phone;
  }

  // Send OTP
  document.getElementById('send-otp-btn').addEventListener('click', function () {
    let phoneNumber = document.getElementById('phone-number').value.trim();

    if (!phoneNumber) {
      alert("Please enter a phone number, e.g., +919876543210");
      return;
    }

    phoneNumber = formatPhoneNumber(phoneNumber);
    console.log("Formatted phone:", phoneNumber);

    const appVerifier = window.recaptchaVerifier;

    firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
      .then((result) => {
        confirmationResult = result;
        alert("OTP Sent!");
        document.getElementById("otp-section").style.display = "block";
      })
      .catch((error) => {
        console.error(error);
        alert("Error sending OTP: " + error.message);
      });
  });

  // Verify OTP
  document.getElementById('verify-otp-btn').addEventListener('click', function () {
    const otpCode = document.getElementById('otp-code').value.trim();
    if (!otpCode) {
      alert("Please enter the OTP");
      return;
    }

    confirmationResult.confirm(otpCode)
      .then((result) => {
        const user = result.user;
        alert("Phone verified: " + user.phoneNumber);

        // Send to backend
        fetch("<?php echo base_url('auth/phone_login') ?>", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ phone: user.phoneNumber, uid: user.uid })
        })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              window.location.href = "<?php echo base_url('dashboard') ?>";
            } else {
              alert("Server login failed.");
            }
          })
          .catch(() => {
            alert("Failed to connect to server.");
          });
      })
      .catch((error) => {
        console.error(error);
        alert("OTP verification failed: " + error.message);
      });
  });
</script>
