<?php

    require_once __DIR__ . '/../../../Formulaires/Classes/SyntheseHebdomadaire/Prive.php';
    use Formulaires\Classes\SyntheseHebdomadaire\Prive;

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $code = $_POST['code'];
    $medecin = $_POST['medecin'];
    $actionipsen = $_POST['actionipsen'];
    $actionconcurrence = $_POST['actionconcurrence'];


    $obj = new Prive($code, $medecin, $actionipsen, $actionconcurrence);

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $obj->insertData($conn);

    $objConn->closeConnection();

    header('Location: afficher_SecteurPrive.php');
