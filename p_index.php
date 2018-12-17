<a href="p_index.php">

<?php
session_start ();
//include ('css/style.css');
include ('src/header.php');

$action = 'p_top'; // トップ画面
if (isset ( $_GET ['do'] )) {
	$action = $_GET ['do'];
}
include ('src/' . $action . '.php');
//include ('src/pg_footer.php');
?>

