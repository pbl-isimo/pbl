<form action="?do=p_review_detail" method="post">
<?php
require_once ('src/db_inc.php');
$conn = mysql_connect("localhost","root","");//開発環境
if (!$con) {
  exit('データベースに接続できませんでした。');
}

$result = mysql_select_db('tb_review', $con);
if (!$result) {
  exit('データベースを選択できませんでした。');
}

$result = mysql_query('SET NAMES utf8', $con);
if (!$result) {
  exit('文字コードを指定できませんでした。');
}

$kanso = $_REQUEST['kanso'];


$result = mysql_query("INSERT INTO address(kanso) VALUES('$kanso')", $con);
if (!$result) {
  exit('データを登録できませんでした。');
}

$con = mysql_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}

?>
<p>登録が完了しました。<br /><a href="p_review_detail.php">戻る</a></p>
</body>
</html>