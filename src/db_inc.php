<?php

$conn = mysql_connect("localhost","root","");//MySQLサーバへ接続
  mysql_select_db("pbl", $conn);    // 使用するデータベースを指定


  //$conn = mysql_connect("localhost","k16jk074","joho2018");//実行環境
  //mysql_select_db("wpk16jk074", $conn);

  mysql_query('set names utf8', $conn); //文字コードをutf8に設定（文字化け対策）

?>