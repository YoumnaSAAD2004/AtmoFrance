<?php
$page_title = "Meteo";
include_once('include/header.inc.php');
include_once('include/functions.inc.php');
$csvFilePath = 'data/communes.csv';

?>


<main>
<h1>Carte interactive - AtmoFrance</h1>
        
<figure>
    
  <img src="images/regions.jpg" usemap="#carteFrance" alt="Carte des régions françaises">
  <figcaption>Cliquez sur une région</figcaption>
</figure>
<section>
<h2>Choisissez une région de France</h2>

<article> 
<h3>Carte interactive et sélection d’un département</h3>

<p>Cliquez sur une région de la carte ci-dessous pour afficher une liste des départements associés. Vous pourrez ensuite sélectionner un département pour obtenir des informations supplémentaires.</p>
<map name="carteFrance">
  <!-- Hauts-de-France -->
  <area shape="poly"
      coords="408,10,437,6,450,0,458,12,458,25,471,31,489,25,495,32,497,44,515,49,521,60,548,57,551,68,548,86,552,102,538,134,519,140,523,157,510,179,489,162,474,160,456,159,428,154,410,153,408,126,406,96,392,79,398,59,398,23"
      href="#hauts-de-france"
      alt="Hauts-de-France"
      title="Hauts-de-France"
      data-region="Hauts-de-France">
  
  <!-- Normandie -->
  <area shape="poly"
      coords="260,209,253,202,222,208,213,199,215,180,198,123,195,105,231,111,238,137,250,136,283,140,299,145,311,135,312,119,325,103,375,92,388,81,401,94,409,109,408,147,393,167,382,184,357,191,355,200,361,215,346,221,350,231,323,216,322,211,305,216,290,201"
      href="#normandie"
      alt="Normandie"
      title="Normandie"
      data-region="Normandie">
  
  <!-- Bretagne -->
  <area shape="poly"
      coords="176,194,164,183,140,194,121,170,97,172,89,181,65,178,24,185,19,201,42,206,27,211,45,221,21,227,46,250,99,262,109,278,128,271,157,284,216,256,226,262,241,240,237,202,221,204,194,185"
      href="#bretagne"
      alt="Bretagne"
      title="Bretagne"
      data-region="Bretagne">

  <!-- Île-de-France -->
  <area shape="poly" 
      coords="403,154,394,168,404,200,420,216,465,237,504,211,508,188,492,163,433,154"
      href="#ile-de-france" 
      alt="Île-de-France" 
      title="Île-de-France"
      data-region="Île-de-France">
  
  <!-- Grand Est -->
  <area shape="poly" 
      coords="579,75,554,91,551,111,541,120,544,137,518,143,522,171,510,180,505,215,541,250,585,245,604,268,623,275,644,266,668,238,701,249,737,284,760,285,758,203,788,161,746,146,721,150,702,146,683,125,625,120"
      href="#grand-est" 
      alt="Grand Est" 
      title="Grand Est"
      data-region="Grand Est">
  
  <!-- Pays de la Loire -->
  <area shape="poly" 
      coords="324,208,304,217,293,206,271,210,237,201,241,240,226,260,208,256,176,270,149,280,147,298,172,300,166,311,175,318,167,334,195,367,222,382,259,371,253,328,303,311,314,278,342,270,357,230,332,227"
      href="#pays-de-la-loire" 
      alt="Pays de la Loire" 
      title="Pays de la Loire"
      data-region="Pays de la Loire">
  
  <!-- Centre-Val de Loire -->
  <area shape="poly" 
      coords="484,243,447,227,425,229,393,181,358,194,350,230,343,263,315,281,306,299,303,318,325,330,345,340,355,368,398,376,418,369,448,367,471,347,489,335,476,274"
      href="#centre-val-de-loire" 
      alt="Centre-Val de Loire" 
      title="Centre-Val de Loire"
      data-region="Centre-Val de Loire">
  
  <!-- Bourgogne-Franche-Comté -->
  <area shape="poly" 
      coords="481,288,488,347,513,348,546,387,669,372,720,299,730,271,703,247,670,245,640,271,626,274,602,266,586,247,540,252,517,221,492,216,477,287,488,344,478,276,478,267"
      href="#bourgogne-franche-comte" 
      alt="Bourgogne-Franche-Comté" 
      title="Bourgogne-Franche-Comté"
      data-region="Bourgogne-Franche-Comté">
  
  <!-- Nouvelle-Aquitaine -->
  <area shape="poly" 
      coords="246,656,243,657,229,644,205,636,171,608,196,590,220,438,205,403,199,377,222,376,260,369,247,321,305,314,341,326,368,366,436,370,458,395,457,411,452,448,430,483,392,483,370,513,352,540,339,555,282,564,273,588,292,604,270,654,246,656"
      href="#nouvelle-aquitaine" 
      alt="Nouvelle-Aquitaine" 
      title="Nouvelle-Aquitaine"
      data-region="Nouvelle-Aquitaine">
  
