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

            <u><h1>Logs</h1></u>
            <br>
          <div class="afflogs">
          <?php
            $sql = "SELECT `id_log`,`contenue_log`,`niv_log`, `date_log` FROM logs";
            $req = $bd->prepare($sql);
            $req->execute();
            $logs = $req->fetchAll();
            $req->closeCursor();

            /*echo "<pre>";
            print_r($logs);
            echo "</pre>";*/

           
            echo '<table>';
            foreach($logs as $enr){
              
              echo '<tr>';
              echo '<td>'.$enr['id_log'].'</td>';
              echo '<td class="contenue_log" >'.$enr['contenue_log'].'</td>';
              if($enr['niv_log']== 0){
                echo '<td class="niv_log" style="background-color : white"> Information </td>';
              }elseif($enr['niv_log']== 1){
                echo '<td class="niv_log" style="background-color : green"> Remarque </td>';
              }elseif($enr['niv_log']== 2){
                echo '<td class="niv_log" style="background-color : orange"> Avertissement </td>';
              }elseif($enr['niv_log']== 3){
                echo '<td class="niv_log" style="background-color : red"> Erreur </td>';
              }
              echo '<td class="date_log">'.$enr['date_log'].'</td>';
              echo '</tr>';
            }
            echo '</table>';
          ?>
          </div>

        </section>
        <footer>

        </footer>
    </body>
</html>
