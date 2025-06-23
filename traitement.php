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

                    if($price < 0 || $qtt <0){
                        $_SESSION['alert'] = 'non'; 
                        header("Location:index.php?");
                    }
                    if( $name && $price && $qtt){
                        $product = [
                            "name" => $name,
                            "price" => $price,
                            "qtt" => $qtt,
                            "total" => $price*$qtt
                        ];
                        $_SESSION['products'][] = $product;
                        $_SESSION['nbProduits']+=$qtt;
                    $_SESSION['alert'] = 'add'; 
                    }   
                    header("Location:index.php?");
                }
                break;
            case "delete":
                $_SESSION['nbProduits'] -= $_SESSION['products'][$_GET['id']]['qtt'];
                unset($_SESSION['products'][$_GET['id']]);
                $_SESSION['alert'] = 'delete'; 
                header('Location:recap.php');
                break;
            case "clear":
                $_SESSION['nbProduits'] = 0 ;
                unset($_SESSION['products']);
                header('Location:index.php');
                 $_SESSION['alert'] = 'clear'; 
                break;
            case "up-qtt":
                $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['price'] * ++$_SESSION['products'][$_GET['id']]['qtt'];
                $_SESSION['nbProduits']++;
                $_SESSION['alert'] = 'up-qtt'; 
                header('Location:recap.php');
                break;
            case "down-qtt":
                if (($_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['price'] * --$_SESSION['products'][$_GET['id']]['qtt']) == 0) {
                    unset($_SESSION['products'][$_GET['id']]);
                    $_SESSION['alert'] = 'delete';
                    $_SESSION['nbProduits'] -= $_SESSION['products'][$_GET['id']]['qtt'];
                    unset($_SESSION['products'][$_GET['id']]);
                }
                else{
                $_SESSION['alert'] = 'down-qtt'; 
                }
                $_SESSION['nbProduits']--;
                header('Location:recap.php');
                break;
            default:
                header('Location:index.php');
        }
    }

?>