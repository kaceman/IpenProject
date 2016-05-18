<?php

    require_once __DIR__ . '/../../Formulaires/Classes/Informations/Commandes/Commande.php';
    use Formulaires\Classes\Informations\Commandes\Commande;

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $dateCommande = $_POST['datecmd'];
    $commande = $_POST['commande'];
    $remarqueMedecin = $_POST['rmqMedecin'];
    $owner = $_POST['owner'];

    $obj = new Commande($dateCommande, $commande, $remarqueMedecin, $owner);

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $obj->insertData($conn);

    $objConn->closeConnection();

    header('Location: afficher_Commande.php?id=' . $owner);
