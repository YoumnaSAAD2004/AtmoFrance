<?php
/**
 * Récupère et affiche l'image ou la vidéo du jour depuis l'API APOD de la NASA.
 *
 * @param string $apiKey Clé API pour accéder au service.
 * @return string HTML contenant l'image ou la vidéo du jour avec mise en forme.
 */
function getAPODImage() {
    $apiKey = 'MeaihVJITX4h6O5CkxwftIIJx083OSqOAj9fWhDp'; 
    $date = date("Y-m-d");
    $apiUrl = "https://api.nasa.gov/planetary/apod?api_key=" . $apiKey . "&date=" . $date;

    $jsonData = @file_get_contents($apiUrl);

    if ($jsonData === FALSE) {
        return 'Erreur lors de la récupération des données. Veuillez réessayer plus tard.';
    }

    $data = json_decode($jsonData);

    if ($data !== null && isset($data->url, $data->media_type, $data->explanation)) {
        $content = '<div style="text-align: center; margin-top: 20px;">';

        if ($data->media_type === 'image') {
            $content .= '<img src="' . $data->url . '" alt="Astronomy Picture of the Day" style="max-width: 50%; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">';
        } elseif ($data->media_type === 'video') {
            $content .= '<iframe width="560" height="315" src="' . $data->url . '" frameborder="0" allowfullscreen></iframe>';
        }

        // Affichage de la description
        $content .= '<p style="font-size: 16px; font-weight: bold; color: #333; margin-top: 10px;">Image du jour</p>';
        $content .= '<p style="font-size: 14px; color: #555; margin-top: 10px;">' . $data->explanation . '</p>';
        
        $content .= '</div>';
        
        return $content;
    }

    return 'Erreur lors de la récupération des données.';
}


/**
 * Récupère les informations géographiques d'une adresse IP via l'API ipinfo.io.
 *
 * @param string $ip Adresse IP pour laquelle obtenir les informations géographiques.
 * @return string HTML contenant les informations géographiques de l'IP ou un message d'erreur.
 */
function getGeoInfoFromIpInfo($ip) {
    $url = "https://ipinfo.io/{$ip}/geo";
    $jsonData = @file_get_contents($url);

    if ($jsonData === FALSE) {
        return 'Erreur lors de la récupération des données géographiques.';
    }

    $data = json_decode($jsonData);
    if ($data !== null) {
        return "<p><strong>IP:</strong> {$data->ip}</p><p><strong>Location:</strong> {$data->city}, {$data->region}, {$data->country}</p><p><strong>Location Coordinates:</strong> {$data->loc}</p>";
    }

    return 'Erreur lors de la récupération des informations géographiques.';
}
/**
 * Récupère les informations d'une adresse IP via l'API WhatIsMyIP (format XML).
 *
 * @param string $ip Adresse IP à analyser.
 * @param string $apiKey Clé API valide pour WhatIsMyIP.
 * @return string HTML contenant les infos IP ou un message d'erreur.
 */
function getIpInfoFromWhatIsMyIp($ip, $apiKey) {
    $url = "https://api.whatismyip.com/ip-address-lookup.php?key={$apiKey}&input={$ip}&output=xml";

    // Requête cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $xmlData = curl_exec($ch);
    curl_close($ch);

    if ($xmlData === false || empty($xmlData)) {
        return '<p>Erreur lors de la récupération des données IP.</p>';
    }

    libxml_use_internal_errors(true);
    $xml = simplexml_load_string($xmlData);

    if ($xml === false) {
        return '<p>Données XML invalides :</p><pre>' . htmlspecialchars($xmlData) . '</pre>';
    }

    $info = $xml->result ?? null;

    if ($info) {
        return "
            <div style='margin-top: 10px;'>
                <p><strong>IP :</strong> {$info->ip_address}</p>
                <p><strong>Ville :</strong> {$info->city}</p>
                <p><strong>Pays :</strong> {$info->country}</p>
                <p><strong>Latitude :</strong> {$info->latitude}</p>
                <p><strong>Longitude :</strong> {$info->longitude}</p>
            </div>
        ";
    } else {
        return '<p> Aucune information trouvée pour cette IP.</p>';
    }
}


