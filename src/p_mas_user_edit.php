<center>
<div class="container">
<?php
  require_once('src/db_inc.php');
  $types = array(0 => "管理者", 1 => "社員", 2 => "ゲスト");
  if($_SESSION ['uid_kind'] == 0){
    echo '<h1>管理者用ユーザ編集</h1>';
    $id = $_POST["id"];
  }else{
    echo '<h1>ユーザ編集</h1>';
    $id = $_SESSION["uid"];
  }

  $sql='SELECT * FROM tb_user WHERE uid = "'.$id.'";';
  $rs = mysql_query ( $sql, $conn );
  $row = mysql_fetch_array($rs);
  echo '<p>現在の情報</p>';
  echo '<table class="table table-bordered">';
  echo '<tr>';
  echo '<td><div class="text-center">ユーザID</div></td>';
  $edit_uid = $row["uid"];
  echo '<td><div class="text-center">'.$edit_uid.'</div></td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td><div class="text-center">現在のアカウント名</div></td>';
  $edit_uname = $row["uname"];
  echo '<td><div class="text-center">'.$edit_uname.'</div></td>';
  echo '</tr>';
  echo '<tr>';
  echo '<td><div class="text-center">現在の種別</div></td>';
  $type = $row["uid_kind"];
  echo '<td><div class="text-center">　　　'.$types[$type].'　　　</div></td>';
  echo '</tr>';

  echo '<tr>';
  $ps = "";
  if($_SESSION ['uid_kind'] == 0){
    echo '<td><div class="text-center">現在のパスワード</div></td>';
    $ps = $row["psword"];
    echo '<td><div class="text-center">'.$ps.'</div></td>';
    echo '</tr>';
    echo '</table>';
  }

  echo '<form action="?do=p_mas_ur_save" method="post">';
  echo '<input type="hidden" name="act" value="update">';
  echo '<input type="hidden" name="uid" value="'.$edit_uid.'">';
  echo '<input type="hidden" name="type" value="'.$type.'">';

  echo '<h2><br>アカウント名変更</h2>';
  echo '<input type="text" name="uname" value="'.$edit_uname.'">';

  echo '<br><br><br>';

  echo '<h2>パスワードの変更</h2>';
  echo '<table class="table table-bordered">';
  if($_SESSION ['uid_kind'] != 0){
    echo '<tr><td><div class="text-center">現在のパスワード：</div></td><td><div class="text-center"><input type="password" name="old_ps" value="'.$ps.'"></div></td></tr>';
  }else{
    echo '<input type="hidden" name="old_ps" value="'.$ps.'">';
  }
  echo '<tr><td><div class="text-center">新しいパスワード</div></td><td><div class="text-center"><input type="password" name="new_ps1"></div></td></tr>';
  echo '<tr><td><div class="text-center">　新しいパスワード(再入力)　</div></td><td><div class="text-center"><input type="password" name="new_ps2"></div></td></tr>';
  echo '</table>';

  echo '<input type="submit" value="登録" class="btn btn-info btn-sm">　<input type="reset" value="取消" class="btn btn-danger btn-sm">';
  echo '</form>';
?>
</div>
</center>