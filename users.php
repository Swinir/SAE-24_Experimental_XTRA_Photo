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

            <u><h1>Utilisateurs présents dans la Base</h1></u>
            <br>
          <div class="affusers">
          <form action="#">
            <p class="g">Toto : <button type="submit">Supprimer</button> <button type="submit">Mettre à niveau</button> </p>
            <p class="b">Tata : <button type="submit">Supprimer</button> <button type="submit">Mettre à niveau</button> </p>
            <p class="g">Titi : <button type="submit">Supprimer</button> <button type="submit">Mettre à niveau</button> </p>
            <p class="b">Tutu : <button type="submit">Supprimer</button> <button type="submit">Mettre à niveau</button> </p>
          </form>
          </div>

        </section>
        <footer>

        </footer>
    </body>
</html>