function getDepartementsParRegion($region) {
    $data = [
        "Hauts-de-France" => [
            ["code" => "59", "nom" => "Nord"],
            ["code" => "62", "nom" => "Pas-de-Calais"],
            ["code" => "80", "nom" => "Somme"],
            ["code" => "60", "nom" => "Oise"],
            ["code" => "02", "nom" => "Aisne"]
        ],
        "Normandie" => [
            ["code" => "14", "nom" => "Calvados"],
            ["code" => "50", "nom" => "Manche"],
            ["code" => "61", "nom" => "Orne"],
            ["code" => "27", "nom" => "Eure"],
            ["code" => "76", "nom" => "Seine-Maritime"]
        ],
        "Île-de-France" => [
            ["code" => "75", "nom" => "Paris"],
            ["code" => "77", "nom" => "Seine-et-Marne"],
            ["code" => "78", "nom" => "Yvelines"],
            ["code" => "91", "nom" => "Essonne"],
            ["code" => "92", "nom" => "Hauts-de-Seine"],
            ["code" => "93", "nom" => "Seine-Saint-Denis"],
            ["code" => "94", "nom" => "Val-de-Marne"],
            ["code" => "95", "nom" => "Val-d'Oise"]
        ],
        "Grand Est" => [
            ["code" => "08", "nom" => "Ardennes"],
            ["code" => "10", "nom" => "Aube"],
            ["code" => "51", "nom" => "Marne"],
            ["code" => "52", "nom" => "Haute-Marne"],
            ["code" => "54", "nom" => "Meurthe-et-Moselle"],
            ["code" => "55", "nom" => "Meuse"],
            ["code" => "57", "nom" => "Moselle"],
            ["code" => "67", "nom" => "Bas-Rhin"],
            ["code" => "68", "nom" => "Haut-Rhin"],
            ["code" => "88", "nom" => "Vosges"]
        ],
        "Bretagne" => [
            ["code" => "22", "nom" => "Côtes-d'Armor"],
            ["code" => "29", "nom" => "Finistère"],
            ["code" => "35", "nom" => "Ille-et-Vilaine"],
            ["code" => "56", "nom" => "Morbihan"]
        ],
        "Pays de la Loire" => [
            ["code" => "44", "nom" => "Loire-Atlantique"],
            ["code" => "49", "nom" => "Maine-et-Loire"],
            ["code" => "53", "nom" => "Mayenne"],
            ["code" => "72", "nom" => "Sarthe"],
            ["code" => "85", "nom" => "Vendée"]
        ],
        "Nouvelle-Aquitaine" => [
            ["code" => "16", "nom" => "Charente"],
            ["code" => "17", "nom" => "Charente-Maritime"],
            ["code" => "19", "nom" => "Corrèze"],
            ["code" => "23", "nom" => "Creuse"],
            ["code" => "24", "nom" => "Dordogne"],
            ["code" => "33", "nom" => "Gironde"],
            ["code" => "40", "nom" => "Landes"],
            ["code" => "47", "nom" => "Lot-et-Garonne"],
            ["code" => "64", "nom" => "Pyrénées-Atlantiques"],
            ["code" => "79", "nom" => "Deux-Sèvres"],
            ["code" => "86", "nom" => "Vienne"],
            ["code" => "87", "nom" => "Haute-Vienne"]
        ],
        "Occitanie" => [
            ["code" => "09", "nom" => "Ariège"],
            ["code" => "11", "nom" => "Aude"],
            ["code" => "12", "nom" => "Aveyron"],
            ["code" => "30", "nom" => "Gard"],
            ["code" => "31", "nom" => "Haute-Garonne"],
            ["code" => "32", "nom" => "Gers"],
            ["code" => "34", "nom" => "Hérault"],
            ["code" => "46", "nom" => "Lot"],
            ["code" => "48", "nom" => "Lozère"],
            ["code" => "65", "nom" => "Hautes-Pyrénées"],
            ["code" => "66", "nom" => "Pyrénées-Orientales"],
            ["code" => "81", "nom" => "Tarn"],
            ["code" => "82", "nom" => "Tarn-et-Garonne"]
        ],
        "Provence-Alpes-Côte d'Azur" => [
            ["code" => "04", "nom" => "Alpes-de-Haute-Provence"],
            ["code" => "05", "nom" => "Hautes-Alpes"],
            ["code" => "06", "nom" => "Alpes-Maritimes"],
            ["code" => "13", "nom" => "Bouches-du-Rhône"],
            ["code" => "83", "nom" => "Var"],
            ["code" => "84", "nom" => "Vaucluse"]
        ],
        "Auvergne-Rhône-Alpes" => [
            ["code" => "01", "nom" => "Ain"],
            ["code" => "03", "nom" => "Allier"],
            ["code" => "07", "nom" => "Ardèche"],
            ["code" => "15", "nom" => "Cantal"],
            ["code" => "26", "nom" => "Drôme"],
            ["code" => "38", "nom" => "Isère"],
            ["code" => "42", "nom" => "Loire"],
            ["code" => "43", "nom" => "Haute-Loire"],
            ["code" => "63", "nom" => "Puy-de-Dôme"],
            ["code" => "69", "nom" => "Rhône"],
            ["code" => "73", "nom" => "Savoie"],
            ["code" => "74", "nom" => "Haute-Savoie"]
        ],
        "Bourgogne-Franche-Comté" => [
            ["code" => "21", "nom" => "Côte-d'Or"],
            ["code" => "25", "nom" => "Doubs"],
            ["code" => "39", "nom" => "Jura"],
            ["code" => "58", "nom" => "Nièvre"],
            ["code" => "70", "nom" => "Haute-Saône"],
            ["code" => "71", "nom" => "Saône-et-Loire"],
            ["code" => "89", "nom" => "Yonne"],
            ["code" => "90", "nom" => "Territoire de Belfort"]
        ],
        "Centre-Val de Loire" => [
            ["code" => "18", "nom" => "Cher"],
            ["code" => "28", "nom" => "Eure-et-Loir"],
            ["code" => "36", "nom" => "Indre"],
            ["code" => "37", "nom" => "Indre-et-Loire"],
            ["code" => "41", "nom" => "Loir-et-Cher"],
            ["code" => "45", "nom" => "Loiret"]
        ],
        "Corse" => [
            ["code" => "2A", "nom" => "Corse-du-Sud"],
            ["code" => "2B", "nom" => "Haute-Corse"]
        ]
    ];

    return isset($data[$region]) ? $data[$region] : [];
}
function getVillesByDepartement($dep_code, $csvFilePath) {
    $villes = [];

    if (($handle = fopen($csvFilePath, "r")) !== FALSE) {
        $headers = fgetcsv($handle, 1000, ",");

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if (count($headers) !== count($data)) {
                continue; // ignorer ligne mal formée
            }

            $row = array_combine($headers, $data);

            if (isset($row['dep_code'], $row['nom_standard']) && $row['dep_code'] === $dep_code) {
                $villes[] = $row['nom_standard'];
            }
        }
        fclose($handle);
    }

    return $villes;
}
/**
 * Retourne une icône météo (emoji) en fonction de la description principale.
 *
 * @param string $weatherMain Type de météo (ex: Clear, Clouds, Rain...)
 * @return string Emoji météo
 */
