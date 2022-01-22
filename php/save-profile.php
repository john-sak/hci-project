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

  $id = intval($_SESSION['id']);

  // if (isset($_POST['name'])) {
  //   if ($_POST['name'] == '') {
      ?>
        <!-- <script type="text/javascript">
          window.location = "../User/template/pages/profile/profile.php";
          alert("Μη επιτρεπτή τιμή!");
        </script> -->
      <?php
  //   } else {
  //     $fName = $_POST['name'];
  //     $query = "UPDATE users SET firstName = '$fName' WHERE ID = $id";
  //     $result = $conn->query($query);
  //     if (!$result) die($conn->error);
  //   }
  // }
  if (isset($_POST['name']) && $_POST['name'] != '') {
    $fName = $_POST['name'];
    $query = "UPDATE users SET firstName = '$fName' WHERE ID = $id";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    $_SESSION['fName'] = $fName;
  }

  if (isset($_POST['lname']) && $_POST['lname'] != '') {
    $lName = $_POST['lname'];
    $query = "UPDATE users SET lastName = '$lName' WHERE ID = $id";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    $_SESSION['lName'] = $fName;
  }

  if (isset($_POST['gender']) && $_POST['gender'] != 'none') {
    $gender = $_POST['gender'];
    $query = "UPDATE users SET gender = '$gender' WHERE ID = $id";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    $_SESSION['gender'] = $gender;
  }

  if (isset($_POST['bday'])) {
    $date = explode("-", $_POST['bday']);
    $bDay = intval($date[2]);
    $bMonth = intval($date[1]);
    $bYear = intval($date[0]);
    $query = "UPDATE users SET birthDay = $bDay, birthMonth = $bMonth, birthYear = $bYear WHERE ID = $id";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    $_SESSION['bDay'] = $date[2];
    $_SESSION['bMonth'] = $date[1];
    $_SESSION['bYear'] = $date[0];
  }

  if (isset($_POST['address']) && $_POST['address'] != '') {
    $address = $_POST['address'];
    $query = "UPDATE users SET address = '$address' WHERE ID = $id";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    $_SESSION['address'] = $addres;
  }

  if (isset($_POST['email']) && $_POST['email'] != '') {
    $email = $_POST['email'];
    $query = "UPDATE users SET email = '$email' WHERE ID = $id";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    $_SESSION['email'] = $email;
  }

  if (isset($_POST['phone']) && $_POST['phone'] != '') {
    $phone = $_POST['phone'];
    $query = "UPDATE users SET phone = '$phone' WHERE ID = $id";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    $_SESSION['phone'] = $phone;
  }
  $conn->close();

  ?>
  <script type="text/javascript">
    window.location = "../User/template/pages/profile/profile.php"
    alert("Οι αλλαγές αποθηκεύτηκαν επιτυχώς!");
  </script>
