<?php
include("../view/header.php");
include("../module/newpassword.php");
?>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
               <h3 class="card-title text-left mb-3">Forget Password</h3>
                 <form action="" method="POST" id = "forgetpwd_form">
                  <div class="form-group">
                    <label>Email *</label>
                    <input type="email" class="form-control p_input" placeholder = "Email" name = "email" id = "email">
                  </div>
                  <div class="form-group">
                    <label>New Password *</label>
                    <input type="password" class="form-control p_input" placeholder = "Enter new Password" name = "npwd" id = "npwd">
                  </div>
                  <div class="text-center">
                    <button type="submit" name = "submit" class="btn btn-primary btn-block enter-btn">Update</button>
                 </div>
                  </div>
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
    <?php
       include("../view/footer.php");
    ?>
