<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form action="?do=p_review_save" method="post" enctype="multipart/form-data">
<?php
//$sname=$_GET['sname'];
//echo $sname;

require_once ('src/db_inc.php');

?>
<h2>口コミ登録</h2>
<select name="rpoint">
	<option value=selected>評価点</option>
	<option value="5">5</option>
	<option value="4">4</option>
	<option value="3">3</option>
	<option value="2">2</option>
	<option value="1">1</option>
</select><br><br>

コメント<br>
<textarea name="kanso" rows="10" cols="60"></textarea><br>



<br>写真1<input type="file" name="upfile" size="30"/>
<br>写真2<input type="file" name="upfile2" size="30"/>
<br>写真3<input type="file" name="upfile3" size="30"/>

<br><br>
<input type="submit" value="登録"/>
			<br>



</form>
</html>
