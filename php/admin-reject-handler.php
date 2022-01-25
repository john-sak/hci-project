<?php
    require_once('db-credentials.php');

    //start session if not started alreary
    if(!session_id())
    {
        session_start();
    }
    if (!isset($_POST['reason'])) {
        ?>
        <script type="text/javascript">
            window.location = "../User/template/pages/admin-application/admin-application.php";
            alert("Όλα τα πεδία είναι απαραίτητα για την έγκριση της αίτησης!");
        </script>
        <?php
        exit();
    }
    //connect to db
    $conn = new mysqli($hn,$un,$dp,$db);

    if($conn->connect_error) die($conn->connect_error);

    $reason = $_POST['reason'];
    $ID = intval($_POST['id']);

    $query = "UPDATE forms SET status='rejected' , rejectReason='$reason' WHERE ID=$ID";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    ?>
    <script type="text/javascript">
        window.location = "../User/template/pages/admin-application/admin-application.php";
        alert("Η αίτηση απορρίφθηκε !");
    </script>
    <?php
    $conn -> close();
?>
