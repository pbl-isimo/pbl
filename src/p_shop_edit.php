<h2>店舗情報編集画面</h2>
<html>
<head>
<title>TAG index Webサイト</title>
<!--
<script type="text/javascript">
window.onbeforeunload = function(e) {
    e.returnValue = "ページを離れようとしています。よろしいですか？";
}
function disp(){

	// 「OK」時の処理開始 ＋ 確認ダイアログの表示
	if(window.confirm('本当にいいんですね？')){
		location.href = "example_confirm.html"; // example_confirm.html へジャンプ
	}
	// 「OK」時の処理終了

	// 「キャンセル」時の処理開始
	else{
		window.alert('キャンセルされました'); // 警告ダイアログを表示
	}
	// 「キャンセル」時の処理終了

}
</script>
-->

</head>
<body>

<p><input type="button" value="確認ダイアログ" onClick="disp()"></p>
</body>
</html>
<?php
echo "更新日時：";
echo date("Y")."年".date("n")."月".date("j")."日　";
echo date("G").":".date("i");
?>