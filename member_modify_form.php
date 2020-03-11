<?php include $_SERVER['DOCUMENT_ROOT']."/sliceofthemoon/lib/db_connector.php"; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="./css/common.css">
  <link rel="stylesheet" type="text/css" href="./css/member.css">

  <script type="text/javascript">
  function check_input() {
    var pwdCheck = /^(?=.*[a-zA-Z])((?=.*\d)|(?=.*\W)).{6,20}$/;
    var nameCheck = /^[a-zA-Z가-힣]{1}[a-zA-Z가-힣\x20]{1,7}$/;

     if (!document.form_name.password.value) {
         alert("비밀번호를 입력하세요!");
         document.form_name.password.focus();
         return;
     } else if (document.form_name.password.value.match(pwdCheck)) {

     } else {
       alert("비밀번호는 6~20자리의 영문 대소문자와 1개 이상의 숫자 혹은 특수문자를 사용하셔야합니다.");
       return;
     }

     if (!document.form_name.password_confirm.value) {
         alert("비밀번호확인을 입력하세요!");
         document.form_name.password_confirm.focus();
         return;
     }

     if (document.form_name.password.value !==
           document.form_name.password_confirm.value) {
         alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
         document.form_name.password_confirm.focus();
         return;
     }

     if (!document.form_name.name.value) {
         alert("이름을 입력하세요!");
         document.form_name.name.focus();
         return;
     } else if (document.form_name.name.value.match(nameCheck)) {

     } else {
       alert("이름은 2~8자리의 한글과 영문 대소문자만 가능합니다.");
       return;
     }

     document.form_name.submit();
  }
  </script>
</head>

<body>
  <header>
    <?php include "header.php";?>
  </header>
  <?php
      $sql    = "select * from members where id='$userid'";
      $result = mysqli_query($conn, $sql);
      $row    = mysqli_fetch_array($result);

      $password = $row["password"];
      $name = $row["name"];
      $phone = $row["phone"]

      //mysqli_close($conn);
  ?>
  <section>
    <div id="main_content">
      <div id="join_box">
        <form name="form_name" method="post" action="member_modify.php?id=<?=$userid?>">
          <div class="form id">
            <div class="col1">아이디</div>
            <div class="col2">
            <input type="text" id="inputId" name="id" value="<?=$userid?>" readonly>
            </div>
          </div>
          <div class="form">
            <div class="col1">비밀번호</div>
            <div class="col2">
          <input type="password" name="password" value="<?=$password?>">
            </div>
          </div>
          <div class="form">
            <div class="col1">비밀번호 확인</div>
            <div class="col2">
          <input type="password" name="password_confirm" value="<?=$password?>">
            </div>
          </div>
          <div class="form">
            <div class="col1">이름</div>
            <div class="col2">
          <input type="text" name="name" value="<?=$name?>">
            </div>
          </div>
          <div class="form">
            <div class="col1">전화번호</div>
            <div class="col2">
          <input type="number" name="phone" value="<?=$phone?>">
            </div>
          </div>
          <div class="bottom_line"> </div>
          <div class="buttons">
            <input type="button" onclick="check_input()" value=" 수정완료 ">
            </div>
        </form>
      </div> <!-- join_box -->
    </div> <!-- main_content -->
  </section>
<footer>
  <?php include "footer.php";?>
</footer>

</body>

</html>
