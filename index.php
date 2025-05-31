<?php 
$title = "Accueil - AtmoFrance";
include 'include/header.inc.php'; 
require 'include/functions.inc.php'; 

?>

<main>
    <section>
        <h1>AtmoFrance</h1>
        
        <section>
            <h2>Bienvenue !</h2>
            <article>
                <h3>Présentation</h3>
                <p><strong>AtmoFrance</strong> vous donne accès aux prévisions météorologiques en temps réel pour les principales villes françaises, grâce à des données fiables et constamment mises à jour.</p>
                <p>Que vous prépariez un déplacement, une randonnée, un événement en extérieur ou que vous soyez simplement curieux de la météo du jour, <strong>AtmoFrance</strong> vous accompagne avec clarté et précision.</p>
                <p>Du grand soleil aux intempéries les plus marquantes, notre site vous aide à anticiper, à vous adapter et à rester informé, où que vous soyez en France.</p>

                
                <figure>

  <?php
  $phenomenes = [
    "neige_paris.jpg" => [
      "desc" => "Neige à Paris - Janvier 2024",
      "url" => "https://www.leparisien.fr/paris-75/en-images-neige-a-paris-du-nord-au-sud-la-capitale-recouverte-dune-fine-couche-de-flocons-09-01-2024-EG5DDEX2RJER7C3HC7AGL72AVY.php"
    ],
    "cyclone_reunion.jpg" => [
      "desc" => "Cyclone Dina à La Réunion - Janvier 2002",
      "url" => "https://meteofrance.com/actualites-et-dossiers/magazine/il-y-20-ans-le-cyclone-dina-frappait-la-reunion"
    ],
    "orage_normandie.jpg" => [
      "desc" => "Orage en Normandie (Calvados) - Juin 2022",
      "url" => "https://www.ouest-france.fr/normandie/78e-anniversaire-du-debarquement-en-normandie-des-festivites-douchees-par-des-orages-samedi-b85d1a70-e487-11ec-8526-27e8fb5a056f"
    ],
    "canicule_alpes.jpg" => [
      "desc" => "Canicule dans les Alpes-Maritimes - Août 2024",
      "url" => "https://www.nicematin.com/meteo/les-alpes-maritimes-toujours-en-alerte-jaune-canicule-des-orages-en-approche-on-fait-le-point-sur-la-meteo-de-ce-mardi-937610"
    ]
  ];

  $keys = array_keys($phenomenes);
  if (!empty($keys)) {
    $randomKey = $keys[array_rand($keys)];
    $imgPath = 'randompic/' . $randomKey;
    $desc = $phenomenes[$randomKey]["desc"];
    $url = $phenomenes[$randomKey]["url"];

    echo '<a href="' . htmlspecialchars($url) . '" target="_blank">';
    echo '<img src="' . htmlspecialchars($imgPath) . '" alt="' . htmlspecialchars($desc) . '" class="fixed-image"/>';
    echo '</a>';

    echo '<figcaption style="margin-top: 5px; text-align: center;">' . htmlspecialchars($desc) . '</figcaption>';
  } else {
    echo "<p>Aucune image météo disponible</p>";
  }
  ?>
</figure>
\


            </article>
        </section>

        <section>
    <h2 style="text-align:center; margin-bottom: 30px;">📍 Navigation rapide</h2>

    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px;">

<a href="meteo.php" class="access-card card-map"
   style="text-decoration: none; color: inherit; background: #f0f0f0; border: 2px solid #ccc; border-radius: 12px; padding: 25px; width: 250px; text-align: center; transition: transform 0.2s ease-in-out;"
   onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
  <div style="font-size: 60px;">🗺️</div>
  <h3 style="margin-top: 15px;">Carte interactive</h3>
  <p style="font-size: 15px;">Accédez à la météo région par région grâce à notre carte.</p>
</a>

<a href="carte.php" class="access-card card-live"
   style="text-decoration: none; color: inherit; background: #fff8e1; border: 2px solid #ffcc80; border-radius: 12px; padding: 25px; width: 250px; text-align: center; transition: transform 0.2s ease-in-out;"
   onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
  <div style="font-size: 60px;">⏰</div>
  <h3 style="margin-top: 15px;">Temps réel</h3>
  <p style="font-size: 15px;">Consultez les conditions météo en direct.</p>
</a>

<a href="stat.php" class="access-card card-stat"
   style="text-decoration: none; color: inherit; background: #f0f4ff; border: 2px solid #a0c4ff; border-radius: 12px; padding: 25px; width: 250px; text-align: center; transition: transform 0.2s ease-in-out;"
   onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
  <div style="font-size: 60px;">📊</div>
  <h3 style="margin-top: 15px;">Statistiques</h3>
  <p style="font-size: 15px;">Analysez vos habitudes météo à travers vos consultations.</p>
</a>

</div>

</section>

    </section>
</main>

<?php include 'include/footer.inc.php'; ?>


