<?php
// Liste de films simulée (remplace cela par ta logique de recherche réelle)
$films = array(
    "Buzz L'éclair",
    "Film 2",
    "Film 3",
    // ... Ajoute d'autres films selon tes besoins
);

// Récupère le terme de recherche depuis l'URL
$searchTerm = isset($_GET['term']) ? $_GET['term'] : '';

// Effectue la recherche simulée
$searchResults = performSearch($films, $searchTerm);

// Affiche les résultats
foreach ($searchResults as $result) {
    echo "<p>$result</p>";
}

// Fonction pour effectuer la recherche
function performSearch($films, $term) {
    // Filtrer les films qui correspondent au terme de recherche
    $matchingFilms = array_filter($films, function ($film) use ($term) {
        return stripos($film, $term) !== false; // Recherche insensible à la casse
    });

    return $matchingFilms;
}
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Météo</title>
    <style>
        body {
            font-family: 'News times Roman', sans-serif;
            margin: 0;
            padding: 0;
            background-color:pink;
            color: #333;
            text-align: center;
        }

        #content {
            max-width: 900px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        h1 {
            color: #3498db;
        }

        #mapContainer {
            height: 300px;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body>
    <!-- Contenu principal -->
    <div id="content">
        <h1>Interface Météo</h1>

        <!-- Conteneur pour la carte météorologique -->
        <div id="mapContainer"></div>
    </div>

    <!-- Script JavaScript pour la carte -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        function updateMap(latitude, longitude) {
            const mapContainer = document.getElementById("mapContainer");
            const map = L.map(mapContainer).setView([latitude, longitude], 10);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
        }

        function showUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;

                    // Appelez la fonction de mise à jour de la carte avec les coordonnées
                    updateMap(latitude, longitude);
                }, (error) => {
                    console.error('Erreur lors de la récupération de la position', error);
                });
            } else {
                console.error('La géolocalisation n\'est pas prise en charge par ce navigateur.');
            }
        }

        // Mettez à jour la carte lors du chargement de la page
        window.onload = function() {
            showUserLocation();
        };
    </script>
</body>
</html>






