<?php 
$title = "Statistiques - AtmoFrance";
include 'include/header.inc.php'; 
require 'include/functions.inc.php'; 

$logFile = 'data/log_villes.csv';
$villesCount = [];

// Lecture du fichier CSV
if (file_exists($logFile)) {
    $rows = array_map('str_getcsv', file($logFile));

    foreach ($rows as $row) {
        $ville = $row[0] ?? null;
        if ($ville) {
            $ville = html_entity_decode(ucfirst(strtolower(trim($ville))), ENT_QUOTES, 'UTF-8');
            $villesCount[$ville] = ($villesCount[$ville] ?? 0) + 1;
        }
    }
}

arsort($villesCount);


?>

<main>
<h1>Statistiques de consultation</h1>
    <section>


    <h2>Villes les plus consultées</h2>
<article>
  <h3>Analyse des recherches par localité</h3>
  <p>Ce graphique présente les villes les plus consultées sur notre site. Chaque barre représente le nombre de fois qu’une ville a été recherchée par les visiteurs. Cela permet d’avoir une idée précise des localités les plus populaires, surveillées ou sujettes à des variations météorologiques fréquentes.</p>
  <p>Ces données peuvent refléter les zones à fort intérêt touristique, les régions fortement peuplées ou encore les zones touchées par des événements climatiques récents.</p>
  <canvas id="cityChart" width="600" height="400"></canvas>
</article>

            
    </section>


</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const villes = <?= json_encode(array_keys($villesCount), JSON_UNESCAPED_UNICODE) ?>;
    const consultations = <?= json_encode(array_values($villesCount)) ?>;

    const sunsetColors = [
       '#7FB3D5',
  '#76D7C4',
  '#F7DC6F',
  '#F0B27A',
  '#D7BDE2',
  '#85C1E9',
  '#F5CBA7',
  '#A3E4D7'
    ];

    const barColors = villes.map((_, i) => sunsetColors[i % sunsetColors.length]);

    const ctx = document.getElementById('cityChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: villes,
            datasets: [{
                label: 'Nombre de consultations',
                data: consultations,
                backgroundColor: barColors,
                borderColor: barColors,
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });
</script>

<?php include 'include/footer.inc.php'; ?>
