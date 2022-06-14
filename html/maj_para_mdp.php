<?php

$maj = $_POST['Majuscule'];
$min = $_POST['Minuscule'];
$num = $_POST['Chiffre'];
$spe = $_POST['Speciaux'];
$pwd_len = $_POST['pwd_len'];
$end = time()+3600*24*365;
if(($maj + $min + $num + $spe)<= $pwd_len){
    setcookie("maj_len",$maj,$end);
    setcookie("min_len",$min,$end);
    setcookie("num_len",$num,$end);
    setcookie("spe_len",$spe,$end);
    setcookie("pwd_len",$pwd_len,$end);
    header("Location: para_mdp.php?mdp=1");
    exit();
}else{
    header("Location: para_mdp.php?mdp=2");
    exit();
}

?>