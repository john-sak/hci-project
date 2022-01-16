<?php
  require_once('db-credentials.php');
  //connect to db
  $conn = new mysqli($hn,$un,"",$db);

  if($conn->connect_error) die($conn->connect_error);
  //create session
  session_start();
  if(isset($_POST['username']) and isset($_POST['password']))
  {
    //assign post values
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
    $result = $conn->query($query);
    if(!$result) die($conn->error);

    //get rows affected
    $rows = $result->num_rows;

    if($rows == 1)
    {
      //get the row
      $result->data_seek(0);
      $_SESSION['id'] = $result->fetch_assoc() ['id'];
      $_SESSION['username'] = $username;
			if(isset($_POST['register']) and isset($_SESSION['id']))
			{ 
			?>
				<script type="text/javascript">
					window.location = "../User/template/pages/form/form.html";
				</script>
			<?php
			}

    }

    //if there are no rows destroy session and exit
    else 
    { 
      session_destroy(); 
      ?>
      <script type="text/javascript">
        window.location = "../connect/sign-in.html";
      </script>
  <?php

    }
  }
?>