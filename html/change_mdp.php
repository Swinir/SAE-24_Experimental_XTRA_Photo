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
            <form action="fin_mdp.php">
                <label for="amdp">Ancien mot de passe du compte</label><br>
                <input type="text" name="ancien_mdp" id="amdp"><br>

                <label for="nmdp">Nouveau mot de passe</label><br>
                <input type="text" name="nouveau_mdp" id="nmpd"><br>

                <label for="cmdp">Confirmer le nouveau mot de passe</label><br>
                <input type="text" name="conf_mdp" id="cmdp"><br>

                <input type="submit" value="Valider">
            </form>
        </div>
    </section>
</body>
</html>