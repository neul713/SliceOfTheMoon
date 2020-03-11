<?php
include $_SERVER['DOCUMENT_ROOT']."./sliceofthemoon/lib/db_connector.php";

  $id   = $_POST["id"];
  $password = $_POST["password"];
  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

	$sql = "insert into members(id, password, name, phone, regist_day, point) ";
	$sql .= "values('$id', '$password', '$name', '$phone', '$regist_day', 0)";

	mysqli_query($conn, $sql);  // $sql 에 저장된 명령 실행
  mysqli_close($conn);

    echo "
      <script>
          location.href = 'index.php';
      </script>
	  ";
?>
