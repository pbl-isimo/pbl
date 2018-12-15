<?php
require_once ('db_inc.php');
$sid = $_POST['id'];
$sql="SELECT * FROM tb_review WHERE sid = '{$sid}'";
$rs = mysql_query ( $sql, $conn );
echo '<table border="1">';
  echo '<tr>';
  echo '<th>ユーザ名</th>';
  echo '<th>コメント</th>';
  echo '<th></th>';
  echo '</tr>';
  while($row = mysql_fetch_array($rs)){
    echo '<tr>';
    $sql1="SELECT * FROM tb_user WHERE uid = '{$row["uid"]}'";
    $rs1 = mysql_query ( $sql1, $conn );
    $row1 = mysql_fetch_array($rs1);
    $uname = $row1['uname'];
    echo '<td>'.$uname.'</td>';
    echo '<td>'.$row['comment'].'</td>';
    echo '<td>';
    echo '<form action="src/p_review_delete.php" method="post" onsubmit="return delChk(\''.$uname.'のコメント\')">';
		echo '<input type="submit" value="delete">';
    echo '<input type="hidden" name="id" value="'.$row['rid'].'">';
    echo '<input type="hidden" name="name" value="'.$uname.'">';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
  }
?>