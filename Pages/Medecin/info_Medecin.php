<?php

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $id_medecin = $_GET['id'];

    $sql = "SELECT * FROM ipsendb.medecin WHERE id_medecin='$id_medecin'";

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    echo '<strong>Nom :</strong> ' . $row['nom_medecin'] . '<br>';
    echo '<strong>Spécialté :</strong> ' . $row['specialite_medecin'] . '<br>';
    echo '<strong>Adresse :</strong> ' . $row['adresse_medecin'] . '<br>';
    echo '<strong>Téléphone :</strong> ' . $row['tel_medecin'] . '<br>';
    echo '<strong>Secteur :</strong> ' . $row['secteur_medecin'] . '<br>';
    echo '<strong>Région :</strong> ' . $row['region'] . '<br>';

    $objConn->closeConnection();

