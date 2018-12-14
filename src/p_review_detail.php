<h2>口コミ詳細</h2>
<?php
require_once ('db_inc.php');
$sname=$_GET[''];


$sql="SELECT sid,rid,rpoint,comment,uid,pid,uname
From tb_review Natural left join tb_user Natural left join tb_shop
WHERE sname='$sname'";
$rs = mysql_query($sql, $conn);
$row = mysql_fetch_array($rs);
while($row){
	echo '<b>'.$row['uname'].'</b>';
	for($i=0;$i<5;$i++){
		if($i<$row ['rpoint']){
			echo '★';
		}else{
			echo '☆';
		}
	}

	echo '<br>'.$row['comment'];


}

echo '<br>';
echo "更新日時：";
echo date("Y")."年".date("n")."月".date("j")."日　";
echo date("G").":".date("i");

echo '</table>'

?>