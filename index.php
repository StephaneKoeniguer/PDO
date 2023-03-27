<?php
    require_once 'model.php'
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>Friends</title>
</head>
<body>

    <div>
        <h1>Friends list :</h1>
        <ul>
            <?php 
            foreach($friendsArray as $friend) {
             ?>
            <li><?= $friend['firstname'] . ' ' . $friend['lastname'];?></li>
            <?php 
            } // end of the loop
            ?>
        </ul>
    </div>

    <h1>Formulaire</h1>

    <form action ="model.php" method = "post" class ="container bg-light border rounded p-5">
        <div class="row">
            <label for ="nom" class="form-label">Nom :</label>
            <input type="text" id ="nom" name="user_firstname" required="required" class="form-control">
        </div>
        <div class="row">
            <label for ="prenom" class="form-label">Prénom :</label>
            <input type="text" id ="prenom" name="user_lastname" required="required" class="form-control">
        </div>
        <br>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
    
</body>
</html>

