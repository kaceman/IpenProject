<?php

    require_once __DIR__ . '/../../../Formulaires/Classes/ListingVisites/Prive/Cabinet.php';
    use Formulaires\Classes\ListingVisites\Prive\Cabinet;

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $code = $_POST['code'];
    $id_medecin = $_POST['medecin'];
    $specialite = $_POST['specialite'];
    $dateVisite = $_POST['datevisite'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $remarque = $_POST['remarque'];
    $region = $_POST['region'];

    $obj = new Cabinet($code, $id_medecin, $specialite, $dateVisite, $a, $b, $c, $remarque, $region);

    $obj->insertData($conn);

    $objConn->closeConnection();

    header('Location: afficher_Cabinet.php');
