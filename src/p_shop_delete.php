<?php
require_once('db_inc.php');
if (isset($_GET['sname'])){
  $sname = $_GET['sname'];
  echo '<h2>'. $sname . 'を本当に削除しますか?</h2>';
  echo '<a href="?do=p_shop_delete&ssname='.$sname.'">はい</a> | <a href="?do=p_shop_refer&sname='.$_GET['sname'].'">いいえ</a>';
}else if (isset($_GET['ssname'])){
   $sname = $_GET['ssname'];
   $sql = "DELETE FROM tb_shop WHERE sname='{$sname}'";
   mysql_query($sql, $conn);
   //header('Location:?do=p_top');
   echo '<h2>店舗が削除されました</h2>';
   echo '<a href="?do=p_top">戻る</a>';
}else{
  echo '<h2>削除するユーザIDは与えられていません</h2>';
}
?>