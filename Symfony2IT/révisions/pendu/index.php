<?php

$words = [
    "anticonstitutionnellement",
    "voyager",
    "chimie",
    "développer"
];

// Initialisation du jeu
// $word = $words[rand(0, count($words)-1)]; égale à
$word = $words[array_rand($words)];

$hidden_word = str_repeat('_', strlen($word));
$WrongAnswer = 0;
$used_letters = [];
    


// boucle du jeu
while ($hidden_word != $word || $WrongAnswer < 6) {
    echo "Le mot à deviner est : $hidden_word\n";
    echo "Nombre d'essais restants : " . (6 - $WrongAnswer) . "\n";
    $letter = strtolower(readline("Entrez une lettre : ")[0]);
    echo "Lettre choisie : $letter\n";

    if (in_array($letter, $used_letters)) {
        echo "Lettre déjà utilisée\n";

    } else {
        //équivalent a array_push($used_letter, $letter)
        $used_letter[] = $letter;
        if (strpos($word, $letter) !== false) {
            echo "Bien joué, vous avez trouvé la lettre $letter\n";
            for ($i = 0; $i < strlen($word); $i++) {
                if ($word[$i] == $letter) {
                    $hidden_word[$i] = $letter;
                };
            };
        } else {
            $WrongAnswer++;
            echo "mauvaise lettre";
        };
    }
};

// fin du jeu( gagné ou perdu)
if ($WrongAnswer == 6) {
    echo "perdu";
} else if ($hidden_word == $word) {
    echo "Gagné";
}
