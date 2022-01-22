<?php
    require_once('../../../../php/db-credentials.php');
  //start session if not started alreary
  if(!session_id())
  {
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
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                            <i class="menu-icon mdi mdi-table"></i>
                            <span class="menu-title">Αιτήσεις</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="../../pages/admin-application/admin-application.php">Εκκρεμείς Αιτήσεις</a></li>
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
                                <li class="nav-item"> <a class="nav-link" href="../../../../php/logout-handler.php">Έξοδος </a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <?php
                $conn = new mysqli($hn, $un, $dp, $db);
                if ($conn->connect_error) die ($conn->connect_error);
                $query = "SELECT * FROM forms WHERE status='waiting'";
                $result = $conn->query($query);
                $conn->close();
            ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Εκρεμμείς Αιτήσεις</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Τύπος</th>
                                                <th>ID Αίτησης</th>
                                                <th>Όνομα</th>
                                                <th>Επίθετο</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                while ($row = $result->fetch_row()) {
                                                    echo "<tr>";
                                                    if ($row[1] == "under") {
                                                        $degree = "Προπτυχιακό";
                                                    } else if ($row[1] == "master") {
                                                        $degree = "Μεταπτυχιακό";
                                                    } else {
                                                        $degree = "Διδακτορικό";
                                                    }
                                                    echo "<td>$degree</td>";
                                                    $applicationID = $row[0];
                                                    echo "<td>$applicationID</td>";
                                                    $conn = new mysqli($hn, $un, $dp, $db);
                                                    if ($conn->connect_error) die ($conn->connect_error);
                                                    $userID = $row[7];
                                                    $query = "SELECT * FROM users WHERE ID=$userID";
                                                    $userResult = $conn->query($query);
                                                    if (!$userResult) die($conn->error);
                                                    $conn->close();
                                                    $userData = $userResult->fetch_row();
                                                    echo "<td>$userData[1]</td>";
                                                    echo "<td>$userData[2]</td>";
                                                    echo"<td><a  href='../../pages/admin-application-preview/admin-application-preview.php?ID=$applicationID' class='btn btn-outline-primary btn-sm' >Προεπισκόπηση</a></td>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
