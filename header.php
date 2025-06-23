<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr" class = "uk-height-viewport">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="uikit.css">
        <script src="uikit.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.23.10/dist/js/uikit-icons.min.js"></script>
        <title>Ma première Appli<?= isset($pageTitle) ? " - ".$pageTitle : ""?></title>
    </head>
    <body style="background: center / contain no-repeat url('img/fondmarche.jpg'); height: 100vh; " >
    <div class="uk-container-expand" style="height: 100vh;" >
            <header class="uk-navbar-container uk-padding" style="opacity: 0.9;">
                <h1 class="uk-text-large uk-padding uk-position-top-left">Ma première Appli</h1>
                <h2 class="uk-text-meta uk-block-inline">Celle qui met en oeuvre la <strong>$_SESSION</strong></h2>
                <nav class="uk-navbar uk-position-top-right uk-padding">
                    <ul class="uk-navbar-nav uk-text-large">
                        <li class="uk-parent uk-padding"><a class="uk-text-emphasis uk-position-left" href="index.php">Home</a></li>
                        <li class="uk-parent uk-padding"><a class="uk-text-emphasis" href="recap.php"><div>
                                                                                                <span class="uk-position-center" uk-icon="icon: cart; ratio: 2;" ></span>
                                                                                                <div class="uk-position-center" style="background-color :rgba(238, 17, 17, 0.7); border-radius: 50%; height: 1em; padding: 10px; width: fit-content;">
                                                                                                    <p class="uk-position-center" style="color: white;">
                                                                                                    <?php echo isset($_SESSION['nbProduits']) ? $_SESSION['nbProduits'] : 0; ?>
                                                                                                    <p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </ul>
                                                                                </nav>
                        <div class="uk-animation-reverse uk-text-center uk-position-top">
                            <?php
                        if (isset($_SESSION['alert'])){
                            switch($_SESSION['alert']){
                                case 'non':
                                    echo "
                                    <div class='uk-alert-danger uk-animation-slide-top uk-text-center' duration='1500'>Manipulation interdite</div>
                                    ";
                                    break;
                                case "add":
                                    echo "
                                    <div class='uk-alert-success uk-animation-slide-top uk-text-center' duration='1500'>Produit ajouté !</div>
                                    ";
                                    break;
                                case "delete":
                                    echo "
                                    <div class='uk-alert-warning uk-animation-slide-top uk-text-center'>Produit supprimé !</div>
                                    ";
                                    break;
                                case "clear":
                                    echo "
                                    <div class='uk-alert-danger uk-animation-slide-top uk-text-center'>Panier supprimé !</div>
                                    ";
                                    break;
                                case "up-qtt":
                                    echo "
                                    <div class='uk-alert-success uk-animation-slide-top uk-text-center'>Quantité ajoutée avec succès</div>
                                    ";
                                    break;                                                
                                case "down-qtt":
                                    echo "
                                    <div class='uk-alert-success uk-animation-slide-top uk-text-center'>Quantité déduite avec succès</div>
                                    ";
                                    break;
                            }
                        unset($_SESSION['alert']);
                    }
                    ?>
                </div>
            </header>
            <main>
                <div>
                    <div class="uk-flex uk-position-center uk-padding" style="
                                                                                background: rgba(242, 242, 242, 0.7);
                                                                                border-radius: 16px;
                                                                                backdrop-filter: blur(10px);
                                                                                box-shadow: 4px 4px 8px  rgba(103, 103, 103, 0.7);
                                                                                ">