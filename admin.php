<?php
include $_SERVER['DOCUMENT_ROOT']."/sliceofthemoon/lib/db_connector.php";
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/admin.css">
</head>
<body>
<header>
    <?php include "header.php";?>
</header>
<section>
   	<div id="admin_box">
	    <h3 id="member_title">
	    	관리자 모드 > 회원 관리
		</h3>
	    <ul id="member_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">아이디</span>
					<span class="col3">이름</span>
					<span class="col5">포인트</span>
					<span class="col6">가입일</span>
					<span class="col7">수정</span>
					<span class="col8">삭제</span>
				</li>
<?php
    $sql = "select * from members order by id desc";
    $result = mysqli_query($conn, $sql);
    $total_record = mysqli_num_rows($result); // 전체 회원 수

    $number = $total_record;

   while ($row = mysqli_fetch_array($result)) {
       $id          = $row["id"];
       $name        = $row["name"];
       $point       = $row["point"];
       $regist_day  = $row["regist_day"]; ?>

		<li>
		<form method="post" action="admin_member_update.php?id=<?=$id?>">
			<span class="col1"><?=$number?></span>
			<span class="col2"><?=$id?></a></span>
			<span class="col3"><?=$name?></span>
			<span class="col5"><input type="text" name="point" value="<?=$point?>"></span>
			<span class="col6"><?=$regist_day?></span>
			<span class="col7"><button type="submit">수정</button></span>
			<span class="col8"><button type="button" onclick="location.href='admin_member_delete.php?id=<?=$id?>'">삭제</button></span>
      <!-- 같은 폼 속에서 다른 페이지로 보내고 싶을때 위에처럼 쓰면 된다~! -->
		</form>
		</li>

<?php
       $number--;
   }
?>
	    </ul>
	</div> <!-- admin_box -->
</section>
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
