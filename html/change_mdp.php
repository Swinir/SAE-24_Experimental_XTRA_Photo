<?php
include("base.php");

?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Changer de mot de passe</title>
</head>
<body>
    <?php
    include("header.php");
    include("menu.php");
    include("restri.php");
    ?>
    <section id="main">
        
        <div id="mdp">
            <form action="fin_mdp.php" method="POST">
                <label for="amdp">Ancien mot de passe du compte</label><br>
                <input type="password" name="ancien_mdp" id="amdp"><br>

                <label for="nmdp">Nouveau mot de passe</label><br>
                <input type="password" name="nouveau_mdp" id="nmdp"><br>

                <label for="cmdp">Confirmer le nouveau mot de passe</label><br>
                <input type="password" name="conf_mdp" id="cmdp"><br>
                <p><input type="checkbox" onclick="shmdp()">Show Password</p>
                <input type="submit" value="Valider">
            </form>
            <?php 
                if(isset($_GET['err'])){
                    if($_GET['err']==1){
                        echo '<p style="color : red; font-size : 17px">Les nouveaux mots de passe ne correspondent pas</p>';
                    }elseif($_GET['err']==2){
                        echo '<p style="color : red; font-size : 17px">Le mot de passe entré ne correspond pas à l\'ancien mot de passe</p>';
                    }
                }
            ?>
        </div>
    </section>
    

<script>
function shmdp() {
  var x = document.getElementById("amdp");
  var y = document.getElementById("nmdp");
  var z = document.getElementById("cmdp");
  if ((x.type === "password") && (y.type === "password") && (z.type === "password")) {
    x.type = "text";
    y.type = "text";
    z.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
    z.type = "password";
  }

}
</script>
</body>
</html>