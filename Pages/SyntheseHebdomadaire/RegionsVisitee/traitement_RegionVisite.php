<?php

    require_once __DIR__ . '/../../../Formulaires/Classes/SyntheseHebdomadaire/Region.php';
    use Formulaires\Classes\SyntheseHebdomadaire\Region;

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $regionVisite = $_POST['regionvisite'];
    $patelin = $_POST['patelin'];
    $privA = $_POST['actPrivA'];
    $privB = $_POST['actPrivB'];
    $privC = $_POST['actPrivC'];
    $pubA = $_POST['actPublicA'];
    $pubB = $_POST['actPublicB'];
    $pubC = $_POST['actPublicC'];


    $obj = new Region($regionVisite, $patelin, $privA, $privB, $privC, $pubA, $pubB, $pubC);

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $obj->insertData($conn);

    $objConn->closeConnection();

    header('Location: afficher_RegionVisite.php');
