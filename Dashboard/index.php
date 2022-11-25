<?php
session_start(); 

if (!isset( $_POST['dept'] ) ) {$_POST['dept']='sae303_45'; if (isset( $_SESSION["deptt"] ) ) {$_POST['dept']=$_SESSION["deptt"];} }
$_SESSION["deptt"]=$_POST['dept'];



$sess=$_SESSION["deptt"];
try
{
  $bdd = new PDO( "mysql:host=localhost;dbname=$sess" , 'root' , '') ;
}
catch ( Exception $e )
{
die ( 'Erreur : ' . $e->getMessage ( ) ) ;
}


 ?>





<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Données Covid 19</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="Style/style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <script
  src="https://code.jquery.com/jquery-3.6.1.min.js"integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>


</head>


<body>

<?php

include("Assets/graphe1age_toutvac.php");
include("Assets/graphe2_typeVac.php");
include("Assets/graphe3_toutvac-alltime.php");
include("Assets/graphe4_hosp-rea.php");

 ?>


<body>
<!-- partial:index.partial.html -->
<div class="app-container">

  <div class="app-content">
    
    <div class="projects-section">
      <div class="projects-section-header">
        <p>Données Covid 19</p>
        <span class="status-type">By Antonin Parédé <button style="position:relative;left:43%;" class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button></span>
        
        <p class="time">
          <script type="text/javascript">
var ladate=new Date()
document.write("Nous sommes le : ");
document.write(ladate.getDate()+"/"+(ladate.getMonth()+1)+"/"+ladate.getFullYear())

</script> 
</p>
      </div>
      <div class="projects-section-line">
        <div class="projects-status">
          <div class="item-status">
            <span class="status-number" style="text-align: center;"><?php echo json_encode($tab_dep);?></span>
            <span class="status-type">Numéro du dépatement</span> 
          </div>
        
          <div class="item-status">
            <span class="status-number" style="text-align: center;"><?php echo json_encode($tab_lib_dep);?>
          </span>
            <span class="status-type">Dépatement en cours</span>
          </div>
          <div class="item-status">
            <span class="status-number" style="text-align: center;">39</span>
            <span class="status-type">Dépatement Disponible</span>
          </div>
          
        </div>
        <div class="view-actions">
        <form action="#" method="post"   >
    <div>
    <p>
		<label  class="status-number" for="dept">Veuillez sélectionner le département qui vous concerne</label> <br>
    <select style="text-align: center;position:relative;left:30%;" name="dept"> 
    <option value="sae303_01">Ain (01)</option>
    <option value="sae303_02">Aisne (02)</option>
    <option value="sae303_03">Allier (03)</option>
    <option value="sae303_04">Alpes-de-Haute-Provence (04)</option>
    <option value="sae303_05">Hautes-Alpes (05)</option>
    <option value="sae303_06">Alpes-Maritimes (06)</option>
    <option value="sae303_07">Ardèche (07)</option>
    <option value="sae303_08">Ardennes (08)</option>
    <option value="sae303_09">Ariège (09)</option>
    <option value="sae303_10">Aube (10)</option>
    <option value="sae303_11">Aude (11)</option>
    <option value="sae303_12">Aveyron (12)</option>
    <option value="sae303_13">Bouches-du-Rhône (13)</option>
    <option value="sae303_14">Calvados (14)</option>
    <option value="sae303_15">Cantal (15)</option>
    <option value="sae303_16">Charente (16)</option>
    <option value="sae303_17">Charente-Maritime (17)</option>
    <option value="sae303_18">Cher (18)</option>
    <option value="sae303_19">Corrèze (19)</option>
    <option value="sae303_21">Côte-d'or (21)</option>
    <option value="sae303_22">Côtes-d'armor (22)</option>
    <option value="sae303_23">Creuse (23)</option>
    <option value="sae303_24">Dordogne (24)</option>
    <option value="sae303_25">Doubs (25)</option>
    <option value="sae303_26">Drôme (26)</option>
    <option value="sae303_27">Eure (27)</option>
    <option value="sae303_28">Eure-et-Loir (28)</option>
    <option value="sae303_29">Finistère (29)</option>
    <option value="sae303_30">Gard (30)</option>
    <option value="sae303_31">Haute-Garonne (31)</option>
    <option value="sae303_32">Gers (32)</option>
    <option value="sae303_33">Gironde (33)</option>
    <option value="sae303_34">Hérault (34)</option>
    <option value="sae303_35">Ile-et-Vilaine (35)</option>
    <option value="sae303_36">Indre (36)</option>
    <option value="sae303_37">Indre-et-Loire (37)</option>
    <option value="sae303_38">Isère (38)</option>
    <option value="sae303_45">Loiret (45)</option>
    </select>
	</p>
    </div>
    <input style="position:relative; left:43%; top:-15px;" type="submit" value="Chercher" />
