<?php
include("../module/fetchprofiledata.php");
?>

<body>
<div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
<div class="muck-up">
  <div class="overlay"></div>
  <div class="top">
    <div class = "d-flex justify-content-between">
      <h4 class = "myprofile-heading"> My Profile </h4>
      <div>
        <a class="nav-link back-btn" href="../controller/dashboard.php"> Back </a>
        <a class="nav-link back-btn" href="../controller/profilesettings.php"> Edit </a>
      </div>
    </div>
 <div class="user-profile">
   <?php
    if(!(empty($row))) {
      $profile = $row['profileimage'];
      $fullname = $row['fullname'];
      $role = $row['role'];
    } else {
      $profile = "../images/default.jfif";
      $fullname = "Full Name";
      $role = "Role";
    }
   ?>
    <img src="../images/<?php echo $profile; ?>" />
      <div class="user-details">
        <h4><?php echo $fullname; ?></h4>
        <p><?php echo $role; ?></p>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="bottom">
    <div class="title card">
      <h3>Email</h3>
      <small>
        <?php if(!(empty($row))): ?>
          <?php echo $row['email']; ?>
        <?php endif; ?>
      </small>
    </div>
    <div class="title card">
      <h3>Date of Birth</h3>
      <small>
       <?php if(!(empty($row))): ?>
         <?php echo $row['dateofbirth']; ?>
       <?php endif; ?>
      </small>
    </div>
    <div class="title card">
      <h3>Interests</h3>
      <small>
        <?php if(!(empty($row))): ?>
          <?php echo $row['interests']; ?>
        <?php endif; ?>
      </small>
    </div>
  </div>
</div>
</div>
</body>
