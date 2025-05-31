<?php 
$title = "Statistics - AtmoFrance";
include 'include/header.inc.php'; 
require 'include/functions.inc.php'; 

$logFile = 'data/log_villes.csv';
$villesCount = [];

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
    <section>
        <h1>Consultation Statistics</h1>


        <section>
        
            <h2>Most Consulted Cities</h2>
<article>
  <h3>Search Analysis by City</h3>
  <p>This chart shows the most searched cities on our website. Each bar represents how many times a city was queried by visitors. It offers a clear view of the most popular, frequently monitored, or weather-sensitive locations.</p>
  <p>Such data can indicate touristic interest, population density, or regions recently impacted by significant weather events.</p>
  <canvas id="cityChart" width="600" height="400"></canvas>
</article>

        </section>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const cities = <?= json_encode(array_keys($villesCount), JSON_UNESCAPED_UNICODE) ?>;
    const counts = <?= json_encode(array_values($villesCount)) ?>;

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
    const barColors = cities.map((_, i) => sunsetColors[i % sunsetColors.length]);

    const ctx = document.getElementById('cityChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: cities,
            datasets: [{
                label: 'Search count',
                data: counts,
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