</form>
          
        </div>
      </div>
      <div class="project-boxes jsGridView">



  <!-- box 1 -->


        <div class="project-box-wrapper">
          <div class="project-box" style="background-color: #fee4cb;">
            <div class="project-box-header">
              <span>2020-03-18 → 2022-11-10</span>
              <dfn data-info="Diagramme représentant le nombre de personnes vaccinées ainsi que leurs âges. Ce traitement d'information sert à visualiser efficacement quelles sont les différentes tranches d'âge majoritairement vaccinées ainsi que leurs nombre exacte. ">Info</dfn>
        </div>
        <div class="project-box-content-header">
          <p class="box-content-header">Taux de gens vacciné par rapport à l’âge</p>
          <p class="box-content-subheader">TOTAL</p>
        </div>
        <div class="box-progress-wrapper">
          <div class="charte1" style="width: 300px; height: 300px; position:relative; left: 17%;  " >
           <canvas id="pie_chart">Désolé, votre navigateur ne prend pas en charge &lt;canvas&gt;.</canvas>
         </div>
         <p style="position:relative; left:15%; top:-150px;" id="1" ></p>
         <script>
            var rien="";
            var tab_etiquettes2="<?php echo json_encode($tab_etiquettes2);?>";
            var tab_donnees2="<?php echo json_encode($tab_donnees2);?>";
            if (tab_etiquettes2 = 'rien'){rien="Il n'y a pas de données pour ce département";}
            else {rien="";}
            if (tab_donnees2 = 'rien'){rien="Il n'y a pas de données pour ce département";}
            else {rien="";}
            $(document).ready(function()
              {
                $('#1').html(rien);
               
                });
          </script>

        </div>
       
        <div class="project-box-footer">
       

        </div>
      </div>
    </div>

  <!-- box 2 -->

        <div class="project-box-wrapper">
          <div class="project-box" style="background-color: #fee4cb;">
            <div class="project-box-header">
              <span>2020-03-18 → 2022-11-10</span>
              <dfn data-info="Diagramme représentant quels sont les types de vaccins utilisés. Ce traitement d'information sert à visualiser efficacement quels sont les différents vaccins majoritairement utilisés ainsi que leurs nombre exacte. ">Info</dfn>
        </div>
        <div class="project-box-content-header">
          <p class="box-content-header">Type de vaccins utilisé</p>
          <p class="box-content-subheader">TOTAL</p>
        </div>
        <div  class="box-progress-wrapper">
          <div style="width: 300px; height: 300px; position:relative; left: 17%;  " >
           <canvas id="pie_chart2">Désolé, votre navigateur ne prend pas en charge &lt;canvas&gt;.</canvas>
         </div>
          <p id="2" style="position:relative; left:15%; top:-150px;" ></p>
          <script>
            var rien="";
            var tab_etiquettes2="<?php echo json_encode($tab_etiquettes2);?>";
            var tab_donnees2="<?php echo json_encode($tab_donnees2);?>";
            if (tab_etiquettes2 = 'rien'){rien="Il n'y a pas de données pour ce département";}
            else {rien="";}
            if (tab_donnees2 = 'rien'){rien="Il n'y a pas de données pour ce département";}
            else {rien="";}
            $(document).ready(function()
              {
                $('#2').html(rien);
               
                });
          </script>


        </div>

        <div class="project-box-footer">
        </div>
      </div>
    </div>

    <!-- box 3 -->

    <div class="project-box-wrapper">
          <div class="project-box" style="background-color: #ffd3e2;">
            <div class="project-box-header">
            <dfn data-info="Diagramme représentant le nombre d'injections à l'aide d'une timeline en fonction du type de vaccin utilisé. Ce traitement d'information sert à visualiser efficacement le déploiement des types de vaccins et permet de les comparer entre eux. ">Info</dfn>
              <span>2020-03-18 → 2022-11-10</span>
             
        </div>
        <div class="project-box-content-header">
     
          <p class="box-content-header"><?php echo json_encode($vaccin);?></p>
         
          <form action="index.php" method="post"   >
           <div>
         <label for="vac">Nom :</label>
         <select name="vac">
          <option value="Tout vaccin">Tout vaccin</option>
          <option value="COMIRNATY Pfizer-BioNTech">Pfizer-BioNTech</option>
          <option value="COMIRNATY Pfizer-BioNTech pédiatrique">Pfizer-BioNTech pédiatrique</option>
          <option value="SPIKEVAX Moderna">Moderna</option>
          <option value="VAXZEVRIA AstraZeneca">AstraZeneca</option>
          <option value="JCOVDEN Janssen">Janssen</option>
          <option value="NUVAXOVID Novavax">Novavax</option>
          <option value="JCOVDEN Janssen">Janssen</option>
          <option value="NUVAXOVID Novavax">Novavax</option>
         </select>
           </div>
            <input type="submit" value="Chercher" />
          </form>

        </div>
        <div class="box-progress-wrapper">
        <div style="width: 100%; height: auto;" >

     <canvas id="bar_chart">Désolé, votre navigateur ne prend pas en charge &lt;canvas&gt;.</canvas>
     <p id="3" style="position:relative; left:15%;" ></p>
         <script>
            var rien="";
            var tab_etiquettes2="<?php echo json_encode($tab_etiquettes2);?>";
            var tab_donnees2="<?php echo json_encode($tab_donnees2);?>";
            if (tab_etiquettes2 = 'rien'){rien="Il n'y a pas de données pour ce département";}
            else {rien="";}
            if (tab_donnees2 = 'rien'){rien="Il n'y a pas de données pour ce département";}
            else {rien="";}
            $(document).ready(function()
              {
                $('#3').html(rien);
               
                });
          </script>
