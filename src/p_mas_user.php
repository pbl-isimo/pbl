<?php
  require_once ('src/db_inc.php');
  $sql="SELECT uid, uid_kind, uname FROM tb_user;";
  $rs = mysql_query ( $sql, $conn );
  #$rows = mysql_fetch_array ( $rs );
  echo '<h1>ユーザ情報管理</h1>';
  echo '<a href="?do=ur_add"><button type="button">add</button></a>';
  echo '<table border="1">';
  echo '<tr>';
  echo '<th>userID</th>';
  echo '<th>user種別</th>';
  echo '<th>user名</th>';
  echo '</tr>';
  $types = array(0 => "管理者", 1 => "社員", 2 => "ゲスト");
  while($row = mysql_fetch_array($rs)){
    echo '<tr>';
    echo '<td>'.$row["uid"].'</td>';
    echo '<td>'.$types[$row["uid_kind"]].'</td>';
    echo '<td>'.$row["uname"].'</td>';

    echo '<td>';
    echo '<form action="?do=ur_edit" method="post">';
		echo '<input type="submit" value="edit">';
		echo '<input type="hidden" name="id" value="'.$row['uid'].'">';
    echo '</form>';
    echo '</td>';

    echo '<td>';
    echo '<form action="src/ur_delete.php" method="post" onsubmit="return delChk(\''.$row["uname"].'\')">';
		echo '<input type="submit" value="delete">';
		echo '<input type="hidden" name="id" value="'.$row['uid'].'">';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
  }
  echo '</table>';
?>