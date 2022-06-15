<?php
/* on récupère les infos du formulaire */
include("base.php");
session_start();
include("ajout_logs.php");
if(isset($_POST['rôle'])){
    if($_POST['rôle']=='admin'){
        $role = 1;
    }else{
        $role = 0;
    }
}else{
    header("Location: modif.php?ch=2");
}
if(isset($_SESSION['user_mod'])){
    $user = $_SESSION['user_mod'];
}
/* Update du rôle */
$sql = "UPDATE users SET `users`.`admin`='".$role."' WHERE `users`.`login`='".$user."' ";
$req = $bd->prepare($sql);
$req->execute();
$req->closeCursor();
$descri = 'L\\\'utilisateur "'.$user.'" a été passé au rôle de "'.$role.'"';
logs($descri,2);
header("Location: modif.php?ch=3")
?>