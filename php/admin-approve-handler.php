<?php
    require_once('db-credentials.php');

    //start session if not started alreary
    if(!session_id())
    {
        session_start();
    }
    if (!isset($_POST['uni']) || $_POST['uni'] == 'none' || !isset($_POST['dep']) || $_POST['dep'] == 'none') {
        ?>
        <script type="text/javascript">
            window.location = "../User/template/pages/admin-approve/admin-approve.php";
            alert("Όλα τα πεδία είναι απαραίτητα για την έγκριση της αίτησης!");
        </script>
        <?php
    }
    //connect to db
    $conn = new mysqli($hn,$un,$dp,$db);

    if($conn->connect_error) die($conn->connect_error);

    $department = intval($_POST['dep']);
    $ID = intval($_POST['id']);

    $query = "UPDATE forms SET greekDeptID=$department,status='accepted' WHERE ID=$ID";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    ?>
    <script type="text/javascript">
        window.location = "../User/template/pages/admin-application/admin-application.php";
        alert("Η αίτηση εγκρίθηκε!");
    </script>
    <?php
    $conn -> close();
?>


