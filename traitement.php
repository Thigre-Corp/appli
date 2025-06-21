<?php
    session_start();
    if( !isset($_SESSION['nbProduits'])){
        $_SESSION['nbProduits'] = 0;
        } 
    if(isset($_GET['action'])){

        switch($_GET['action']){
            case "add":
                if(isset($_POST['submit'])){
                    $name= htmlspecialchars($_POST['name']); //filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // FILTER_SANITIZE_FULL_SPECIAL_CHARS
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
                    if( $name && $price && $qtt){
                        $product = [
                            "name" => $name,
                            "price" => $price,
                            "qtt" => $qtt,
                            "total" => $price*$qtt
                        ];
                        $_SESSION['products'][] = $product;
                        $_SESSION['nbProduits']+=$qtt;
                    }   
                    header('Location:index.php');
                }
                break;
            case "delete":
                $_SESSION['nbProduits'] -= $_SESSION['products'][$_GET['id']]['qtt'];
                unset($_SESSION['products'][$_GET['id']]);
                header('Location:index.php');
                break;
            case "clear":
                $_SESSION['nbProduits'] = 0 ;
                unset($_SESSION['products']);
                header('Location:index.php');
                break;
            case "up-qtt":
                $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['price'] * ++$_SESSION['products'][$_GET['id']]['qtt'];
                $_SESSION['nbProduits']++;
                header('Location:recap.php');
                break;
            case "down-qtt":
                $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['price'] * --$_SESSION['products'][$_GET['id']]['qtt'];
                $_SESSION['nbProduits']--;
                header('Location:recap.php');
                break;
            default:
                header('Location:index.php');
        }
    }

?>