function getWeatherIcon(string $weatherMain): string {
    return match (strtolower($weatherMain)) {
        'clear' => '☀️',
        'clouds' => '☁️',
        'rain' => '🌧️',
        'drizzle' => '🌦️',
        'thunderstorm' => '⛈️',
        'snow' => '❄️',
        'mist', 'fog', 'haze', 'smoke' => '☁️',
        'dust', 'sand', 'ash' => '🌪️',
        'squall' => '💨',
        'tornado' => '🌪️',
        default => '❓'
    };
}

/**
 * Traduit un état météo principal (en anglais) en français.
 *
 * @param string $mainDescription Description principale de l'API (ex: "Clear", "Rain")
 * @return string Description traduite en français
 */
function translateWeatherDescription(string $mainDescription): string {
    $translations = [
        'Clear' => 'Ensoleillé',
        'Clouds' => 'Nuageux',
        'Rain' => 'Pluvieux',
        'Drizzle' => 'Pluie fine',
        'Thunderstorm' => 'Orageux',
        'Snow' => 'Neigeux',
        'Mist' => 'Brume',
        'Fog' => 'Brouillard',
        'Haze' => 'Brume sèche',
        'Smoke' => 'Fumée',
        'Dust' => 'Poussière',
        'Sand' => 'Sable',
        'Ash' => 'Cendres volcaniques',
        'Squall' => 'Rafales',
        'Tornado' => 'Tornade'
    ];

    return $translations[$mainDescription] ?? ucfirst(strtolower($mainDescription));
}


