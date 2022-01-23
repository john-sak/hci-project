<?php
  require_once('db-credentials.php');

  //start session if not started alreary
  if(!session_id())
  {
    session_start();
  }

  // if (!isset($_POST['deg']) || $_POST['deg'] == 'none' || !isset($_POST['cou']) || $_POST['cou'] == 'none' || !isset($_POST['uni']) || $_POST['uni'] == 'none' || !isset($_POST['dep']) || $_POST['dep'] == 'none') {

  // still need to figure out files
  if (!isset($_POST['deg']) || $_POST['deg'] == 'none' || !isset($_POST['dep']) || $_POST['dep'] == 'none' || $_FILES['IDfile']['name'] == "" || $_FILES['degreefile']['name'] == "" || $_FILES['courses']['name'] == "") {
    ?>
      <script type="text/javascript">
        window.location = "../User/template/pages/form/form.php";
        alert("Όλα τα πεδία είναι απαραίτητα για την υποβολή της αίτησης!");
      </script>
    <?php
  }

  //connect to db
  $conn = new mysqli($hn,$un,$dp,$db);

  if($conn->connect_error) die($conn->connect_error);

  $id = intval($_SESSION['id']);
  $degree = $_POST['deg'];
  $department = intval($_POST['dep']);
  $filename = $_FILES['IDfile']['name'] . "-" . rand(1000,10000);
  $tempName = $_FILES['IDfile']['tmp_name'];
  $path = "../files/" . $filename;
  $filename1 = $_FILES['degreefile']['name'] . "-" . rand(1000,10000);
  $tempName1 = $_FILES['degreefile']['tmp_name'];
  $path1 = "../files/" . $filename1;
  $filename2 = $_FILES['courses']['name'] . "-" . rand(1000,10000);
  $tempName2 = $_FILES['courses']['tmp_name'];
  $path2 = "../files/" . $filename2;



  if(isset($_GET['ID']))
  {
    $formID = intval($_GET['ID']);
    $query = "DELETE FROM forms WHERE ID=$formID";
    $result = $conn->query($query);
    // check if query failed
    if(!$result)  die($conn->error);

    $query = "INSERT INTO forms (ID,eduLevel, status, userID, foreignDeptID,identification,diploma,certificate) VALUES ($formID,'$degree', 'waiting', $id, $department,'$filename','$filename1','$filename2')";
    $result = $conn->query($query);
    if(!$result)  die($conn->error); 

    move_uploaded_file($tempName,$path);

    move_uploaded_file($tempName1,$path1);

    move_uploaded_file($tempName2,$path2);

  
  }else{
    $query = "INSERT INTO forms (ID,eduLevel, status, userID, foreignDeptID,identification,diploma,certificate) VALUES ($formID,'$degree', 'waiting', $id, $department,'$filename','$filename1','$filename2')";
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