<!-- Auvergne-Rhône-Alpes-->
<area shape="poly" 
      coords="689,469,734,438,716,384,686,375,659,383,628,378,597,370,586,390,564,384,470,346,435,506,650,546,676,481,752,458,735,435"
      href="#auvergne-rhone-alpes" 
      alt="Auvergne-Rhône-Alpes" 
      title="Auvergne-Rhône-Alpes"
      data-region="Auvergne-Rhône-Alpes">
  
  <!-- Occitanie -->
  <area shape="poly"
      coords="283,568,289,606,276,655,417,684,490,684,489,640,508,623,530,614,548,604,560,604,586,580,599,565,590,544,520,497,428,510,398,497"
      href="#occitanie"
      alt="Occitanie"
      title="Occitanie"
      data-region="Occitanie">
  
  <!-- Provence-Alpes-Côte d'Azur -->

  <area shape="poly"
      coords="585,599,703,624,771,575,779,546,734,498,690,494"
      href="#provence-alpes-cote-dazur"
      alt="Provence-Alpes-Côte d'Azur"
      title="Provence-Alpes-Côte d'Azur"
      data-region="Provence-Alpes-Côte d'Azur">

<!-- Corse -->
<area shape="rect" 
      coords="722,664,795,792"
      href="#corse" 
      alt="Corse" 
      title="Corse"
      data-region="Corse">
</map>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Gérer le clic sur les régions de la carte
    document.querySelectorAll("area").forEach(area => {
        area.addEventListener("click", function (event) {
            event.preventDefault();
            let region = this.getAttribute("data-region");

            // Récupérer les départements pour la région sélectionnée
            fetch("departements.php?region=" + encodeURIComponent(region))
                .then(response => response.json())
                .then(data => {
                    let select = document.getElementById("departements");
                    select.innerHTML = '<option value="">Sélectionne un département</option>';

                    data.forEach(dept => {
                        let option = document.createElement("option");
                        option.value = dept.code;
                        option.textContent = dept.nom;
                        select.appendChild(option);
                    });

                    select.style.display = "block"; // Afficher la liste déroulante des départements
                })
                .catch(error => console.error("Erreur :", error));
        });
    });
});
</script>


<!-- Formulaire avec bouton submit pour afficher les villes -->
<form method="GET" action="?#scrollToVille" class="form-meteo" id="form-departement">
    <label for="departements"><strong>Sélectionner un département :</strong></label><br>
    <select name="dep_code" id="departements">
        <option value="">-- Choisir un département --</option>
    </select>
    <button type="submit" class="btn-sunset">Afficher les villes</button>
</form>
<?php
if (isset($_GET['dep_code']) && $_GET['dep_code'] !== '') {
    $depCode = $_GET['dep_code'];
    $villes = getVillesByDepartement($depCode, $csvFilePath);

    echo "<h3>Villes dans le département $depCode :</h3>";

    if (!empty($villes)) {
        echo '<form method="GET" action="?#scrollToMeteo" class="form-meteo" id="scrollToVille">';
echo '<label for="ville">Choisissez une ville :</label>';
echo '<select name="ville" id="villes">';
foreach ($villes as $ville) {
    echo '<option value="' . htmlspecialchars($ville) . '">' . htmlspecialchars($ville) . '</option>';
}
echo '</select>';
echo '<label for="detail_level" style="margin-top: 10px; display:block;">Affichage :</label>';
echo '<select name="detail_level" id="detail_level">';
echo '<option value="general">Météo générale</option>';
echo '<option value="detailed">Météo en détails</option>';
echo '</select>';

echo '<button type="submit" name="get_weather">Afficher la météo</button>';
echo '</form>';

    } else {
        echo "<p>Aucune ville trouvée pour ce département.</p>";
    }
}


