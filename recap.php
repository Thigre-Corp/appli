<!--header-->
        <?php
                $pageTitle ="Panier";
                include 'header.php'; ?>
    <main>
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
                            "<td><a class='uk-button uk-button-default' href='traitement.php?action=up-qtt&id=".$index."' '>+</a>",
                            "<td><a class='uk-button uk-button-default' href='traitement.php?action=down-qtt&id=".$index."'>-</a>",
                            "<td><a class='uk-button uk-button-default' href='traitement.php?action=delete&id=".$index."' uk-icon='icon: trash'></a>",
                        "</tr>";        
                $totalgeneral += $product['total'];   
            }           
            echo        "<tr>",
                            "<td colspan=4>Total général : </td>",
                            "<td><strong>".number_format($totalgeneral, 2, ',', '$nbsp;')."&nbsp;€</strong></td>",
                            "<td colspan=2><a class='uk-button uk-button-default' href='traitement.php?action=clear'>vider panier</a>",
                        "</tr>",                     
                    "</tbody>", 
                 "</table>";
        }
        //footer
        include 'footer.php'; ?>

<?php