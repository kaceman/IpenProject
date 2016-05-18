<?php

    require_once __DIR__ . '/../../Formulaires/Classes/Itineraire/Itineraire.php';
    use Formulaires\Classes\Itineraire\Itineraire;

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $jour = $_POST['jour'];
    $date = $_POST['date'];
    $region = $_POST['region'];
    $kmInterVille = $_POST['kmInterVille'];
    $kmVille = $_POST['kmVille'];
    $indemnite = $_POST['indemnite'];
    $autreFrais = $_POST['autreFrais'];
    


    $obj = new Itineraire($jour,$date,$region,$kmInterVille,$kmVille,$indemnite,$autreFrais);

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $obj->insertData($conn);

    $objConn->closeConnection();

    header('Location: afficher_Itineraire.php');
