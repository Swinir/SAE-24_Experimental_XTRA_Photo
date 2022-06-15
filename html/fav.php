<?php
include("base.php");
foreach($_POST as $name => $qqch){
    $id = $name;
}
$sql = "SELECT favori FROM photos WHERE id_photo = '".$id."'";
$req=$bd->prepare($sql);
$req->execute();
$res = $req->fetchAll();
$req->closeCursor();
$fav = $res[0]['favori'];

if($fav == 1){
    $new_fav  = 0;
}else{
    $new_fav = 1;
}

$sql = "UPDATE photos SET `favori` = '".$new_fav."' WHERE `id_photo` = '".$id."'";
$req=$bd->prepare($sql);
$req->execute();
$req->closeCursor();
header("Location: gallerie.php");
exit()
?>