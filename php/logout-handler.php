<?php
    if(!session_id())
    {
        session_start();
    }

    session_destroy();
?>
<script type="text/javascript">
    window.location = "../index.php";
</script>
