<?php

    require_once __DIR__ . '/../../Formulaires/Classes/Itineraire/Itineraire.php';
    use Formulaires\Classes\Itineraire\Itineraire;

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $id = "";
    $jour = "";
    $date = "";
    $region = "";
    $kmInterVille = "";
    $kmVille = "";
    $indemnite = "";
    $autreFrais = "";


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if ($_GET['fonction'] == 'editer') {
            $id = $_GET['id'];

            $sql = "SELECT * FROM itineraire WHERE id_Itineraire='$id'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $jour = $row['jour_Itineraire'] ;
                    $date = $row['date_Itineraire'];
                    $region = $row['region_Itineraire'];
                    $kmInterVille = $row['kmInterVille'];
                    $kmVille = $row['kmVille'];
                    $indemnite = $row['Indemnite'];
                    $autreFrais = $row['autreFrais'];

                }
            }
        } elseif ($_GET['fonction'] == 'supprimer') {
            $id = $_GET['id'];

            $sql = "DELETE FROM itineraire WHERE id_Itineraire='$id'";

            $conn->query($sql);

            $objConn->closeConnection();

            header('Location: afficher_Itineraire.php');
        }


    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $jour = $_POST['jour'];
        $date = $_POST['date'];
        $region = $_POST['region'];
        $kmInterVille = $_POST['kmInterVille'];
        $kmVille = $_POST['kmVille'];
        $indemnite = $_POST['indemnite'];
        $autreFrais = $_POST['autreFrais'];

        $obj = new Itineraire($jour,$date,$region,$kmInterVille,$kmVille,$indemnite,$autreFrais);

        $obj->updateData($conn, $id);
    }

    $objConn->closeConnection();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - Itineraire</title>
</head>
<body>
<form action="editer_Itineraire.php" method="post">

    <input type="hidden" value="<?= $id ?>" name="id">
    <label for="jour">jour</label>
    <input type="text" id="jour" name="jour" value="<?= $jour ?>"><br>

    <label for="date">date</label>
    <input type="date" id="date" name="date" value="<?= $date ?>"><br>

    <label for="region">region</label>
    <input type="text" id="region" name="region" value="<?= $region ?>"><br>

    <label for="kmInterVille">kmInterVille</label>
    <input type="number" id="kmInterVille" name="kmInterVille" value="<?= $kmInterVille ?>"><br>

    <label for="kmVille">kmVille</label>
    <input type="number" id="kmVille" name="kmVille" value="<?= $kmVille ?>"><br>

    <label for="indemnite">indemnite</label>
    <input type="number" id="indemnite" name="indemnite" value="<?= $indemnite ?>"><br>

    <label for="autreFrais">autreFrais</label>
    <input type="number" id="autreFrais" name="autreFrais" value="<?= $autreFrais ?>"><br>

    <input type="submit" name="ajouter" value="Modifier"/>
</form>
</body>
</html>