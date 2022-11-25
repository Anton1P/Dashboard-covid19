
<?php 

$data2=$bdd -> prepare("SELECT `type_vaccin`, `effectif_cumu_termine` FROM `donnees_vaccination` WHERE `semaine_injection`='2022-39' AND `type_vaccin`!='Tout vaccin'AND `type_vaccin`!='SPIKEVAX ORIGINAL/OMICRON BA.1 Moderna' AND `type_vaccin`!='COMIRNATY ORIGINAL/OMICRON BA.5 Pfizer-B' AND `classe_age`='TOUT_AGE'");
$data2 -> execute();
$vaccins = $data2 -> fetchAll();

$tab_etiquettes2=array();
$tab_donnees2=array();
$tab_couleurs=array();

foreach ($vaccins as $vaccin ) {
  $tab_etiquettes2[]=$vaccin['type_vaccin'];
  $tab_donnees2[]=$vaccin['effectif_cumu_termine'];
}

if (!isset( $tab_etiquettes2 ) ) {$tab_etiquettes2 ='rien';}
if (!isset( $tab_donnees2 ) ) {$tab_donnees2 ='rien';}
?>