<?php

    require_once __DIR__ . '/../../../Formulaires/Classes/SyntheseHebdomadaire/Produit.php';
    use Formulaires\Classes\SyntheseHebdomadaire\Produit;

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $produit = $_POST['produit'];
    $concurrentDirects = $_POST['concurrentsDirects'];
    $emplacement = $_POST['emplacement'];


    $obj = new Produit($produit, $concurrentDirects, $emplacement);

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $obj->insertData($conn);

    $objConn->closeConnection();

    header('Location: afficher_EnqueteProduit.php');
