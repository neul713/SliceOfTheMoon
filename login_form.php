<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="./css/common.css">
  <link rel="stylesheet" href="./css/login.css">
  <script type="text/javascript">
    function login() {
      var id = document.getElementById("input_id").value;
      var pwd = document.getElementById("input_pwd").value;

      if(!id) {
        alert("아이디를 입력하세요.");
        id.focus();
        return;
      }

      if(!pwd) {
        alert("비밀번호를 입력하세요.");
        pwd.focus();
        return;
      }
      document.form_name.submit();
    }
  </script>
</head>

<body>
  <header>
    <?php include "header.php" ?>
  </header>
  <section>
      <div id="login_div_main">
          <div id="login_div_input">
            <div id="login_div_input_one">
              <form name="form_name" action="login.php" method="post">
                <span id="span-id">아이디</span> <input type="text" id="input_id" name="id"> <br>
                <span id="span-pwd">비밀번호</span> <input type="password" id="input_pwd" name="password">
              </form>
            </div>
            <div id="login_div_input_two">
              <input type="button" value="LOGIN" onclick="login();">
            </div>
          </div>
      </div>
  </section>
  <footer>
    	<?php include "footer.php";?>
    </footer>
</body>

</html>
