<?php
    session_start();

    include $_SERVER['DOCUMENT_ROOT']."/sliceofthemoon/lib/db_connector.php";

    $id   = $_GET["id"];

    $sql = "delete from members where id = '$id'";
    mysqli_query($conn, $sql);

    mysqli_close($conn);

    echo "
	     <script>
	         location.href = 'admin.php';
	     </script>
	   ";
?>
