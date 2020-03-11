<?php
  include $_SERVER['DOCUMENT_ROOT']."./sliceofthemoon/lib/db_connector.php";

  $id = $_POST["inputId"];


  $sql = "select * from members where id = '$id'";

  $result = mysqli_query($conn, $sql);
  $result_record = mysqli_num_rows($result);

  if($result_record){
    echo "1";
  }else{
    echo "0";
  }

  mysqli_close($conn);

 ?>
