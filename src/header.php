<!DOCTYPE html>
<html lang="ja">
<meta http-equiv="Content-TYPE" content="text/html; charset=UTF-8">
<style>
body{
text-align: center;
}
div#center {
width: 1500px;
height: 180px;
text-align: left;
background: #FF9933;
margin: auto;
}
h1 {
text-align: center;
}
・・・省略・・・
</style>
</head>
<body>
<div id="center">
<a href="p_index.php">
<img src="img/pitarogo.png"width="300"height="200"></a>
</div>
</body>

<?php
require_once ('src/db_inc.php');
if (isset ( $_SESSION ['uid_kind'] )) {

	$menu = array ( // メニューバーの出力
			' マスタメンテナンス ' => 'p_master',
			' メニュー登録・編集・削除画面 ' => 'p_menu',
			' 口コミ情報登録画面 ' => 'p_review_record',
			' 検索結果表示画面 ' => 'p_search_result',

			' 店舗情報編集画面 ' => 'p_shop_edit',
			' 店舗情報登録画面 ' => 'p_shop_record',
			' 店舗情報参照画面 ' => 'p_shop_reference',
			' トップページ ' => 'p_top'
	);
	//echo '<a href="?do=p_top">ぴたてん(トップページ)</a>　　';
	if ($_SESSION ['uid_kind'] == 1) { // 社員
	//	echo '<a href="">ユーザ情報編集画面</a>　　';
		echo '<a href="?do=p_shop_record">店舗登録</a>　　';
	}
	if ($_SESSION ['uid_kind'] == 2) { // ゲスト
		echo '<a href="?do=qs_subject2">ゲストログイン</a>&nbsp;';
	}
	if ($_SESSION ['uid_kind'] == 0) { // 管理者
		foreach ( $menu as $label => $action ) {
			echo '<a href="?do=' . $action . '">' . $label . '</a>&nbsp;';
		}
		echo '<a href="?do=ur_add">アカウント登録・編集</a>　　';
		echo '';
	}
	$uid=$_SESSION ['uid'];
	$sql="
					SELECT uname
					FROM tb_user
					WHERE uid='$uid'";
	$rs = mysql_query ( $sql, $conn );
	$row = mysql_fetch_array ( $rs );
	if($row){
		echo $row['uname']." 様　　";
	}
	//echo $uid;//ユーザの名前
	//echo '<a href="?do=sys_logout">ログアウト</a>&nbsp;';
?>
<?php
echo '<head>
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
</select><br><br>';
} else {
	// echo '<a href="?do=sys_check">ログイン</a>　　　';
}
?>