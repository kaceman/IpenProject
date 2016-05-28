<?php

    require_once __DIR__ . '/../../../Formulaires/Classes/ListingVisites/Publique/CentreSante.php';
    use Formulaires\Classes\ListingVisites\Publique\CentreSante;

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $code = $_POST['code'];
    $cs = $_POST['cs'];
    $id_medecin = $_POST['medecin'];
    $specialite = $_POST['specialite'];
    $dateVisite = $_POST['datevisite'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $remarque = $_POST['remarque'];
    $region = $_POST['region'];


    $obj = new CentreSante($code, $cs, $id_medecin, $specialite, $dateVisite, $a, $b, $c, $remarque, $region);

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $obj->insertData($conn);

    $objConn->closeConnection();

    header('Location: afficher_CentreSante.php');
