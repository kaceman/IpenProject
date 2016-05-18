<?php

    require_once __DIR__ . '/../../../Formulaires/Classes/ListingVisites/Publique/Hopital.php';
    use Formulaires\Classes\ListingVisites\Publique\Hopital;

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $code = $_POST['code'];
    $hopital = $_POST['hopital'];
    $service = $_POST['service'];
    $medecin = $_POST['medecin'];
    $specialite = $_POST['specialite'];
    $dateVisite = $_POST['datevisite'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $remarque = $_POST['remarque'];
    $region = $_POST['region'];
    


    $obj = new Hopital($code, $hopital, $service, $medecin, $specialite, $dateVisite, $a, $b, $c, $remarque, $region);

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $obj->insertData($conn);

    $objConn->closeConnection();

    header('Location: afficher_Hopital.php');
