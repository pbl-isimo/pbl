<?php
 session_start();
 unset($_SESSION);
 session_destroy();
 echo '<script> location.replace("?do=sys_login"); </script>';
?>