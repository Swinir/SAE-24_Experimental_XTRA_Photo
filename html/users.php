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
      ?>

        <section id="main">

            <u><h1>Utilisateurs présents dans la Base</h1></u>
            <br>
          <div class="affusers">
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

              echo '<table>';
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
                  echo '<td> Opérateur </td>';
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
              echo '</table>';
              echo '<input type="submit" value="Modifier">';
            ?>
          </form>
          </div>

        </section>
        <footer>

        </footer>
    </body>
</html>
