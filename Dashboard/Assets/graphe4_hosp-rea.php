
<?php 

$data4=$bdd -> prepare("SELECT date , hosp FROM `indicateurs_loiret` ");
$data4 -> execute();
$hosps = $data4 -> fetchAll();

$tab_etiquettes4=array();
$tab_donnees4=array();

foreach ($hosps as $hosp ) {
  $tab_etiquettes4[]=$hosp['date'];
  $tab_donnees4[]=$hosp['hosp'];
}

$data41=$bdd -> prepare("SELECT date , rea FROM `indicateurs_loiret` ");
$data41 -> execute();
$reas = $data41 -> fetchAll();

$tab_etiquettes41=array();
$tab_donnees41=array();

foreach ($reas as $rea ) {
  $tab_etiquettes41[]=$rea['date'];
  $tab_donnees41[]=$rea['rea'];
}

$data42=$bdd -> prepare("SELECT date , dchosp FROM `indicateurs_loiret` ");
$data42 -> execute();
$dchosps = $data42 -> fetchAll();

$tab_etiquettes42=array();
$tab_donnees42=array();

foreach ($dchosps as $dchosp ) {
  $tab_etiquettes42[]=$dchosp['date'];
  $tab_donnees42[]=$dchosp['dchosp'];
}






?>