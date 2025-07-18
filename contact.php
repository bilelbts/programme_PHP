<?php session_start(); ?> 
 <!--  On démarre la session pour accéder aux infos de l'utilisateur connecté-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Rend le site adapté au mobile -->
    <title>Site de Recettes - Page d'accueil</title> 
    
    <!-- Lien vers la bibliothèque Bootstrap pour avoir un design rapide et propre -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100"> <!-- Mise en page avec Bootstrap  -->
    <div class="container"> >

        <?php require_once(__DIR__ . '/header.php'); ?> 
        

        <h1>Contactez nous</h1>

        <!-- Formulaire qui envoie les données à submit_contact.php -->
        <form action="submit_contact.php" method="POST" enctype="multipart/form-data">
            <!-- enctype="multipart/form-data" est obligatoire pour pouvoir envoyer un fichier -->

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <!-- Champ pour saisir l'email -->
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help">
                <div id="email-help" class="form-text">Nous ne revendrons pas votre email.</div>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Votre message</label>
                <!-- Zone de texte pour écrire un message -->
                <textarea class="form-control" placeholder="Exprimez vous" id="message" name="message"></textarea>
            </div>

            <div class="mb-3">
                <label for="screenshot" class="form-label">Votre capture d'écran</label>
                <!-- Champ pour envoyer un fichier image -->
                <input type="file" class="form-control" id="screenshot" name="screenshot" />
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button> <!-- Bouton pour envoyer le formulaire -->
        </form>
    </div>

    <?php require_once(__DIR__ . '/footer.php'); ?> 
    <!-- Ajoute le fichier de pied de page (informations, copyright, etc.) -->
</body>
</html>
