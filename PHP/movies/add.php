<?php
include 'header.php';
?>

<h1>Ajouter un élève</h1>

<form action="valid.php" method="post" style="width: 60%; margin: auto" >
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom" id="lastname">
    </div>
    <div class="mb-3">
        <label for="firstname" class="form-label">Prénom</label>
        <input type="text" class="form-control" name="prenom" id="firstname">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Téléphone</label>
        <input type="tel" class="form-control" name="telephone" id="phone">
    </div>
    <div class="mb-3">
        <label for="adrs" class="form-label">Adresse</label>
        <input type="text" class="form-control" name="adresse" id="adrs">
    </div>
    <div class="mb-3">
        <label for="birth" class="form-label">Date de N.</label>
        <input type="date" class="form-control" name="date" id="birth">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
include 'footer.php';
?>

