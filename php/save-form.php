<?php
  require_once('db-credentials.php');

  //start session if not started alreary
  if(!session_id())
  {
    session_start();
  }

  //connect to db
  $conn = new mysqli($hn,$un,$dp,$db);

  if($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['deg']) && $_POST['deg'] != 'none') {
    $degree = $_POST['deg'];
  } else {
    $degree = NULL;
  }
  if (isset($_POST['dep']) && $_POST['dep'] != 'none') {
    $department = intval($_POST['dep']);
  } else {
    $department = 0;
  }
  if(!($_FILES['IDfile']['name'] == "")){
    $filename = rand(1000,10000) . "-"  . $_FILES['IDfile']['name'] ;
    $tempName = $_FILES['IDfile']['tmp_name'];
    $path = "../files/" . $filename;
  }else{
    $filename = NULL;
  }
  if(!($_FILES['degreefile']['name'] == "")){
    $filename1 =   rand(1000,10000) . "-"  . $_FILES['degreefile']['name'];
    $tempName1 = $_FILES['degreefile']['tmp_name'];
    $path1 = "../files/" . $filename1;
  }else{
    $filename1 = NULL;
  }
  if(!($_FILES['courses']['name'] == "")){
    $filename2 =   rand(1000,10000) . "-" . $_FILES['courses']['name'];
    $tempName2 = $_FILES['courses']['tmp_name'];
    $path2 = "../files/" . $filename2;
  }else{
    $filename2 = NULL;
  }

  $id = intval($_SESSION['id']);

  if(isset($_GET['ID']))
  {
    $formID = intval($_GET['ID']);

    if (isset($degree)) {
      $query = "UPDATE forms SET eduLevel='$degree' WHERE ID=$formID";
      $result = $conn->query($query);
      if (!$result) die($conn->error);
    }

    if (isset($department)) {
      $query = "UPDATE forms SET foreignDeptID=$department WHERE ID=$formID";
      $result = $conn->query($query);
      if (!$result) die($conn->error);
    }

    if (isset($filename)) {
      $query = "UPDATE forms SET identification='$filename' WHERE ID=$formID";
      $result = $conn->query($query);
      if (!$result) die($conn->error);
      move_uploaded_file($tempName,$path);
    }

    if (isset($filename1)) {
      $query = "UPDATE forms SET diploma='$filename1' WHERE ID=$formID";
      $result = $conn->query($query);
      if (!$result) die($conn->error);
      move_uploaded_file($tempName1,$path1);
    }

    if (isset($filename2)) {
      $query = "UPDATE forms SET certificate='$filename2' WHERE ID=$formID";
      $result = $conn->query($query);
      if (!$result) die($conn->error);
      move_uploaded_file($tempName2,$path2);
    }

  }else{

    $query = "INSERT INTO forms (eduLevel, status, userID, foreignDeptID,identification,diploma,certificate) VALUES ('$degree', 'saved', $id, $department,'$filename','$filename1','$filename2')";
    $result = $conn->query($query);
    // check if query failed
    if(!$result)  die($conn->error);

    if(!($_FILES['IDfile']['name'] == ""))
      move_uploaded_file($tempName,$path);

    if(!($_FILES['degreefile']['name'] == ""))
      move_uploaded_file($tempName1,$path1);

    if(!($_FILES['courses']['name'] == ""))
      move_uploaded_file($tempName2,$path2);
  }


  ?>
  <script type="text/javascript">
    window.location = "../User/template/pages/user-application/user-application.php"
    alert("Η αίτηση αποθηκεύτηκε επιτυχώς!");
  </script>
  <?php
	$conn -> close();
?>
