<?php
  require_once('src/db_inc.php');
  $types = array(0 => "管理者", 1 => "社員", 2 => "ゲスト");
  if($_SESSION ['uid_kind'] == 0){
    echo '<h1>管理者用ユーザ編集</h1>';
  }else{
    echo '<h1>ユーザ編集</h1>';
  }
  $id = $_POST["id"];
  $sql='SELECT * FROM tb_user WHERE uid = "'.$id.'";';
  $rs = mysql_query ( $sql, $conn );
  $row = mysql_fetch_array($rs);
  echo '<p>現在の情報</p>';
  echo '<table border="1">';
  echo '<tr>';
  echo '<td>ユーザID</td>';
  $edit_uid = $row["uid"];
  echo '<td>'.$edit_uid.'</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td>現在のアカウント名</td>';
  $edit_uname = $row["uname"];
  echo '<td>'.$edit_uname.'</td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td>現在の種別</td>';
  $type = $row["uid_kind"];
  echo '<td>'.$types[$type].'</td>';
  echo '</tr>';

  echo '<tr>';
  $ps = "";
  if($_SESSION ['uid_kind'] == 0){
    echo '<td>現在のパスワード</td>';
    $ps = $row["psword"];
    echo '<td>'.$ps.'</td>';
    echo '</tr>';
    echo '</table>';
  }

  echo '<form action="?do=ur_save" method="post">';
  echo '<input type="hidden" name="act" value="update">';
  echo '<input type="hidden" name="uid" value="'.$edit_uid.'">';
  echo '<input type="hidden" name="type" value="'.$type.'">';

  echo '<h2>アカウント名変更</h2>';
  echo '<input type="text" name="uname" value="'.$edit_uname.'">';

  echo '<br>';

  echo '<h2>パスワードの変更</h2>';
  echo '<table>';
  if($_SESSION ['uid_kind'] != 0){
    echo '<tr><td>現在のパスワード：</td><td><input type="password" name="old_ps" value="'.$ps.'"></td></tr>';
  }else{
    echo '<input type="hidden" name="old_ps" value="'.$ps.'">';
  }
  echo '<tr><td>新しいパスワード：</td><td><input type="password" name="new_ps1"></td></tr>';
  echo '<tr><td>新しいパスワード(再入力)：</td><td><input type="password" name="new_ps2"></td></tr>';
  echo '</table>';

  echo '<input type="submit" value="登録"><input type="reset" value="取消">';
  echo '</form>';
?>