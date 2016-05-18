<?php

    require_once __DIR__ . '/../../../Formulaires/Classes/SyntheseHebdomadaire/Region.php';
    use Formulaires\Classes\SyntheseHebdomadaire\Region;

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $id = "";
    $regionVisite = "";
    $patelin = "";
    $privA = "";
    $privB = "";
    $privC = "";
    $pubA = "";
    $pubB = "";
    $pubC = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if ($_GET['fonction'] == 'editer') {
            $id = $_GET['id'];

            $sql = "SELECT * FROM regionvisite WHERE id_regionVisite='$id'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $regionVisite = $row['regionVisite'];
                    $patelin = $row['patelins'];
                    $privA = $row['actPrivA'];
                    $privB = $row['actPrivB'];
                    $privC = $row['actPrivC'];
                    $pubA = $row['actPublA'];
                    $pubB = $row['actPublB'];
                    $pubC = $row['actPublC'];
                }
            }
        } elseif ($_GET['fonction'] == 'supprimer') {
            $id = $_GET['id'];

            $sql = "DELETE FROM regionvisite WHERE id_regionVisite='$id'";

            $conn->query($sql);

            $objConn->closeConnection();

            header('Location: afficher_RegionVisite.php');
        }


    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $regionVisite = $_POST['regionvisite'];
        $patelin = $_POST['patelin'];
        $privA = $_POST['actPrivA'];
        $privB = $_POST['actPrivB'];
        $privC = $_POST['actPrivC'];
        $pubA = $_POST['actPublicA'];
        $pubB = $_POST['actPublicB'];
        $pubC = $_POST['actPublicC'];

        $obj = new Region($regionVisite, $patelin, $privA, $privB, $privC, $pubA, $pubB, $pubC);

        $obj->updateData($conn, $id);
    }

    $objConn->closeConnection();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - Medecin</title>
</head>
<body>
<form action="editer_RegionVisite.php" method="post">

    <input type="hidden" value="<?= $id ?>" name="id">
    <label for="regionvisite">Region Visitées</label>
    <input type="text" id="regionvisite" name="regionvisite" value="<?= $regionVisite ?>"><br>

    <label for="patelin">Patelins</label>
    <input type="text" id="patelin" name="patelin" value="<?= $patelin ?>"><br>

    <label for="actPrivA">Action Privé A</label>
    <input type="number" id="actPrivA" name="actPrivA" value="<?= $privA ?>"><br>

    <label for="actPrivB">Action Privé B</label>
    <input type="number" id="actPrivB" name="actPrivB" value="<?= $privB ?>"><br>

    <label for="actPrivC">Action Privé C</label>
    <input type="number" id="actPrivC" name="actPrivC" value="<?= $privC ?>"><br>

    <label for="actPublicA">Action Public A</label>
    <input type="number" id="actPublicA" name="actPublicA" value="<?= $pubA ?>"><br>

    <label for="actPublicB">Action Public B</label>
    <input type="number" id="actPublicB" name="actPublicB" value="<?= $pubB ?>"><br>

    <label for="actPublicC">Action Public C</label>
    <input type="number" id="actPublicC" name="actPublicC" value="<?= $pubC ?>"><br>


    <input type="submit" name="ajouter" value="Modifier"/>
</form>
</body>
</html>