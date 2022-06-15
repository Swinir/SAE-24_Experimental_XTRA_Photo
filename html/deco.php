<?php
session_start();
include("ajout_logs.php");
$_SESSION['connecte'] = 0;
$_SESSION['tentative'] = 0;
$_SESSION['admin'] = 0;
$descri = 'L\'utilisateur "'.$_SESSION['user_conn'].'" a été déconnecté';
logs($descri,0);
$_SESSION['user_conn'] = 'null';
header('Location: index.php')
?>