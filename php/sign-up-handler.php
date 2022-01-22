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

  if(isset($_POST))
    {
      //set form variables
      $first_name = $_POST["first_name"];
      $last_name = $_POST["last_name"];
      $address = $_POST["address"];
      $gender = $_POST["gender"];
      $day = (int) $_POST["day"];
      $month = (int) $_POST["month"];
      $year = (int) $_POST["year"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];
      $username = $_POST["username"];
      $password = $_POST["password"];
      $password2 = $_POST["password2"];
      $isAdmin = 0;

      //check if passwords matches
      if($password != $password2)
      {
?>
        <script type="text/javascript">
          window.location = "../connect/sign-up.html";
          alert("Οι κωδικοί δεν ταιριάζουν");
        </script>
    <?php
        exit();
      }
      //create query to check if username exists
      $query = "SELECT * FROM `users` WHERE username='$username'";

      $result = $conn->query($query);
      //check if query failed
      if(!$result) die($conn->error);

      $rows = $result->num_rows;

      //check if username already exists in db
      if($rows)
      {
    ?>
        <script type="text/javascript">
          window.location = "../connect/sign-up.html";
          alert("Το όνομα χρήστη υπάρχει ήδη");
        </script>
    <?php
      }
      //free result
      $result -> free_result();
      //insert new user into db
      $query = "INSERT INTO `users` (firstName,lastName,address,gender,birthDay,birthMonth,birthYear,email,phone,username,password,isAdmin) Values" .
        "( '$first_name', '$last_name' , '$address' , '$gender' , '$day' , '$month' , '$year' , '$email' , '$phone', '$username' , '$password' , '$isAdmin')";
      $result = $conn->query($query);
      //check if query failed
      if(!$result)  die($conn->error);

      //get id
      $query = "SELECT `ID` FROM `users` WHERE username='$username'";

      $result = $conn->query($query);

      if(!$result) die($conn->error);

      //get the row
      $result->data_seek(0);

      //set session vars
      $_SESSION['id'] = $result->fetch_assoc() ['ID'];
      $_SESSION['username'] = $username;
			?>
				<script type="text/javascript">
					window.location = "../User/template/pages/form/form.php";
				</script>
			<?php
      //close connection
			$conn -> close();
    }
?>
