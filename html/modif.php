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
        if(isset($_POST['modif'])){
            $_SESSION['user_mod'] = $_POST['modif'];
        }

        ?>
    
        <section id="main">
            
            <u><h1>Modification du compte : <?php echo $_SESSION['user_mod'] ?></h1></u>
            <br>
          <div class="afflogs">
            <form action="change_mdp.php" method="POST">
                <label for="mdp">Mot de passe :</label>
                <input type="submit" name="mdp" value="Modifier">
            </form>
            <br>
            <form action="supp.php" method="POST">
                <label for="supp">Supprimer :</label>
                <input type="submit" name="supp" value="Supprimer">
            </form>
            <br>
            <form action="etat.php" method="post">
                <label for="etat">Rôle : </label>
                <select name="rôle" id="rôle">
                    <option value="">Veuillez sélectionner un rôle</option>
                    <option value="admin">Administrateur</option>
                    <option value="op">Opérateur</option>
                </select>
                <input type="submit" value="Mettre à jour">
            </form>
            <br>
            <form action="block.php" method="POST">
                <label for="block">Bloquer/Débloquer :</label>
                <input type="submit" name="block" value=" Bloquer/Débloquer " id="block_button">
            </form>
            <br>
            <?php
            if(isset($_GET['ch'])){
                if($_GET['ch']== 1 ){
                    echo '<p style="color : red; font-size : 17px">Message : Mot de passe changé avec succés</p>';
                }elseif($_GET['ch']== 2 ){
                    echo '<p style="color : red; font-size : 17px">Message : Veuillez sélectionner un rôle</p>';
                }elseif($_GET['ch']== 3 ){
                    echo '<p style="color : red; font-size : 17px">Message : Rôle mis à jour</p>';
                }elseif($_GET['ch']== 4 ){
                    echo '<p style="color : red; font-size : 17px">Message : Utilisateur débloqué </p>';
                }elseif($_GET['ch']== 5 ){
                    echo '<p style="color : red; font-size : 17px">Message : Utilisateur bloqué </p>';
                }
            }
            ?>
          </div>
        </section>
    </body>
</html>