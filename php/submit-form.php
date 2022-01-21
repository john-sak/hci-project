<?php
  require_once('db-credentials.php');

  //start session if not started alreary
  if(!session_id())
  {
    session_start();
  }

  // if (!isset($_POST['deg']) || $_POST['deg'] == 'none' || !isset($_POST['cou']) || $_POST['cou'] == 'none' || !isset($_POST['uni']) || $_POST['uni'] == 'none' || !isset($_POST['dep']) || $_POST['dep'] == 'none') {

  // still need to figure out files
  if (!isset($_POST['deg']) || $_POST['deg'] == 'none' || !isset($_POST['dep']) || $_POST['dep'] == 'none') {
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

  $query = "INSERT INTO forms (eduLevel, status, userID, foreignDeptID) VALUES ('$degree', 'waiting', $id, $department)";
  $result = $conn->query($query);

  // check if query failed
  if(!$result)  die($conn->error);
  ?>
    <script type="text/javascript">
      window.location = "../User/template/pages/user-application/user-application.php"
      alert("Η αίτηση καταχωρήθηκε επιτυχώς!");
    </script>
  <?php
	$conn -> close();
?>
