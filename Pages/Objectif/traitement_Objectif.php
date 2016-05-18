<?php

    require_once __DIR__ . '/../../Formulaires/Classes/Informations/Objectif/Objectif.php';
    use Formulaires\Classes\Informations\Objectif\Objectif;

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $mois = $_POST['mois'];
    $pmObjectif = $_POST['pmObjectif'];
    $globalObjectif = $_POST['globalObjectif'];
    $pmRealise = $_POST['pmrealise'];
    $globalRealise = $_POST['globalObjectif'];
    $owner = $_POST['owner'];

    $obj = new Objectif($mois, $pmObjectif, $globalObjectif, $pmRealise, $globalRealise, $owner);

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $obj->insertData($conn);

    $objConn->closeConnection();

    header('Location: afficher_Objectif.php?id=' . $owner);
