<?php
try
{
$bdd = new PDO( 'mysql:host=localhost;dbname=sae303' , 'root' , '') ;
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
  <title>Titre de la page</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="vole.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="style.css">

</head>


<body>


<?php

include("graphe1age_toutvac.php");
include("graphe2_typeVac.php");
include("graphe3_toutvac-alltime.php");
include("graphe4_hosp-rea.php");

 ?>


<body>
<!-- partial:index.partial.html -->
<div class="app-container">

  <div class="app-content">
    
    <div class="projects-section">
      <div class="projects-section-header">
        <p>Données Covid 19</p>
        <span class="status-type">By Antonin Parédé</span>
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
            <span class="status-number" style="text-align: center;">1</span>
            <span class="status-type">Dépatement Disponible</span>
          </div>
        
          <div class="item-status">
            <span class="status-number" style="text-align: center;"><?php echo json_encode($tab_lib_dep);?>
          </span>
            <span class="status-type">Dépatement en cours</span>
          </div>
          <div class="item-status">
            <span class="status-number" style="text-align: center;"><?php echo json_encode($tab_dep);?></span>
            <span class="status-type">Numéro du dépatement</span>
          </div>
        </div>
        <div class="view-actions">
        <form action="#" method="post"   >
    <div>
    <p>
		<label for="dept">Veuillez sélectionner le département qui vous concerne</label> <br>
    <select name="dept">

<?php
foreach ($departements as $departement) {
  $numero=$departement['departement_residence'];
  $libelle_dept=$departement['Libelle_region'];
  echo "<option value=$numero>$libelle_dept ($numero)</option>";
}

?>

</select>

	</p>
    </div>
    <input style="position:relative; left:40%; top:10px;" type="submit" value="Chercher" />
</form>
          
        </div>
      </div>
      <div class="project-boxes jsGridView">



  <!-- box 1 -->


        <div class="project-box-wrapper">
          <div class="project-box" style="background-color: #fee4cb;">
            <div class="project-box-header">
              <span>2020-03-18 → 2022-11-10</span>
        
        </div>
        <div class="project-box-content-header">
          <p class="box-content-header">Taux de gens vacciné par rapport à l’âge</p>
          <p class="box-content-subheader">TOTAL</p>
        </div>
        <div class="box-progress-wrapper">
          <div class="charte1" style="width: 300px; height: 300px; position:relative; left: 17%;  " >
           <canvas id="pie_chart">Désolé, votre navigateur ne prend pas en charge &lt;canvas&gt;.</canvas>
         </div>
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
        
        </div>
        <div class="project-box-content-header">
          <p class="box-content-header">Type de vaccins utilisé</p>
          <p class="box-content-subheader">TOTAL</p>
        </div>
        <div class="box-progress-wrapper">
          <div style="width: 300px; height: 300px; position:relative; left: 17%;  " >
           <canvas id="pie_chart2">Désolé, votre navigateur ne prend pas en charge &lt;canvas&gt;.</canvas>
         </div>
        </div>

        <div class="project-box-footer">
        </div>
      </div>
    </div>

    <!-- box 3 -->

    <div class="project-box-wrapper">
          <div class="project-box" style="background-color: #ffd3e2;">
            <div class="project-box-header">
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
         </select>
           </div>
            <input type="submit" value="Chercher" />
          </form>

        </div>
        <div class="box-progress-wrapper">
        <div style="width: 100%; height: auto;" >

     <canvas id="bar_chart">Désolé, votre navigateur ne prend pas en charge &lt;canvas&gt;.</canvas>
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
  

   
   
  </div>
</div>

</div>
</div>
<!-- partial -->
  <script  src="script.js"></script>





































<!-- Graphe 1
<div style="width: 900px; height: 500px;" >
<label for="pie_chart" style="color:#000000; font-size:1.5em; position:relative; left:0%;"> Taux de gens vacciné par rapport à l’âge au total
</label>
     <canvas id="pie_chart">Désolé, votre navigateur ne prend pas en charge &lt;canvas&gt;.</canvas>
</div>


Graphe 2 

<div style="width: 900px; height: 500px;" >
<label for="pie_chart2" style="color:#000000; font-size:1.5em; position:relative; left:0%;"> Type de vaccins par rapport au total d'injection</label>
     <canvas id="pie_chart2">Désolé, votre navigateur ne prend pas en charge &lt;canvas&gt;.</canvas>
</div>


Graphe 3 


<div style="width: 900px; height: 500px;" >
<label for="pie_chart2" style="color:#000000; font-size:1.5em; position:relative; left:0%;">  <?php echo json_encode($vaccin);?> </label>
     <canvas id="bar_chart">Désolé, votre navigateur ne prend pas en charge &lt;canvas&gt;.</canvas>
</div>




<form action="covid_19.php" method="post"   >
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
        </select>
    </div>
    <input type="submit" value="Chercher" />
</form>

Graphe 4 

<div style="width: 900px; height: 500px;" >

     <canvas id="mixedChart">Désolé, votre navigateur ne prend pas en charge &lt;canvas&gt;.</canvas>
</div>
 -->








































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
    


</body>
</html>