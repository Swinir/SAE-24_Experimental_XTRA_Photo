<?php
session_start();
include("restri.php");
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Êtes-vous sûr ?</title>
</head>
<body>
    <section id="main">
        <div class="afflog">
        <u><h1>Êtes-vous sur de vouloir supprimer cet utilisateur :</h1></u>
            <h2><?php echo $_SESSION['user_mod']?></h2>
            

            <form action="valid_supp.php" method="POST">
                <input type="submit" name="conf" value="Oui">
                <input type="submit" name="conf" value="Non">
            </form>
        </div>
    </section>
</body>
</html>