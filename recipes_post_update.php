<?php
// On démarre la session pour utiliser les infos de l'utilisateur connecté
session_start();

// On vérifie que l'utilisateur est bien connecté 
require_once(__DIR__ . '/isConnect.php');

// On récupère la configuration de la base de données 
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');

$postData = $_POST;

// Vérification des champs 
if (
    !isset($postData['id'])                       
    || !is_numeric($postData['id'])               
    || empty($postData['title'])                 
    || empty($postData['recipe'])                
    || trim(strip_tags($postData['title'])) === ''
    || trim(strip_tags($postData['recipe'])) === '' 
) {
    // On affiche un message d'erreur et on arrête tout
    echo 'Il manque des informations pour permettre l\'édition du formulaire.';
    return;
}

// On sécurise les données du formulaire
$id = (int)$postData['id'];
$title = trim(strip_tags($postData['title']));
$recipe = trim(strip_tags($postData['recipe']));

// On prépare une requête SQL pour modifier la recette dans la base de données
$insertRecipeStatement = $mysqlClient->prepare('UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :id');


$insertRecipeStatement->execute([
    'title' => $title,
    'recipe' => $recipe,
    'id' => $id,
]);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création de recette</title>
   
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

        
        <?php require_once(__DIR__ . '/header.php'); ?>

        
        <h1>Recette modifiée avec succès !</h1>

        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo($title); ?></h5>
                <p class="card-text"><b>Email</b> : <?php echo $_SESSION['LOGGED_USER']['email']; ?></p>
                <p class="card-text"><b>Recette</b> : <?php echo $recipe; ?></p>
            </div>
        </div>
    </div>

   
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>
