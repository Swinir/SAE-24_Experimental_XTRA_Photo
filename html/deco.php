<?php
session_start();
$_SESSION['connecte'] = 0;
$_SESSION['tentative'] = 0;
$_SESSION['admin'] = 0;
$_SESSION['user_conn'] = null;
header('Location: index.php')
?>