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
      include("restri.php");
      ?>

        <section id="main">
          <div class="para">
            <u><h1>Paramétres</h1></u>
            <ul>
              <li><a href="logs.php">Logs</a></li>
              <li><a href="users.php">Comptes Utilisateurs</a></li>
              <li><a href="para_mdp.php">Parametres des mots de passe</a></li>
              <li>.</li>
              <li>.</li>
              <li>.</li>
              <li>.</li>


            </ul>

          </div>
          <div id="prog">
            <div id="comp">
              <?php
              $free = disk_free_space("/");
              $total = disk_total_space("/");
              $pct = (int) (($free/$total) * 100);
              #$pct = 12;
              $taille = 100-$pct;
              echo $taille."%";
              echo '<script>
              var barre = document.getElementById("comp");
               barre.style.width = "'.$taille.'%";
               </script>';
              ?>

            </div>
          </div>
          <?php
          $chiffre = strlen($total)-9;
          $taille_totale = "";

          for ($i=0; $i < $chiffre ; $i++) {
            $taille_totale = $taille_totale.substr($total,$i,1);
          }
          echo ": ".$taille_totale." Gb";
          ?>
        </section>
        <footer>

        </footer>
    </body>
</html>
