<?php
$page_title = "Tech";
include_once('include/header.inc.php');
include_once('include/functions.inc.php');

// Récupérer l'IP de l'utilisateur
$userIp = $_SERVER['REMOTE_ADDR'];

// Clé API de WhatIsMyIP
$apiKey = '1bc604a4bc6498e5c4831c16dd9ac503';
?>
<main>
<h1>Tech</h1>

<section>
    <h2>Image astronomique du jour</h2>
    <h3>Description de l'image</h3>
    <?php echo getAPODImage(); ?>
</section>

<section>
    <h2>Informations géographiques basées sur l'IP</h2>

    <h3>Info géographique: ipinfo.io</h3>
    <?php
    echo getGeoInfoFromIpInfo($userIp);
    ?>

    <h3>Info IP via WhatIsMyIP API</h3>
    <?php
    echo getIpInfoFromWhatIsMyIp($userIp, $apiKey);
    ?>
</section>

</main>
<?php include_once('include/footer.inc.php'); ?>
