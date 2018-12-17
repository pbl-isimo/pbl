<center>
<?php
  echo '<head>
  <meta charset="utf-8"/>
  <meta http-equiv="refresh" content="3;URL=../p_index.php?do=p_mas_shop">
  </head>';
  require_once ('db_inc.php');
  $sid = $_POST["id"];
  $sname = $_POST["name"];
  $sql='DELETE FROM tb_shop WHERE sid = "'.$sid.'";';
  $rs = mysql_query ( $sql, $conn );
  if (!$rs) {
    die('DELETEクエリーが失敗しました。'.mysql_error());
  }else {
    echo "<h1>".$sname."のデータ削除に成功しました。<br> 3秒後戻ります。</h1>";
  }
?>
</center>