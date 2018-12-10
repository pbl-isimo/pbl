<h2>口コミ登録</h2>
<form action="?do=p_review_detail" method="post">
<?php
require_once ('src/db_inc.php');
echo 'コメント<br>
<textarea name="kanso" rows="20" cols="80"></textarea><br>
<input type="submit" value="登録">
';
echo 'text'
?>
</form>