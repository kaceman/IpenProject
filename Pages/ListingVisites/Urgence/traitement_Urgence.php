<?php

    require_once __DIR__ . '/../../../Formulaires/Classes/ListingVisites/Publique/Urgence.php';
    use Formulaires\Classes\ListingVisites\Publique\Urgence;

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $code = $_POST['code'];
    $urgence = $_POST['urgence'];
    $medecin = $_POST['medecin'];
    $specialite = $_POST['specialite'];
    $dateVisite = $_POST['datevisite'];
    $remarque = $_POST['remarque'];
    $region = $_POST['region'];


    $obj = new Urgence($code, $urgence, $medecin, $specialite, $dateVisite, $remarque, $region);

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $obj->insertData($conn);

    $objConn->closeConnection();

    header('Location: afficher_Urgence.php');
