<?php
$page_title = "Weather";
include_once('include/header.inc.php');
include_once('include/functions.inc.php');
$csvFilePath = 'data/communes.csv';

?>

<main>
<h1>Interactive Map - AtmoFrance </h1>
        

<figure>
  <img src="images/regions.jpg" usemap="#carteFrance" alt="Map of French regions">
  <figcaption>Click on a region</figcaption>
</figure>

<section>
<h2>Select a region in France</h2>
<article> 
<h3>Interactive map and department selection</h3> 
<p>Click on a region on the map below to display the list of associated departments. You can then select a department to get more information.</p>
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
    document.querySelectorAll("area").forEach(area => {
        area.addEventListener("click", function (event) {
            event.preventDefault();
            let region = this.getAttribute("data-region");

            fetch("departements.php?region=" + encodeURIComponent(region))
                .then(response => response.json())
                .then(data => {
                    let select = document.getElementById("departements");
                    select.innerHTML = '<option value="">Select a department</option>';

                    data.forEach(dept => {
                        let option = document.createElement("option");
                        option.value = dept.code;
                        option.textContent = dept.nom;
                        select.appendChild(option);
                    });

                    select.style.display = "block";
                })
                .catch(error => console.error("Error:", error));
        });
    });
});
</script>

<form method="GET" action="?#scrollToVille" class="form-meteo" id="form-departement">
    <label for="departements"><strong>Select a department:</strong></label><br>
    <select name="dep_code" id="departements">
        <option value="">-- Choose a department --</option>
    </select>
    <button type="submit" class="btn-sunset" >Show cities</button>
