<html>
<div class="container">
	<center>
		<form action="?do=p_review_detail" method="post">
<?php
require_once ('src/db_inc.php');
$conn = mysql_connect ( "localhost", "root", "" ); // 開発環境
mysql_select_db ( "pbl", $conn );
if (! $conn) {
	die ( 'データベースに接続できませんでした。' );
}
$db_selected = mysql_select_db ( 'pbl', $conn );
if (! $db_selected) {
	die ( 'データベースを選択できませんでした。' );
}
$code = mysql_query ( 'SET NAMES utf8', $conn );
if (! $code) {
	die ( '文字コードを指定できませんでした。' );
}
$sql = "select MAX(rid) as Mrid from tb_review";
$rs = mysql_query ( $sql );
$r = mysql_fetch_assoc ( $rs );
$rid = $r ['Mrid'] + 1;
//echo $rid;
$sid = $_SESSION['sid'];
$uid = $_SESSION ['uid'];
$kanso = $_POST ['kanso'];
$rpoint = $_POST ['rpoint'];
if ($rpoint == "selected") {
	echo '<h3>エラー:評価点を選択してください</h3>';
} else {
	if ($kanso == "") {
		echo '<h3>エラー:コメントを入力してください</h3>';
	} else {
		$sql = "INSERT INTO tb_review (rid,rpoint,comment,sid,uid ) VALUES ('$rid','$rpoint','$kanso','$sid','$uid')";
		$result_flag = mysql_query ( $sql );
		echo '<h3>登録が完了しました</h3>';
	}
}
/*
if (! $result_flag) {
	die ( 'INSERTクエリーが失敗しました。' . mysql_error () );
}
*/
$cnon = mysql_close ( $conn );
if (! $conn) {
	die ( 'データベースとの接続を閉じられませんでした。' );
}

//<p>
		 echo'<a href="?do=p_review_detail&rid='.$rid.'">戻る</a><br>';
//	</p>
//echo '<h3>画像を拾いたい</h3>';
//var_dump($upfile);

//$filesdirで指定したファイルに画像を保存する。
//$filedir = "C:\Users\User\Documents\PBL\\";
$filedir = "C:/eclipse-php/xampp/htdocs/PBL/img/";

for($i = 1; $i < 4; $i ++) {
	// $upfile = $_FILES['upfile'.$i];
	if (is_uploaded_file ( $_FILES ["upfile" . $i] ["tmp_name"] )) {
		$ext = substr ( $_FILES ["upfile" . $i] ["name"], strrpos ( $_FILES ["upfile" . $i] ["name"], '.' ) + 1 );
		if($ext=='jpg'||$ext=='png'||$ext=='bmp'||$ext=='gif'||$ext=='JPG'){ //拡張子がpng、jpg、bmp、gif以外ははじく


			//$extがpngだったらjpgに変換したい(勝手に拡張子うまくいった,bmp,gifも解決した)

			if (move_uploaded_file ( $_FILES ["upfile".$i] ["tmp_name"], $filedir . $sid . '_' . $rid .'_'.$i. '.' . "jpg" )) {
				$ext = substr ( $_FILES ["upfile".$i] ["name"], strrpos ( $_FILES ["upfile".$i] ["name"], '.' ) + 1 );
				echo $_FILES ["upfile".$i] ["name"] . "をアップロードしました。" . '<br>';
				/*
				echo "sid" . $sid . '<br>';
				echo "rid" . $rid . '<br>';
				echo "拡張子" . $ext . '<br>';*/
				// var_dump($_FILES);
				// echo $filedir . $sid . '_' . $rid .'_'.$i. '.' . $ext;
			}
		}else {
				echo "拡張子'$ext'は対応してません。". '<br>';
		}
	} else {
		//echo '<br>' . "ファイルが選択されていません。";
	}
}
/*
$sid.'_'.$rid=$_FILES["upfile"]["name"];
$pic=$sid.'_'.$rid;
echo '<br>sid:'.$sid.'<br>rid:'.$rid;
echo '<br>'.__FILE__, "<br>";
echo '<img src="img/'.$_FILES["upfile"]["name"].'" alt="写真１">';
//echo '<input type="hidden" name="pic" value="'.$pic.'">';
echo '<img src="img/img1.jpg" alt="寿司の写真１">';*/
//	</body>
?>
</form>
	</center>
</div>
</html>
