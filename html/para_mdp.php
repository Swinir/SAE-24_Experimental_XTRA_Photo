<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title></title>
    </head>
<body>
<?php

use function PHPSTORM_META\map;

include("header.php");
include("menu.php");
include("restri.php");
?>
<section id="main">
    <div class="afflogs">
        <form action="maj_para_mdp.php" method="POST">
            <?php
            if(isset($_GET['mdp'])){
                if($_GET['mdp'] == 1){
                    echo "Paramètre de mot de passe pris en compte";
                }elseif($_GET['mdp'] == 2){
                    echo "Paramètre de mot de passe pas cohérents";
                }
            }
            $carac = array("Majuscule","Minuscule","Chiffre","Speciaux");
            foreach($carac as $val){
                echo ' <p><label for="'.$val.'">Nombre de '.$val.' : </label>
                <select name="'.$val.'" id="'.$val.'">
                    <option value="">--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select></p>';
            }
            ?>
            <p><label for="pwd_len">Longueur du mot de passe : </label>
                <select name="pwd_len" id="pwd_len">
                    <option value="">--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select></p>
            <input type="submit" value="Mettre à jour">
        </form>
    </div>
</section>
</body>
