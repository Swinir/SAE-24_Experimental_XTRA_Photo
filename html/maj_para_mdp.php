<?php

$maj = $_POST['Majuscule'];
$min = $_POST['Minuscule'];
$num = $_POST['Chiffre'];
$spe = $_POST['Speciaux'];
$end = time()+3600*24*365;
setcookie("maj_len",$maj,$end);
setcookie("min_len",$min,$end);
setcookie("num_len",$num,$end);
setcookie("spe_len",$spe,$end);
header("Location: para.php?mdp=1");
exit();
?>