</div>


        <div class="project-box-footer">
        </div>
      </div>
    </div>
</div>
  

        <!-- box 4 -->

        <div class="project-box-wrapper">
          <div class="project-box" style="background-color: #c8f7dc;">
            <div class="project-box-header">
              <span>2020-03-18 → 2022-11-10</span>
              <dfn data-info="Diagramme représentant le nombre d'hospitalisation contre le nombre de réanimation à l'aide d'une timeline. Ce traitement d'information sert à visualiser efficacement la différence entre les 2 types d'insertion en hôpital dans son ensemble. ">Info</dfn>
        </div>
        <div class="project-box-content-header">
      
          <p class="box-content-header">Taux d'hôspitalisation VS Taux en réanimation </p>
        
      
        </div>
        <div class="box-progress-wrapper">
        <div style="width: 100%; height: auto;" >

<canvas id="mixedChart">Désolé, votre navigateur ne prend pas en charge &lt;canvas&gt;.</canvas>
</div>


        <div class="project-box-footer">
        </div>
      </div>
    </div>
</div>
  
   





    
        <!-- box 5 -->

        <div class="project-box-wrapper">
          <div class="project-box" style="background-color: #c8f7dc;">
            <div class="project-box-header">
              <span>2020-03-18 → 2022-11-10</span>
              <dfn data-info="Diagramme représentant le nombre d'hospitalisation contre le nombre de décès cumulés au fur et à mesure de la timeline. Ce traitement d'information sert à visualiser efficacement le taux de décès dans sa globalité ainsi que le nombre de décès total.">Info</dfn>
        </div>
        <div class="project-box-content-header">
      
          <p class="box-content-header">Taux d'hôspitalisation VS Total de décès en hôspitalisation  </p>
        
      
        </div>
        <div class="box-progress-wrapper">
        <div style="width: 100%; height: auto;" >

        <canvas id="mixedChart2">Désolé, votre navigateur ne prend pas en charge &lt;canvas&gt;.</canvas>
      </div>

            <!-- LA -->

        <div class="project-box-footer">
        </div>
      </div>
    </div>
