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
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" class="form-sample" action="../../../../php/admin-pending-handler.php">
                                    <div class="form-group">
                                        <label for="status">ID Αίτησης</label>
                                        <?php
                                            if(isset($_GET['ID']))
                                            {
                                                $id = $_GET['ID'];
                                            }
                                            echo "<input type='text' class='form-control' id='id' name='id' readonly value=$id>";
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Κατάσταση</label>
                                        <input type="text" class="form-control" id="status" name="status" readonly value="Εκκρεμής">                                                  
                                    </div>
                                    <h5>Μαθήματα Για Απόκτηση Αναγνώρισης</h5>
                                    <?php
                                        //get the courses available in db and for each create a checkbox
                                        $conn = new mysqli($hn, $un, $dp, $db);
                                        if ($conn->connect_error) die ($conn->connect_error);
                                        $query = "SELECT * FROM courses";
                                        $result = $conn->query($query);
                                        if (!$result) die($conn->error);
                                        $conn->close();
                                        while($row = $result->fetch_row())
                                        {
                                            echo "<div class='form-group'>";
                                            echo "<label for=$row[0]>$row[1]</label>";
                                            echo "<input type='checkbox'  id=$row[0] name=$row[0] value=$row[0]>";
                                            echo "</div>";
                                        }
                                        
                                    ?>
                                    <a class="btn btn-light me-2" href="../admin-application/admin-application.php">Ακύρωση</a>
                                    <button type="submit" class="btn btn-primary me-2">Υποβολή</button>
                                </form>
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