<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    // $nom = "CHEFE";
    // $prenom = "Oliver"; 
    // $nomeComplet = $prenom. " ". $nom; 
    // echo "<p> Bonjour Je suis ".$prenom. " ". $nom. "</p>"; 
    
    // $phrase = "La programmation et amusante"; 
    // $mot = substr($phrase, 3, 13);
    // echo $mot."<br>"; 

    // $texte = "Les chats sont adorables";
    // $nouveauTexte = str_replace("chats", "chiens", $texte);
    // echo $nouveauTexte."<br>";

    // $texte = "Hello world";
    // $minuscules = strtolower($texte);
    // echo $minuscules."<br>";
    // $majuscules = strtoupper($texte);
    // echo $majuscules."<br>";

    // Exercice

    // 1
    $chaine = "La maison bleue";
    $bleue = substr ($chaine, 10, 5); 
    echo $bleue. "<br>";
    
    // 2
    $avis = "Ce film était vraiment mauvais.";
    $nouveauTexte = str_replace("mauvais", "excellents", $avis);
    echo $nouveauTexte. "<br>";

    // 3
    $texte = "bienvenue sur notre site web.";
    $premiereMaj = ucfirst($texte);
    echo  $premiereMaj. "<br>";
    
    // 4
    $nomProduit = "Ordinateur portable";
    $prixUnitaire = 899.99;
    $quantite = 3;

    $prixTotal = $prixUnitaire * $quantite;

    echo "produito: $nomProduit<br>";
    echo "prix unitaire: $prixUnitaire<br>";
    echo "quantite: $quantite<br>";
    echo "prix total: $prixTotal". "<br>";

    // 5
$article1 = "Livre";
$prixArticle1 = 12.99;
$quantiteArticle1 = 2;

$article2 = "DVD";
$prixArticle2 = 9.99;
$quantiteArticle2 = 3;

$article3 = "Casque audio";
$prixArticle3 = 49.99;
$quantiteArticle3 = 1;

// Calcul du prix total avant remise
$prixTotalAvantRemise = ($prixArticle1 * $quantiteArticle1) + ($prixArticle2 * $quantiteArticle2) + ($prixArticle3 * $quantiteArticle3);

// Calcul de la remise (10 % du prix total avant remise)
$remise = 0.1 * $prixTotalAvantRemise;

// Calcul du prix total après remise
$prixTotalApresRemise = $prixTotalAvantRemise - $remise;

// Affichage des résultats
echo "Détails de votre panier d'achats :\n";
echo "$quantiteArticle1 x $article1 : $prixArticle1 € chacun\n";
echo "$quantiteArticle2 x $article2 : $prixArticle2 € chacun\n";
echo "$quantiteArticle3 x $article3 : $prixArticle3 € chacun\n\n";

echo "Prix total avant remise : $prixTotalAvantRemise €\n";
echo "Remise (10 %) : $remise €\n";
echo "Prix total après remise : $prixTotalApresRemise €\n". "<br>";

    //6
  
// Montant en euros
$montantEuros = 100;
// Taux de change : 1 euro = 1.18 dollars américains
$tauxChange = 1.18;

// Calculez le montant en dollars
$montantDollars = $montantEuros * $tauxChange;

// Affichez le résultat
echo "$montantEuros euros équivalent à environ $montantDollars dollars américains". "<br>";

//7

// Variable d'âge
$age = 18;

// Vérification si l'âge est supérieur ou égal à 18
if ($age >= 18) {
    echo "Majeur". "<br>";
} else {
    echo "Mineur". "<br>";
}


//8

// Année à vérifier
$annee = 2024;

// Vérification si l'année est bissextile
if (($annee % 4 == 0 && $annee % 100 != 0) || $annee % 400 == 0) {
    echo "Année bissextile". "<br>";
} else {
    echo "Année non bissextile". "<br>";
}


//9

// Variable nombre à tester
$nombre = 7;

// Vérification si le nombre est pair ou impair
if ($nombre % 2 == 0) {
    echo "Le nombre est pair". "<br>";
} else {
    echo "Le nombre est impair". "<br>";
}



//10


//11




    ?>
</body>
</html>