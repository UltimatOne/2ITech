<?php
include 'header.php';

if (isset($_POST['email']) && isset($_POST['pswrd'])) {
    if (empty($_POST['email']) || empty($_POST['pswrd'])) {
        $msgError = "<p>Merci de compléter les champs suivants:";
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                $msgError .= "<br> -> $key";
            }
        };
        $msgError .= "</p>";
    } else {
        try {
            $request = $db->prepare('SELECT * FROM users WHERE user_email = ?');
            $request->execute([
                $_POST['email']
            ]);

            //fetch permet de récupérer une seule entrée, utilisé ici parceque la clef est unique (email), pour une clé non unique on utilise fetchall
            $user = $request->fetch();

            //vérification
            if (!$user OR !password_verify($_POST['pswrd'], $user['user_pswrd'])) {
                $msgError = "Email ou mot de passe incorrect";

            } else {
                $_SESSION["user"] = [
                    'firstname' => $user["user_firstname"],
                    'email' => $user["user_email"]];
            };

            header("Location: index.php?login=true");

        } catch (Exception $e) {
            var_dump($e->getMessage());
            $msgError = "La connexion a échouée";
        }
    }
};
?>

<h1 class="text-center">Connexion</h1>

<form action="" method="post" class="d-flex flex-column mx-auto" style="width: 60%;">
    <div class="mb-3">
        <label for="email" class="form-label">Votre Email</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="pswrd" class="form-label">Votre mot de passe</label>
        <input type="password" class="form-control" name="pswrd" id="pswrd">
    </div>
    <button type="submit" class="btn btn-dark w-25 mx-auto">Envoyer</button>
</form>

<?php
include 'box.php';
include 'footer.php';
?>