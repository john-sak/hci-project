<?php
  require_once('../../../../php/db-credentials.php');
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
  <title>ΔΟΑΤΑΠ - Αιτήσεις</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../../assets/images/doatap_shortcut.png" />
</head>

<body>
  <div class="container-scroller">
    <!--navbar -->
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
    <div class="container-fluid page-body-wrapper">
      <div id="right-sidebar" class="settings-panel">
      </div>
      <!-- sidebar -->
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
                <li class="nav-item"> <a class="nav-link" href="../../pages/profile/profile.php">Επεξεργασία Προφίλ </a></li>
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
      <?php
        $conn = new mysqli($hn, $un, $dp, $db);
        if ($conn->connect_error) die ($conn->connect_error);
        $id = $_SESSION['id'];
        //get forms checked by an admin
        $query = "SELECT * FROM forms WHERE userID=$id AND (status='accepted' OR status='rejected' OR status='pending')";
        $resultDONE = $conn->query($query);
        //get forms not submitted or not checked by admin yet
        $query = "SELECT * FROM forms WHERE userID=$id AND (status='waiting' OR status='saved')";
        $resultWAIT = $conn->query($query);
        $conn->close();
      ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <!-- 3 possible states: approved where the user's application is approved, pending when the user should pass courses,
          rejected where the user can see the reason  -->
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ολοκληρωμένες Αιτήσεις</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Τύπος</th>
                          <th>ID Αίτησης</th>
                          <th>Κατάσταση</th>
                          <th>Λεπτομέρειες</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while ($row = $resultDONE->fetch_row()) {
                            echo "<tr>";
                            if ($row[1] == "under") {
                              $degree = "Προπτυχιακό";
                            } else if ($row[1] == "master") {
                              $degree = "Μεταπτυχιακό";
                            } else {
                              $degree = "Διδακτορικό";
                            }
                            echo "<td>$degree</td>";
                            echo "<td>$row[0]</td>";
                            if ($row[5] == "accepted") {
                              echo "<td><label class='badge badge-success'>Εγκρίθηκε</label></td>";
                              $conn = new mysqli($hn, $un, $dp, $db);
                              $query = "SELECT name FROM greekDepts WHERE ID=$row[9]";
                              $result = $conn->query($query);
                              if ($result->num_rows != 1) die(); 
                              $name = $result->fetch_row() [0];
                              $query = "SELECT uniID from greekDepts WHERE ID=$row[9]";
                              $result = $conn->query($query);
                              if ($result->num_rows != 1) die();
                              $id = $result->fetch_row() [0];
                              $query = "SELECT name FROM greekUnis WHERE ID=$id";
                              $result = $conn->query($query);
                              if ($result->num_rows != 1) die();
                              $result = $result->fetch_row();
                              $conn->close();
                              echo "<td><b>Τμήμα Ισοτιμίας</b><br><br>$name, $result[0]</td>";
                            } else if ($row[5] == "rejected") {
                              echo "<td><label class='badge badge-danger'>Απορρίφθηκε</label></td>";
                              echo "<td><b>Μήνυμα από Διαχειριστές</b><br><br>$row[6]</td>";
                            } else {
                              echo "<td><label class='badge badge-info'>Σε εκκρεμότητα</label></td>";
                              $conn = new mysqli($hn, $un, $dp, $db);
                              $query = "SELECT courseID FROM form_has_courses WHERE formID=$row[0]";
                              $result = $conn->query($query);
                              if ($result->num_rows == 0) die();
                              echo "<td><b>Επιπλέον Μαθήματα για Ισοτιμία</b><br><br>";
                              $count = 0;
                              while ($course = $result->fetch_row()) {
                                $id = $course[0];
                                $query = "SELECT name FROM courses WHERE ID=$id";
                                $resultIN = $conn->query($query);
                                if ($resultIN->num_rows == 0) die();
                                $name = $resultIN->fetch_row() [0];
                                echo "$name";
                                $count = $count + 1;
                                if ($count != $result->num_rows) {
                                  echo ", ";
                                }
                              }
                              echo "</td>";
                            }
                            echo "</tr>";
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- 2 possible states: pending where it can be edited, 
            or submitted but not yet reviewed by admin where it can be previewed but not edited -->
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Εκρεμμείς Αιτήσεις</h4>
                  <div class="table-responsive">
                    <table class="table ">
                      <thead>
                        <tr>
                          <th>Τύπος</th>
                          <th>ID Αίτησης</th>
                          <th>Κατάσταση</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($row = $resultWAIT->fetch_row()) {
                          echo "<tr>";
                          if ($row[1] == "under") {
                            $degree = "Προπτυχιακό";
                          } else if ($row[1] == "master") {
                            $degree = "Μεταπτυχιακό";
                          } else if ($row[1] == "phd"){
                            $degree = "Διδακτορικό";
                          } else {
                            $degree = "";
                          }
                          echo "<td>$degree</td>";
                          echo "<td>$row[0]</td>";
                          if ($row[5] == "waiting") {
                            echo "<td><label style='color:orange; border-color:orange' class='badge badge-info'>Σε αναμονή</label></td>";
                            echo "<td><a href='../../pages/application-preview/application-preview.php?ID=$row[0]' class='btn btn-outline-primary btn-sm'>Επισκόπηση</a></td>";
                          } else {
                            echo "<td><label style='color:purple; border-color:purple' class='badge badge-info'>Προσωρινή Αποθήκευση</label></td>";
                            echo "<td><a href='../../pages/form/form.php?ID=$row[0]' class='btn btn-outline-primary btn-sm'>Επεξεργασία</a></td>";
                          }
                          echo "</tr>";
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        <!-- footer -->
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
  <!-- End custom js for this page-->
</body>

</html>
