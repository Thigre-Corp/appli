<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="uikit.css">
        <script src="uikit.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.23.10/dist/js/uikit-icons.min.js"></script>
        <title>Ma première Appli<?= isset($pageTitle) ? " - ".$pageTitle : ""?></title>
    </head>
    <body>
    <div class="uk-container-expand uk-height-sm" style="background: radial-gradient(circle,rgba(145, 96, 96, 1) 0%, rgba(87, 199, 133, 1) 50%, rgba(237, 221, 83, 1) 100%);">
            <header class="uk-navbar-container uk-padding">
                <h1 class="uk-text-large uk-padding uk-position-top-left">Ma première Appli</h1>
                <h2 class="uk-text-meta uk-block-inline">Celle qui met en oeuvre la <strong>$_SESSION</strong></h2>
                <nav class="uk-navbar uk-position-top-right uk-padding">
                    <ul class="uk-navbar-nav">
                        <li class="uk-parent uk-padding"><a class="uk-text-emphasis" href="index.php">Home</a></li>
                        <li class="uk-parent uk-padding"><a class="uk-text-emphasis" href="recap.php"><div>
                                                                                                <span class="uk-position-center-right" uk-icon="icon: cart" ></span>
                                                                                                <div class="uk-position-center-right" style="background-color : #EE111177; border-radius: 100%; height: 1em; aspect-ratio: 1/1;">
                                                                                                    <p class="uk-position-center" style="color: white;">
                                                                                                    <?php echo isset($_SESSION['nbProduits']) ? $_SESSION['nbProduits'] : 0; ?>
                                                                                                    <p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a></li>
                        <!--li class="uk-parent">
                            <a href="recap.php">
                                <?php echo isset($_SESSION['nbProduits']) ? $_SESSION['nbProduits'] : 0; ?>
                            </a-->
                        </li>
                    </ul>
                </nav>
            </header>
            <main>
                <div class="uk-height-viewport">
                    <div class="uk-flex uk-position-center uk-padding uk-background-blend-soft-light" style=   "background: rgba(255, 255, 255, 0.2);
                                                                                border-radius: 16px;
                                                                                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                                                                                backdrop-filter: blur(5px);">