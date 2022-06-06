<?php
session_start();
include("restri.php");
include("base.php");

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

/* creation de l'utilisateur demandé */
$date_cr = date("Y-m-d")." ".date("H:i:s");
echo $date_cr;
if($pwd == $cpwd){  #Vérification des deux mots de passe rentrés
    $sql = "INSERT INTO `users` (`id_user`, `#username`, `login`, `password`, `admin`, `block_user`, `duration`) VALUES (NULL, NULL, '".$login."', '".$pwd."', '$role', '0', '".$date_cr."')";
    $req = $bd->prepare($sql);
    $req->execute();
    $req->closeCursor();
    header("Location: users.php?cr=3");
}elseif($pwd != $cpwd){
    header("Location: users.php?cr=4");
}

?>