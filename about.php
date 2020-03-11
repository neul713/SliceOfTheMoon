<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" type="text/css" href="./css/common.css">
  <link rel="stylesheet" type="text/css" href="./css/about_css.css">
</head>

<body>
  <header>
    <?php include "header.php" ?>
  </header>
  <section>
    <div id="about_div_main">
      <div id="about_div_map">
              <!-- * 카카오맵 - 지도퍼가기 -->
        <!-- 1. 지도 노드 -->
        <div id="daumRoughmapContainer1581402923508" class="root_daum_roughmap root_daum_roughmap_landing"></div>

        <!--
          2. 설치 스크립트
          * 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다.
        -->
        <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

        <!-- 3. 실행 스크립트 -->
        <script charset="UTF-8">
          new daum.roughmap.Lander({
            "timestamp" : "1581402923508",
            "key" : "wyrd",
            "mapWidth" : "640",
            "mapHeight" : "360"
          }).render();
        </script>
      </div>

      <div id="about_div_adress">
        <p id="shop_name">SLICE OF THE MOON</p>
        <p>서울 마포구 토정로3길 19 1층 (지번) 합정동 370-1</p>
        <p>02-323-3141</p>
        <p>월,화,수,목,일 15:00 ~ 23:00 금,토 15:00 ~ 24:00</p>
      </div>
    </div>

  </section>
  <footer>
    	<?php include "footer.php";?>
    </footer>
</body>

</html>
