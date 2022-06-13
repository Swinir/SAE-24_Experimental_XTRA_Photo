<?php
    session_start();

    /* Connexion à la base */
    include("base.php");

    /* Récuperation du $_POST */
    if(!empty($_POST['nom'])){
        $nom = $_POST['nom'];
    }elseif(empty($_POST['nom'])){
        $nom = 'NULL';
    }
    
    if(!empty($_POST['descrip'])){
        $descrip = $_POST['descrip'];
    }elseif(empty($_POST['descrip'])){
        $descrip = 'NULL';
    }

    $login = $_SESSION['user_conn'];

    /* Ouverture et lecture du path (simplement) */
    $myfile = fopen("installed_path.txt", "r") or die("Unable to open file!");
    $python_path = fread($myfile,filesize("installed_path.txt"));
    fclose($myfile);

    /* execution de la commande */
    exec('./launch_pic_taker.sh');
    sleep(5); # attente de l'execution du script 

    /* Requete sql : la derniere photo */
    $sql = "SELECT id_photo FROM photos";
    $req = $bd->prepare($sql);
    $req->execute();
    $id_photo = $req->fetchAll();
    $req->closeCursor();

    /* On récupere le dernier id (derniere photo prise) */
    $id_der = $id_photo[count($id_photo)-1]['id_photo'];
    if(isset($_SESSION['user_conn'])){ # Requete sql : le id de l'utilisateur s'il est connecté 
        $sql2 = "SELECT id_user FROM users WHERE login ='".$login."'";
        $req = $bd->prepare($sql2);
        $req->execute();
        $idlog_tab = $req->fetchAll();
        $req->closeCursor();
        print_r($idlog_tab);
        $idlog = $idlog_tab[0]['id_user'];

        /* On met la description dans la BDD */
        $sql = "UPDATE `photos` SET `#user_photo` = '".$idlog."', `description` = '".$descrip."', `name_photo` = '".$nom."' WHERE `photos`.`id_photo` = ".$id_der." ";
        $req = $bd->prepare($sql);
        $req->execute();
        $req->closeCursor();
        echo $sql;

    }else{ # On met la description dans la BDD s'il n'est pas connecté
        $sql = "UPDATE `photos` SET `description` = '".$descrip."', `name_photo` = '".$nom."' WHERE `photos`.`id_photo` = ".$id_der." ";
        $req = $bd->prepare($sql);
        $req->execute();
        $req->closeCursor();
        echo $sql;
    }
    header("Location: index.php")
?>
