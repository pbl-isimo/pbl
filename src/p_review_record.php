<html>
<div class="container">
<center>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form action="?do=p_review_save" method="post" enctype="multipart/form-data">
<?php
//$sname=$_GET['sname'];
//echo $sname;

require_once ('src/db_inc.php');

?>
<br>
<h2>口コミ登録</h2>
<table class="table table-bordered">
<tr><td>評価</td><td>
<select name="rpoint">
	<option value=selected>点数</option>
	<option value="5">5</option>
	<option value="4">4</option>
	<option value="3">3</option>
	<option value="2">2</option>
	<option value="1">1</option>
</select></td></tr><br><br>

<tr><td>コメント</td><td><textarea name="kanso" rows="10" cols="100" maxlength="500"></textarea></td></tr><br>

<small>
<tr><td><br>写真1</td><td><input type="file" name="upfile1" size="30"/></td></tr>
<tr><td><br>写真2</td><td><input type="file" name="upfile2" size="30"/></td></tr>
<tr><td><br>写真3</td><td><input type="file" name="upfile3" size="30"/></td></tr>
</small>

</table>


<input type="submit" value="登録"/ class="btn btn-info btn-sm">
			<br>


</form>
</center>
</div>
</html>
