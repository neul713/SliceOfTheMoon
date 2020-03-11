<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="./js/check_id.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">

<script>
   function check_input() {
     var pwdCheck = /^(?=.*[a-zA-Z])((?=.*\d)|(?=.*\W)).{6,20}$/;
     var nameCheck = /^[a-zA-Z가-힣]{1}[a-zA-Z가-힣\x20]{1,7}$/;

      if (!document.member_form.password.value) {
          alert("비밀번호를 입력하세요!");
          document.member_form.password.focus();
          return;
      } else if (document.member_form.password.value.match(pwdCheck)) {

      } else {
        alert("비밀번호는 6~20자리의 영문 대소문자와 1개 이상의 숫자 혹은 특수문자를 사용하셔야합니다.");
        return;
      }

      if (!document.member_form.password_confirm.value) {
          alert("비밀번호확인을 입력하세요!");
          document.member_form.password_confirm.focus();
          return;
      }

      if (document.member_form.password.value !==
            document.member_form.password_confirm.value) {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
          document.member_form.password_confirm.focus();
          return;
      }

      if (!document.member_form.name.value) {
          alert("이름을 입력하세요!");
          document.member_form.name.focus();
          return;
      } else if (document.member_form.name.value.match(nameCheck)) {

      } else {
        alert("이름은 2~8자리의 한글과 영문 대소문자만 가능합니다.");
        return;
      }

      document.member_form.submit();
   }

   function reset_form() {
      document.member_form.id.value = "";
      document.member_form.password.value = "";
      document.member_form.password_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.id.focus();
      return;
   }

</script>
</head>
<body>
	<header>
    	<?php include "header.php";?>
  </header>
	<section>
        <div id="main_content">
      		<div id="join_box">
          	<form name="member_form" method="post" action="member_insert.php">
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<input type="text" name="id" id="inputId">
              <p id="idSubMsg"></p>
				        </div>
			       	</div>
			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="password">
				        </div>
			       	</div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="password_confirm">
				        </div>
			       	</div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name">
				        </div>
			       	</div>
              <div class="form">
                <div class="col1">전화번호</div>
                <div class="col2">
              <input type="number" name="phone" placeholder=" - 없이 입력해주세요.">
                </div>
              </div>
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
                <input type="button" onclick="check_input()" value=" 가입 ">
                <input type="button" onclick="reset_form()" value=" 취소 ">
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
