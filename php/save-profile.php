<?php
  require_once('db-credentials.php');

  //start session if not started alreary
  if(!session_id())
  {
    session_start();
  }

  if (!isset($_POST['name']) || $_POST['name'] == '' || !isset($_POST['lname']) || $_POST['lname'] == '' || !isset($_POST['gender']) || $_POST['gender'] == 'none' || !isset($_POST['bday']) || !isset($_POST['address']) || $_POST['address'] == '' || !isset($_POST['email']) || $_POST['email'] == '' || !isset($_POST['phone']) || $_POST['phone'] == '') {
    ?>
      <script type="text/javascript">
        window.location = "../User/template/pages/profile/profile.php";
        alert("Όλα τα πεδία είναι απαραίτητα!");
      </script>
    <?php
  }

  //connect to db
  $conn = new mysqli($hn,$un,$dp,$db);

  if($conn->connect_error) die($conn->connect_error);

  $id = intval($_SESSION['id']);
  $fName = $_POST['name'];
  $lName = $_POST['lname'];
  $gender = $_POST['gender'];
  $bday = $_POST['bday'];
  $bMonth = $_POST['bday'];
  $bYear = $_POST['bday'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $query = "UPDATE users SET firstName = '$fName', lastName = '$lName', address = '$addres', gender = '$gender', birthDay = '$bDay', $bMonth = '$birthMonth', birthYear = '$bYear', email = '$email', phone = '$phone' WHERE ID = $id";
  $result = $conn->query($query);

  // check if query failed
  if(!$result)  die($conn->error);
  ?>
    <script type="text/javascript">
      window.location = "../User/template/pages/profile/profile.php"
      alert("Οι αλλαγές αποθηκεύιηκαν επιτυχώς!");
    </script>
  <?php
	$conn -> close();
?>
