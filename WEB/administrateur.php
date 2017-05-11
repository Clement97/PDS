<!-- <?php
session_start();
?> -->

<?php

if(isset($_GET['init'])){

    unset($_SESSION['action']);
    unset($_SESSION['idClient']);
    unset($_SESSION['idOperateur']);
    unset($_SESSION['idAdministrateur']);
    unset($_SESSION['idReservation']);
    unset($_SESSION['idAnimal']);

}






?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="style.css"/>
        <title> comChien&Chat </title>
    </head>
    <body>
    
    <?php include("structure/header.php") ?>

    <?php
        if(isset($_GET['creation'])){
            include("Script_PHP/Administrateur/creer.php");
        }
        else{
            include("Script_PHP/Administrateur/modifier.php");
        }
    ?>

    <?php include("structure/footer.php") ?>
    </body>
</html>