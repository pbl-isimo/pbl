<?php
  require_once ('src/db_inc.php');
  $sql="SELECT sname, sid FROM tb_shop;";
  $rs = mysql_query ( $sql, $conn );
  echo '<h1>�X�܏��ꗗ</h1>';
  echo '<table border="1">';
  echo '<tr>';
  echo '<th>�X�ܖ�</th>';
  echo '<th></th>';
  echo '<th></th>';
  echo '<th>���R�~��</th>';
  echo '<th></th>';
  echo '</tr>';
  while($row = mysql_fetch_array($rs)){
    $sql1="SELECT COUNT(*) AS num FROM tb_review WHERE sid = ".$row['sid'];
    $rs1 = mysql_query ( $sql1, $conn );
    $row1 = mysql_fetch_array($rs1);
    echo '<tr>';
    echo '<td>'.$row['sname'].'</td>';
    echo '<td>';
    echo '<form action="?do=p_shop_edit&sname=' . $row['sname'] . '" method="post">';
    echo '<input type="submit" onclick="location.href="p_shop_edit&sname=' . $row['sname'] . '" " value="�ҏW" />';
    echo '</form>';
        /*
    echo '<form action="?do=p_shop_edit&sname='.$row['sname'].'" method="post">';
		echo '<input type="submit" value="�ҏW">';
		echo '<input type="hidden" name="id" value="'.$row['sname'].'">';
    echo '</form>'�G
    */
    echo '</td>';
    echo '<td>';
    echo '<form action="src/p_mas_shop_del.php" method="post" onsubmit="return delChk(\''.$row["sname"].'\')">';
		echo '<input type="submit" value="�폜">';
    echo '<input type="hidden" name="id" value="'.$row['sid'].'">';
    echo '<input type="hidden" name="name" value="'.$row['sname'].'">';
    echo '</form>';
    $rev_num = $row1['num'];
    echo '<td>'.$rev_num.'</td>';
    echo '<td>';
    if($rev_num != 0){
      echo '<form action="?do=p_mas_review" method="post">';
		  echo '<input type="submit" value="�ҏW">';
		  echo '<input type="hidden" name="id" value="'.$row['sid'].'">';
      echo '</form>';
    }
    echo '</td>';
    echo '</tr>';
  }
  echo '</table>';
?>