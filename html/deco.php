<?php
session_start();
$_SESSION['connecte'] = 0;
$_SESSION['tentative'] = 0;
$_SESSION['admin'] = 0;
header('Location: index.php')
?>