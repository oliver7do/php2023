<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// // Créez un tableau vide.
// $tableau = array();

// // Ajoutez les nombres de 1 à 5 à ce tableau.
// for ($i = 1; $i <= 5; $i++) {
//     $tableau[] = $i;
// }

// // Supprimez le troisième élément.
// if (isset($tableau[2])) {
//     array_splice($tableau, 2, 1);
// }

// // Affichez le contenu final du tableau.
// print_r($tableau);


// // ----------------------------------------------------------------- //


// // Réorganisez les clés du tableau pour qu'il n'y ait pas de trou.
// $tableau = array_values($tableau);

// // Affichez le contenu final du tableau.
// print_r($tableau);

// // Recherche et modification
// // Créez un tableau contenant plusieurs noms de pays.
// $pays = array("Allemagne", "France", "Italie", "Royaume-Uni");

// // Vérifiez si "France" est présent dans le tableau.
// $indexFrance = array_search("France", $pays);

// if ($indexFrance !== false) {
//     // Si oui, remplacez "France" par "Espagne".
//     $pays[$indexFrance] = "Espagne";
// }

// // Affichez le tableau modifié.
// print_r($pays);



// // ---------------------------------------------------------------- //



// // Initialisation du tableau pour stocker les numéros
// $numeros = array();

// // Générer 5 numéros au hasard
// while (count($numeros) < 5) {
//     $numeroAleatoire = rand(1, 49);
    
//     // Vérifier si le numéro n'est pas déjà dans le tableau
//     if (!in_array($numeroAleatoire, $numeros)) {
//         $numeros[] = $numeroAleatoire;
//     }
// }

// // Trier les numéros en ordre croissant
// sort($numeros);

// // Convertir les numéros en une chaîne avec des tirets
// $numerosString = implode("-", $numeros);

// // Afficher les numéros formatés
// echo $numerosString;

// ---------------------------------------------------------------- //


function tirage($nombreNumeros, $maximum) {
    $numeros = array();
    
    while (count($numeros) < $nombreNumeros) {
        $numeroAleatoire = rand(1, $maximum);
        
        if (!in_array($numeroAleatoire, $numeros)) {
            $numeros[] = $numeroAleatoire;
        }
    }
    
    sort($numeros);
    return $numeros;
}

// Tirage de 5 numéros sur une grille de 50
$numerosTires = tirage(5, 50);
echo "Numéros EuroMillions : " . implode(" - ", $numerosTires);

// Tirage de 2 étoiles sur une grille de 12
$etoilesTirees = tirage(2, 12);
echo "\nÉtoiles EuroMillions : " . implode(" - ", $etoilesTirees);



?>


</body>
</html>