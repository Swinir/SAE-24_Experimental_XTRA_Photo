<?php
if (isset($_GET['tri'])){
    if($_GET['tri'] == 1){
        $get = 'recent';
    }
    elseif($_GET['tri'] == 2){
        $get = 'vieu';
    }
    else{
        header("Location: gallerie.php");
        exit();
    }
}
print_r($_GET);
echo $get;

header("Location: gallerie.php?ordre=".$get." ");
exit();

?>