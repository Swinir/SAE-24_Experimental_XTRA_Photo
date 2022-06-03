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
        include("restri.php");
        $user = $_POST['modif'];


        ?>
    
        <section id="main">

            <u><h1>Modification du compte : <?php echo $user ?></h1></u>
            <br>
          <div class="afflogs">
              
            <form action="change_mdp.php" method="POST">
                <label for="mdp">Mot de passe :</label>
                <input type="submit" name="mdp" value="Modifier">
            </form>

            <form action="supp.php" method="POST">
                <label for="supp">Supprimer :</label>
                <input type="submit" name="supp" value="Supprimer">
            </form>

            <form action="etat.php" method="post">
                <label for="etat">Rôle : </label>
                <select name="rôle" id="rôle">
                    <option value="">Veuillez sélectionner un rôle</option>
                    <option value="admin">Administrateur</option>
                    <option value="op">Opérateur</option>
                </select>
                <input type="submit" value="Mettre à jour">
            </form>
          </div>
        </section>
    </body>
</html>