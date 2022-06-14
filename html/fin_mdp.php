<?php
include("base.php");
session_start();

/* Recuperation des information */

$login = $_SESSION['user_mod'];
$pwd_old = $_POST['ancien_mdp'];
$pwd_new = $_POST['nouveau_mdp'];
$pwd_cfd = $_POST['conf_mdp'];

/* Verification de l'ancien mdp */

/* Requête de l'ancien mdp */
$sql = "SELECT id_user, password FROM users WHERE login = '".$login."' ";
$req= $bd->prepare($sql);
$req->execute();
$mdp2 = $req->fetchall();
$req->closeCursor();
$mdp = $mdp2[0]['password'];
echo $mdp;
echo $pwd_old;
/* Comparaison de l'ancien mdp de la base avec celui du formulaire */
if($mdp2[0]['id_user']==1){
    if($mdp2[0]['id_user']==$pwd_old){
        if($pwd_new == $pwd_cfd){
            $sql = "UPDATE `users` SET `password` = '".$pwd_new."' WHERE `users`.`login` = '".$login."'";
            $req = $bd->prepare($sql);
            $req->execute();
            $req->closeCursor();
            header("Location: modif.php?ch=1");
        }else{
            header("Location: change_mdp.php?err=1");
        }
    }else{
        header("Location: change_mdp.php?err=2");
    }
}else{
    if(password_verify($pwd_old,$mdp)){
        if($pwd_new == $pwd_cfd){
            $pwd_new = password_hash($pwd_new, PASSWORD_DEFAULT);
            $sql = "UPDATE `users` SET `password` = '".$pwd_new."' WHERE `users`.`login` = '".$login."'";
            $req = $bd->prepare($sql);
            $req->execute();
            $req->closeCursor();
            header("Location: modif.php?ch=1");
        }else{
            header("Location: change_mdp.php?err=1");
        }
    
    }else{
        header("Location: change_mdp.php?err=2");
    }
}


   
?>