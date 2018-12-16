<center>
<div class="container">
<?php
//html
$sname = $_GET ['sname'];
$sid=$_GET ['sid'];
echo '<h1>' . $sname . '</h1>';
echo '
<h2>メニュー登録</h2><br>
<form action="?do=p_menu_post&sname='. $_GET ['sname'] . '&sid='.$_GET ['sid'].'" method="post">
			<center>
			<table class="table table-bordered">
	<tr><td>メニュー名</td><td><input type="text" name="name" size="20" maxlength="10" value=""><br></td></tr>
	<tr><td>値段</td><td> <input type="text" name="price" size="20" maxlength="10">円<br></td></tr>
	<tr><td>説明</td><td> <textarea name="contents" rows="4" cols="40"></textarea></td></tr>
	<input type="hidden" name="sid" value="'.$sid.'">
			</table>
			</center>
	<input type="submit" value="登録" class="btn btn-info btn-sm">
</form></div>';

?>
</div>
</center>