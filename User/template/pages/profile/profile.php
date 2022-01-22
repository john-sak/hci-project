<?php
  require_once('../../../../php/db-credentials.php');
  if (!session_id()) {
    session_id();
  }
?>

<!DOCTYPE html>
<html lang="el">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ΔΟΑΤΑΠ - Προφίλ</title>
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
                <li class="nav-item"> <a class="nav-link" href="../../pages/user-application/user-application.php">Οι Αιτήσεις Μου</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="../../pages/profile/profile.php">Επεξεργασία Προφίλ</a></li>
              </ul>
            </div>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../../../php/logout-handler.php">Έξοδος </a></li>
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
                  <h2 class="card-title">Στοιχεία Προφίλ</h2>
                  <form class="profile-sample" method="post">
                    <h4 class="card-description">
                      Προσωπικές Πληροφορίες
                    </h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="name" class="col-sm-3 col-form-label">Όνομα</label>
                          <div class="col-sm-9">
                            <?php
                              if (isset($_SESSION['id'])) {
                                $fName = $_SESSION['fName'];
                                echo "<input name='name' type='text' id='name' class ='form-control' placeholder='$fName'/>";
                              } else {
                                echo "<input name='name' type='text' id='name' class ='form-control' placeholder='ΟΝΟΜΑ'/>";
                              }
                            ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="lname" class="col-sm-3 col-form-label">Επίθετο</label>
                          <div class="col-sm-9">
                            <input name="lname" id="lname" type="text" class="form-control" placeholder="ΕΠΙΘΕΤΟ"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="gender" class="col-sm-3 col-form-label">Φύλο</label>
                          <div class="col-sm-9">
                            <select id="gender" name="gender" class="form-control">
                              <option value="male">Άνδρας</option>
                              <option selected value="female">Γυναίκα</option>
                              <option value="other">Άλλο</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="bday" class="col-sm-3 col-form-label">Ημ/νία Γέννησης</label>
                          <div class="col-sm-9">
                            <input id="bday" name="bday" type="date" class="form-control" value="1992-07-22" min="1921-01-01" max="2003-01-01"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <h4>
                      Πληροφορίες Επικοινωνίας
                    </h4>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="addr" class="col-sm-3 col-form-label">Διεύθυνση</label>
                          <div class="col-sm-9">
                            <input name="addr" type="text" id="addr" class="form-control" placeholder="ΔΙΕΥΘΥΝΣΗ"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="postal" class="col-sm-3 col-form-label">Ταχυδρομικός Κώδικας</label>
                          <div class="col-sm-9">
                            <input name="postal" id="lname" type="postal" class="form-control" placeholder="ΤΑΧΥΔΡΟΜΙΚΟΣ ΚΩΔΙΚΑΣ"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="city" class="col-sm-3 col-form-label">Πόλη</label>
                          <div class="col-sm-9">
                            <input name="city" type="text" id="city" class="form-control" placeholder="ΠΟΛΗ"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="country" class="col-sm-3 col-form-label">Χώρα</label>
                          <div class="col-sm-9">
                            <input name="country" id="lname" type="country" class="form-control" placeholder="ΧΩΡΑ"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="phone" class="col-sm-3 col-form-label">Τηλέφωνο Επικοινωνίας</label>
                          <div class="col-sm-9">
                            <input name="phone" type="text" id="phone" class="form-control" placeholder="ΤΗΛΕΦΩΝΟ"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="email" class="col-sm-3 col-form-label">Email Επικοινωνίας</label>
                          <div class="col-sm-9">
                            <input name="email" id="email" type="text" class="form-control" placeholder="EMAIL ΕΠΙΚΟΙΝΩΝΙΑΣ"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Αποθήκευση Αλλαγών</button>
                    <a class="btn btn-light" href="../profile/profile.php"> Ακύρωση</a>
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
