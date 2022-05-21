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
            <?php       
            if(isset($_GET['con'])){
                if($_GET['con'] == 0){
                    echo "Identifiant ou mot de passe éroné. Veuillez réessayer.";
                    echo "Tentative effectuée ".$_SESSION['tentative'];
                }
            }
            if(isset($_SESSION['tentative'])){
                if($_SESSION['tentative']==3){
                    echo "vous etes bloqués : Trop de tentative effectuées. Veillez contacter l'administrateur.";
                }
            }
            ?>
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