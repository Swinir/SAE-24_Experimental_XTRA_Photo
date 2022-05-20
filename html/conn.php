<?php
include("base.php");

$login= $_POST['Iden'];
$mdp=$_POST['mdp'];

$sql="SELECT password FROM users WHERE login='".$login."'";
$req= $bd->prepare($sql);
$req->execute();
$mdp2= $req->fetchall();
$req->closeCursor();
$res=$mdp2[0];
echo "<pre>";
print_r ($mdp2);
echo "</pre>";





if ($mdp==$res['password']) {
    echo "connecté" .$login;
    header ("Location: index.php?con=1");
}
else {
    header ("Location: index.php?con=0");

}
?>
