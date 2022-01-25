<?php
    require_once('db-credentials.php');
    //start session if not started alreary
    if(!session_id())
    {
        session_start();
    }

    $formID = intval($_GET['ID']);

    $conn = new mysqli($hn,$un,$dp,$db);

    if($conn->connect_error) die($conn->connect_error);

    $query = "DELETE FROM `forms` WHERE ID=$formID";

    $result = $conn->query($query);

    // check if query failed
    if(!$result)  die($conn->error);

    ?>
    <script type="text/javascript">
        window.location = "../User/template/pages/user-application/user-application.php"
        alert("Η αίτηση διαγράφηκε επιτυχώς!");
    </script>
    <?php


    $conn -> close();
?>