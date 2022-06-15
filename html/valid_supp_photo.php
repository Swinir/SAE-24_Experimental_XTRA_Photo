<?php
session_start();
include("restri.php");
include("base.php");
if(isset($_SESSION['supp_id_photo'])){
    $id = $_SESSION['supp_id_photo'];
}
if(isset($_POST['conf'])){
    if($_POST['conf'] == 'Oui'){
        $sql = "DELETE FROM `photos` WHERE `photos`.`id_photo` = '".$id."' ";
        $req = $bd->prepare($sql);
        $req->execute();
        $req->closeCursor();
        header("Location: gallerie.php?supp=1");
    }elseif($_POST['conf'] == 'Non'){
        header("Location: gallerie.php");
    }
}else{
    header("Location: gallerie.php");
}
?>