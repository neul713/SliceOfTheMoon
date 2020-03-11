<?php
@session_start();
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
} else {
    $userid = "";
}

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} else {
    $username = "";
}

if (isset($_SESSION["userpoint"])) {
    $userpoint = $_SESSION["userpoint"];
} else {
    $userpoint = "";
}
 ?>

 <div id="top">
   <a href="index.php"><img id="main_image" src="./img/main.jpg"></a>
   <ul id="top_menu">
     <?php
     if (!$userid) {
         ?>
      <li> <a href="member_form.php">SIGN UP</a> </li>
      <li> | </li>
      <li> <a href="./login_form.php">LOGIN</a> </li>
<?php
     } else {
         $logged = $username."(".$userid.")님[Point:".$userpoint."]";
?>

 <li><?=$logged?></li>
 <li> | </li>
 <li> <a href="logout.php">LOGOUT</a> </li>
 <li> | </li>
 <li> <a href="member_modify_form.php">정보 수정</a> </li>

<?php
     }
 ?>
 <?php
 if ($userid=="admin") {
     ?>
  <li> | </li>
  <li> <a href="admin.php">관리자 모드</a> </li>
  <?php
 }
   ?>
 </ul>
</div>
<div id="menu_bar">
  <ul>
    <li> <a href="about.php">ABOUT</a> </li>
    <li> <a href="notice_list.php">NOTICE</a> </li>
    <li> <a href="menu.php">MENU</a> </li>
    <li> <a href="qna_list.php">RESERVATION & QNA</a> </li>
    <li> <a href="review_list.php">REVIEW</a> </li>
  </ul>
</div>
