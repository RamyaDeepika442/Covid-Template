<?php
include("../view/header.php");
?>
  <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">

                <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                 </div>

                <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                 </div>

                <h3 class="card-title text-left mb-3">Sign Up</h3>
                <form action = "" method = "POST" id = "user_form">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control p_input" placeholder="enter username" name = "username" id = "username">
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="number" class="form-control p_input" placeholder="enter phone number" name = "phnumber" id = "phnumber">
                  </div>
                  <div class="form-group">
                    <label>Date Of Birth</label>
                    <input type="text" class="form-control p_input" placeholder="enter date of birth" name = "dateofbirth" id = "dateofbirth">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control p_input" placeholder="enter email" name = "email" id = "email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control p_input" placeholder="enter password" name = "pwd" id = "pwd">
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                      <label class="form-check-label">
                      <input type="checkbox" class="form-check-input">By creating an account you are accepting our Terms & Conditions</label>
                    </div>
                  </div>
                  <div class="text-center">
                    <input type="submit" class="btn btn-primary btn-block enter-btn" value = "Submit" id = "signup" name = "submit" onclick="senddata()"/>
                  </div>
               <p class="sign-up">Already have an Account?<a href="../controller/loginform.php">Login Here</a></p>
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
