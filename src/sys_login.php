<!DOCTYPE html>
<html lang="ja">
<meta http-equiv="Content-TYPE" content="text/html; charset=UTF-8">
<br>
<br>
<br>
<br>
<br>
<body>
<div id="center">
<img src="img/pitarogo.png"width="300"height="200">
</div>
</body>

<body bgcolor="#FFDBC9">
<form action="?do=sys_check" method="post" class="form">
<table class="table table-hover">
	<tr>
		<td><input type="text" name="uid" class="form-control"placeholder="ユーザID"
			style="position: absolute; left: 45%; top: 48%"></td>
	</tr>
	<tr>
		<td><input type="password" name="psword" class="form-control"placeholder="パスワード"
			style="position: absolute; left: 45%; top: 54%"></td>
	</tr>
</table>
<input type="submit" value="　　ロ　グ　イ　ン　　" class="btn btn-primary"
	style="position: absolute; left: 45%; top: 60%">
</form>
</body>
<?php
//echo $_SESSION['login'];
/*
if(!$_SESSION['uid']){
	echo "ログインに失敗しました";
}*/
//$_SESSION['login']==null;
?>
