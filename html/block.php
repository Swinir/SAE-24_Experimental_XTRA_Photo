<?php
session_start();
include("restri.php");
include("base.php");
include("ajout_logs.php");
/* Premiere requete pour voir l'état de l'utilisateur */
$sql = "SELECT block_user FROM users WHERE login = '".$_SESSION['user_mod']."' ";
$req = $bd->prepare($sql);
$req->execute();
$enr = $req->fetchAll();
$req->closeCursor();
$blockb = $enr[0]['block_user'];
$block = 0;
echo $blockb;
/* si lutilisatilisateur n'est pas bloquer : le bloquer et vice-versa*/
if($blockb == 0){
    $block = 1;
}elseif($blockb == 1){
    $block = 0;
}

/* mise a jour de la BDD */
$sql = "UPDATE users SET block_user = '".$block."' WHERE login = '".$_SESSION['user_mod']."' ";
echo $sql;
$req = $bd->prepare($sql);
$req->execute();
$req->closeCursor();

if($block == 0){
    $descri = 'L\'utilisateur "'.$_SESSION['user_mod'].'" a été débloqué';
    logs($descri,1);
    header("Location: modif.php?ch=4");
    exit();
}elseif($block == 1){
    $descri = 'L\'utilisateur "'.$_SESSION['user_mod'].'" a été bloqué';
    logs($descri,1);
    header("Location: modif.php?ch=5");
    exit();
}

?>