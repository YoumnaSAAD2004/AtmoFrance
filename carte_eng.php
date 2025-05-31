<?php
$apiKey = "e22adcb9d64d1606a8c119f81af1199d";
include_once('include/functions.inc.php');

if (isset($_GET['city'])) {
    header('Content-Type: application/json');
    echo json_encode(getFourDayForecast($_GET['city'], $apiKey));
    exit;
}

$page_title = "Weather by Region";
include_once('include/header.inc.php');

$regions = [
  ["name" => "Hauts-de-France", "city" => "Lille,FR", "coords" => "408,134"],
  ["name" => "Normandy", "city" => "Rouen,FR", "coords" => "294,221"],
  ["name" => "Île-de-France", "city" => "Paris,FR", "coords" => "405,235"],
  ["name" => "Brittany", "city" => "Rennes,FR", "coords" => "137,267"],
  ["name" => "Pays de la Loire", "city" => "Nantes,FR", "coords" => "238,320"],
  ["name" => "Centre-Val de Loire", "city" => "Orléans,FR", "coords" => "357,312"],
  ["name" => "Grand Est", "city" => "Strasbourg,FR", "coords" => "537,227"],
  ["name" => "Bourgogne-Franche-Comté", "city" => "Dijon,FR", "coords" => "502,336"],
  ["name" => "Auvergne-Rhône-Alpes", "city" => "Lyon,FR", "coords" => "494,455"],
  ["name" => "Nouvelle-Aquitaine", "city" => "Bordeaux,FR", "coords" => "291,460"],
  ["name" => "Occitanie", "city" => "Toulouse,FR", "coords" => "364,586"],
  ["name" => "Provence-Alpes-Côte d'Azur", "city" => "Marseille,FR", "coords" => "578,578"],
  ["name" => "Corsica", "city" => "Ajaccio,FR", "coords" => "725,692"]
];


?>

<main>
  <section>
    <h1>Weather by Region</h1>
    <article>
      <p>Click on the emoji indicating the weather to get information for the corresponding region.</p>
      <div style="position: relative; display: block; max-width: 750px; margin: 0 auto;">
  <img src="images/carte_meteo.png" usemap="#carteMeteo" alt="Map of France" style="width: 100%; height: auto; display: block;">

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
      const descriptionMap = {
  "Ensoleillé": "Sunny",
  "Nuageux": "Cloudy",
  "Pluvieux": "Rainy",
  "Pluie Fine": "Light rain",
  "Orageux": "Stormy",
  "Neigeux": "Snowy",
  "Rafales": "Squalls",
  "Tornade": "Tornado",
  "Brume": "Mist",
  "Brouillard": "Fog",
  "Fumée": "Smoke",
  "Cendre": "Ash",
  "Poussière": "Dust",
  "Sable": "Sand"
    };

    const translatedDesc = descriptionMap[description] || description;

      const iconChar = icon.getAttribute('data-icon');
      const temp = icon.getAttribute('data-temp');
      const wind = icon.getAttribute('data-wind');
      const pressure = icon.getAttribute('data-pressure');
      const section = document.getElementById('region-weather');

      const descLower = translatedDesc.toLowerCase();
      let advice = "";

      if (descLower.includes("rain") || descLower.includes("shower") || descLower.includes("rainy")) {
        advice = "Don't forget your umbrella today ☔";
        } else if (descLower.includes("sun") || descLower.includes("sunny") || descLower.includes("clear")) {
        advice = "Put on your sunglasses, it's sunny 😎";
        } else if (descLower.includes("cloud") || descLower.includes("cloudy")) {
        advice = "Cloudy skies, a light jacket is recommended ☁️";
        } else if (descLower.includes("snow") || descLower.includes("snowy")) {
         advice = "It's snowing, dress warmly ❄️";
        } else if (descLower.includes("storm") || descLower.includes("thunder") || descLower.includes("thunderstorm")) {
        advice = "Stormy weather, stay safe ⛈";
        } else if (descLower.includes("mist") || descLower.includes("fog") || descLower.includes("haze")) {
        advice = "Low visibility, drive carefully 🌫️";
        } else if (descLower.includes("smoke")) {
        advice = "Possible air pollution, avoid intense physical activity 🚭";
        } else if (descLower.includes("dust")) {
        advice = "Dusty air: protect your eyes and stay hydrated 💨";
        } else if (descLower.includes("sand")) {
        advice = "Sandy conditions: keep windows closed 🌬️";
        } else if (descLower.includes("ash")) {
         advice = "Volcanic ash in the air: stay indoors if possible 🌋";
        } else if (descLower.includes("squall") || descLower.includes("gust")) {
        advice = "Strong gusts expected, avoid carrying light items 💨";
        } else if (descLower.includes("tornado")) {
        advice = "Tornado alert, stay inside and follow safety instructions 🚨";
        } else {
        advice = "Have a great day!";
        }

      fetch(`?city=${encodeURIComponent(city)}`)
        .then(res => res.json())
        .then(data => {
        const days = data.forecast || [];
        const dayTranslations = {
  "Dimanche": "Sunday", "Lundi": "Monday", "Mardi": "Tuesday",
  "Mercredi": "Wednesday", "Jeudi": "Thursday",
  "Vendredi": "Friday", "Samedi": "Saturday"
    };

        const weatherTranslations = {
  "Ensoleillé": "Sunny", "Nuageux": "Cloudy", "Pluvieux": "Rainy",
  "Pluie Fine": "Light rain", "Orageux": "Thunderstorm",
  "Neigeux": "Snowy", "Rafales": "Squalls", "Tornade": "Tornado",
  "Brume": "Mist", "Brouillard": "Fog", "Fumée": "Smoke",
  "Sable": "Sand", "Cendre": "Ash", "Poussière": "Dust"
        };

        const forecastHtml = days.map(day => {
        const dayEn = dayTranslations[day.day] || day.day;
        const descEn = weatherTranslations[day.description] || day.description;
        return `
        <tr>
        <td style="padding: 5px 15px; font-weight: bold;">${dayEn}</td>
        <td style="padding: 5px 15px;">${day.icon} ${descEn}</td>
        </tr>
        `;
            }).join('');

          section.innerHTML = `
            <div style="display: flex; justify-content: center; align-items: center; gap: 40px; flex-wrap: wrap;">
              <div style="font-size: 80px;">${iconChar}</div>
              <div>
                <div style="font-size: 36px; font-weight: bold;">${temp}</div>
                <div style="font-size: 18px;">Wind: ${wind}</div>
                <div style="font-size: 18px;">Pressure: ${pressure}</div>
              </div>
              <div style="margin-left: 30px;">
                <table style="border-collapse: collapse; font-size: 16px;">
                  <caption style="caption-side: top; font-weight: bold; margin-bottom: 8px;">Upcoming forecast</caption>
                  ${forecastHtml}
                </table>
              </div>
            </div>
            <div style="margin-top: 20px; font-style: italic; font-size: 20px;">
              ${region} – ${translatedDesc}
            </div>
            <div class="advice-box">
              💡 <strong>Tip of the day:</strong> ${advice}
            </div>
          `;

          section.scrollIntoView({ behavior: 'smooth' });
        });
    });
  });
});
</script>

<?php include_once('include/footer.inc.php'); ?>