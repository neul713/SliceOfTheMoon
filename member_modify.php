<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."./sliceofthemoon/lib/db_connector.php";
    $id = $_GET["id"];

    $password = $_POST["password"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];

    $sql = "update members set password='$password', name='$name' , phone='$phone'";
    $sql .= " where id='$id'";

    mysqli_query($conn, $sql);

    $sql2 = "select name from members where id='$id'";
    $result = mysqli_query($conn, $sql2);
    $record = mysqli_fetch_array($result);

    mysqli_close($conn);

    $_SESSION["username"] = $record["name"];

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>
