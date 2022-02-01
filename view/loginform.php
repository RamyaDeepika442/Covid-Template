<?php
include("../module/logindata.php");
?>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <?php if(!empty($msg)): ?>
                  <div class = "alert <?php echo $css_class; ?>">
                    <?php echo $msg; ?>
                  </div>
                <?php endif; ?>
                <h3 class="card-title text-left mb-3">Login</h3>
                <form action="" method="POST">
                  <div class="form-group">
                    <label>Email *</label>
                    <input type="email" class="form-control p_input" placeholder = "Email" name = "email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" class="form-control p_input" placeholder = "Password" name = "pwd" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name = "remember"> Remember me </label>
                    </div>
                    <a href="../controller/forgetpwd.php" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" name = "submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>

                  <p class="sign-up">Don't have an Account?<a href="../controller/signup.php"> Sign Up</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
