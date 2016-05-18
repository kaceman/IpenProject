<?php

    require_once __DIR__ . '/../../Formulaires/Classes/Medecins/Medecin.php';
    use Formulaires\Classes\Medecins\Medecin;

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $specialite = $_POST['specialite'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['tel'];
    $secteur = $_POST['secteur'];
    $region = $_POST['region'];


    $obj = new Medecin($nom, $prenom, $specialite, $adresse, $telephone, $secteur,$region);

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $obj->insertData($conn);

    $objConn->closeConnection();

    header('Location: afficher_Medecin.php');
