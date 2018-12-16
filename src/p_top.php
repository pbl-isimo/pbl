<body bgcolor="#FFDBC9">
	ここは
	<a href="?do=p_top">【トップページ】</a> です。
	<br>
	<br>
	<form method="get"
		action="http://localhost/PBL3/src/p_search_result.php?do=p_search_result"
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
		<input type="submit" name="btng" value="検索"> <br>
		<center>
			<option value="" selected>絞り込み ▼</option>
			<div
				style="padding: 10px; margin-bottom: 10px; width: 450px; height: 70px; border: 1px solid #333333; border-radius: 10px; background-color: #FFFFFF;">
				<div body="text-align: center;">
					<font size="3">営業日&nbsp</font> 月<input type="checkbox"
						name="holiday" value="getu">&nbsp 火<input type="checkbox"
						name="holiday" value="ka">&nbsp 水<input type="checkbox"
						name="holiday" value="sui">&nbsp 木<input type="checkbox"
						name="holiday" value="moku">&nbsp 金<input type="checkbox"
						name="holiday" value="kin">&nbsp 土<input type="checkbox"
						name="holiday" value="do">&nbsp 日<input type="checkbox"
						name="holiday" value="niti">&nbsp 祝<input type="checkbox"
						name="holiday" value="others youbi"> <br> <font size="3">予算&nbsp</font>
					～500<input type="radio" name="budget" value="-500">&nbsp ～700<input
						type="radio" name="budget" value="-700">&nbsp ～1000<input
						type="radio" name="budget" value="-1000">&nbsp それ以上<input
						type="radio" name="budget" value="others yosan"> <br> <font
						size="3">所要時間&nbsp</font> ～10分<input type="radio" name="time"
						value="-10m">&nbsp ～20分<input type="radio" name="time"
						value="-20m">&nbsp ～30分<input type="radio" name="time"
						value="-30m">&nbsp それ以上<input type="radio" name="time"
						value="others kyori">

	</form>
	<br>
</body>
</div>
<br>
<br>

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
	<option value="high hyouka" selected>評価が高い</option>
	<option value="short time">所要時間が短い</option>
	<option value="few yosan">予算が少ない</option>
	<option value="many yosan">予算が多い</option>
</select>
<input type="hidden" name="hl" value="ja">
</form>
<br>
<br>
<tr>
<?php
require_once ('src/db_inc.php');
// phpinfo();
$sql = "
			SELECT * FROM tb_shop

			"; // sidは他の選択も出来るように
$rs = mysql_query ( $sql, $conn );
// var_dump ( $rs);
$row = mysql_fetch_array ( $rs );

$sql1 ="select rpoint from tb_review";
$rs1 = mysql_query ( $sql1, $conn );
$row1 = mysql_fetch_array ( $rs1 );
while ($row){
	//$row = mysql_fetch_array ( $rs );
	/*
	 * var_dump ( $row3 );
	 * $row2 = mysql_fetch_array ( $rs );
	 * var_dump ( $row2 );
	 */
	echo '<h2><a href="?do=p_shop_refer&sname=' . $row ['sname'] . '&sid=' . $row ['sid'] . '">' . $row ['sname'] . '</a>　　';
	// echo '評価数' . $row ['rpoint'] . '<br>';
	for($i = 0; $i < 5; $i ++) {
		if ($i < $row1 ['rpoint']) {
			echo '★';
		} else {
			echo '☆';
		}
	}
	echo '</h2>';
	// echo $row ['rpoint'];
	echo '営業時間　' . $row ['open'] . '～' . $row ['close'] . '<br>';
	echo '定休日：' . $row ['holiday'] . '<br>';
	echo '所要時間：徒歩' . $row ['time'] . '分<br>';
	echo '予算：' . $row ['budget'] . '～<br><br><br>';
	$row = mysql_fetch_array ( $rs );
	$row1 = mysql_fetch_array ( $rs1 );

}
?>
</center>
	</div>
</tr>

</body>

<div align="left">
	<br> <br> <a href="?do=sys_login">ログイン画面</a> <br> <br> <a
		href="?do=p_search_result">検索結果表示画面</a> <br> <a href="?do=p_mas">マスタメンテナンス（管理者のみ）...全ユーザ対象</a>
	<br> <a href="?do=p_mas_user">マスタメンテナンス（ユーザ一覧）</a> <br> <a
		href="?do=p_mas_shop">マスタメンテナンス（店舗一覧）</a> <br> <a
		href="?do=p_mas_review">マスタメンテナンス（口コミ一覧）</a> <br> <br> <br> <a
		href="?do=ur_add">ユーザ情報編集画面...ログインしているユーザ個人対象</a> <br> <br> <br> <a
		href="?do=p_shop_record">店舗情報登録画面</a> <br> <a href="?do=p_shop_refer">店舗情報詳細画面</a>
	<br> <a href="?do=p_shop_edit">店舗情報編集画面</a> <br> <br> <br> <a
		href="?do=p_review_record">口コミ登録画面</a> <br> <a
		href="?do=p_review_detail">口コミ詳細画面</a> <br> <a href="?do=p_menu_edit">メニュー編集・削除画面...社員全員可能</a>
	<br> <a href="?do=p_menu_refer">メニュー参照</a> <br> <br>
</div>
</body>