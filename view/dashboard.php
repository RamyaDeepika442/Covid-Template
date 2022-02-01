<?php
session_start();
?>
<body>
    <div class="container-scroller"
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="../controller/dashboard.php"><img src="../images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="../controller/dashboard.php"><img src="../images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">

                  <?php
                  if($_SESSION['profileimage']) {
                    $profile = $_SESSION['profileimage'];
                  } else {
                    $profile = "../images/default.jfif";
                  }
                  ?>

                  <img class="img-xs rounded-circle " src="../images/<?php echo $profile; ?>" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION['username']; ?></h5>
                  <span>Gold Member</span>
                </div>
              </div>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="#"><img src="../images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
      <!--    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button> -->

           <ul class="navbar-nav navbar-nav-right">
             <li class="nav-item dropdown d-none d-lg-block">
          <div class = d-flex>
            <button type = "submit" class="nav-link btn btn-success create-new-button" id="myBtn">+ Add Covid Data</button>
            <button type = "submit" class="nav-link btn btn-success create-new-button" id="secondBtn">+ Add Data Dynamically here</button>
          </div>
            <!-- first Modal-->
              <!-- The Modal -->
              <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                  <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2 class = "covid-data">Add covid data</h2>
                  </div>
                  <div class="modal-body">
                    <form action = "" method = "POST" id = "form1" enctype = "multipart/form-data">
                      <div class="form-group">
                      <input type="file" id="file" name="file">
                      </div>
                      <div class="text-center">
                        <input type="button" class="btn btn-outline-primary mb-3" onclick = "md()" id = "upload" value = "Upload" name = "upload" />
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                     </div>
                     <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                     </div>
                  </div>
                </div>
             </div>

             <!--Second model-->
                <!-- The Modal -->
                <div id="secondModal" class="modal">

                  <!-- Modal content -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="close1">&times;</span>
                      <h2 class = "covid-data">Add data dynamically here</h2>
                    </div>
                    <div class="modal-body">
                      <form action = "" method = "POST" id = "form2" enctype = "multipart/form-data">
                        <div class="form-group">
                        <input type="file" id="filename" name="filename">
                        </div>
                        <div class="text-center">
                          <input type="button" class="btn btn-outline-primary mb-3" onclick = "upload()" id = "uploaddata" value = "Upload" name = "uploaddata" />
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                           <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                       </div>
                       <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
                           <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                       </div>
                    </div>
                  </div>
               </div>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email"></i>
                  <span class="count bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../images/face4.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                      <p class="text-muted mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
            <!--      <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../images/face2.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                      <p class="text-muted mb-0"> 15 Minutes ago </p>
                    </div>
                  </a>  -->
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../images/face3.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                      <p class="text-muted mb-0"> 18 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">4 new messages</p>
                </div>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-calendar text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Event today</p>
                      <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                      <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-link-variant text-warning"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Launch Admin</p>
                      <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all notifications</p>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="../images/<?php echo $profile; ?>" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['username']; ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                    <div class="preview-item-content">
                      <a class="nav-link space" href="../controller/profilesettings.php"> Profile Settings </a>
                    </div>
                    <div class="dropdown-divider"></div>
                     <div class="preview-item-content">
                      <a class="nav-link space" href="../controller/myprofile.php"> My Profile </a>
                     </div>
                   <div class="dropdown-divider"></div>
                   <a class="nav-link space" href="../view/logout.php"> Logout </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <!-- Table Pagination -->
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                  <div class = "d-flex justify-content-between">
                    <h4 class="card-title">Covid Details</h4>
                    <div class="col-md-3 text-right"><b>Total Data - <span id="total_data"></span></b></div>
    				          <div class="col-md-3">
    				          	<input type="text" name="search" class="form-control" id="search" placeholder="Search Here" onkeyup="load_data(this.value);" />
    				          </div>
    		         	  </div>
                  </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Observation Date </th>
                            <th> State </th>
                            <th> Country </th>
                            <th> last Update </th>
                            <th> Confirmed </th>
                            <th> Deaths </th>
                            <th> Recovered people </th>
                          </tr>
                        </thead>
                        <tbody id="post_data"></tbody>
                      </table>
                      <div id="pagination_link" class = "m-10"></div>
                    </div>
                  </div>
                </div>
              </div>
           <!-- Table pagination ends -->

           <!-- Infinite Scroll -->
               <div class="row">
                 <div class="col-12 grid-margin">
                   <div class="card card-2">
                     <div class="card-body scroll" id = "scroll">
                       <div class = "d-flex justify-content-between">
                       <h4 class="card-title">Covid Details</h4>
                     <div>
                       <label for = "sort">Sort By</label>
                       <select id = "sort" name = "sort" class = "option" onchange="sortBy()">
                         <option value = "" disabled = "" selected = "">select</option>
                         <option class = "option" value = "ASC">ASC</option>
                         <option class = "option" value = "DESC">DESC</option>
                         <option class = "option" value = "last">Latest Entries</option>
                       </select>
                     </div>
                      </div>
                        <div class="table-responsive">
                         <table class = "table">
                           <thead>
                             <tr>
                               <th> Observation Date </th>
                               <th> State </th>
                               <th> Country </th>
                               <th> last Update </th>
                               <th> Confirmed </th>
                               <th> Deaths </th>
                               <th> Recovered people </th>
                             </tr>
                           </thead>
                           <input type="hidden" name="total_count" id="total_count"
                             value="<?php echo $total_count; ?>" />
                             <tbody class = "sort scroll-data">
                                 <?php
                                 // output data of each row
                                  foreach($covide_data_array as $row)
                                  {
                                    ?>
                                   <tr class = "table-data" id="<?php echo $row['id']; ?>">
                                   <td> <?php echo $row['observationdate']; ?> </td>
                                   <td> <?php echo $row['state']; ?> </td>
                                   <td> <?php echo $row['country']; ?> </td>
                                   <td> <?php echo $row['lastupdate']; ?> </td>
                                   <td> <?php echo $row['confirmed']; ?> </td>
                                   <td> <?php echo $row['deaths']; ?> </td>
                                   <td> <?php echo $row['recovered']; ?> </td>
                                   </tr>
                                   <?php
                                  }
                               ?>
                           </tbody>
                         </table>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
              <!-- Infinite Scroll ends -->

              <!-- Infinite Scroll 2-->
                <div class="row">
                  <div class="col-12 grid-margin">
                   <div class="card card-2">
                     <div class="card-body scroll" id = "scroll2">
                       <h4 class="card-title">Covid Confirmed Details 2021</h4>
                        <div class="table-res">
                         <table class = "table">
                           <thead>
                             <tr>
                               <th> State </th>
                               <th> Country </th>
                               <th> Lat </th>
                               <th> Longitude </th>
                               <th> Jan 1 </th>
                               <th> Jan 2 </th>
                               <th> Jan 3 </th>
                               <th> Jan 4 </th>
                               <th> Jan 5 </th>
                               <th> Jan 6 </th>
                             </tr>
                           </thead>
                           <input type="hidden" name="total_data_count" id="total_data_count"
                             value="<?php echo $total_data_count; ?>" />
                             <tbody id="add-table-data">
                                 <?php
                                 // output data of each row
                                  foreach($covid_data_confirmed_2021_array as $row)
                                  {
                                    ?>
                                   <tr class = "add-table-data" id="<?php echo $row['id']; ?>">
                                   <td> <?php echo $row['state']; ?> </td>
                                   <td> <?php echo $row['country']; ?> </td>
                                   <td> <?php echo $row['lat']; ?> </td>
                                   <td> <?php echo $row['longitude']; ?> </td>
                                   <td> <?php echo $row['jan01']; ?> </td>
                                   <td> <?php echo $row['jan02']; ?> </td>
                                   <td> <?php echo $row['jan03']; ?> </td>
                                   <td> <?php echo $row['jan04']; ?> </td>
                                   <td> <?php echo $row['jan05']; ?> </td>
                                   <td> <?php echo $row['jan06']; ?> </td>
                                   </tr>
                                   <?php
                                  }
                               ?>
                           </tbody>
                         </table>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
              <!-- Infinite Scroll 2 ends -->
          </div>
     </div>
