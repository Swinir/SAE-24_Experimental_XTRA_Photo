<?php
session_start();
include("restri.php");
foreach($_POST as $nom => $val){
    $id_photo = $nom;
}
$_SESSION['supp_id_photo'] = $id_photo;
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
        <u><h1>Êtes-vous sur de vouloir supprimer cette photo :</h1></u>

            <form action="valid_supp_photo.php" method="POST">
                <input type="submit" name="conf" value="Oui">
                <input type="submit" name="conf" value="Non">
            </form>
        </div>
    </section>
</body>
</html>
