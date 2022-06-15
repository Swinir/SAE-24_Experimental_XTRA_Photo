<?php

/* APPEL DE LA FONCTION : $var = cnt_mdp($mdp) avec $mdp récupéré depuis le formulaire */

function cnt_mdp($mdp){
    
    /* Definition des patterns de récupération */
    $pat_maj = '*[A-Z]*';   # seulement les majuscules
    $pat_min = '*[a-z]*';   # seulement les minuscules
    $pat_num = '*[0-9]*';   # seulement les chiffres
    $pat_spe = '*[\( \[ \! \" \# \$ \% \& \' \* \+ \, \- \. \/ \; \< \= \> \? \@ \\ \^ \_ \` \| \} \~ \] \) \{ ]*'; # seulement les caractères spéciaux

    /* recuperation de chaque caracteres dans la chaine ($mdp) */
    preg_match_all($pat_maj, $mdp, $sortie_maj);
    preg_match_all($pat_min, $mdp, $sortie_min);
    preg_match_all($pat_num, $mdp, $sortie_num);
    preg_match_all($pat_spe, $mdp, $sortie_spe);
    /* Les sorties sont des tableaux */

    /* Récupération du nombre de caractères de chaque tableau de sortie */
    $nb_maj = count($sortie_maj[0]);
    $nb_min = count($sortie_min[0]);
    $nb_num = count($sortie_num[0]);
    $nb_spe = count($sortie_spe[0]);

    /* Renvoie des variables sous la forme d'un tableau associatif (pour "return" une seule variable) */
    $renvoi = array('maj' => $nb_maj, 'min' => $nb_min, 'num' => $nb_num, 'spe' => $nb_spe);
    return $renvoi;
}

?>
