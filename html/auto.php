<?php
include('ajout_logs.php');
print_r($_POST);
if($_POST['1']== 'Activer'){
    exec('./launch_cron_activate.sh');
    $descri = 'Activation de la prise de photo automatique';
    logs($descri,1);
    header("Location: para.php?ac=1");
    exit();
}elseif($_POST['1']== 'Désactiver'){
    exec('./launch_cron_disable.sh');
    $descri = 'Désactivation de la prise de photo automatique';
    logs($descri,1);
    header("Location: para.php?ac=0");
    exit();
}
?>