</form>
<?php
if (isset($_GET['dep_code']) && $_GET['dep_code'] !== '') {
    
    $depCode = $_GET['dep_code'];
    $villes = getVillesByDepartement($depCode, $csvFilePath);

    echo "<h3>Cities in department $depCode:</h3>";

    if (!empty($villes)) {
        echo '<form method="GET" action="?#scrollToMeteo" class="form-meteo" id="scrollToVille">';
        echo '<label for="ville">Select a city:</label>';
        echo '<select name="ville" id="villes">';
        foreach ($villes as $ville) {
            echo '<option value="' . htmlspecialchars($ville) . '">' . htmlspecialchars($ville) . '</option>';
        }
        echo '</select>';

        echo '<label for="detail_level" style="margin-top: 10px; display:block;">Display mode:</label>';
        echo '<select name="detail_level" id="detail_level" class="detail-select">';
        echo '<option value="general">General weather</option>';
        echo '<option value="detailed">Detailed weather</option>';
        echo '</select>';
    
        echo '<button type="submit" name="get_weather">Show weather</button>';
        echo '</form>';
    } else {
        echo "<p>No cities found for this department.</p>";
    }
}
if (isset($_GET['ville']) && $_GET['ville'] !== '') {
    $ville = urlencode($_GET['ville']);
    $detailLevel = $_GET['detail_level'] ?? 'detailed';
    $cookieData = [
      'ville' => $_GET['ville'],
      'date' => date('Y-m-d H:i:s')
  ];
    $villeConsulted = htmlspecialchars($_GET['ville']);
    $dateConsultation = date('Y-m-d H:i:s');
    $logPath = 'data/log_villes.csv';

    $ligne = [$villeConsulted, $dateConsultation];
    $fp = fopen($logPath, 'a');
    fputcsv($fp, $ligne);
    fclose($fp);

    $apiKey = "e22adcb9d64d1606a8c119f81af1199d";
    $url = "https://api.openweathermap.org/data/2.5/forecast?q=$ville&appid=$apiKey&units=metric&lang=en";

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if ($data && isset($data['list'])) {
        $daysOfWeek = [
            'Sunday' => 'Sunday', 'Monday' => 'Monday', 'Tuesday' => 'Tuesday',
            'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday',
            'Friday' => 'Friday', 'Saturday' => 'Saturday'
        ];

        // Group forecasts by date
        $days = [];
        foreach ($data['list'] as $item) {
            $dateFull = date('Y-m-d', $item['dt']);
            $time = date('H:i', $item['dt']);
            $days[$dateFull][] = [
                'time' => $time,
                'temp' => round($item['main']['temp']),
                'description' => ucfirst($item['weather'][0]['description']),
                'humidity' => $item['main']['humidity'],
                'wind' => $item['wind']['speed'],
                'pressure' => $item['main']['pressure'],
                'rain' => isset($item['pop']) ? round($item['pop'] * 100) : 0
            ];
        }

        // Keep today + next 3 days
        $days = array_slice($days, 0, 4, true);
        $dates = array_keys($days);

        echo "<h3 id='scrollToMeteo'>Weather forecast for " . htmlspecialchars($_GET['ville']) . "</h3>";
        echo '<form method="GET" style="margin: 20px auto; text-align: center;">';
echo '<input type="hidden" name="dep_code" value="' . htmlspecialchars($_GET['dep_code'] ?? '') . '">';
echo '<input type="hidden" name="ville" value="' . htmlspecialchars($_GET['ville'] ?? '') . '">';
echo '<label for="detail_level"><strong>Display mode:</strong></label> ';
echo '<select name="detail_level" id="detail_level" class="detail-select" onchange="this.form.submit()">';
echo '<option value="general"' . (($_GET['detail_level'] ?? '') === 'general' ? ' selected' : '') . '>General weather</option>';
echo '<option value="detailed"' . (($_GET['detail_level'] ?? 'detailed') === 'detailed' ? ' selected' : '') . '>Detailed weather</option>';
echo '</select>';
echo '</form>';

        // Day tabs
        echo "<div class='day-tabs'>";
        foreach ($dates as $i => $date) {
            $timestamp = strtotime($date);
            $day = $daysOfWeek[date('l', $timestamp)];
            $enDate = date('m/d', $timestamp);
            echo "<button class='tab-button" . ($i === 0 ? " active" : "") . "' onclick='showDay($i)'>$day<br>$enDate</button>";
        }
        echo "</div>";

        // Day content
        foreach ($days as $index => $dayData) {
            echo "<div class='day-content' id='day-$index' style='" . ($index === 0 ? "" : "display:none;") . "'>";
            echo "<table><thead><tr>";

if ($detailLevel === 'general') {
    echo "<th>Time</th><th>Temperature (°C)</th><th>Description</th>";
} else {
    echo "<th>Time</th><th>Temperature (°C)</th><th>Description</th><th>Humidity (%)</th><th>Wind (m/s)</th><th>Rain (%)</th><th>Pressure (hPa)</th>";
}

echo "</tr></thead><tbody>";

foreach ($dayData as $d) {
    echo "<tr>";
    echo "<td>{$d['time']}</td>";
    echo "<td>{$d['temp']}</td>";
    echo "<td>{$d['description']}</td>";

    if ($detailLevel === 'detailed') {
        echo "<td>{$d['humidity']}</td><td>{$d['wind']}</td><td>{$d['rain']}</td><td>{$d['pressure']}</td>";
    }

    echo "</tr>";
}


            echo "</tbody></table>";
            echo "</div>";
        }
    } else {
        echo "<p>Unable to retrieve weather data.</p>";
    }
}
if (isset($_COOKIE['last_city'])) {
    $last = json_decode($_COOKIE['last_city'], true);
    $lastCity = htmlspecialchars($last['ville']);
    $lastDate = htmlspecialchars($last['date']);

    echo "<p style='text-align:center; font-style: italic;'>
    Last city consulted: <a href='?ville={$lastCity}#scrollToMeteo' class='last-city-link'><strong>{$lastCity}</strong></a> on <strong>{$lastDate}</strong>.
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
    // récupèrer la prévision 4 jours
    fetch(`?city=${encodeURIComponent(icon.getAttribute('data-city'))}`)
      .then(r => r.json())
      .then(days => {
        let daysHtml = `
          <div style="margin-top:30px;">
            <h3>Prévisions à 4 jours</h3>
            <div style="display:flex; justify-content:center; gap:20px; flex-wrap:wrap;">
        `;
        days.forEach(day => {
          daysHtml += `
            <div style="text-align:center;">
              <div><strong>${day.day}</strong><br>${day.date}</div>
              <div style="font-size:30px;">${day.icon}</div>
              <div>${day.temp} °C</div>
              <div style="font-size:25px; transform:rotate(${day.wind_deg}deg);">➤</div>
            </div>
          `;
        });
        daysHtml += `</div></div>`;
        section.innerHTML += daysHtml;
      });

</script>



</article>
</section>
</main>

<?php include_once('include/footer.inc.php'); ?>
