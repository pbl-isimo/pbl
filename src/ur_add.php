<?php
require_once('src/db_inc.php');
$roles = array(1=>'学生', 2=>'教員', 9=>'管理者');
$uid = $uname = '';
$urole = 1;
$act = 'insert';// 新規登録で変数を初期化
if (isset($_GET['uid'])){//既存アカウントの編集かを調べる
  $uid = $_GET['uid'] ;
  $sql = "SELECT * FROM tb_user WHERE uid='{$uid}'";

  $rs = mysql_query($sql, $conn);
  if (!$rs) die('エラー: ' . mysql_error());
  $row= mysql_fetch_array($rs);
  if ($row){ // 既存アカウントを編集するために、変数に代入
    $act = 'update';
    $uname = $row['uname'];
    $urole = $row['urole'];
  }
}
?>
<h2>アカウント登録・編集</h2>
<form action="?do=ur_save" method="post">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<input type="hidden" name="old_uid" value="<?php echo $uid; ?>">
<table>
<tr><td>ユーザID：</td><td><input type="text" name="uid" value="<?php echo $uid;?>"></td></tr>
<tr><td>氏　名：</td><td><input type="text" name="uname"  value="<?php echo $uname;?>"></td></tr>
<tr><td>パスワード</td><td><input type="password" name="pass1"></td></tr>
<tr><td>（再入力）</td><td><input type="password" name="pass2"></td></tr>
<tr><td>ユーザ種別</td><td>
<?php
  foreach ($roles as $key => $value){
    if ($key==$urole){
      echo '<input type="radio" name="urole" value="' . $key .'" checked>' . $value;
    }else{
      echo '<input type="radio" name="urole" value="' . $key .'">' . $value;
    }
  }
?>
</td></tr>
</table>
<input type="submit" value="登録"><input type="reset" value="取消">
</form>