<?php

    require_once __DIR__ . '/../../Formulaires/Classes/Informations/Objectif/Objectif.php';
    use Formulaires\Classes\Informations\Objectif\Objectif;

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $mois = "";
    $pmObjectif = "";
    $globalObjectif = "";
    $pmRealise = "";
    $globalRealise = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if ($_GET['fonction'] == 'editer') {

            $idGrossiterie = $_GET['idgrossisterie'];
            $id = $_GET['id'];

            $sql = "SELECT * FROM objectif WHERE id_objectif='$id'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $mois = $row['mois'];
                    $pmObjectif = $row['PMobjectif'];
                    $globalObjectif = $row['GlobalObjectif'];
                    $pmRealise = $row['PMrealise'];
                    $globalRealise = $row['GlobalRealise'];
                }
            }
        } elseif ($_GET['fonction'] == 'supprimer') {

            $idGrossiterie = $_GET['idgrossisterie'];
            $id = $_GET['id'];

            $sql = "DELETE FROM objectif WHERE id_objectif='$id'";

            $conn->query($sql);

            $objConn->closeConnection();

            header('Location: afficher_Objectif.php?id=' . $idGrossiterie);
        }

    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $mois = $_POST['mois'];
        $pmObjectif = $_POST['pmObjectif'];
        $globalObjectif = $_POST['globalObjectif'];
        $pmRealise = $_POST['pmRealise'];
        $globalRealise = $_POST['globalRealise'];
        $owner = $_POST['idgrossisterie'];

        $obj = new Objectif($mois, $pmObjectif, $globalObjectif, $pmRealise, $globalRealise,$owner);

        $obj->updateData($conn, $id);
    }

    $objConn->closeConnection();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - Information Objectif</title>
</head>
<body>
<form action="editer_Objectif.php" method="post">
    <input type="hidden" value="<?= $id ?>" name="id">
    <input type="hidden" value="<?= $idGrossiterie ?>" name="idgrossisterie">
    <label for="mois">Mois</label>
    <input type="text" id="mois" name="mois" value="<?= $mois ?>"><br>

    <label for="pmObjectif">PM Objectif</label>
    <input type="number" id="pmObjectif" name="pmObjectif" value="<?= $pmObjectif ?>"><br>

    <label for="globalObjectif">Global Objectif</label>
    <input type="number" id="globalObjectif" name="globalObjectif" value="<?= $globalObjectif ?>"><br>

    <label for="pmRealise">PM Réalisé</label>
    <input type="number" id="pmRealise" name="pmRealise" value="<?= $pmRealise ?>"><br>

    <label for="globalRealise">Global Réalisé</label>
    <input type="number" id="globalRealise" name="globalRealise" value="<?= $globalRealise ?>"><br>

    <input type="submit" name="ajouter" value="Modifier" />
</form>
</body>
</html>