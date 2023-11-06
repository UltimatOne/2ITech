<!-- PHP -->
<?php

$txt = "Variable"; //string
$nb = 10; // integer
$nb2 = 10.5; // float
$bool = true; // boolean

//TP
$firstname = "Jean-Jacques";
$name = "Goddet";
$years = 45;
$country = "Hauts-De-France";
$activity = "Développeur Web et Web Mobile";
$centreFormation = "2I Tech Academy";
$enterprise= "Solomco";
//TP

//array
$tableau = ['Hello' , 'World!!!', 12, 10.5, false]; 
$marques = ['Peugeot', 'Renault', 'Citroen', 'Audy', 'Mercedes', 'BMW', 'Wolsvagen'];

//TP variables array
$me = [
    "Jean-Jacques",
    "Goddet",
    45,
    "Hauts-De-France",
    "Développeur Web et Web Mobile",
    "2I Tech Academy",
    "Solomco"
];
$me2 = [
    "firstname" => "Jean-Jacques",
    "name" => "Goddet",
    "years" => 45,
    "country" => "Hauts-De-France",
    "activity" => "Développeur Web et Web Mobile",
    "centreFormation" => "2I Tech Academy",
    "enterprise" => "Solomco"
];
$me3 = [
    "firstname" => "Jean-Jacques",
    "name" => "Goddet",
    "years" => [45, 40, 35],
    "country" => "Hauts-De-France",
    "activity" => "Développeur Web et Web Mobile",
    "centreFormation" => "2I Tech Academy",
    "enterprise" => "Solomco"
];

//conditions
if ($nb > 10){
    var_dump("suppérieur à 10");
} else {
    var_dump("n'est pas suppérieur à 10");
};

//boucles
for ($i = 0; $i <= $nb; $i++){
    echo "<div><p>i est égale à $i</p></div>";
};

for ($i = 0; $i < count($marques); $i++){
    echo "<div><p>marque " . ($i+1) . ":  $marques[$i]</p></div>";
 }

?>
<!-- PHP Fin -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Initiation</title>
</head>
<body>

<!-- PHP -->
<?php

var_dump("Hello World!!! en PHP avec var_dump similaire à console.log");

echo "<p>Hello World!!! en PHP avec echo</p>";

echo "<p>Chaque instruction doit être séparée par un ;</p>";

echo "<p>On peut mettre dans la balise echo toute la structure d'une page HTML mais il est de meilleure pratique de commencer par la structure HTML et d'intégrer le PHP dans la balise body. Mise a part pour la logique et les variables</p>";

echo "<P>Le signe dollar $ sert à déclarer une variable</p>";

echo "<p>Le point . permet la concaténation en php '" . $txt . "'</p>";

echo "<p>La concaténation peut se faire d'une autre manière: </p>" . "<p>'{$txt}'</p>";


//TP
echo "<p>Bonjour, je m'appelle {$me2['firstname']} {$me2["name"]}, j'ai {$me3["years"][2]} ans et j'habite dans les {$me2["country"]}.<br>Je suis actuellement en reconversion professionnelle {$me2["activity"]} en alternance chez {$me2["centreFormation"]} et dans l'entreprise {$me2["enterprise"]}.</p>";
//TP

//array
var_dump($tableau[1]);
var_dump($tableau);

if ($tableau[0] == "Hello") {
    echo "<h1>$tableau[0] $tableau[1]</h1>
    <p>tableau[0] est égal à 'Hello'</p>";
} else if ($tableau[1] == "World!!!") {
    echo "<h1>$tableau[0] $tableau[1]</h1>
    <p>tableau[1] est égal à 'World!!!'</p>";
} else {
    echo "<p>tableau[0] n'est pas égale à 'Hello' et tableau[1] n'est pas égal à 'World'";
};

?>
<!-- PHP Fin -->

<!-- autre façon d'écrire echo lorsqu'il y a que un echo et rien de plus-->
<?= "<p>'{$txt}'</p>" ?>
<!-- autre façon d'écrire echo -->

<p>Hello World!!! en HTML</p>

</body>
</html>



