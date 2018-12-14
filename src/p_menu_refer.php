<?php
//html
$sname = $_GET ['sname'];
$sid=$_GET ['sid'];
echo '<h1>' . $sname . '</h1>';
echo '
<h2>メニュー登録</h2>
<form action="?do=p_menu_post&sname='. $_GET ['sname'] . '&sid='.$_GET ['sid'].'" method="post">
	メニュー名　 <input type="text" name="name" size="20" maxlength="10" value=""><br>
	値段　　　　 <input type="text" name="price" size="20" maxlength="10">円<br>
	説明　　　　 <textarea name="contents" rows="4" cols="40"></textarea>
	<input type="hidden" name="sid" value="'.$sid.'">
	<br> <input type="submit" value="登録">
</form>';
?>