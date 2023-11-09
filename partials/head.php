<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> 
            <?php if($NamePage == "home"): ?>
                Acceuil
            <?php elseif($NamePage == "game"): ?>
                Jeu
            <?php elseif($NamePage == "score"): ?>
                Scores
            <?php elseif($NamePage == "contact"): ?>
                Contact
            <?php elseif($NamePage == "account"): ?>
                Mon Espace
            <?php elseif($NamePage == "register"): ?>
                Inscription
            <?php elseif($NamePage == "login"): ?>
                Connexion
            <?php elseif($NamePage == "boutique"): ?>
                Boutique
            <?php endif; ?>    
        </title>
        <link rel="icon" type="image/png" href="<?= PROJECT_FOLDER ?>assets/image/carte.png">
        <link rel="stylesheet" href="<?= PROJECT_FOLDER ?>assets/css/main.css">
        <link rel="stylesheet" href="<?= PROJECT_FOLDER ?>assets/css/header.css">
        <link rel="stylesheet" href="<?= PROJECT_FOLDER ?>assets/css/footer.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=AR+One+Sans:wght@600&display=swap');
        </style>
    </head>