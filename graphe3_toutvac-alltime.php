

<?php 
if (!isset( $_POST['vac'] ) ) {$_POST['vac']='Tout vaccin'; }

$data3=$bdd -> prepare("SELECT `semaine_injection`, `effectif_termine` FROM `donnees_vaccination` WHERE  `type_vaccin`='$_POST[vac]' AND `classe_age`='TOUT_AGE'");
$data3 -> execute();
$injections = $data3 -> fetchAll();

$tab_etiquettes3=array();
$tab_donnees3=array();


foreach ($injections as $injection ) {
  $tab_etiquettes3[]=$injection['semaine_injection'];
  $tab_donnees3[]=$injection['effectif_termine'];
}
$vaccin=$_POST['vac'];

if ($vaccin=="VAXZEVRIA AstraZeneca"){
  $vaccin="Injection d'AstraZeneca dans le Loiret";
}
elseif ($vaccin=="COMIRNATY Pfizer-BioNTech") {
  $vaccin="Injection de Pfizer-BioNTech dans le Loiret";
}
elseif ($vaccin=="COMIRNATY Pfizer-BioNTech pédiatrique") {
  $vaccin="Injection de Pfizer-BioNTech pediatrique dans le Loiret";
}
elseif ($vaccin=="SPIKEVAX Moderna") {
  $vaccin="Injection de Moderna dans le Loiret";
}
elseif ($vaccin=="JCOVDEN Janssen") {
  $vaccin="Injection de Janssen dans le Loiret";
}
elseif ($vaccin=="NUVAXOVID Novavax") {
  $vaccin="Injection de Novavax dans le Loiret";
}
else{  $vaccin="Injection de tout les vaccins dans le Loiret";}
?>

