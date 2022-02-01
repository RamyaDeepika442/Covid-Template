<?php
  include("../module/profiledata.php");
?>

<body>
  <div class="container-scroller">
     <div class="container-fluid page-body-wrapper full-page-wrapper">
       <div class="row w-100 m-0">
         <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
           <div class="card col-lg-4 mx-auto">
             <div class="card-body px-10 py-10">
					<div class="image_area">
            <?php if(!empty($msg)): ?>
              <div class = "alert <?php echo $css_class; ?>">
                <?php echo $msg; ?>
              </div>
            <?php endif; ?>
              <h3 class="card-title text-center mb-3">Create Profile </h3>
						<form action = "profilesettings.php" method="post" enctype="multipart/form-data">
                <div class="form-group text-center">
                  <label for="upload_image">
							    	<img src="../images/placeholderimg.jfif" id="uploaded_image" />
                    <label for = "profileImage">Profile Image</label>
								    <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                  </label>
                </div>

                <div class="profile-modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="profile-modal-content">
                        <div class="profile-modal-header">
                          <h5 class="modal-title">Crop Image Before Upload</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="profile-modal-body">
                          <div class="img-container">
                              <div class="row">
                                  <div class="col-md-8">
                                      <img src="" id="sample_image" />
                                  </div>
                                  <div class="col-md-4">
                                      <div class="preview"></div>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="profile-modal-footer d-flex justify-content-end">
                          <button type="button" id="crop" class="btn btn-primary">Crop</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control p_input" placeholder="full name" name="fullname" id="fullname">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control p_input" placeholder="email" name="email" id ="email">
              </div>
              <div class="form-group">
                <label>Role</label>
                <input type="text" class="form-control p_input" placeholder="role" name="role" id="role">
              </div>
              <div class="form-group">
                <label>Date Of Birth</label>
                <input type="text" class="form-control p_input" placeholder="date of birth" name="dateofbirth" id="dateofbirth">
              </div>
              <div class="form-group">
                <label>Interests</label>
                <input type="text" class="form-control p_input" placeholder="interests" name="interests" id="interests">
              </div>
              <div>
                <button type="submit" class="btn btn-primary btn-block enter-btn" id="save" name="save">Save</button>
              </div>
              <div class = "d-flex justify-content-between">
                 <a class="nav-link space" href="../controller/myprofile.php"> Go to Myprofile </a>
                 <a class="nav-link space" href="../controller/dashboard.php"> Back </a>
              </div>
              </div>
						</form>
					</div>
			    </div>

		</div>
  </div>
</div>
</div>
<!-- content-wrapper ends  -->
</div>
<!-- row ends -->
</div>
<!-- page-body-wrapper ends  -->
</div>
<!-- container-scroller -->
	</body>




<!-- include("../module/profiledata.php");
 <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-10 py-10">
              <?php// if(!empty($msg)): ?>
                <div class = "alert <?php //echo $css_class; ?>">
                  <?php// echo $msg; ?>
                </div>
              <?php// endif; ?>
              <h3 class="card-title text-center mb-3">Create Profile </h3>
              <form action = "profilesettings.php" method = "POST" id="profile_form" enctype="multipart/form-data">
                <div class="form-group text-center">
                  <img src = "../images/placeholderimg.jfif" id="profiledisplay" onclick="profileClick()"/>
                  <label for = "profileImage">Profile Image</label>
                  <input type="file" name="profileimage" id="profileimage" onchange="displayImage(this)" style="display: none;">
                </div>
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" class="form-control p_input" placeholder="full name" name="fullname" id="fullname">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control p_input" placeholder="email" name="email" id ="email">
                </div>
                <div class="form-group">
                  <label>Role</label>
                  <input type="text" class="form-control p_input" placeholder="role" name="role" id="role">
                </div>
                <div class="form-group">
                  <label>Date Of Birth</label>
                  <input type="text" class="form-control p_input" placeholder="date of birth" name="dateofbirth" id="dateofbirth">
                </div>
                <div class="form-group">
                  <label>Interests</label>
                  <input type="text" class="form-control p_input" placeholder="interests" name="interests" id="interests">
                </div>
                <div>
                  <button type="submit" class="btn btn-primary btn-block enter-btn" id="save" name="save">Save</button>
                   <a class="nav-link space text-right" href="../controller/dashboard.php"> Back </a>
                </div>
              </form>
            </div>
          </div>
        </div>
         content-wrapper ends
      </div>
       row ends
    </div>
     page-body-wrapper ends
  </div>
   container-scroller -->
