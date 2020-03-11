<?php
    session_start();

    include $_SERVER['DOCUMENT_ROOT']."/sliceofthemoon/lib/db_connector.php";

    $id   = $_GET["id"];
    $point = $_POST["point"];

    $sql = "update members set point=$point where id='$id'";


    mysqli_query($conn, $sql);

    // header('Location: admin.php');
    // exit;

    echo "
	     <script>
	         location.href = 'admin.php';
	     </script>
	   ";
?>
