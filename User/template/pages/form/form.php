<?php
  // start session if not started already
  if (!session_id()) {
    session_start();
  }
?>

<!DOCTYPE html>
<html lang="el">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ΔΟΑΤΑΠ - Νέα Αίτηση</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../../assets/images/doatap_shortcut.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="../../../../index.php">
            <img src="../../../../assets/images/doapat_logo_black.png" alt="logo" />
          </a>
        </div>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div id="right-sidebar" class="settings-panel">
      </div>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Νέα Αίτηση</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="../../pages/form/form.php">Δημιουργία Νέας Αίτησης</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Αιτήσεις</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/user-application/user-apllication.html">Οι Αιτήσεις Μου</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">Προφίλ</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/profile/profile.html">Επεξεργασία Προφίλ</a></li>
              </ul>
            </div>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../../../sign-up.html">Έξοδος</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Νέα Αίτηση</h4>
                  <form class="form-sample" method="post">
                    <p class="card-description">
                      Προσωπικές Πληροφορίες
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="name" class="col-sm-3 col-form-label">Όνομα</label>
                          <div class="col-sm-9">
                          <?php
                            if (isset($_SESSION['id'])) {
                              $fName = $_SESSION['fName'];
                              echo "<input name='name' type='text' id='name' class='form-control' value='$fName' readonly />";
                            } else {
                              echo "<input name='name' type='text' id='name' class='form-control' value='name from db' readonly />";
                            }
                          ?>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="lname" class="col-sm-3 col-form-label">Επίθετο</label>
                          <div class="col-sm-9">
                          <?php
                          if (isset($_SESSION['id'])) {
                            $lName = $_SESSION['lName'];
                            echo "<input name='lname' type='text' id='lname' class='form-control' value='$lName' readonly />";
                          } else {
                            echo "<input name='lname' type='text' id='lname' class='form-control' value='lname from db' readonly />";
                          }
                          ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="gender" class="col-sm-3 col-form-label">Φύλο</label>
                          <div class="col-sm-9">
                            <?php
                            if (isset($_SESSION['id'])) {
                              $gender = $_SESSION['gender'];
                              echo "<input name='gender' id='gender' type='text' class='form-control' value='$gender' readonly />";
                            } else {
                              echo "<input name='gender' id='gender' type='text' class='form-control' value='gender from db' readonly />";
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="bday" class="col-sm-3 col-form-label">Ημ/νία Γέννησης</label>
                          <div class="col-sm-9">
                            <?php
                            if (isset($_SESSION['id'])) {
                              $bD = $_SESSION['bDay'];
                              $bM = $_SESSION['bMonth'];
                              $bY = $_SESSION['bYear'];
                              echo "<input name='bday' id='bday' type='text' class='form-control' value='$bD/$bM/$bY' readonly />";
                            } else {
                              echo "<input name='bday' id='bday' type='text' class='form-control' value='bday from db' readonly />";
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p class="card-description">
                      Πληροφορίες Ιδρύματος
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="degree" class="col-sm-3 col-form-label">Επίπεδο Σπουδών*</label>
                          <div class="col-sm-9">
                            <select id="degree" name="degree" class="form-control">
                              <option value="under">Προπτυχιακό</option>
                              <option value="master">Μεταπτυχιακό</option>
                              <option value=phd"">Διδακτορικό</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="univ" class="col-sm-3 col-form-label">Χώρα*</label>
                          <div class="col-sm-9">
                            <input type="text" list="uni"  id="univ" name="univ"class="form-control" >
                            <datalist id="uni" >
                              <option >Επιλογή 1</option>
                              <option >Επιλογή 2</option>
                              <option >Επιλογή 3</option>
                            </datalist>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="dep" class="col-sm-3 col-form-label">Ίδρυμα*</label>
                          <div class="col-sm-9">
                            <input type="text" list="department" id="dep" name="dep" class="form-control">
                            <datalist id="department" >
                              <option >Επιλογή 1</option>
                              <option >Επιλογή 2</option>
                              <option >Επιλογή 3</option>
                            </datalist>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="country" class="col-sm-3 col-form-label">Τμήμα*</label>
                          <div class="col-sm-9">
                            <input type="text" list="cou" id="country" name="country" class="form-control" >
                            <datalist id="cou" >
                              <option >Επιλογή 1</option>
                              <option >Επιλογή 2</option>
                              <option >Επιλογή 3</option>
                            </datalist>
                          </div>
                        </div>
                      </div>
                      <p class="card-description">
                        Δικαιολογητικά
                      </p>
                    <div class="row">
                      <div class="form-group">
                        <label for="ID">Ταυτότητα ή Διαβατήριο*</label>
                        <input id="ID" type="file" name="ID" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Ανέβασε Αρχείο">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" value="upload" name="uploadID" type="button">Upload File</button>
                          </span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <label for="degreefile">Τίτλος Σπουδών*</label>
                          <input id="degreefile" type="file" name="degreefile" class="file-upload-default">
                          <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Ανέβασε Αρχείο">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-primary" value="uploaddegree" name="uploaddegree" type="button">Upload File</button>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <label for="courses">Πιστοποιητικό Μαθημάτων*</label>
                          <input id="courses" type="file" name="courses" class="file-upload-default">
                          <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Ανέβασε Αρχείο">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-primary" value="uploadcourses" name="uploadcourses" type="button">Upload File</button>
                            </span>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Υποβολή</button>
                      <button type="submit" class="btn btn-light">Προσωρινή Αποθήκευση</button>
                  </form>
                </div>
              </div>
            </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
