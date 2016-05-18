<?php

    require_once __DIR__ . '/../../Formulaires/Classes/Informations/infoGrossisterie.php';
    use Formulaires\Classes\Informations\infoGrossisterie;

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $region = $_POST['region'];
    $ville = $_POST['ville'];
    $code = $_POST['code'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['tel'];
    $directeur = $_POST['directeur'];
    $pharmacienResponsable = $_POST['pharmacienResponsable'];


    $obj = new InfoGrossisterie($region, $ville, $code, $nom, $adresse, $telephone, $directeur, $pharmacienResponsable);

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $obj->insertData($conn);

    $objConn->closeConnection();

    header('Location: afficher_InfoGrossisterie.php');
