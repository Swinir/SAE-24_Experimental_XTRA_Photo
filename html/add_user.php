<?php
session_start();
include("restri.php");
include("base.php");
include("cnt_mdp.php");

/* Recuperation du formulaire */
$login = $_POST['login'];
$pwd = $_POST['pwd'];
$cpwd = $_POST['con_pwd'];
print_r($_POST);
$role = 0;
if(isset($_POST['role'])){
    if($role == 'admin'){
        $role = 1;
    }elseif($role == 'op'){
        $role = 0;
    }
}else{
    header("Location: users.php?cr=2");
}

/* Verification que le login est disponible */
$sql = "SELECT `users`.`login` FROM `users` WHERE `users`.`login` = '".$login."'";
$req = $bd->prepare($sql);
$req->execute();
$res = $req->fetchAll();
$req->closeCursor();

if(!empty($res)){
    header("Location: users.php?cr=1"); #si pas dispo : revoie vers la page précédente
}

/* Vérification des paramètres du mot de passe */
$var = cnt_mdp($pwd);

if($pwd >= $_SESSION['pwd_len']){
    if($var['maj'] >= $_COOKIE['maj_len'] && $var['min'] >= $_COOKIE['min_len'] && $var['num'] >= $_COOKIE['num_len'] && $var['spe'] >= $_COOKIE['spe_len']){
        
        /* Si le mot de passe est bon : création de l'utilisateur demandé */
        $date_cr = date("Y-m-d")." ".date("H:i:s");
        echo $date_cr;
        if($pwd == $cpwd){  #Vérification des deux mots de passe rentrés
            $mdp = password_hash($pwd,PASSWORD_DEFAULT); #encryption du mot de passe 
            $sql = "INSERT INTO `users` (`id_user`, `login`, `password`, `admin`, `block_user`, `duration`) VALUES (NULL, '".$login."', '".$mdp."', '$role', '0', '".$date_cr."')";
            echo $sql;
            $req = $bd->prepare($sql);
            $req->execute();
            $req->closeCursor();

            #header("Location: users.php?cr=3");
        }elseif($pwd != $cpwd){
            header("Location: users.php?cr=4");
        }
        
    }else{
        header('Location: users.php?cr=5 ');
    }
}


?>