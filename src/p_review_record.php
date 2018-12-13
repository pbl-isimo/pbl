<html>
<h2>口コミ登録</h2>
<form action="?do=p_review_save" method="post">
<?php
require_once ('src/db_inc.php');
echo 'コメント<br>
<textarea name="kanso" rows="10" cols="60"></textarea><br><br>

	<select name="rpoint">
	<option value=selected>評価点</option>
	<option value="5">5</option>
	<option value="4">4</option>
	<option value="3">3</option>
	<option value="2">2</option>
	<option value="1">1</option>
</select><br><br>
		';

echo '<input type="submit" value="登録">';
?>
</form>
<html>
