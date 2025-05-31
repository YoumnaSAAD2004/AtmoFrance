/**
 * @file index.php
 * @brief Homepage of the AtmoFrance weather platform.
 *
 * This file displays the main landing page of the AtmoFrance site.
 * It provides a quick introduction, an informative weather-related image, and 
 * fast access to key features like the interactive map, real-time data, and usage statistics.
 *
 * The content is dynamic and includes a random display of major French weather events, 
 * linking to external sources for educational purposes.
 */

<?php 
$title = "Home - AtmoFrance";
include 'include/header.inc.php'; 
require 'include/functions.inc.php'; 

?>

<main>
    <section>
        <h1>AtmoFrance</h1>


        <section>
            <h2>Welcome !</h2>
            <article>
                <h3>About this site</h3>
                <p><strong>AtmoFrance</strong> offers real-time weather forecasts for the major cities across France, powered by live and continuously updated data from trusted meteorological sources.</p>
                <p>Whether you're planning a weekend getaway, preparing for your daily commute, or simply keeping an eye on changing conditions, <strong>AtmoFrance</strong> provides clear and reliable insights at your fingertips.</p>
                <p>From sunshine to snowstorms, our interactive tools and visual forecasts help you stay informed and make smart decisions — wherever you are, whatever your plans.</p>

                
                <figure>

  <?php
  $phenomena = [
    "neige_paris.jpg" => [
      "desc" => "Snowfall in Paris – January 2024",
      "url" => "https://www.leparisien.fr/paris-75/en-images-neige-a-paris-du-nord-au-sud-la-capitale-recouverte-dune-fine-couche-de-flocons-09-01-2024-EG5DDEX2RJER7C3HC7AGL72AVY.php"
    ],
    "cyclone_reunion.jpg" => [
      "desc" => "Cyclone Dina Hits Reunion Island – January 2002",
      "url" => "https://meteofrance.com/actualites-et-dossiers/magazine/il-y-20-ans-le-cyclone-dina-frappait-la-reunion"
    ],
    "orage_normandie.jpg" => [
      "desc" => "Storm over Normandy (Calvados) – June 2022",
      "url" => "https://www.ouest-france.fr/normandie/78e-anniversaire-du-debarquement-en-normandie-des-festivites-douchees-par-des-orages-samedi-b85d1a70-e487-11ec-8526-27e8fb5a056f"
    ],
    "canicule_alpes.jpg" => [
      "desc" => "Heatwave in the Alpes-Maritimes – August 2024",
      "url" => "https://www.nicematin.com/meteo/les-alpes-maritimes-toujours-en-alerte-jaune-canicule-des-orages-en-approche-on-fait-le-point-sur-la-meteo-de-ce-mardi-937610"
    ]
  ];

  $keys = array_keys($phenomena);
  if (!empty($keys)) {
    $randomKey = $keys[array_rand($keys)];
    $imgPath = 'randompic/' . $randomKey;
    $desc = $phenomena[$randomKey]["desc"];
    $url = $phenomena[$randomKey]["url"];

    echo '<a href="' . htmlspecialchars($url) . '" target="_blank">';
    echo '<img src="' . htmlspecialchars($imgPath) . '" alt="' . htmlspecialchars($desc) . '" class="fixed-image"/>';
    echo '<figcaption style="margin-top: 5px; text-align: center;">' . htmlspecialchars($desc) . '</figcaption>';
    echo '</a>';
  } else {
    echo "<p>No weather image available</p>";
  }
  ?>
</figure>

            </article>
        </section>

        <section>
    <h2 style="text-align:center; margin-bottom: 30px;">📍 Quick Access</h2>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px;">

<a href="meteo_eng.php" class="access-card card-map"
   style="text-decoration: none; color: inherit; background: #f0f0f0; border: 2px solid #ccc; border-radius: 12px; padding: 25px; width: 250px; text-align: center; transition: transform 0.2s ease-in-out;"
   onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
  <div style="font-size: 60px;">🗺️</div>
  <h3 style="margin-top: 15px;">Interactive Map</h3>
  <p style="font-size: 15px;">Explore regional forecasts directly from the map.</p>
</a>

<a href="realtime.php" class="access-card card-live"
   style="text-decoration: none; color: inherit; background: #fff8e1; border: 2px solid #ffcc80; border-radius: 12px; padding: 25px; width: 250px; text-align: center; transition: transform 0.2s ease-in-out;"
   onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
  <div style="font-size: 60px;">⏰</div>
  <h3 style="margin-top: 15px;">Real-Time</h3>
  <p style="font-size: 15px;">Check the current weather conditions instantly.</p>
</a>

<a href="stat.php" class="access-card card-stat"
   style="text-decoration: none; color: inherit; background: #f0f4ff; border: 2px solid #a0c4ff; border-radius: 12px; padding: 25px; width: 250px; text-align: center; transition: transform 0.2s ease-in-out;"
   onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
  <div style="font-size: 60px;">📊</div>
  <h3 style="margin-top: 15px;">Statistics</h3>
  <p style="font-size: 15px;">Track your weather usage patterns in detail.</p>
</a>

</div>

</section>
    </section>
</main>

<?php include 'include/footer.inc.php'; ?>
