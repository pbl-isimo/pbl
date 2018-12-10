<?php
//店舗詳細画面
$sname=$_GET ['sname'];
echo '<h1>'.$sname.'</h1>';
echo '
<br>
<a href="?do=p_review_record">口コミ編集</a>
<br>
<a href="?do=p_review_detail">口コミ情報</a>
<br>
<a href="?do=p_menu_edit&sname=' . $_GET ['sname'] . '">メニュー編集</a>
<br>
<a href="?do=p_menu_refer&sname=' . $_GET ['sname'] . '">メニュー登録</a>
<br>
<a href="?do=p_shop_edit">店舗編集</a>
<br>
<a href="?do=p_map"target="_blank">マップ参照</a>
';
?>