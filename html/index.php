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
      ?>

        <section id="main">
            <?php
            if(isset($_GET['con'])){
                if($_GET['con'] == 1){
                    echo "Vous êtes connecté !";
                }elseif($_GET['con'] == 2){
                    echo "Vous avez été bloqué ulterieurement. Veuillez contacter un administrateur.";
                }
            }
                
            ?>
            <h1>Capture du banc</h1>
            <form method="post" action='photo.php'>

                  <p><input type="text" name="nom" id="nom" class="ind" placeholder="Nom de la capture (optionel)">
                  </p>
                  <br>

                  <p><textarea type="textarea" rows="5" cols="40" name="descrip" id="description" class="ind" placeholder="Description... (optionel)" ></textarea>
                  </p>

                  <p><input type="submit" id="capture_button" value="Démarrer la capture"></p>

        </section>

    </body>
</html>