/**
 * Récupère les données météo actuelles d'une ville via l'API OpenWeatherMap.
 *
 * @param string $city Nom de la ville
 * @param string $apiKey Clé API OpenWeatherMap
 * @return array|null Tableau avec 'main' (type météo) et 'temp' (température), ou null si erreur
 */
function getWeatherDataForCity(string $city, string $apiKey): array {
    $url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric&lang=fr";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    return $data ?? [];
}



/**
 * Récupère les prévisions météo des prochains jours pour une ville donnée.
 * Utilise l'API OpenWeatherMap en mode "forecast" (prévisions toutes les 3 heures).
 * Ne retient qu'une prévision par jour, autour de midi (entre 11h et 13h), pour plus de clarté.
 *
 * @param string $city   Nom de la ville pour laquelle récupérer les prévisions (ex : "Paris").
 * @param string $apiKey Clé API valide pour OpenWeatherMap.
 * 
 * @return array Tableau associatif contenant une clé "forecast" avec un tableau de prévisions.
 *               Chaque prévision contient :
 *               - day : Nom du jour (ex : "Lundi")
 *               - description : Description météo traduite en français (ex : "Ensoleillé")
 *               - icon : Emoji météo correspondant (ex : "☀️")
 */
function getFourDayForecast($city, $apiKey) {
    $url = "https://api.openweathermap.org/data/2.5/forecast?q=" . urlencode($city) . "&appid=$apiKey&units=metric&lang=fr";

    $response = @file_get_contents($url);
    if ($response === false) {
        return ["forecast" => []];
    }

    $data = json_decode($response, true);
    if (!isset($data['list'])) {
        return ["forecast" => []];
    }

    $days = [];

    foreach ($data['list'] as $entry) {
        $timestamp = $entry['dt'];
        $date = new DateTime("@$timestamp");
        $dayName = translateDay($date->format('l'));

        $hour = (int)$date->format('H');

        if ($hour >= 11 && $hour <= 13) {
            $main = $entry['weather'][0]['main'] ?? '';
            $description = translateWeatherDescription($main);
            $icon = getWeatherIcon($main);

            if (!isset($days[$dayName])) {
                $days[$dayName] = [
                    'day' => $dayName,
                    'description' => $description,
                    'icon' => $icon
                ];
            }
        }

        // On limite à 4 jours de prévisions
        if (count($days) >= 4) break;
    }

    return ["forecast" => array_values($days)];
}
/**
 * Traduit un nom de jour anglais vers le français.
 *
 * @param string $day Nom du jour en anglais (ex: "Monday")
 * @return string Nom du jour en français (ex: "Lundi")
 */
function translateDay($day) {
    $days = [
        'Sunday' => 'Dimanche',
        'Monday' => 'Lundi',
        'Tuesday' => 'Mardi',
        'Wednesday' => 'Mercredi',
        'Thursday' => 'Jeudi',
        'Friday' => 'Vendredi',
        'Saturday' => 'Samedi'
    ];
    return $days[$day] ?? $day;
}


?>
