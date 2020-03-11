<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/sliceofthemoon/lib/db_connector.php";

//*****************************************************
$num=$id=$subject=$content=$day=$hit="";
//*****************************************************

if (empty($_GET['page'])) {
    $page=1;
} else {
    $page=$_GET['page'];
}

if (isset($_GET["num"])&&!empty($_GET["num"])) {
    $num = test_input($_GET["num"]);
    $hit = test_input($_GET["hit"]);
    $q_num = mysqli_real_escape_string($conn, $num);

    $sql="UPDATE `review` SET `hit`=$hit WHERE `num`=$q_num;";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }

    $sql="SELECT * from `review` where num ='$q_num';";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);
    $id=$row['id'];
    $subject= htmlspecialchars($row['subject']);
    $content= htmlspecialchars($row['content']);
    $subject=str_replace("\n", "<br>", $subject);
    $subject=str_replace(" ", "&nbsp;", $subject);
    $content=str_replace("\n", "<br>", $content);
    $content=str_replace(" ", "&nbsp;", $content);
    $day=$row['regist_day'];
    $hit=$row['hit'];
    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/review_css.css">
    <script type="text/javascript">
    function check_delete(num) {
      var result=confirm("삭제하시겠습니까?\n Either OK or Cancel.");
      if(result){
            window.location.href='./dml_board_review.php?mode=delete&num='+num;
      }
    }
    </script>
    <title></title>
  </head>
  <body>
    <header>
      <?php include "header.php" ?>
    </header>
    <section>
      <div id="review_view_div_main">
        <div id="review_title">
          <h3>후기 : 매달 후기를 남겨주신 분을 추첨하여 할인 쿠폰을 드립니다 ^0^</h3>
        </div>  <!-- end of review_title -->
        <div id="write_form">
          <div id="write_row1">
            아이디&nbsp;&nbsp; <input type="text" value="<?=$id?>" readonly>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            조회 : <?=$hit?> &nbsp;&nbsp;&nbsp; 입력날짜: <?=$day?>
          </div><!--end of write_row1  -->
          <div id="write_row2">
            제&nbsp;&nbsp;목&nbsp;&nbsp; <input type="text" name="subject" value="<?=$subject?>" readonly>
          </div><!--end of write_row2  -->
          <div id="write_row3">
            내&nbsp;&nbsp;용 <br>
            <textarea name="content" rows="15" cols="116" readonly><?=$content?></textarea>
          </div><!--end of write_row3  -->
        </div> <!-- end of write_form -->
        <div id="write_button">
        <!--목록보기 -->
        <input type="button" onclick="location.href='review_list.php?page=<?=$page?>'" value=" 목록 ">
        <?php
        //세션값이 존재하면 수정기능과 삭제기능부여하기
        if (isset($_SESSION['userid'])) {
            if ($_SESSION['userid']=="admin" || $_SESSION['userid']==$id) {
        ?>
        <input type="button" onclick="location.href='write_edit_form_review.php?mode=update&num=<?=$num?>'" value=" 수정 ">
        <input type="button" onclick="check_delete(<?=$num?>)" value=" 샥제 ">
        <?php
            }
        ?>
        <?php
          // 세션값이 존재하면 답변기능과 글쓰기 기능부여하기
          if (!empty($_SESSION['userid']) && $_SESSION['userid'] === "admin") {
        ?>
        <input type="button" onclick="location.href='write_edit_form_review.php?mode=response&num=<?=$num?>'" value=" 답변 ">
        <input type="button" onclick="location.href='write_edit_form_review.php'" value=" 글쓰기 ">
        <?php
          }
        }
        ?>
        </div><!--end of write_button  -->
      </div><!--end of review_view_div_main  -->
    </section>
    <footer>
      <?php include "footer.php" ?>
    </footer>
  </body>
</html>
