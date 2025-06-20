<?php
    session_start();


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
        }
        header('Location:index.php');
    }
                break;
            case "delete":
                break;
            case "clear":
                // supprimer le tableau priducts de session
                unset($_SESSION['products']);
                header('Location:index.php');

                break;
            case "up-qtt":
                // récupérer id dans l'url
                $_SESSION['']
                break;
            case "down-qtt":
        }
        // header('Location:recap.php');
    }

//header('Location:index.php');
var_dump($_GET);