if (isset($_GET['ville']) && $_GET['ville'] !== '') {
    $ville = urlencode($_GET['ville']);
    $cookieData = [
        'ville' => $_GET['ville'],
        'date' => date('Y-m-d H:i:s')
    ];
    $detailLevel = $_GET['detail_level'] ?? 'detailed'; // 'general' ou 'detailed'


    $villeConsulted = htmlspecialchars($_GET['ville']);
    $dateConsultation = date('Y-m-d H:i:s');
    $logPath = 'data/log_villes.csv';

    $ligne = [$villeConsulted, $dateConsultation];
    $fp = fopen($logPath, 'a');
    if ($fp === false) {
    echo "<p style='color:red;'>Could not open file for writing: $logPath</p>";
}
    fputcsv($fp, $ligne);
    fclose($fp);
    $apiKey = "e22adcb9d64d1606a8c119f81af1199d";
    $url = "https://api.openweathermap.org/data/2.5/forecast?q=$ville&appid=$apiKey&units=metric&lang=fr";

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if ($data && isset($data['list'])) {
        $joursSemaine = [
            'Sunday' => 'Dimanche', 'Monday' => 'Lundi', 'Tuesday' => 'Mardi',
            'Wednesday' => 'Mercredi', 'Thursday' => 'Jeudi',
            'Friday' => 'Vendredi', 'Saturday' => 'Samedi'
        ];

        // Grouper les prévisions par jour
        $jours = [];
        foreach ($data['list'] as $item) {
            $dateFull = date('Y-m-d', $item['dt']);
            $heure = date('H:i', $item['dt']);
            $jours[$dateFull][] = [
                'heure' => $heure,
                'temp' => round($item['main']['temp']),
                'description' => ucfirst($item['weather'][0]['description']),
                'humidity' => $item['main']['humidity'],
                'vent' => $item['wind']['speed'],
                'pression' => $item['main']['pressure'],
                'pluie' => isset($item['pop']) ? round($item['pop'] * 100) : 0
            ];
        }

        $jours = array_slice($jours, 0, 4, true);
        $dates = array_keys($jours);

        echo "<h3 id='scrollToMeteo'>Prévisions météo pour " . htmlspecialchars($_GET['ville']) . "</h3>";
        echo '<form method="GET" style="margin: 20px auto; text-align: center;">';
echo '<input type="hidden" name="dep_code" value="' . htmlspecialchars($_GET['dep_code'] ?? '') . '">';
echo '<input type="hidden" name="ville" value="' . htmlspecialchars($_GET['ville'] ?? '') . '">';
echo '<label for="detail_level"><strong>Affichage :</strong></label> ';
echo '<select name="detail_level" id="detail_level" class="detail-select" onchange="this.form.submit()">';
echo '<option value="general"' . (($_GET['detail_level'] ?? '') === 'general' ? ' selected' : '') . '>Météo générale</option>';
echo '<option value="detailed"' . (($_GET['detail_level'] ?? 'detailed') === 'detailed' ? ' selected' : '') . '>Météo détaillée</option>';
echo '</select>';
echo '</form>';
        // Onglets des jours
        echo "<div class='day-tabs'>";
        foreach ($dates as $i => $date) {
            $timestamp = strtotime($date);
            $jour = $joursSemaine[date('l', $timestamp)];
            $frDate = date('d/m', $timestamp);
            echo "<button class='tab-button" . ($i === 0 ? " active" : "") . "' onclick='showDay($i)'>$jour<br>$frDate</button>";
        }
        echo "</div>";

        foreach ($jours as $index => $donneesJour) {
            echo "<div class='day-content' id='day-$index' style='" . ($index === 0 ? "" : "display:none;") . "'>";
            
            echo "<table><thead><tr>";
        
            if ($detailLevel === 'general') {
                echo "<th>Heure</th><th>Température (°C)</th><th>Description</th>";
            } else {
                echo "<th>Heure</th><th>Température (°C)</th><th>Description</th><th>Humidité (%)</th><th>Vent (m/s)</th><th>Pluie (%)</th><th>Pression (hPa)</th>";
            }
        
            echo "</tr></thead><tbody>";
        
            foreach ($donneesJour as $d) {
                echo "<tr>";
                echo "<td>{$d['heure']}</td>";
                echo "<td>{$d['temp']}</td>";
                echo "<td>{$d['description']}</td>";
        
                if ($detailLevel === 'detailed') {
                    echo "<td>{$d['humidity']}</td><td>{$d['vent']}</td><td>{$d['pluie']}</td><td>{$d['pression']}</td>";
                }
        
                echo "</tr>";
            }
        
            echo "</tbody></table>";
            echo "</div>";
        }
        
    } else {
        echo "<p>Impossible de récupérer les données météo.</p>";
    }
}
if (isset($_COOKIE['last_city'])) {
    $last = json_decode($_COOKIE['last_city'], true);
    $lastCity = htmlspecialchars($last['ville']);
    $lastDate = htmlspecialchars($last['date']);
    echo "<p style='text-align:center; font-style: italic;'>
    Dernière ville consultée : <a href='?ville={$lastCity}#scrollToMeteo' class='last-city-link'><strong>{$lastCity}</strong></a> le <strong>{$lastDate}</strong>.
</p>";

}


?>

<script>
function showDay(index) {
    document.querySelectorAll('.day-content').forEach((el, i) => {
        el.style.display = i === index ? '' : 'none';
    });
    document.querySelectorAll('.tab-button').forEach((btn, i) => {
        btn.classList.toggle('active', i === index);
    });
}

document.addEventListener("DOMContentLoaded", function () {
    showDay(0);
});
</script>



</article>
</section>
</main>

<?php include_once('include/footer.inc.php'); ?>
