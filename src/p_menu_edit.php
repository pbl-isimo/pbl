<?php
$sname=$_GET ['sname'];
echo '<h1>'.$sname.'</h1>';
?>
<h2>メニュー編集</h2>
<form action="" >
メニュー名　<input type="text" name="name" size="20" maxlength="10"><br>
値段　　　　<input type="text" name="price" size="20" maxlength="10">円<br>
説明　　　　<textarea name="kanso" rows="4" cols="40"></textarea><br>
<?php
require_once ('db_inc.php');
$uid = $_SESSION ['uid'];
//echo $uid;

//$sql="INSERT INTO tb_menu VALUES (,'',,);";
$rs = mysql_query ( $sql, $conn );
$row = mysql_fetch_array ( $rs );
var_dump($row);
?>
<input type="submit" value="登録">
</form>