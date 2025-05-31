<?php
$apiKey = "e22adcb9d64d1606a8c119f81af1199d";
include_once('include/functions.inc.php');

if (isset($_GET['city'])) {
    header('Content-Type: application/json');
    echo json_encode(getFourDayForecast($_GET['city'], $apiKey));
    exit;
}

$page_title = "Météo par région";
include_once('include/header.inc.php');


$regions = [
  ["name" => "Hauts-de-France", "city" => "Lille,FR", "coords" => "408,134"],
  ["name" => "Normandie", "city" => "Rouen,FR", "coords" => "294,221"],
  ["name" => "Île-de-France", "city" => "Paris,FR", "coords" => "405,235"],
  ["name" => "Bretagne", "city" => "Rennes,FR", "coords" => "137,267"],
  ["name" => "Pays de la Loire", "city" => "Nantes,FR", "coords" => "238,320"],
  ["name" => "Centre-Val de Loire", "city" => "Orléans,FR", "coords" => "357,312"],
  ["name" => "Grand Est", "city" => "Strasbourg,FR", "coords" => "537,227"],
  ["name" => "Bourgogne-Franche-Comté", "city" => "Dijon,FR", "coords" => "502,336"],
  ["name" => "Auvergne-Rhône-Alpes", "city" => "Lyon,FR", "coords" => "494,455"],
  ["name" => "Nouvelle-Aquitaine", "city" => "Bordeaux,FR", "coords" => "291,460"],
  ["name" => "Occitanie", "city" => "Toulouse,FR", "coords" => "364,586"],
  ["name" => "Provence-Alpes-Côte d’Azur", "city" => "Marseille,FR", "coords" => "578,578"],
  ["name" => "Corse", "city" => "Ajaccio,FR", "coords" => "725,692"]
];   

?>

<main>
  <section>
    <h1>Météo par région</h1>
    <article>
      <p>Cliquez sur l’émoji indiquant la météo pour obtenir les informations de la région correspondante.</p>
      <div style="position: relative; display: block; max-width: 750px; margin: 0 auto;">
  <img src="images/carte_meteo.png" usemap="#carteMeteo" alt="Carte de France" style="width: 100%; height: auto; display: block;">

  <map name="carteMeteo">
    <?php
    foreach ($regions as $region) {
        echo "<area shape='circle' coords=\"{$region['coords']},30\" alt=\"{$region['name']}\" data-region=\"{$region['name']}\" data-city=\"{$region['city']}\">";
    }
    ?>
  </map>

  <?php
  foreach ($regions as $region) {
    $weatherData = getWeatherDataForCity($region['city'], $apiKey);
    $icon = getWeatherIcon($weatherData['weather'][0]['main'] ?? '');
    $desc = translateWeatherDescription($weatherData['weather'][0]['main'] ?? '');
    $temp = isset($weatherData['main']['temp']) ? round($weatherData['main']['temp']) . ' °C' : '?';
    $wind = isset($weatherData['wind']['speed']) ? round($weatherData['wind']['speed'], 1) . ' m/s' : '?';
    $pressure = isset($weatherData['main']['pressure']) ? round($weatherData['main']['pressure']) . ' hPa' : '?';
    [$x, $y] = explode(',', $region['coords']);

    echo "<div class='emoji-region' 
      data-region='{$region['name']}'
      data-city='{$region['city']}'
      data-icon='{$icon}'
      data-desc='{$desc}'
      data-temp='{$temp}'
      data-wind='{$wind}'
      data-pressure='{$pressure}'
      style='
          position: absolute;
          top: " . ((int)$y - 32) . "px;
          left: " . ((int)$x - 13) . "px;
          transform: translate(-50%, -50%);
          font-size: 45px;
          line-height: 1;
          cursor: pointer;
          z-index: 10;'>
      {$icon}
    </div>";
  }
  ?>
</div>

    </article>
  </section>

  <section id="region-weather" style="text-align: center; margin-top: 60px;"></section>
  </main>

<script>
window.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.emoji-region').forEach(icon => {
    icon.addEventListener('click', () => {
      const region = icon.getAttribute('data-region');
      const city = icon.getAttribute('data-city');
      const description = icon.getAttribute('data-desc');
      const iconChar = icon.getAttribute('data-icon');
      const temp = icon.getAttribute('data-temp');
      const wind = icon.getAttribute('data-wind');
      const pressure = icon.getAttribute('data-pressure');
      const section = document.getElementById('region-weather');

const descLower = description.toLowerCase();
let advice = "";

if (descLower.includes("pluie") || descLower.includes("pluvieux")) {
  advice = "Pense à prendre un parapluie aujourd'hui ☔";
} else if (descLower.includes("soleil")) {
  advice = "N'oublie pas tes lunettes de soleil 😎";
} else if (descLower.includes("nuage")) {
  advice = "Le ciel est nuageux, une veste légère est conseillée ☁️";
} else if (descLower.includes("neige")) {
  advice = "Il neige, couvre-toi bien ❄️";
} else if (descLower.includes("orage")) {
  advice = "Risque d'orage, reste prudent ⛈";
} else if (descLower.includes("brume") || descLower.includes("brouillard")) {
  advice = "Visibilité réduite, prudence sur la route 🌫️";
} else if (descLower.includes("fumée")) {
  advice = "Air potentiellement pollué, évite les efforts physiques prolongés 🚭";
} else if (descLower.includes("poussière")) {
  advice = "Air sec et poussiéreux : protège tes yeux et bois de l'eau 💨";
} else if (descLower.includes("sable")) {
  advice = "Présence de sable dans l'air : ferme les fenêtres 🌬️";
} else if (descLower.includes("cendre")) {
  advice = "Cendres volcaniques détectées : reste à l'intérieur si possible 🌋";
} else if (descLower.includes("rafale")) {
  advice = "Attention aux rafales de vent, évite de sortir avec des objets légers 💨";
} else if (descLower.includes("tornade")) {
  advice = "Alerte tornade, reste à l'abri et suis les consignes de sécurité 🚨";
} else {
  advice = "Profite bien de ta journée !";
}
fetch(`?city=${encodeURIComponent(city)}`)
        .then(res => res.json())
        .then(data => {
          const days = data.forecast || [];
          const forecastHtml = days.map(day => `
            <tr>
              <td style="padding: 5px 15px; font-weight: bold;">${day.day}</td>
              <td style="padding: 5px 15px;">${day.icon} ${day.description}</td>
            </tr>
          `).join('');

          section.innerHTML = `
            <div style="display: flex; justify-content: center; align-items: center; gap: 40px; flex-wrap: wrap;">
              <div style="font-size: 80px;">${iconChar}</div>
              <div>
                <div style="font-size: 36px; font-weight: bold;">${temp}</div>
                <div style="font-size: 18px;">Vent : ${wind}</div>
                <div style="font-size: 18px;">Pression : ${pressure}</div>
              </div>
              <div style="margin-left: 30px;">
                <table style="border-collapse: collapse; font-size: 16px;">
                  <caption style="caption-side: top; font-weight: bold; margin-bottom: 8px;">Prévisions à venir</caption>
                  ${forecastHtml}
                </table>
              </div>
            </div>
            <div style="margin-top: 20px; font-style: italic; font-size: 20px;">
              ${region} – ${description}
            </div>
            <div class="advice-box">
              💡 <strong>Conseil du jour :</strong> ${advice}
            </div>
          `;

          section.scrollIntoView({ behavior: 'smooth' });
        });
    });
  });
});
</script>

<?php include_once('include/footer.inc.php'); ?>
