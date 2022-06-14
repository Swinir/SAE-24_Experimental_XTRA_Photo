<?php
if (isset($_GET['tri'])){
    if($_GET['tri'] == 1){
        $tri = 'recent';
    }
    elseif($_GET['tri'] == 2){
        $tri = 'vieu';
    }else{
        $tri = NULL;
    }
}
if (isset($_GET['fav'])){
    
    if($_GET['fav'] ==1){
        $fav = 'fav';
    }
    elseif($_GET['fav'] == 2){
        $fav = 'nfav';
    }else{
        $fav = NULL;
    }
}
print_r($_GET);
echo $tri;

header("Location: gallerie.php?ordre=".$tri."&fav=".$fav." ");
exit();

?>