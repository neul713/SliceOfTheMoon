<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css/common_slide.css">
  </head>
  <body>
    <div class="slideshow">
      <div id="slideshow_img">
        <a href="#"><img src="./img/slice.jpg" alt="슬라이스오브더문1"></a>
        <a href="#"><img src="./img/slice2.png" alt="슬라이스오브더문2"></a>
        <a href="#"><img src="./img/slice3.png" alt="슬라이스오브더문3"></a>
        <a href="#"><img src="./img/pizza.jpg" alt="슬라이스오브더문4"></a>
      </div>
      <div id="slideshow_nav">
        <a href="#" class="prev">prev</a>
        <a href="#" class="next">next</a>
      </div>
      <div id="slideshow_indi">
        <a href="#">&nbsp;&nbsp;</a>
        <a href="#">&nbsp;&nbsp;</a>
        <a href="#">&nbsp;&nbsp;</a>
        <a href="#">&nbsp;&nbsp;</a>
      </div>
    </div>
    <!-- <div id="main_content">
      <div id="latest">
        <h4>최근 게시글</h4>
        <ul>
          <?php
          $con = mysqli_connect("localhost", "root", "123456789", "haneul");
          $sql = "select * from board order by num desc limit 5";
          $result = mysqli_query($con, $sql);

          if (!$result) {
              echo "게시판 DB 테이블이 생성 전이거나 아직 게시글이 없습니다!";
          } else {
              while ($row = mysqli_fetch_array($result)) {
                  $regist_day = substr($row["regist_day"], 0, 10); ?>
           <li>
             <span><?=$row["subject"]?></span>
             <span><?=$row["name"]?></span>
             <span><?=$regist_day?></span>
           </li>
           <?php
              }
          }
            ?>
      </div>
      <div id="point_rank">
        <h4>포인트 랭킹</h4>
        <ul>
          <?php
          $rank = 1;
          $sql = "select * from members order by point desc limit 5";
          $result = mysqli_query($con, $sql);

          if (!$result) {
              echo "회원 DB 테이블이 생성 전이거나 아직 가입된 회원이 없습니다!";
          } else {
              while ($row = mysqli_fetch_array($result)) {
                  $name = $row["name"];
                  $id = $row["id"];
                  $point = $row["point"];
                  $name = mb_substr($name, 0, 1)." * ".mb_substr($name, 2, 1); ?>
           <li>
             <span><?=$rank?></span>
             <span><?=$name?></span>
             <span><?=$id?></span>
             <span><?=$point?></span>
           </li>
           <?php
           $rank++;
              }
          }
       mysqli_close($con);
            ?>
          </ul>
        </div>
      </div>

    </div> -->

  </body>
</html>
