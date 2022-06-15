<?php
session_start();
include("base.php");
include("ajout_logs.php");
$login= $_POST['Iden'];
$mdp=$_POST['mdp'];

$sql="SELECT id_user, password, block_user, admin FROM users WHERE login='".$login."'";
$req= $bd->prepare($sql);
$req->execute();
$mdp2= $req->fetchall();
$req->closeCursor();
$res=$mdp2[0];

$mdp_bd = $res['password'];




if($res['block_user'] == 0){
    if($res['id_user']=='1'){
        if($mdp == $res['password'] OR password_verify($mdp,$mdp_bd)){
            $_SESSION['admin'] = 1;
            $_SESSION['connecte'] = 1;
            $_SESSION['tentative'] = 0;
            $_SESSION['user_conn'] = $login;
            $descri = 'L\\\'utilisateur "'.$login.'" s\\\'est connecté';
            logs($descri,0);
            header ("Location: index.php?con=1");
        }else {
            $_SESSION['connecte'] = 0;
            $_SESSION['tentative'] += 1;
            if($_SESSION['tentative']==3){
                    $sql="UPDATE `users` SET `block_user` = '1' WHERE `login` = '".$login."' ";
                    $req= $bd->prepare($sql);
                    $req->execute();
                    $req->closeCursor();
                    $descri = 'L\\\'utilisateur "'.$login.'" a été bloqué';
                    logs($descri,2);
                }
            header ("Location: connexion.php?con=0");

        }
    }else{
        if (password_verify($mdp,$mdp_bd)) {
            if($res['admin'] == 1){
                $_SESSION['admin'] = 1;
            }else{
                $_SESSION['admin'] = 0;
            }
            $_SESSION['connecte'] = 1;
            $_SESSION['tentative'] = 0;
            $_SESSION['user_conn'] = $login;
            $descri = 'L\\\'utilisateur "'.$login.'" s\\\'est connecté';
            logs($descri,0);
            header ("Location: index.php?con=1");
        }
        else {
            $_SESSION['connecte'] = 0;
            $_SESSION['tentative'] += 1;
            if($_SESSION['tentative']==3){
                    $sql="UPDATE `users` SET `block_user` = '1' WHERE `login` = '".$login."' ";
                    $req= $bd->prepare($sql);
                    $req->execute();
                    $req->closeCursor();
                    $descri = 'L\\\'utilisateur "'.$login.'" a été bloqué';
                    logs($descri,2);
                }
            header ("Location: connexion.php?con=0");

        }
    }

}else{
    header('Location: index.php?con=2');
}
?>
