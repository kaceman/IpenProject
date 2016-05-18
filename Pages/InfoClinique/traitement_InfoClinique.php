<?php

    require_once __DIR__ . '/../../Formulaires/Classes/Informations/InfoClinique.php';
    use Formulaires\Classes\Informations\InfoClinique;

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $region = $_POST['region'];
    $ville = $_POST['ville'];
    $code = $_POST['code'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['tel'];
    $directeur = $_POST['directeur'];
    $reanimateur = $_POST['reanimateur'];
    $medecinDeGarde = $_POST['medecingarde'];
    $medecinSpecialisteHosp = $_POST['medecinspecialiste'];

    $obj = new InfoClinique($region, $ville, $code, $nom, $adresse, $telephone, $directeur, $reanimateur, $medecinDeGarde, $medecinSpecialisteHosp);

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $obj->insertData($conn);

    $objConn->closeConnection();

    header('Location: afficher_InfoClinique.php');
