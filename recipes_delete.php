<?php
// On démarre la session pour récupérer les infos de l'utilisateur connecté
session_start();

// On vérifie si l'utilisateur est connecté
require_once(__DIR__ . '/isConnect.php');


$getData = $_GET;

// Ici, on vérifie si un identifiant (id) est bien présent dans l'URL
// et qu'il s'agit bien d'un chiffre 
if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    echo('Il faut un identifiant pour supprimer la recette.');
    return; // On arrête ici si l'ID est manquant ou incorrect
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Supprimer la recette ?</title>

    <!-- On utilise Bootstrap pour un style rapide et propre -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

        <?php require_once(__DIR__ . '/header.php'); ?>

        <h1>Supprimer la recette ?</h1>

        <!-- Formulaire pour confirmer la suppression -->
        <form action="recipes_post_delete.php" method="POST">
            <!-- Champ caché qui contient l'id de la recette à supprimer -->
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label">Identifiant de la recette</label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $getData['id']; ?>">
            </div>

            <!-- Bouton rouge pour confirmer la suppression -->
            <button type="submit" class="btn btn-danger">La suppression est définitive</button>
        </form>
        <br />
    </div>


    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>
