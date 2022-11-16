<?php 

// sql ligne de code en mode ca met tout dans une boucle. etiquettes, donnees, couleurs.

$data=$bdd -> prepare("SELECT `libelle_classe_age`, `effectif_cumu_termine` FROM `donnees_vaccination` WHERE `semaine_injection`='2022-39' AND `type_vaccin`='Tout vaccin' AND `classe_age`!='TOUT_AGE'");
$data -> execute();
$vaccinations = $data -> fetchAll();

$tab_etiquettes=array();
$tab_donnees=array();


foreach ($vaccinations as $vaccination ) {
  $tab_etiquettes[]=$vaccination['libelle_classe_age'];
  $tab_donnees[]=$vaccination['effectif_cumu_termine'];
}

$datadep=$bdd -> prepare("SELECT dep, lib_dep FROM `indicateurs_loiret` WHERE lib_dep!='lib_dep' LIMIT 1;");
$datadep -> execute();
$deps = $datadep -> fetchAll();

$tab_lib_dep=array();
$tab_dep=array();

foreach ($deps as $dep ) {
  $tab_dep[]=$dep['dep'];
  $tab_lib_dep[]=$dep['lib_dep'];
}


$departements=$bdd -> prepare("SELECT departement_residence , Libelle_region FROM donnees_vaccination WHERE departement_residence!='departement_residence' AND Libelle_region!='Libelle_region'LIMIT 1");
$departements -> execute();
$departements = $departements -> fetchAll();




?>