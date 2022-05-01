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
          <p><h1>Galerie</h1></p>
          <select name="tri" id="tri" >
          <option value="">Trier par...</option>
          <option value="date0">Date (Plus récentes en premier)</option>
          <option value="date10">Date (Plus vielle en premier)</option>
          <option value="userA">Utilisateur (Ordre Alphabetique)</option>.
          <option value="userZ">Utilisateur (Ordre Alphabetique inverse)</option>
          </select>

          <div class="photo">
          Photo 1
          </div>
          <br>
          <div class="photo">
          Photo 2
          </div>
          <br>
          <div class="photo">
          Photo 3
          </div>
          <br>
        </section>
        <footer>

        </footer>
    </body>
</html>
