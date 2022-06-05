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
      $_SESSION['user_mod'] = null;
      ?>

        <section id="main">

            <u><h1>Utilisateurs présents dans la Base</h1></u>
            <br>
          <div class="afflogs">
          <?php
            if(isset($_GET['supp'])){
              if($_GET['supp']==1){
                echo "<p> L'utilisateur a bien été supprimé </p>";
              }
            }
            ?>
            <p><h2><u>Modifier un utilisateur existant : </u></h2></p>
          <form action="modif.php" method="POST">
            <?php
              $sql = "SELECT * FROM users";
              $req = $bd->prepare($sql);
              $req->execute();
              $user = $req->fetchAll();
              $req->closeCursor();
              
              /*echo "<pre>";
              print_r($user);
              echo "</pre>";*/

              echo '<p><table>';
              echo '<tr style="color : white; background-color : black">';
              echo '<td>Utilisateur</td>';
              echo '<td>Niveau du compte</td>';
              echo '<td>Etat du compte </td>';
              echo '</tr>';
              foreach($user as $util){
                echo '<tr>';
                echo '<td>Utilisateur : '.$util['login'].'</td>';
                if($util['admin'] == 1){
                  echo '<td style="color : red"> Admin </td>';
                }
                else{
                  echo '<td style="color : blue"> Opérateur </td>';
                }
                if($util['block_user'] == 1){
                  echo '<td> Bloqué </td>';
                }
                else{
                  echo '<td> Libre </td>';
                }
                echo '<td><input type="radio" name="modif" value="'.$util['login'].'"></td>';
                echo '</tr>';
              }
              echo '</table></p>';
              echo '<p> <input type="submit" value="Modifier"></p>';
            ?>
          </form>
          <p><hr></p>
          <p><h2><u> Ajouter un nouvel utilisateur : </u></h2></p>
          <form action="add_user.php" method="POST">

            <p><label for="nom">Nom d'utilisateur : </label>
            <input type="text" name="login" id="nom"></p>
            <p><label for="pwd">Mot de passe : </label>
            <input type="password" name="pwd" id="pwd"></p>
            <p><label for="con_pwd">Confirmer le mot de passe : </label>
            <input type="password" name="con_pwd" id="con_pwd"></p>
            <p><label for="role">Rôle : </label>
            <select name="role" id="role">
              <option value="">Veuillez selectionner un rôle</option>
              <option value="admin">Administrateur</option>
              <option value="op">Opérateur</option>
            </select></p>
            <p>
            <input type="submit" value="Créer"></p>
          </form>
          </div>
          
        </section>
        <footer>

        </footer>
    </body>
</html>
