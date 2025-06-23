<!--header-->
        <?php
                $pageTitle ="Accueil";
                include 'header.php'; ?>

            <div>
                <form action='traitement.php?action=add' method='post'>
                    <p>
                        <label>
                            Nom produit :
                            <input type='text' name='name'>
                        </label> 
                    </p>
                    <p>
                        <label>
                            Prix du produit :
                            <input type='number' min='0' step='any' name='price'>
                        </label>
                    </p>
                    <p>
                        <label>
                            Quantité du produit :
                            <input type='number'  min='0' name='qtt' value='1'>
                        </label>
                    </p>
                    <p>
                        <input type='submit' name='submit' value='Ajouter le produit'>
                    </p>
                </form>
            </div>
        <?php
                include 'footer.php'; ?>

<?php
/*

session:
___ une session correspond à l'identification unique d'un client (navigateur) pour un serveur. Elle permet au serveur de stocker 
certaines données et d'y accéder, et ce tant que le navigateur est ouvert ET que le serveur l'autorise (par exemple,  validité limité à 180 minutes)

superglogales:
        ___ en PHP, il s'agit d'un ensemble de variable globales, de type tableau, et accessible par tout les script PHP étant executés dans la session. 
        eg: $_SESSION, $_POST, $_COOCKIE

pourquoi envoyer un form en post et pas en get 
___ l'envoie d'un formulaire en POST permet de ne pas surchargé l'URL.
En GET, les données transmises sont exposées et peuvent être lues et enregistrées dans l'historique du navigateur et ses favoris.

la sanitysation vous protège de quelle faille 
___ elle protège des failles par injection de code, comme le XSS ou SQL.

donner des alternatives au filter input
___ filter_has_var() - contrôle du type, filter_input_array() - idem filter_input(), mais plusieurs contrôles simultanés, filter_var() - similaire à filter_input, extendu à toute variable.
filter_car_array() - comme filter_var(), pour tableaux associatifs, htmtspacialchar() - convertie les caractères spéciaux utilisé en langage HTML vers leur équivalent textuel.
- htmlentities() - similaire à htmtspacialchar() --- différences ???

Quelles sont les dangers de cette faille
__ les dangers sont multiples, la récupération de données (cookies...), réorientation vers un site malveillant, rupture des fonctionnalités du site/appli...


*/?>