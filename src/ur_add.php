<?php
require_once('src/db_inc.php');
$types = array(0 => "管理者", 1 => "社員", 2 => "ゲスト");
echo '<h1>ユーザ追加</h1>';
  echo '<form action="?do=p_mas_ur_save" method="post">';
  echo '<input type="hidden" name="act" value="insert">';
  echo '<table>';
  echo '<tr><td>ユーザID：</td><td><input type="text" name="uid"></td></tr>';
  echo '<tr><td>アカウント名：</td><td><input type="text" name="uname"></td></tr>';
  echo '<tr><td>パスワード：</td><td><input type="password" name="new_ps"></td></tr>';
  echo '<tr><td>';
  foreach($types as $num => $name){
    echo '<input type="radio" name="type" value="'.$num.'">'.$name;
  }
  echo '</td></tr>';
  echo '</table>';
  echo '<input type="submit" value="登録"><input type="reset" value="取消">';
  echo '</form>';
?>