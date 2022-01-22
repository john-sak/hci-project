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
                <li class="nav-item"> <a class="nav-link" href="../../pages/profile/profile.html">Επεξεργασία Προφίλ</a></li>
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
      <?php
        //init vars
        $degUp = 0;
        $couUp = 0;
        $uniUp = 0;
        $depUp = 0;
        $cID = 0;
        $uID = 0;
      ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Νέα Αίτηση</h4>
                  <form class="form-sample" method="post" action="#">
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
                              if ($gender == "m") {
                                $gender = "Άνδρας";
                              } else if ($gender == "f") {
                                $gender = "Γυναίκα";
                              } else {
                                $gender = "Άλλο";
                              }
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
                          <label for="deg" class="col-sm-3 col-form-label">Επίπεδο Σπουδών*</label>
                          <div class="col-sm-9">
                            <?php
                              //check if already an update happened
                              if(isset($_POST['deg'])) $degUp = 1;

                              if(isset($_GET['ID']) && !$degUp)
                              {
                                //form is temporarily saved
                                $id = $_GET['ID'];
                                //get form from db
                                $conn = new mysqli($hn, $un, $dp, $db);
                                if ($conn->connect_error) die ($conn->connect_error);  
                                $query = "SELECT * FROM forms WHERE ID=$id";
                                $result = $conn->query($query);
                                if (!$result) die ($conn->connect_error);
                                $row = $result->fetch_row();
                                echo "<select id='deg' name='deg' class='form-control' onchange='this.form.submit()'>";
                                if ($row[1] == "under") {
                                    echo "<option value='under' selected>Προπτυχιακό</option>";
                                    echo "<option value='master'>Μεταπτυχιακό</option>";
                                    echo "<option value='phd'>Διδακτορικό</option>";
                                } else if ($row[1] == "master") {
                                    echo "<option value='under'>Προπτυχιακό</option>";
                                    echo "<option value='master' selected>Μεταπτυχιακό</option>";
                                    echo "<option value='phd'>Διδακτορικό</option>";
                                } else if ($row[1] == "phd") {
                                    echo "<option value='under'>Προπτυχιακό</option>";
                                    echo "<option value='master'>Μεταπτυχιακό</option>";
                                    echo "<option value='phd' selected>Διδακτορικό</option>";
                                }
                                else {
                                  echo "<option value='none' selected>Επιλέξτε</option>";
                                  echo "<option value='under'>Προπτυχιακό</option>";
                                  echo "<option value='master'>Μεταπτυχιακό</option>";
                                  echo "<option value='phd'>Διδακτορικό</option>";
                                }
  
                              }
                              else {
                                echo "<select id='deg' name='deg' class='form-control' onchange='this.form.submit()'>";
                                if (isset($_POST['deg']) && $_POST['deg'] != 'none') {
                                  if ($_POST['deg'] == "under") {
                                    echo "<option value='under' selected>Προπτυχιακό</option>";
                                    echo "<option value='master'>Μεταπτυχιακό</option>";
                                    echo "<option value='phd'>Διδακτορικό</option>";
                                  } else if ($_POST['deg'] == "master") {
                                    echo "<option value='under'>Προπτυχιακό</option>";
                                    echo "<option value='master' selected>Μεταπτυχιακό</option>";
                                    echo "<option value='phd'>Διδακτορικό</option>";
                                  } else {
                                    echo "<option value='under'>Προπτυχιακό</option>";
                                    echo "<option value='master'>Μεταπτυχιακό</option>";
                                    echo "<option value='phd' selected>Διδακτορικό</option>";
                                  }
                                } else {
                                  echo "<option value='none' selected>Επιλέξτε</option>";
                                  echo "<option value='under'>Προπτυχιακό</option>";
                                  echo "<option value='master'>Μεταπτυχιακό</option>";
                                  echo "<option value='phd'>Διδακτορικό</option>";
                                }
                            }
                              echo "</select>";
                            ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="cou" class="col-sm-3 col-form-label">Χώρα*</label>
                          <div class="col-sm-9">
                            <?php
                              echo "<select id='cou' name='cou' class='form-control' onchange='this.form.submit()'>";
                              $conn = new mysqli($hn, $un, $dp, $db);
                              if ($conn->connect_error) die ($conn->connect_error);
                              //get countries
                              $query = "SELECT * FROM countries";
                              $result = $conn->query($query);
                              if (!$result) die($conn->error);
                              $row = $result->fetch_row();
                              $conn->close();
                              //check if already an update happened
                              if(isset($_POST['cou'])) $couUp = 1;

                              if(isset($_GET['ID']) && !$couUp)
                              {
                                $conn = new mysqli($hn, $un, $dp, $db);
                                if ($conn->connect_error) die ($conn->connect_error);
                                $query = "SELECT * FROM forms WHERE ID=$id";
                                $formResult = $conn->query($query);
                                if (!$formResult) die ($conn->connect_error);
                                $formRow = $formResult->fetch_row();
                                $conn->close();
                                if(!$formRow[8])
                                {
                                  //country to default
                                  echo "<option value='none' selected>Επιλέξτε</option>";
                                  while ($row = $result->fetch_row()) {
                                    echo "<option value='$row[0]'>$row[1]</option>";
                                  }
                                }
                                else
                                {
                                  //get country saved
                                  $conn = new mysqli($hn, $un, $dp, $db);
                                  if ($conn->connect_error) die ($conn->connect_error);  
                                  $query = "SELECT * FROM foreigndepts WHERE ID=$formRow[8]";
                                  $depResult = $conn->query($query);
                                  $depRow = $depResult->fetch_row();
                                  $query = "SELECT * FROM foreignunis WHERE ID=$depRow[2]";
                                  $uniResult = $conn->query($query);
                                  $uniRow = $uniResult-> fetch_row();
                                  $query = "SELECT * FROM countries WHERE ID=$uniRow[2]";
                                  $countryResult = $conn->query($query);
                                  $countryRow = $countryResult->fetch_row();
                                  $conn->close();
                                  while ($row = $result->fetch_row()) {
                                    if ($row[0] == $countryRow[0]) 
                                      echo "<option value='$row[0]' selected>$row[1]</option>";
                                    else
                                      echo "<option value='$row[0]'>$row[1]</option>";
                                  }  
                                }
                              }
                              else
                              {
                                if (isset($_POST['cou']) && $_POST['cou'] != 'none') {
                                  while ($row = $result->fetch_row()) {
                                    if ($row[0] == $_POST['cou']) {
                                      echo "<option value='$row[0]' selected>$row[1]</option>";
                                    } else {
                                      echo "<option value='$row[0]'>$row[1]</option>";
                                    }
                                  }
                                } else {
                                  echo "<option value='none' selected>Επιλέξτε</option>";
                                  while ($row = $result->fetch_row()) {
                                    echo "<option value='$row[0]'>$row[1]</option>";
                                  }
                                }
                              }
                              echo "</select>";
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="uni" class="col-sm-3 col-form-label">Ίδρυμα*</label>
                          <div class="col-sm-9">
                            <?php
                              echo "<select id='uni' name='uni' class='form-control' onchange='this.form.submit()'>";
                              
                              if(isset($_POST['uni'])) $uniUp = 1;

                              if(isset($_GET['ID']) && !$uniUp)
                              {
                                $id = $_GET['ID'];

                                $conn = new mysqli($hn, $un, $dp, $db);
                                if ($conn->connect_error) die ($conn->connect_error);
                                $query = "SELECT * FROM forms WHERE ID=$id";
                                $formResult = $conn->query($query);
                                if (!$formResult) die ($conn->connect_error);
                                $formRow = $formResult->fetch_row();
                                $conn->close();
                                if(!$formRow[8])
                                {
                                  echo "<option value='none' selected>Επιλέξτε πρώτα χώρα</option>";                                
                                }
                                else
                                {
                                  $conn = new mysqli($hn, $un, $dp, $db);
                                  if ($conn->connect_error) die ($conn->connect_error);
                                  //find uni and country saved
                                  $query = "SELECT * FROM foreigndepts WHERE ID=$formRow[8]";
                                  $depResult = $conn->query($query);
                                  $depRow = $depResult->fetch_row();
                                  $query = "SELECT * FROM foreignunis WHERE ID=$depRow[2]";
                                  $uniResult = $conn->query($query);
                                  $uniRow = $uniResult-> fetch_row();
                                  $query = "SELECT * FROM countries WHERE ID=$uniRow[2]";
                                  $countryResult = $conn->query($query);
                                  $countryRow = $countryResult->fetch_row();
                                  $cID = $countryRow[0];
                                  //get the unis in the set country
                                  $query = "SELECT * FROM foreignunis WHERE countryID=$cID";
                                  $unisCountryResult = $conn->query($query);
                                  if(!$unisCountryResult) die($conn->error);
                                  $conn->close();
                                  while($unisCountryRow = $unisCountryResult->fetch_row()) {
                                      if ($unisCountryRow[0] == $uniRow[0]) {
                                        echo "<option value='$rounisCountryRoww[0]' selected>$unisCountryRow[1]</option>";
                                      } else {
                                        echo "<option value='$unisCountryRow[0]'>$unisCountryRow[1]</option>";
                                      }
                                  }
                                }
                              }
                              else 
                              {
                                $conn = new mysqli($hn, $un, $dp, $db);
                                if ($conn->connect_error) die ($conn->connect_error);
                                if (isset($_POST['cou']) && $_POST['cou'] != 'none') {
                                  $cID = intval($_POST['cou']);
                                  $query = "SELECT * FROM foreignUnis WHERE countryID=$cID";
                                  $result = $conn->query($query);
                                  if (!$result) die($conn->error);
                                  $conn->close();
                                  if (isset($_POST['uni'])) {
                                    $uID = intval($_POST['uni']);
                                    $conn = new mysqli($hn, $un, $dp, $db);
                                    if ($conn->connect_error) die ($conn->connect_error);
                                    $query = "SELECT * FROM foreignUnis WHERE ID=$uID";
                                    $uniResult = $conn->query($query);
                                    $uniRow = $uniResult->fetch_row();
                                    $conn->close();
                                    if($_POST['uni'] != 'none' && $uniRow[2] == $cID){
                                      while ($row = $result->fetch_row()) {
                                        if ($row[0] == $_POST['uni']) {
                                          echo "<option value='$row[0]' selected>$row[1]</option>";
                                        } else {
                                          echo "<option value='$row[0]'>$row[1]</option>";
                                        }
                                      }
                                    }
                                    else {
                                      echo "<option value='none' selected>Επιλέξτε</option>";
                                      while ($row = $result->fetch_row()) {
                                        echo "<option value='$row[0]'>$row[1]</option>";
                                      }
                                    }
                                  } 
                                } else {
                                  echo "<option value='none' selected>Επιλέξτε πρώτα χώρα</option>";
                                }
                              }
                              echo "</select>";
                            ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="dep" class="col-sm-3 col-form-label">Τμήμα*</label>
                          <div class="col-sm-9">
                            <?php
                            echo "<select id='dep' name='dep' class='form-control' onchange='this.form.submit()'>";

                            if(isset($_POST['dep'])) $depUp = 1;

                            if(isset($_GET['ID']) && !$depUp)
                            {
                              $id = $_GET['ID'];

                              $conn = new mysqli($hn, $un, $dp, $db);
                              if ($conn->connect_error) die ($conn->connect_error);
                              $query = "SELECT * FROM forms WHERE ID=$id";
                              $formResult = $conn->query($query);
                              if (!$formResult) die ($conn->connect_error);
                              $formRow = $formResult->fetch_row();
                              $conn->close();
                              if(!$formRow[8])
                              {
                                echo "<option value='none' selected>Επιλέξτε πρώτα πανεπιστήμιο</option>";                                
                              }
                              else
                              {
                                $conn = new mysqli($hn, $un, $dp, $db);
                                if ($conn->connect_error) die ($conn->connect_error);
                                //find uni and dep saved
                                $query = "SELECT * FROM foreigndepts WHERE ID=$formRow[8]";
                                $depResult = $conn->query($query);
                                $depRow = $depResult->fetch_row();
                                $query = "SELECT * FROM foreignunis WHERE ID=$depRow[2]";
                                $uniResult = $conn->query($query);
                                $uniRow = $uniResult-> fetch_row();
                                $uID = $uniRow[0];
                                //get the deps in the set uni
                                $query = "SELECT * FROM foreigndepts WHERE uniID=$uID";
                                $depsUniResult = $conn->query($query);
                                if(!$depsUniResult) die($conn->error);
                                $conn->close();
                                while($depsUniRow = $depsUniResult->fetch_row()) {
                                    if ($depsUniRow[0] == $depRow[0]) {
                                      echo "<option value='$depsUniRow[0]' selected>$depsUniRow[1]</option>";
                                    } else {
                                      echo "<option value='$depsUniRow[0]'>$depsUniRow[1]</option>";
                                    }
                                }
                              }
                            }
                            else
                            {
                              $conn = new mysqli($hn, $un, $dp, $db);
                              if ($conn->connect_error) die ($conn->connect_error);
                              if (isset($_POST['uni']) && $_POST['uni'] != 'none') {
                                $uID = intval($_POST['uni']);
                                $query = "SELECT * FROM foreignDepts WHERE uniID=$uID";
                                $result = $conn->query($query);
                                if (!$result) die($conn->error);
                                $conn->close();
                                if (isset($_POST['dep']) && $_POST['dep'] != 'none') {
                                  while ($row = $result->fetch_row()) {
                                    if ($row[0] == $_POST['dep']) {
                                      echo "<option value='$row[0]' selected>$row[1]</option>";
                                    } else {
                                      echo "<option value='$row[0]'>$row[1]</option>";
                                    }
                                  }
                                } else {
                                  echo "<option value='none' selected>Επιλέξτε</option>";
                                  while ($row = $result->fetch_row()) {
                                    echo "<option value='$row[0]'>$row[1]</option>";
                                  }
                                }
                              } else {
                                echo "<option value='none' selected>Επιλέξτε πρώτα πανεπιστήμιο</option>";
                              }
                            }
                            echo "</select>";
                            ?>
                          </div>
                        </div>
                      </div>
                      <p class="card-description">
                        Δικαιολογητικά
                      </p>
                    <div class="row">
                      <div class="form-group">
                        <label for="ID">Ταυτότητα ή Διαβατήριο*</label>
                        <input id="ID" type="file" name="ID" class="file-upload-default" onchange="this.form.submit()">
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
                          <input id="degreefile" type="file" name="degreefile" class="file-upload-default" onchange="this.form.submit()">
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
                          <input id="courses" type="file" name="courses" class="file-upload-default" onchange="this.form.submit()">
                          <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Ανέβασε Αρχείο">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-primary" value="uploadcourses" name="uploadcourses" type="button">Upload File</button>
                            </span>
                          </div>
                        </div>
                      </div>
                      <?php
                      if(isset($_GET['ID']))
                      {
                        $id = $_GET['ID'];
                        echo "<button type='submit' class='btn btn-primary me-2' value='submit' formaction='../../../../php/submit-form.php?ID=$id'>Υποβολή</button>";
                        echo "<button type='submit' class='btn btn-light' value='save' formaction='../../../../php/save-form.php?ID=$id'>Προσωρινή Αποθήκευση</button>";
                      }
                      else
                      {
                        echo "<button type='submit' class='btn btn-primary me-2' value='submit' formaction='../../../../php/submit-form.php'>Υποβολή</button>";
                        echo "<button type='submit' class='btn btn-light' value='save' formaction='../../../../php/save-form.php'>Προσωρινή Αποθήκευση</button>";

                      }
                      ?>
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
