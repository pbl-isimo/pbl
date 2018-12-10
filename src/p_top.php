<h2>ぴたてん</h2>
どれも途中なので、動かないこと前提です
<br>
ログインは動作的にはOKっぽい
<br>
写真の紐付け保存、写真のアップロード機能は難しい様なので
<br>
それ以外が完成してからというのはどうでしょう？
<br>
<br>
おすすめは最後の方で...
<br>
<br>
ここは
<a href="?do=p_top">【トップページ】</a>
です。
<br>
<br>
<form method="get" action="http://www.google.co.jp/search"
	target="_blank">
	<input type="text" name="q" size="31" maxlength="255" value="">
	<head>
<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function(){
	  $("#sel").change(function(){
	    //var str = $(this).val();
	    window.location.href = $(this).val();
	    //alert(str);
	  });
	});
</script>
	</head>
	<select id="sel">
		<option value="" selected>設定</option>
		<option value="?do=ur_add">ユーザ情報編集</option>
		<option value="?do=p_shop_record">店舗登録</option>
		<option value="?do=sys_logout">ログアウト</option>
	</select> <input type="submit" name="btng" value="検索"> <input
		type="hidden" name="hl" value="ja">
</form>
<br>
<br>
<?php
require_once ('src/db_inc.php');
//phpinfo();
$sql = "
			SELECT * FROM tb_shop
			natural left join tb_review
			"; // sidは他の選択も出来るように
$rs = mysql_query ( $sql, $conn );
//var_dump ( $rs);
$num=mysql_num_rows( $rs );
for($j=1;$j<=$num;$j++) {
$row = mysql_fetch_array ( $rs );
/*
var_dump ( $row3 );
$row2 = mysql_fetch_array ( $rs );
var_dump ( $row2 );*/

	echo '<h2><a href="?do=p_shop_refer&sname=' . $row ['sname'] . '">'
		. $row ['sname'] . '</a>　　';
	//echo '評価数' . $row ['rpoint'] . '<br>';
	for($i=0;$i<5;$i++){
		if($i<$row ['rpoint']){
			echo '★';
		}else{
			echo '☆';
		}
	}
	echo '</h2>';
	//echo $row ['rpoint'];
	echo '営業時間　' . $row ['open'] . '～' . $row ['close'] . '<br>';
	echo '定休日：' . $row ['holiday'] . '<br>';
	echo '所要時間：徒歩' . $row ['time'] . '分<br>';
	echo '予算：' . $row ['budget'] . '～<br><br><br>';
}
?>
<br>
<br>
<a href="?do=sys_login">ログイン画面</a>
<br>
<br>
<a href="?do=p_search_result">検索結果表示画面</a>
<br>
<a href="?do=p_mas">マスタメンテナンス（管理者のみ）...全ユーザ対象</a>
<br>
<a href="?do=p_mas_user">マスタメンテナンス（ユーザ一覧）</a>
<br>
<a href="?do=p_mas_shop">マスタメンテナンス（店舗一覧）</a>
<br>
<a href="?do=p_mas_review">マスタメンテナンス（口コミ一覧）</a>
<br>
<br>
<br>
<a href="?do=ur_add">ユーザ情報編集画面...ログインしているユーザ個人対象</a>
<br>
<br>
<br>
<a href="?do=p_shop_record">店舗情報登録画面</a>
<br>
<a href="?do=p_shop_refer">店舗情報詳細画面</a>
<br>
<a href="?do=p_shop_edit">店舗情報編集画面</a>
<br>
<br>
<br>
<a href="?do=p_review_record">口コミ登録画面</a>
<br>
<a href="?do=p_review_detail">口コミ詳細画面</a>
<br>
<a href="?do=p_menu_edit">メニュー編集・削除画面...社員全員可能</a>
<br>
<a href="?do=p_menu_refer">メニュー参照</a>
<br>
<br>

