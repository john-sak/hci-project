<?php
  require_once('db-credentials.php');

  //start session if not started alreary
  if(!session_id())
  {
    session_start();
  }

  //check if post fields are set
  if (!isset($_POST['deg']) || $_POST['deg'] == 'none' || !isset($_POST['dep']) || $_POST['dep'] == 'none') {
    ?>
      <script type="text/javascript">
        window.location = "../User/template/pages/user-application/user-application.php";
        alert("Όλα τα πεδία είναι απαραίτητα για την υποβολή της αίτησης!");
      </script>
    <?php
    exit();
  }

  //connect to db
  $conn = new mysqli($hn,$un,$dp,$db);

  if($conn->connect_error) die($conn->connect_error);

  $id = intval($_SESSION['id']);
  $degree = $_POST['deg'];
  $department = intval($_POST['dep']);

  if(isset($_GET['ID']))
  {
    //form is already saved

    $formID = intval($_GET['ID']);
    if ($_FILES['IDfile']['name'] != "") {
      //new file is added
      $F1OK = 1;
      $F1RPLC = 1;
      $filename = rand(1000,10000) . "-"  . $_FILES['IDfile']['name'];
      $tempName = $_FILES['IDfile']['tmp_name'];
      $path = "../files/" . $filename;
    } else {
      $query = "SELECT identification FROM forms WHERE ID=$formID";
      $result = $conn->query($query);
      if (!$result) die($conn->error);
      if ($result->fetch_row()[0] == "") {
        //file is not submitted before when the form was saved nor here so an error occurs 
        $F1OK = 0;
      } else {
        $F1OK = 1;
        $F1RPLC = 0;
      }
    }

    if ($_FILES['degreefile']['name'] != "") {
      $F2OK = 1;
      $F2RPLC = 1;
      $filename1 = rand(1000,10000) . "-"  .$_FILES['degreefile']['name'];
      $tempName1 = $_FILES['degreefile']['tmp_name'];
      $path1 = "../files/" . $filename1;
    } else {
      $query = "SELECT diploma FROM forms WHERE ID=$formID";
      $result = $conn->query($query);
      if (!$result) die($conn->error);
      if ($result->fetch_row()[0] == "") {
        $F2OK = 0;
      } else {
        $F2OK = 1;
        $F2RPLC = 0;
      }
    }

    if ($_FILES['courses']['name'] != "") {
      $F3OK = 1;
      $F3RPLC = 1;
      $filename2 = rand(1000,10000) . "-"  . $_FILES['courses']['name'];
      $tempName2 = $_FILES['courses']['tmp_name'];
      $path2 = "../files/" . $filename2;
    } else {
      $query = "SELECT certificate FROM forms WHERE ID=$formID";
      $result = $conn->query($query);
      if (!$result) die($conn->error);
      if ($result->fetch_row()[0] == "") {
        $F3OK = 0;
      } else {
        $F3OK = 1;
        $F3RPLC = 0;
      }
    }

    if (!$F1OK || !$F2OK || !$F3OK) {
      //at least one file is not submitted
      ?>
      <script type="text/javascript">
      window.location = "../User/template/pages/user-application/user-application.php";
      alert("Όλα τα πεδία είναι απαραίτητα για την υποβολή της αίτησης!");
      </script>
      <?php
      exit();
    } else {
      //update form if is needed
      if ($F1RPLC) {
        $query = "UPDATE forms SET identification='$filename' WHERE ID=$formID";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        move_uploaded_file($tempName,$path);
      }

      if ($F2RPLC) {
        $query = "UPDATE forms SET diploma='$filename1' WHERE ID=$formID";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        move_uploaded_file($tempName1,$path1);
      }

      if ($F3RPLC) {
        $query = "UPDATE forms SET certificate='$filename2' WHERE ID=$formID";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        move_uploaded_file($tempName2,$path2);
      }
    }
    //update other values in form
    $query = "UPDATE forms SET eduLevel='$degree', status='waiting', foreignDeptID=$department WHERE ID=$formID";
    $result = $conn->query($query);
    if (!$result) die($conn->error);

  }else{
    //new form created
    if ($_FILES['IDfile']['name'] == "" || $_FILES['degreefile']['name'] == "" || $_FILES['courses']['name'] == "") {
      ?>
      <script type="text/javascript">
      window.location = "../User/template/pages/user-application/user-application.php";
      alert("Όλα τα πεδία είναι απαραίτητα για την υποβολή της αίτησης!");
      </script>
      <?php
      exit();
    }
    $filename = rand(1000,10000) . "-"  .$_FILES['IDfile']['name'];
    $tempName = $_FILES['IDfile']['tmp_name'];
    $path = "../files/" . $filename;

    $filename1 = rand(1000,10000) . "-"  .$_FILES['degreefile']['name'];
    $tempName1 = $_FILES['degreefile']['tmp_name'];
    $path1 = "../files/" . $filename1;

    $filename2 = rand(1000,10000) . "-"  .$_FILES['courses']['name'];
    $tempName2 = $_FILES['courses']['tmp_name'];
    $path2 = "../files/" . $filename2;

    $query = "INSERT INTO forms (eduLevel, status, userID, foreignDeptID,identification,diploma,certificate) VALUES ('$degree', 'waiting', $id, $department,'$filename','$filename1','$filename2')";
    $result = $conn->query($query);
    if(!$result)  die($conn->error);

    move_uploaded_file($tempName,$path);

    move_uploaded_file($tempName1,$path1);

    move_uploaded_file($tempName2,$path2);
  }


  ?>
  <script type="text/javascript">
  window.location = "../User/template/pages/user-application/user-application.php"
  alert("Η αίτηση καταχωρήθηκε επιτυχώς!");
  </script>
  <?php
	$conn -> close();
?>
