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

    $query = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $result = $conn->query($query);
    if(!$result) die($conn->error);

    //get rows affected
    $rows = $result->num_rows;

    if($rows == 1)
    {
      //get the row
      $result->data_seek(0);

      //set session vars
      $_SESSION['id'] = $result->fetch_assoc() ['ID'];
      $_SESSION['username'] = $username;
      $result->data_seek(0);
      $admin = $result->fetch_assoc() ['isAdmin'];
      $result->data_seek(0);
      $namefromlogin = $result->fetch_assoc() ['fName'];
      $_SESSION['name'] = $namefromlogin;
      if($admin)
        $_SESSION['admin'] = 1;
			if(isset($_POST['register']) and isset($_SESSION['id']))
			{
        if(isset($_SESSION['admin']))
        {
?>
          <script type="text/javascript">
            window.location = "../User/template/pages/admin-application/admin-application.html";
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
    $conn -> close();
  }
?>
