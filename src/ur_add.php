<center>
<div class="container">
<?php
require_once('src/db_inc.php');
$types = array(0 => "管理者", 1 => "社員", 2 => "ゲスト");
echo '<h1>ユーザ追加</h1>';
  echo '<form action="?do=p_mas_ur_save" method="post">';
  echo '<input type="hidden" name="act" value="insert">';
  echo '<table class="table table-bordered">';
  echo '<tr><td><div class="text-center">ユーザID</div></td><td><div class="text-center"><input type="text" name="uid"></div></td></tr>';
  echo '<tr><td><div class="text-center">　　　　アカウント名　　　</div></td><td><div class="text-center"><input type="text" name="uname"></div></td></tr>';
  echo '<tr><td><div class="text-center">パスワード</div></td><td><div class="text-center"><input type="password" name="new_ps"></div></td></tr>';
  echo '<tr><td><div class="text-center">ユーザ種別</div></td><td><div class="text-center">';
  foreach($types as $num => $name){
    echo '<input type="radio" name="type" value="'.$num.'">'.$name;
    echo '  ';
  }
  echo '</div></td></tr>';
  echo '</table>';
  echo '<input type="submit" value="登録" class="btn btn-info btn-sm">    <input type="reset" value="取消" class="btn btn-danger btn-sm">';
  echo '</form>';
?>
</div>
</center>