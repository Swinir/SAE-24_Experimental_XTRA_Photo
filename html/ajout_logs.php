<?php


function logs($description, $niveau){
    include("base.php");
    $date = date("Y-m-d")." ".date("H:i:s");
    $sql = "INSERT INTO logs(contenue_log,niv_log,date_log) VALUES ('".$description."','".$niveau."','".$date."')";
    echo $sql;
    $req = $bd->prepare($sql);
    $req->execute();
    $req->closeCursor();
}
?>