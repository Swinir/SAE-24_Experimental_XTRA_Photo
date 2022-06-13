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
            }
        }elseif(!isset($_GET['ordre'])){
            $tri = " ";
        }
        $sql = $dsql. $tri;
        $req= $bd->prepare($sql);
        $req->execute();
        $res= $req->fetchall();
        $req->closeCursor();
        echo "<pre>";
        print_r($res);
        echo "</pre>";
        foreach($res as $tab){
            echo '<div class="photo">';
            $path_photo = $tab['path_photo'];
            $path_photo_exploded = explode("/", $path_photo);
            $endpath = end($path_photo_exploded);
            $path_photo = "./images/".$endpath;
            echo '<img src="'.$path_photo.'"><br>';
            echo '</div>';

        }
        ?>

        </section>
        <footer>

        </footer>
    </body>
</html>
