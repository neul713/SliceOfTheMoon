<?php
if (!isset($_SESSION)) {
  session_start();
}
include $_SERVER['DOCUMENT_ROOT']."/sliceofthemoon/lib/db_connector.php";
include $_SERVER['DOCUMENT_ROOT']."/sliceofthemoon/lib/create_table.php";
//테이블 생성 불러줘야해
create_table($conn, "members");
create_table($conn, "qna");
create_table($conn, "review");
create_table($conn, "notice");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SLICE OF THE MOON</title>
    <link rel="stylesheet" href="./css/common.css">
    <script src="./js/vendor/modernizr.custom.min.js"></script>
    <script src="./js/vendor/jquery-1.10.2.min.js"></script>
    <script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="./js/main.js"></script>
  </head>
  <body>
    <header>
      <?php include "header.php" ?>
    </header>
    <section>
      <?php include "main.php" ?>
    </section>
    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
