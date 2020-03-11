<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/sliceofthemoon/lib/db_connector.php";

//*****************************************************
$num=$id=$subject=$content=$day=$hit="";
$mode="insert";
$disabled="";
//*****************************************************
$id= $_SESSION['userid'];

if (empty($_GET['page'])) {
    $page=1;
} else {
    $page=$_GET['page'];
}

// 수정글쓰기, 답변글쓰기, New글쓰기 세부분으로 분류했음
if((isset($_GET["mode"])&&$_GET["mode"]=="update")
  ||(isset($_GET["mode"])&&$_GET["mode"]=="response") ){

    $mode=$_GET["mode"];//$mode="update"or"response"
    $num = test_input($_GET["num"]);
    $q_num = mysqli_real_escape_string($conn, $num);

    //update 이면 해당된글, response이면 부모의 해당된글을 가져옴.
    $sql="SELECT * from `qna` where num ='$q_num';";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);

    $id=$row['id'];
    $subject= htmlspecialchars($row['subject']);
    $content= htmlspecialchars($row['content']);
    $subject=str_replace("\n", "<br>",$subject);
    $subject=str_replace(" ", "&nbsp;",$subject);
    $content=str_replace("\n", "<br>",$content);
    $content=str_replace(" ", "&nbsp;",$content);
    $day=$row['regist_day'];

    $hit=$row['hit'];
    if($mode == "response"){
      $subject="[re]".$subject;
      $content="[re]".$content;
      $content=str_replace("<br>", "<br>▶",$content);
      $disabled="disabled";
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/qna_css.css">
    <!-- <script type="text/javascript" src="../js/member_form.js"></script>  -->
    <title></title>
  </head>
  <body>
    <header>
      <?php include "header.php" ?>
    </header>
    <section>
      <div id="write_edit_form_div_main">
        <div id="qna_title">
          <h3>예약 문의 / Q&A</h3>
        </div>
         <form name="board_form" action="dml_board.php?mode=<?=$mode?>" method="post">
          <input type="hidden" name="num" value="<?=$num?>">
          <input type="hidden" name="hit" value="<?=$hit?>">
          <div id="write_form">
              <div id="write_row1">
                아이디&nbsp;&nbsp; <input type="text" value="<?=$id?>" readonly>
              </div>
              <div id="write_row2">
                제&nbsp;&nbsp;목&nbsp;&nbsp; <input type="text" name="subject" value="<?=$subject?>">
              </div><!--end of write_row2  -->
              <div id="write_row3">
                내&nbsp;&nbsp;용 <br>
                <textarea name="content" rows="15" cols="116"><?=$content?></textarea>
              </div><!--end of write_row3  -->
              <div class="write_line"></div>
            </div><!--end of write_form  -->

            <div id="write_button">
              <!-- 완료버튼 및 목록버튼 -->
              <input type="submit" value=" 완료 ">
              <input type="button" onclick="location.href='qna_list.php?page=<?=$page?>'" value=" 목록 ">
            </div><!--end of write_button-->
         </form>
      </div><!--end of content -->
    </section>


  </body>
</html>
