<!-- 
  파일명 : memo_list.php
  최초작업자 : swcodingschool
  최초작성일자 : 2022-1-3
  업데이트일자 : 2022-1-3
  
  기능: 
  메모 목록 리스팅 기능을 수행하도록 구성함.
-->
<?php
// db연결 준비
require "../util/dbconfig.php";

// 로그인한 상태일 때만 이 페이지 내용을 확인할 수 있다.
require_once '../util/loginchk.php';
if($chk_login) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h6>로그인 성공!!</h6>
  <h1>메모 목록</h1>
  <br><br>
  <?php
  $sql = "SELECT * FROM memo";
  $resultset = $conn->query($sql);

  if ($resultset->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>title</th><th>등록일</th></tr>";
    // out data of each row
    while ($row = $resultset->fetch_assoc()) {
      echo "<tr><td>".$row['id']."</td><td><a href='memo_detailview.php?id=".$row['id']."'></a>".$row['title']."</td><td>".$row['username']."</td></tr>";
    }
    echo "</table>";
  }
  ?>
  <a href="../memo_regist.php">새메모작성</a>&nbsp;&nbsp;
  <a href="../index.php">인덱스페이지로</a>
</body>
<?php 
} else {
  echo outmsg(LOGIN_NEED);
  echo "<a href='../index.php'>인덱스페이지로</a>";
}
?>
</html>