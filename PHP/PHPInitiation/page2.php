<?php
$msg = "";
if (
    isset($_POST["nom"]) &&
    !empty($_POST["nom"]) &&
    !empty($_POST["prenom"]) &&
    !empty($_POST["mail"]) &&
    !empty($_POST["age"])
) {
    $msg = "Bonjour {$_POST["prenom"]} {$_POST["nom"]} votre formulaire a bien été validé</p>
    <p>Votre mail est {$_POST["mail"]} et vous avez {$_POST["age"]} ans";
} else {
    $msg = "Merci de compléter les champs suivants:";
    // if (empty($_POST['nom'])){
    //     $msg = $msg . ' Nom';
    // }
    // if (empty($_POST['prenom'])){
    //     $msg = $msg . ' Prenom';
    // }
    // if (empty($_POST['mail'])){
    //     $msg = $msg . ' Mail';
    // }
    // if (empty($_POST['age'])){
    //     $msg = $msg . ' Age';
    // }
    foreach ($_POST as $key => $value) {
        // echo 'Key : ' . $key . '<br>';
        // echo 'Value : ' . $value . '<br>';
        // echo '////////////////////////////<br>';
        if (empty($value)) {
            $msg .= "<br> - $key";
        }
    };
}

// if (
//     isset($_POST["nom"]) &&
//     !empty($_POST["nom"])
// ) {
//     if (
//         isset($_POST["prenom"]) &&
//         !empty($_POST["prenom"])
//     ) {
//         if (
//             isset($_POST["mail"]) &&
//             !empty($_POST["mail"])
//         ) {
//             if (
//                 isset($_POST["age"]) &&
//                 !empty($_POST["age"])  
//             ){
//                 $msg = "Bravo";
//             } else {
//                 $msg .= "<p>Merci de remplir l'age</p>";
//             }
//         } else {
//             $msg .= "<p>Merci de remplir le mail</p>";
//         }
//     } else {
//         $msg .= "<p>Merci de remplir le prenom</p>";
//     }
// } else {
//     $msg = "<p>Merci de remplir le nom</p>";
// }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page 2</title>
</head>

<body>
    <p><?= $msg ?></p>
    <a href="index.php">Accueil</a>
</body>

</html>