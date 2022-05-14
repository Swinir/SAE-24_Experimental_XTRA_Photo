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

            <h1>Capture du banc</h1>
            <form method="post" action='action.php'>

                  <p><input type="text" name="nom" id="nom" class="ind" placeholder="Nom de la capture">
                  </p>
                  <br>

                  <p><textarea type="textarea" rows="5" cols="40" id="description" class="ind" placeholder="Description... (optionel)" ></textarea>
                  </p>

                  <p><input type="button" value="Démarrer la capture"></p>

        </section>

    </body>
</html>