</div>
  

<?php 
if (!isset( $_POST['date'] ) ) {$_POST['date']='2021-02-21'; }
$data6=$bdd -> prepare("SELECT incid_hosp , incid_rea, incid_dchosp, incid_rad FROM `indicateurs_loiret` WHERE date='$_POST[date]' ");
$data6 -> execute();
$incids = $data6 -> fetchAll();

$tab_incid_hosp=array();
$tab_incid_rea=array();
$tab_incid_dchosp=array();
$tab_incid_rad=array();

foreach ($incids as $incid ) {
  $tab_incid_hosp[]=$incid['incid_hosp'];
  $tab_incid_rea[]=$incid['incid_rea'];
  $tab_incid_dchosp[]=$incid['incid_dchosp'];
  $tab_incid_rad[]=$incid['incid_rad'];
}
?>

        <!-- box 6 -->


<div class="project-box-wrapper">
          <div class="project-box" style="background-color: #87CEEB">
            <div class="project-box-header">
            <dfn data-info="Diagramme représentant le nombre d'hospitalisation, de réanimation, de retour à domicile ainsi que les décès sur une journée sélectionné grâce au menu de date. Ce traitement d'information sert à visualiser efficacement les entrées et sorties de l'hôpital.">Info</dfn>
              <span>2020-03-18 → 2022-11-10</span>
        
        </div>
        <div class="project-box-content-header">
      
          <p class="box-content-header">Données du  <?php echo json_encode($_POST['date']);?>  </p>
          <form action="index.php" method="post"   >
           <div>
          
            <input type="date" id="date" name="date" value="2021-02-21" min="2020-03-18" max="2022-11-10">
           </div>
            <input type="submit" value="Chercher" />
          </form>
      
        </div>
        <div  class="box-progress-wrapper">
        <div   style="width: 90%; height: auto;position:relative; left:7%;" >

        <canvas id="radar">Désolé, votre navigateur ne prend pas en charge &lt;canvas&gt;.</canvas>
      </div>

            <!-- LA -->

        <div class="project-box-footer">
        </div>
      </div>
    </div>
</div>
  





   
   
  </div>
</div>

</div>
</div>

  <script  src="Assets/script.js"></script>

































 <script type="text/javascript">
  new Chart(document.getElementById("pie_chart"), {
          type: 'pie',
          data: {
            labels:<?php echo json_encode($tab_etiquettes);?>,
            datasets: [{
              label: "Vacciné",
              backgroundColor: ["rgba(0,0,0,1)", "rgba(0,0,0,0.95)","rgba(0,0,0,0.80)","rgba(0,0,0,0.68)","rgba(0,0,0,0.50)","rgba(0,0,0,0.35)","rgba(0,0,0,0.22)","rgba(0,0,0,0.10)"],
              data:  <?php echo json_encode($tab_donnees);?>
            }]
          },
          options: {
            title: {
              display: true,
              text: 'Taux de gens vacciné par rapport à l’Age au TOTAL'
            }
          }
      });
</script>


<!-- graphe2 -->

<script type="text/javascript">
  new Chart(document.getElementById("pie_chart2"), {
          type: 'pie',
          data: {
            labels:<?php echo json_encode($tab_etiquettes2);?>,
            datasets: [{
              label: "Vacciné",
              backgroundColor: ["rgba(0,0,0,1)", "rgba(0,0,0,0.80)","rgba(0,0,0,0.60)","rgba(0,0,0,0.40)","rgba(0,0,0,0.20)","rgba(0,0,0,0.00)"],
              data:  <?php echo json_encode($tab_donnees2);?>
            }]
          },
          options: {
            title: {
              display: true,
              text: "Type de vaccins par rapport au TOTAL d'injection"
            }
          }
      });
</script>


<!-- graphe3 -->

<script  type="text/javascript">
  new Chart(document.getElementById('bar_chart'), {

                type: 'bar',
                data: {
                        labels:<?php echo json_encode($tab_etiquettes3);?>,
                        datasets: [
                            {
                              label: "Injection",
                              backgroundColor: ["#000000"],
                              data:<?php echo json_encode($tab_donnees3);?>

                            }
                        ]
                      }                
              });      
