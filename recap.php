<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des produits</title>
    <link rel="stylesheet" href="uikit.css">
    <script src="uikit.js"></script>
</head>
    <body>
        <header>
            <h1>Panier</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Panier</a></li>
                </ul>
            </nav>
            <div>
                <?php echo count($_SESSION); ?>
            </div>
        </header>
    <main>
        <a href="traitement.php?action=clear">vider panier</a>
    <?php
        if(!isset($_SESSION['products']) || empty($_SESSION['products']))
        {
            echo "<p>Aucun Produit en session...</p>";
        }
        else{
            echo "<table>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                        "</tr>",
                    "</thead>",
                    "<tbody>";
            $totalgeneral = 0;
            foreach($_SESSION['products'] as $index => $product){
                echo    "<tr>",
                            "<td>".$index."</td>",  
                            "<td>".$product['name']."</td>",  
                            "<td>".number_format($product['price'], 2, ',', '&nbsp;')."&nbsp;€</td>",
                            "<td>".$product['qtt']."</td>",  
                            "<td>".number_format($product['total'], 2, ',', '&nbsp;')."&nbsp;€</td>",  
                            "<td><a href='traitement.php?action=up-qtt&id=".$index."' '>+</a>",
                            "<td><form action='traitement.php?action=delete&product=".$index."' method='get'><input type='submit' value='-'></form>",
                            "<td><form action='#?action=add&product=".$index."' method='get'><input type='submit' value='*'></form>",

                        "</tr>";        
                $totalgeneral += $product['total'];   
            }           
            echo        "<tr>",
                            "<td colspan=4>Total général : </td>",
                            "<td><strong>".number_format($totalgeneral, 2, ',', '$nbsp;')."&nbsp;€</strong></td>",
                        "</tr>",                     
                    "</tbody>", 
                 "</table>";
        }
    ?>
        </main>
</body>
</html>