<?php
 session_start();
 unset($_SESSION);
 session_destroy();
 header('Location:?do=sys_login');
?>