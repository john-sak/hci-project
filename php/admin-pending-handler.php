<?php
    require_once('db-credentials.php');

    //start session if not started alreary
    if(!session_id())
    {
        session_start();
    }

    $conn = new mysqli($hn,$un,$dp,$db);

    if($conn->connect_error) die($conn->connect_error);

    $courses = [];
    
    $id = intval($_POST['id']);

    foreach ($_POST as $key => $course) {
        if($key == 'id' OR $key == 'status') continue;
        $intcourse = intval($course);
        array_push($courses,$intcourse);
    }
    
    foreach ($courses as $course) {
        $query = "INSERT INTO form_has_courses (formID,courseID) VALUES ('$id','$course')";
        $result = $conn->query($query);
        if (!$result) die($conn->error);
    }
    $query = "UPDATE forms SET status='pending' WHERE ID=$id";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    ?>
    <script type="text/javascript">
        window.location = "../User/template/pages/admin-application/admin-application.php";
        alert("Η αίτηση είναι σε εκκρεμότητα!");
    </script>
    <?php

    $conn->close();
?>