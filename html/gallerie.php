<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title></title>
    </head>
    <body>


        <?php
        include("header.php");
        include("menu.php");
        include("base.php");
        ?>

        <section id="main">
          <p><h1>Galerie</h1></p>
          <form action="ordre.php">
          <select name="tri" id="tri" >
          <option value="">Trier par...</option>
          <option value="1">Date (Plus récentes en premier)</option>
          <option value="2">Date (Plus vielle en premier)</option>
          </select>
          <select name="fav" id="tri" >
          <option value="0">Tous les types</option>
          <option value="1">Que les favoris</option>
          <option value="2">Que les non-favoris</option>
          </select>
          <button type="submit" >Rafraichir</button>

          </form>

        <?php

        #print_r($_GET);
        $dsql="SELECT * FROM photos";

        if(isset($_GET['ordre'])){
            if($_GET['ordre'] == "recent"){
                $tri = " ORDER BY date_photo DESC";
            }
            elseif($_GET['ordre'] == "vieu"){
                $tri = " ORDER BY date_photo ASC";
            }elseif($_GET['ordre'] == NULL){
                $tri = " ";
            }
        }elseif(!isset($_GET['ordre'])){
            $tri = " ";
        }
        if(isset($_GET['fav'])){
            if($_GET['fav'] == "fav"){
                $fav = " WHERE `favori`='1'";
            }
            elseif($_GET['fav'] == "nfav"){
                $fav = " WHERE `favori`='0'";
            }elseif($_GET['fav'] == NULL){
                $fav = " ";
            }
        }elseif(!isset($_GET['fav'])){
            $fav = " ";
        }
        $sql = $dsql.$fav.$tri;
        $req= $bd->prepare($sql);
        $req->execute();
        $res= $req->fetchall();
        $req->closeCursor();
        /*echo "<pre>";
        print_r($res);
        echo "</pre>";*/
        foreach($res as $tab){
            echo '<div class="photo">';
            $path_photo = $tab['path_photo'];
            $path_photo_exploded = explode("/", $path_photo);
            $endpath = end($path_photo_exploded);
            $path_photo = "./images/".$endpath;
            echo "<table class=\"photo2\"><tr><td>";
            
            echo '<img src="'.$path_photo.'"><br></td>';
            echo "<td class=\"infos\">";
            echo "<u>Informations : </u><br><br>";
            if(isset($tab['name_photo'])){
                echo "Titre de la photo : ".$tab['name_photo']."<br>";
            }
            if(isset($tab['description'])){
                echo "Description de la photo : ".$tab['description']."<br>";
            }
            
            if(isset($tab['#user_photo'])){
                $nsql = "SELECT `login` FROM users WHERE `id_user` = '".$tab['#user_photo']."'";
                $req= $bd->prepare($nsql);
                $req->execute();
                $log= $req->fetchall();
                $req->closeCursor();
                $login = $log[0]['login'];
                echo "Utilisateur qui a pris la photo : ".$login."<br>";
            }
            echo "Heure de prise : ".$tab['date_photo']."<br>";
            echo "Chemin : ".$tab['path_photo']."<br>";
            
            echo "</td><td class=\"favori\">";
            if($tab['favori']==1){
                echo "<h2>✪</h2> <br>";
            }
            echo '<form action="fav.php" method="POST">
            <input type="submit" name="'.$tab['id_photo'].'" value=" Favori ">
            </form>';
            echo '<form action="supp_photo.php" method="POST">
            <input type="submit" name="'.$tab['id_photo'].'" value=" Supprimer ">
            </form>';
            echo "</td></tr></table>";
            echo '</div>';
        }
        ?>

        </section>
        <footer>

        </footer>
    </body>
</html>
