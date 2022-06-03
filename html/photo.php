<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title></title>
    </head>
    <body>
        <div id="chargeement">
            <h1>Chargement ...</h1>
        </div>
        
    <?php 
        /* COnnexion à la base */
        include("base.php");

        /* Récuperation du $_POST */

        $nom = $_POST['nom'];
        $descrip = $_POST['descrip'];

        /* Ouverture et lecture du path (simplement) */

        $myfile = fopen("installed_path.txt", "r") or die("Unable to open file!");
        $python_path = fread($myfile,filesize("installed_path.txt"));
        fclose($myfile);

        /* execution de la commande */

        #exec("python3 ".$python_path."+main.py");

        sleep(10); /* attente de l'execution du script */

        /* Requete sql */

        $sql = "SELECT id_photo FROM photos";
        $req = $bd->prepare($sql);
        $req->execute();
        $id_photo = $req->fetchAll();
        $req->closeCursor();

        /* On récupere le dernier id (derniere photo prise) */

        $id_der = $id_photo[count($id_photo)-1]['id_photo'];

        /* On met la description dans la BDD */

        $sql = "UPDATE photos SET description = '".$descrip."', nom = '".$nom."' WHERE id_photo = '".$id_der."' ";
        $req = $bd->prepare($sql);
        $req->execute();
        $req->closeCursor();

        header("Location: index.php")
        ?>
    </body>

