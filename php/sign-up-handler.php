<?php
require_once('db-credentials.php');
if (isset($_POST['register'])) {
  if (!isset($_POST['first_name']) || !isset($_POST['last_name']) || !isset($_POST['address']) || !isset($_POST['gender']) || !isset($_POST['day']) || !isset($_POST['month']) || !isset($_POST['year']) || !isset($_POST['email']) || !isset($_POST['phone']) || !isset($_POST['username']) || !isset($_POST['password'])) {
    echo "All field are required.";
    die();
  }
  $firstName = $_POST['first_name'];
  $lastName = $_POST['last_name'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $bDay = $_POST['day'];
  $bMonth = $_POST['month'];
  $bYear = $_POST['year'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  // $admin = 0;
  $conn = new mysqli($hn, $un, $dp, $dn);
  if ($conn->connect_error) {
      die('Could not connect to the database.');
      die();
  }
  $Select = "SELECT email FROM users WHERE email = ? LIMIT 1";
  $Insert = "INSERT INTO users (firstName, lastName, address, gender, birthDay, birthMonth, birthYear, email, phone, username, password, isAdmin) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($Select);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($resultEmail);
  $stmt->store_result();
  $stmt->fetch();
  $rnum = $stmt->num_rows;
  if ($rnum == 0) {
      $stmt->close();
      $stmt = $conn->prepare($Insert);
      $stmt->bind_param("ssssiiissssi", $firstName, $lastName, $address, $gender, $bDay, $bMonth, $bYear, $email, $phone, $username, $password, $admin);
      if ($stmt->execute()) {
          echo "New record inserted sucessfully.";
      }
      else {
          echo $stmt->error;
      }
  }
  else {
      echo "Someone is already registered using this email.";
  }
  $stmt->close();
  $conn->close();
}
?>
