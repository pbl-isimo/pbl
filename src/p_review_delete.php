<?php
  echo '<head>
  <meta charset="utf-8"/>
  <meta http-equiv="refresh" content="3;URL=../p_index.php?do=p_mas_shop">
  </head>';
  require_once ('db_inc.php');
  $rid = $_POST["id"];
  $uname = $_POST["name"];
  $sql='DELETE FROM tb_review WHERE rid = "'.$rid.'";';
  $rs = mysql_query ( $sql, $conn );
  if (!$rs) {
    die('DELETEクエリーが失敗しました。'.mysql_error());
  }else {
    echo "<h1>".$uname."のデータ削除に成功しました。<br> 3秒後戻ります。</h1>";
  }
?>