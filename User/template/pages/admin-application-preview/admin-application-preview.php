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
    <title>ΔΟΑΤΑΠ - Προεπισκόπηση</title>
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
        <!-- navbar -->
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
            <?php
            if(isset($_GET['ID']))
            {
                //get id of the form that the admin wants to preview and then get data from db
                $id = $_GET['ID'];
                $conn = new mysqli($hn, $un, $dp, $db);
                if ($conn->connect_error) die ($conn->connect_error);
                $query = "SELECT * FROM forms WHERE ID=$id";
                $result = $conn->query($query);
                $row = $result->fetch_row();
                $query = "SELECT * FROM Users WHERE ID=$row[7]";
                $userResult = $conn->query($query);
                $userRow = $userResult->fetch_row();
                $query = "SELECT * FROM foreigndepts WHERE ID=$row[8]";
                $deptResult = $conn->query($query);
                $deptRow = $deptResult->fetch_row();
                $query = "SELECT * FROM foreignunis WHERE ID=$deptRow[2]";
                $uniResult = $conn->query($query);
                $uniRow = $uniResult-> fetch_row();
                $query = "SELECT * FROM countries WHERE ID=$uniRow[2]";
                $countryResult = $conn->query($query);
                $countryRow = $countryResult->fetch_row();;
                $conn->close();
            }
            ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                    echo "<h4 class='card-title'>Αίτηση $id</h4>";
                                ?>
                                <p class="card-description">
                                    Προσωπικές Πληροφορίες
                                </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Όνομα</label>
                                            <div class="col-sm-9">
                                                <?php
                                                echo "<input name='name' type='text' id='name' class='form-control' readonly value='$userRow[1]'>";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 col-form-label">Επίθετο</label>
                                            <div class="col-sm-9">
                                                <?php
                                                echo "<input name='lname' id='lname' type='text'  class='form-control' readonly value='$userRow[2]'>";
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
                                                    $gender = $userRow[4];
                                                    if ($gender == "m") {
                                                        $gender = "Άνδρας";
                                                    } else if ($gender == "f") {
                                                        $gender = "Γυναίκα";
                                                    } else {
                                                        $gender = "Άλλο";
                                                    }
                                                echo "<input name='gender' id='gender' type='text' class='form-control' value='$gender' readonly />";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="bday" class="col-sm-3 col-form-label">Ημ/νία Γέννησης</label>
                                            <div class="col-sm-9">
                                                <?php
                                                $bD = $userRow[5];
                                                $bM = $userRow[6];
                                                $bY = $userRow[7];
                                                echo "<input name='bday' id='bday' type='text' class='form-control' value='$bD/$bM/$bY' readonly />";
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
                                            <label for="degree" class="col-sm-3 col-form-label">Επίπεδο Σπουδών</label>
                                            <div class="col-sm-9">
                                                <?php
                                                    echo "<input name='degree'id='degree' type='text'  class='form-control' readonly value='$row[1]'>";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="univ" class="col-sm-3 col-form-label">Ίδρυμα</label>
                                            <div class="col-sm-9">
                                                <?php
                                                    echo "<input type='text'  id='univ' name='univ' class='form-control' readonly value='$uniRow[1]'>";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="dep" class="col-sm-3 col-form-label">Τμήμα</label>
                                            <div class="col-sm-9">
                                                <?php
                                                    echo "<input type='text'  id='dep' name='dep' class='form-control' readonly value='$deptRow[1]'>";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="country" class="col-sm-3 col-form-label">Χώρα</label>
                                            <div class="col-sm-9">
                                                <?php
                                                echo "<input type='text'  id='country' name='country' class='form-control' readonly value='$countryRow[1]'>";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="card-description">
                                    Δικαιολογητικά
                                </p>
                                    <!-- to do certificates -->
                                    <div class="form-group">
                                        <label for="ID">Ταυτότητα ή Διαβατήριο</label>
                                        <?php
                                            $id = $_GET['ID'];
                                            $conn = new mysqli($hn, $un, $dp, $db);
                                            if ($conn->connect_error) die ($conn->connect_error);
                                            $query = "SELECT identification FROM forms WHERE ID=$id";
                                            $result = $conn->query($query);
                                            if(!$result) die($conn->error);
                                            $row = $result->fetch_row();
                                            $conn->close();
                                        ?>
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" readonly value="Κατέβασε το Αρχείο">
                                            <span class="input-group-append">
                                            <?php
                                                echo "<a class='file-upload-browse btn btn-primary' href='../../../../php/download.php?file=$row[0]'>Download File</a>";
                                            ?>
                                            </span>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="degreefile">Τίτλος Σπουδών</label>
                                        <?php
                                            $id = $_GET['ID'];
                                            $conn = new mysqli($hn, $un, $dp, $db);
                                            if ($conn->connect_error) die ($conn->connect_error);
                                            $query = "SELECT diploma FROM forms WHERE ID=$id";
                                            $result = $conn->query($query);
                                            if(!$result) die($conn->error);
                                            $row = $result->fetch_row();
                                            $conn->close();
                                        ?>
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" readonly value="Κατέβασε το Αρχείο">
                                            <span class="input-group-append">
                                            <?php
                                                echo "<a class='file-upload-browse btn btn-primary' href='../../../../php/download.php?file=$row[0]'>Download File</a>";
                                            ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="courses">Πιστοποιητικό Μαθημάτων</label>
                                        <?php
                                            $id = $_GET['ID'];
                                            $conn = new mysqli($hn, $un, $dp, $db);
                                            if ($conn->connect_error) die ($conn->connect_error);
                                            $query = "SELECT certificate FROM forms WHERE ID=$id";
                                            $result = $conn->query($query);
                                            if(!$result) die($conn->error);
                                            $row = $result->fetch_row();
                                            $conn->close();
                                        ?>
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" readonly value="Κατέβασε το Αρχείο">
                                            <span class="input-group-append">
                                            <?php
                                                echo "<a class='file-upload-browse btn btn-primary' href='../../../../php/download.php?file=$row[0]'>Download File</a>";
                                            ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <?php
                                        $id = $_GET['ID'];
                                        echo "<a  href='../../pages/admin-reject/admin-reject.php?ID=$id' class='btn btn-rounded btn-danger' >Απόρριψη</a>";
                                        echo "<a  href='../../pages/admin-pending/admin-pending.php?ID=$id' class='btn btn-rounded btn-info' >Σε Εκκρεμότητα</a>";
                                        echo "<a  href='../../pages/admin-approve/admin-approve.php?ID=$id' class='btn btn-rounded btn-primary' >Έγκριση</a>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
                    </div>
                </footer>
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
