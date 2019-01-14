<center>
<div class="container">
<h2>口コミ詳細</h2>
<?php
require_once ('db_inc.php');
$sid = $_SESSION['sid'];
$rid = $_GET['rid'];

$sql = "SELECT uname,rpoint,comment,rid
		From tb_review left join tb_user
		on tb_review.uid=tb_user.uid
		where rid='$rid'
		";

$rs = mysql_query ( $sql );
$row = mysql_fetch_array ( $rs );
	echo '<center>';
	echo '<table class="table table-bordered">';
echo '<tr><th>ユーザ名</th><th>評価</th><th>コメント</th></tr>';

while ( $row ) {
	echo '<tr>';
	echo '<td>' . $row ['uname'] . '</td>';
	echo '<td>';
	for($i = 0; $i < 5; $i ++) {
		if ($i < $row ['rpoint']) {
			echo '★';
		} else {
			echo '☆';
		}
	}
	echo '</td>';
	echo '<td>' . $row ['comment'] . '</td>';
	echo '</tr>';
	$row = mysql_fetch_array($rs);
}
$pic=$sid.'_'.$rid;
//ファイルをアップロードするループ
for($i=1;$i<4;$i++){
	//ファイルを探す
	$filedir = "C:/eclipse-php/xampp/htdocs/PBL/img/" . $pic . "_".$i.".jpg";
	// echo $filedir;
	// $pic=$_FILES["upfile"]["name"];

	// echo '<br>'.$row['rpoint'];
	echo '</table>';
	// $pic=$sid.$rid;
	//echo $pic . '<br>';
	//echo $filedir;
	if (file_exists ( $filedir )) {
		//echo $pic;
		echo '<img src="img/' . $pic . "_".$i.'.jpg" alt="写真１">';
	}
	echo '<br>';
}
echo '</center>';
?>
</div>
</center>