</script>

<!-- graphe4 -->
<script  type="text/javascript">
  new Chart(document.getElementById('mixedChart'), {
    type: 'scatter',
    data: {
        datasets: [{
            type: 'bar',
            label: 'Insertion en hôpital',
            data: <?php echo json_encode($tab_donnees4);?>
        }, {
            type: 'line',
            label: 'Insertion en réanimation ',
            data: <?php echo json_encode($tab_donnees41);?>,
            fill: true,
            tension: 1,
            pointBorderWidth:0.01
        }],
        labels: <?php echo json_encode($tab_etiquettes41);?>
    },

});
</script>



<!-- graphe5 -->

<script  type="text/javascript">
  new Chart(document.getElementById('mixedChart2'), {
    type: 'scatter',
    data: {
        datasets: [{
            type: 'bar',
            label: 'Insertion en hôpital ',
            data: <?php echo json_encode($tab_donnees4);?>
        }, {
            type: 'line',
            label: 'Total de décès en hôpital',
            data: <?php echo json_encode($tab_donnees42);?>,
            fill: true,
            tension: 1,
            pointBorderWidth:0.01
        }],
        labels: <?php echo json_encode($tab_etiquettes42);?>
    },

});
</script>
    

<!-- Graphe 6 -->


<script  type="text/javascript">


const incid_hosp = parseInt(<?php echo json_encode($tab_incid_hosp);?>);
const incid_rea = parseInt(<?php echo json_encode($tab_incid_rea);?>);
const incid_rad = parseInt(<?php echo json_encode($tab_incid_rad);?>);
const incid_dchosp = parseInt(<?php echo json_encode($tab_incid_dchosp);?>);


  const data = {
  labels: [
    'Hôspitalisation <?php echo json_encode($tab_incid_hosp);?>',
    'Réanimation <?php echo json_encode($tab_incid_rea);?>',
    'Retours à domicile  <?php echo json_encode($tab_incid_rad);?>',
    'Décès <?php echo json_encode($tab_incid_dchosp);?> '

  ],
  datasets: [{
    label: 'Données en 24h',
    data: [incid_hosp,incid_rea,incid_rad,incid_dchosp],
    fill: true,
    backgroundColor: 'rgba(255, 99, 132, 0.2)',
    borderColor: 'rgb(255, 99, 132)',
    pointBackgroundColor: 'rgb(255, 99, 132)',
    pointBorderColor: '#fff',
    pointHoverBackgroundColor: '#fff',
    pointHoverBorderColor: 'rgb(255, 99, 132)'
  }]
};
  new Chart(document.getElementById('radar'), {
    type: 'radar',
  data: data,
  options: {
    elements: {
      line: {
        borderWidth: 1
      }
    }
  },
});



</script>
  
<style>
/** Code for hover info **/

dfn {
  background: rgba(0,0,0,0.2);
  border-bottom: dashed 1px rgba(0,0,0,0.9);
  padding: 0 0.4em;
  cursor: help;
  font-style: normal;
  position: relative;
  
}
dfn::after {
  content: attr(data-info);
  display: inline;
  position: absolute;
  top: 22px; left: 0;
  opacity: 0;
  width: 230px;
  font-size: 13px;
  font-weight: 700;
  line-height: 1.5em;
  padding: 0.5em 0.8em;
  background: rgba(0,0,0,0.9);
  color: #fff;
  pointer-events: none; /* This prevents the box from apearing when hovered. */
  transition: opacity 250ms, top 250ms;
}
dfn::before {
  content: '';
  display: block;
  position: absolute;
  top: 12px; left: 20px;
  opacity: 0;
  width: 0; height: 0;
  border: solid transparent 5px;
  border-bottom-color: rgba(0,0,0,0.9);
  transition: opacity 250ms, top 250ms;
}
dfn:hover {z-index: 2;} /* Keeps the info boxes on top of other elements */
dfn:hover::after,
dfn:hover::before {opacity: 1;}
dfn:hover::after {top: 30px;}
dfn:hover::before {top: 20px;}</style>

</body>
</html>