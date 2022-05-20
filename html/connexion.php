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

            <h1>Connexion</h1>
            <div id="connexion">
            <form method="post" action='conn.php'>

            <p><input type="text" name="Iden" id="Iden" class="formcon" placeholder=" Identifiant">
            </p>
        
            <p><input type="password" name="mdp" id="mdp" class="formcon" placeholder=" Mot de passe" >
            </p>

            <p><input type="submit" value="Connexion"></p>
            </div>
            
        </section>

    </body>
</html>