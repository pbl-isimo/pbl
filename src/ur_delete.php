<?php
  echo '<head>
  <meta charset="utf-8"/>
  <meta http-equiv="refresh" content="3;URL=../p_index.php?do=p_mas_user">
  </head>';
  require_once ('db_inc.php');
  $id = $_POST["id"];
  $sql='DELETE FROM tb_user WHERE uid = "'.$id.'";';
  $rs = mysql_query ( $sql, $conn );
  if (!$rs) {
    die('DELETEクエリーが失敗しました。'.mysql_error());
  }else {
    echo "<h1>".$id."のデータ削除に成功しました。<br> 3秒後戻ります。</h1>";
  }
?>