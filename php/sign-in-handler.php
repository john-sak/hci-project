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

  if(isset($_POST['username']) and isset($_POST['password']))
  {
    //assign post values
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);
    if(!$result) die($conn->error);

    //get rows affected
    $rows = $result->num_rows;

    if($rows == 1)
    {
      //get the row
      $row = $result->fetch_row();

      //set session vars
      $_SESSION['id'] = $row[0];
      $_SESSION['fName'] = $row[1];
      $_SESSION['lName'] = $row[2];
      $_SESSION['address'] = $row[3];
      $_SESSION['gender'] = $row[4];
      $_SESSION['bDay'] = $row[5];
      $_SESSION['bMonth'] = $row[6];
      $_SESSION['bYear'] = $row[7];
      $_SESSION['email'] = $row[8];
      $_SESSION['phone'] = $row[9];
      $_SESSION['username'] = $username;
      $_SESSION['passowrd'] = $password;
      $_SESSION['admin'] = $row[12];
			if(isset($_POST['register']) and isset($_SESSION['id']))
			{
        if($_SESSION['admin'] == 1)
        {
?>
          <script type="text/javascript">
            window.location = "../User/template/pages/admin-application/admin-application.php";
          </script>
        <?php
        }
			  ?>
				<script type="text/javascript">
					window.location = "../User/template/pages/form/form.php";
				</script>
			<?php
			}

    }

    //if there are no rows exit
    else
    {
      ?>
      <script type="text/javascript">
        window.location = "../connect/sign-in.html";
        alert("Λάθος όνομα χρήστη ή κωδικός");
      </script>
  <?php

    }
    //close connection
    $conn->close();
  }
?>
