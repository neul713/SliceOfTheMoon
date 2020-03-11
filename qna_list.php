<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/sliceofthemoon/lib/db_connector.php";

define('SCALE', 10);
//*****************************************************
$sql=$result=$total_record=$total_page=$start="";
$row="";
$memo_id=$memo_num=$memo_date=$memo_nick=$memo_content="";
$total_record=0;
//*****************************************************

if (isset($_GET["mode"])&&$_GET["mode"]=="search") {
    //제목, 내용, 아이디
    $find = test_input($_POST["find"]);
    $search = test_input($_POST["search"]);
    $q_search = mysqli_real_escape_string($conn, $search);
    $sql="SELECT * from `qna` where $find like '%$q_search%' order by num desc;";
} else {
    $sql="SELECT * from `qna` order by group_num desc, ord asc;";
}

$result=mysqli_query($conn, $sql);
$total_record=mysqli_num_rows($result);
$total_page=($total_record % SCALE == 0)?($total_record/SCALE):(ceil($total_record/SCALE));

//2.페이지가 없으면 디폴트 페이지 1페이지
if (empty($_GET['page'])) {
    $page=1;
} else {
    $page=$_GET['page'];
}

//3.현재페이지 시작번호계산함.
$start=($page -1) * SCALE;
//4. 리스트에 보여줄 번호를 최근순으로 부여함.
$number = $total_record - $start;
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/qna_css.css">
    <!-- <script type="text/javascript" src="../js/member_form.js"></script> -->
    <title></title>
  </head>
  <body>
    <header>
      <?php include "header.php" ?>
    </header>
    <section>
      <div id="qna_list_div_main">
         <div id="qna_title">
           <h3>예약 문의 / Q&A</h3>
         </div>
         <form name="board_form" action="qna_list.php?mode=search" method="post">
           <div id="list_search">
             <div id="list_search1">총 <?=$total_record?>개의 게시물이 있습니다.</div>
             <div id="list_search2">
               <div id="list_search3">
                 <select  name="find">
                   <option value="subject">제목</option>
                   <option value="content">내용</option>
                   <option value="id">아이디</option>
                 </select>
               </div>
               <div id="list_search4"><input type="text" name="search"></div>
               <div id="list_search5"> <input type="submit" name="" value=" 검색 "> </div>
             </div>
            </div>
         </form>
           <div id="list_top_title">
             <ul>
               <li id="list_title1">번호</li>
               <li id="list_title2">제목</li>
               <li id="list_title3">글쓴이</li>
               <li id="list_title4">등록일</li>
               <li id="list_title5">조회</li>
             </ul>
           </div>

           <div id="list_content">
           <?php
            for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++) {
                mysqli_data_seek($result, $i);
                $row=mysqli_fetch_array($result);
                $num=$row['num'];
                $id=$row['id'];
                $hit=$row['hit'];
                $date= $row['regist_day'];
                $subject=$row['subject'];
                $subject=str_replace("\n", "<br>", $subject);
                $subject=str_replace(" ", "&nbsp;", $subject);
                $depth=(int)$row['depth'];//공간을 몆칸을 띄어야할지 결정하는 숫자임
                $space="";
                for ($j=0;$j<$depth;$j++) {
                    $space="&nbsp;&nbsp;".$space;
                } ?>
              <div id="list_item">
                <div id="list_item1"><?=$number?></div>
                <div id="list_item2">
                    <a href="./qna_view.php?num=<?=$num?>&page=<?=$page?>&hit=<?=$hit+1?>"><?=$space.$subject?></a>
                </div>
                <div id="list_item3"><?=$id?>
                </div>
                <div id="list_item4"><?=$date?></div>
                <div id="list_item5"><?=$hit?></div>
              </div><!--end of list_item -->
              <div id="memo_content"><?=$memo_content?></div>
          <?php
              $number--;
            }//end of for
          ?>

          <div id="page_button">
            <ul id="page_num">
            <?php
              if ($total_page>=2 && $page >=2) {
                  $new_page = $page-1;
                  echo "<li><a href='qna_list.php?page=$new_page'>◀ 이전&nbsp;&nbsp;</a></li>";
              } else {
                  echo "<li>&nbsp;</li>";
              }

              for ($i=1; $i <= $total_page ; $i++) {
                  if ($page == $i) {
                      echo "<li><b> $i </b></li>";
                  } else {
                      echo "<li><a href='qna_list.php?page=$i'> $i </a></li>";
                  }
              }

              if ($total_page>=2 && $page != $total_page) {
                  $new_page = $page+1;
                  echo "<li><a href='qna_list.php?page=$new_page'>&nbsp;&nbsp;다음 ▶</a></li>";
              } else {
                  echo "<li>&nbsp;</li>";
              }
            ?>
            </ul>
          <div id="button">
            <!--목록 버튼  -->
            <input type="button" onclick="location.href='qna_list.php?page=<?=$page?>'" value=" 목록 ">
            <?php
              //세션아디가 있으면 글쓰기 버튼을 보여줌.
              if (!empty($_SESSION['userid'])) {
                  ?>
              <input type="button" onclick="location.href='write_edit_form.php'" value=" 글쓰기 ">
              <?php
              }
              ?>
          </div><!--end of button -->
        </div>
        </div><!--end of list content -->

      </div>
    </section>
    <footer>
      <?php include "footer.php" ?>
    </footer>
  </body>
</html>
