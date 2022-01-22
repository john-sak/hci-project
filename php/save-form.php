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
    $degree = null;
  }
  if (isset($_POST['dep']) && $_POST['dep'] != 'none') {
    $department = intval($_POST['dep']);
  } else {
    $degree = null;
  }

  $id = intval($_SESSION['id']);

  if(isset($_GET['ID']))
  {
    $formID = intval($_GET['ID']);
    $query = "DELETE FROM forms WHERE ID=$formID";
    $result = $conn->query($query);
    // check if query failed
    if(!$result)  die($conn->error);  
  }

  $query = "INSERT INTO forms (eduLevel, status, userID, foreignDeptID) VALUES ('$degree', 'saved', $id, $department)";
  $result = $conn->query($query);
  // check if query failed
  if(!$result)  die($conn->error);
  ?>
  <script type="text/javascript">
    window.location = "../User/template/pages/user-application/user-application.php"
    alert("Η αίτηση αποθηκεύτηκε επιτυχώς!");
  </script>
  <?php
	$conn -> close();
?>
