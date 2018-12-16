<!DOCTYPE html>
<html lang="ja">
<center>
<div class="container-fluid bg-light">


  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <a href="p_index.php"> <img src="img/pitarogo.png" width="300"
			height="200"></a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
	// echo '<a href="?do=p_top">ぴたてん(トップページ)</a>　　';
	if ($_SESSION ['uid_kind'] == 1) { // 社員
	                                   // echo '<a href="">ユーザ情報編集画面</a>　　';
		//echo '<a href="?do=p_shop_record">店舗登録</a>　　';
	}
	if ($_SESSION ['uid_kind'] == 2) { // ゲスト
		echo 'ゲストログイン　';
	}
	if ($_SESSION ['uid_kind'] == 0) { // 管理者

		//echo '<a href="?do=p_shop_record">店舗登録</a>　　';
		/*
		foreach ( $menu as $label => $action ) {
			echo '<a href="?do=' . $action . '">' . $label . '</a>&nbsp;';
		}
		echo '<a href="?do=ur_add">アカウント登録・編集</a>　　';
		echo '';
		*/

	}

	$uid = $_SESSION ['uid'];
	$sql = "
					SELECT uname
					FROM tb_user
					WHERE uid='$uid'";
	$rs = mysql_query ( $sql, $conn );
	$row = mysql_fetch_array ( $rs );
	if ($row) {
		echo $row ['uname'] . " 様　　";
	}
	// echo $uid;//ユーザの名前
	// echo '<a href="?do=sys_logout">ログアウト</a>&nbsp;';
	?>
<?php

	if ($_SESSION ['uid_kind'] == 1) {
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
	<option value="?do=ur_edit">ユーザ情報編集</option>
	<option value="?do=p_shop_record">店舗登録</option>
	<option value="?do=sys_logout">ログアウト</option>
</select><br><br>';
	} else if($_SESSION ['uid_kind'] == 0){
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
	<option value="?do=p_mas">マスタメンテナンス</option>
	<option value="?do=ur_edit">ユーザ情報編集</option>
	<option value="?do=p_shop_record">店舗登録</option>
	<option value="?do=sys_logout">ログアウト</option>
</select><br><br>';
	} else if($_SESSION['uid_kind'] == 2){
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
	<option value="?do=sys_logout">ログアウト</option>
</select><br><br>';
	}
} else {
	// echo '<a href="?do=sys_check">ログイン</a>　　　';
}
?>
</div>
  </center>
</html>
