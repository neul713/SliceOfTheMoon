<?php
$id = $_POST["id"];
$password = $_POST["password"];
$name = $_POST["name"];
$email_one = $_POST["email_one"];
$email_two = $_POST["email_two"];
$birth_year = $_POST["birth_year"];
$birth_month = $_POST["birth_month"];
$birth_day = $_POST["birth_day"];
$gender = $_POST["gender"];

$email = $email_one."@".$email_two;
$birth = $birth_year.".".$birth_month.".".$birth_day;

$con = mysqli_connect("localhost", "root", "123456789", "haneul");

$sql = "insert into members(id, pass, name, email, birth, gender, level, point) ";
$sql .= "values('$id','$password','$name','$email','$birth','$gender', 9, 0)";

mysqli_query($con, $sql);
mysqli_close($con);

echo "
<script>
location.href = 'index.php';
</script>

";

 ?>
