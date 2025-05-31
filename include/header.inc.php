<?php
// Cookies de ville
if (isset($_GET['ville']) && $_GET['ville'] !== '') {
    $cookieData = [
        'ville' => $_GET['ville'],
        'date' => date('Y-m-d H:i:s')
    ];
    setcookie('last_city', json_encode($cookieData), time() + (30 * 24 * 60 * 60));
}

// Cookies de langue
if (isset($_GET['lang']) && in_array($_GET['lang'], ['fr', 'en'])) {
    setcookie('lang', $_GET['lang'], time() + (30 * 24 * 60 * 60), "/");
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit;
}

$lang = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'fr';

$basename = basename($_SERVER['SCRIPT_NAME']);

if ($lang === 'en' && !str_ends_with($basename, '_eng.php')) {
    $eng = str_replace('.php', '_eng.php', $basename);
    if (file_exists($eng)) {
        header("Location: $eng");
        exit;
    }
}

if ($lang === 'fr' && str_ends_with($basename, '_eng.php')) {
    $fr = str_replace('_eng.php', '.php', $basename);
    if (file_exists($fr)) {
        header("Location: $fr");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
  <meta charset="utf-8" />
  <title>AtmoFrance</title>

  <?php
    $theme = 'style.css'; // thème par défaut
    if (isset($_COOKIE['theme']) && in_array($_COOKIE['theme'], ['style.css', 'stylenight.css'])) {
      $theme = $_COOKIE['theme'];
    }
  ?>
  <link rel="stylesheet" href="<?php echo $theme; ?>" />

  <link rel="icon" type="image/x-icon" href="images/favicon.ico"/>
  <meta name="author" content="Youmna SAAD et Nohayla CHENNOUF"/>
  <meta name="description" content="Page dédiée au Projet de développement Web."/>

  <style>
    h3 { margin-bottom: 15px; }
    article h4 {
        font-weight: bold;
        text-shadow: 0px 0px 2px rgb(143, 147, 146);
        font-size: 1.2em;
        color: black;
    }
    a {
        text-decoration: none;
        color: rgb(0, 0, 0);
    }
    a:hover {
        color: rgb(255, 223, 195);
        text-shadow: 1px 1px 4px rgb(231, 179, 155);
    }

#carte {
  position: relative;
  display: inline-block;
  margin: 20px;
}
#carte img {
  border: 2px solid #333;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}
#regionName {
  display: block;
  font-weight: bold;
  text-align: center;
  margin-top: 10px;
  padding: 8px;
  background-color: #f0f0f0;
  border-radius: 4px;
}
area {
  outline: none;
  transition: all 0.2s;
}
.lang-switch {
  background-color: #007BFF;
  color: white;
  padding: 8px 12px;
  text-decoration: none;
  border-radius: 5px;
  font-weight: bold;
  float: right;
  margin-top: 20px;
}
.lang-switch:hover {
  background-color: #0056b3;
}
  </style>
</head>

<body id="top">
  <header class="header-gif">
    <a href="index.php" class="logo">
        <img src="images/logo.png" alt="Logo-Meteo" />
    </a>
    <nav>
  <ul>
  <li><a href="index.php"><?php echo ($lang === 'fr') ? 'Accueil' : 'Home'; ?></a></li>
<li><a href="meteo.php"><?php echo ($lang === 'fr') ? 'Météo' : 'Weather'; ?></a></li>
<li><a href="carte.php"><?php echo ($lang === 'fr') ? 'Temps réel' : 'Live'; ?></a></li>
<li><a href="stat.php"><?php echo ($lang === 'fr') ? 'Statistiques' : 'Statistics'; ?></a></li>

    <li><a href="?lang=<?php echo ($lang === 'fr') ? 'en' : 'fr'; ?>">
      <?php echo ($lang === 'fr') ? '🇬🇧 English' : '🇫🇷 Français'; ?>
    </a></li>

    <li class="search-wrapper">
  <a href="#" class="search-toggle"><?php echo ($lang === 'fr') ? 'Recherche' : 'Search'; ?></a>
  <form id="google-search-form" class="search-form" action="https://www.google.com/search" method="get">
    <input type="text" name="q" placeholder="<?php echo ($lang === 'fr') ? 'Rechercher sur Google...' : 'Search on Google...'; ?>">
  </form>
</li>



  </ul>
</nav>

  </header>
