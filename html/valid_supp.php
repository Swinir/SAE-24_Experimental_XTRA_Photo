<?php
session_start();
include("ajout_logs.php");
include("restri.php");
include("base.php");
if(isset($_SESSION['user_mod'])){
    $user = $_SESSION['user_mod'];
}
if(isset($_POST['conf'])){
    if($_POST['conf'] == 'Oui'){
        $sql = "DELETE FROM `users` WHERE `users`.`login` = '".$user."' ";
        $req = $bd->prepare($sql);
        $req->execute();
        $req->closeCursor();
        $descri = 'L\\\'utilisateur "'.$user.'" a été supprimé';
        logs($descri,1);
        header("Location: users.php?supp=1");
    }elseif($_POST['conf'] == 'Non'){
        header("Location: modif.php?");
    }
}else{
    header("Location: modif.php?");
}
?>