<?php

    require_once __DIR__ . '/../../Formulaires/Classes/Informations/infoGrossisterie.php';
    use Formulaires\Classes\Informations\infoGrossisterie;

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $id = "";
    $region = "";
    $ville = "";
    $code = "";
    $nom = "";
    $adresse = "";
    $telephone = "";
    $directeur = "";
    $pharmacienResponsable = "";


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if ($_GET['fonction'] == 'editer') {
            $id = $_GET['id'];

            $sql = "SELECT * FROM grossisterie WHERE id_infoGrossisterie='$id'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $region = $row['region_G'];
                    $ville = $row['ville_G'];
                    $code = $row['code_G'];
                    $nom = $row['nom_G'];
                    $adresse = $row['adresse_G'];
                    $telephone = $row['telephone_G'];
                    $directeur = $row['directeur_G'];
                    $pharmacienResponsable = $row['pharmacienResponsable'];
                }
            }
        } elseif ($_GET['fonction'] == 'supprimer') {
            $id = $_GET['id'];

            $sql = "DELETE FROM grossisterie WHERE id_infoGrossisterie='$id'";

            $conn->query($sql);

            $objConn->closeConnection();

            header('Location: afficher_infoGrossisterie.php');
        }


    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $region = $_POST['region'];
        $ville = $_POST['ville'];
        $code = $_POST['code'];
        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $telephone = $_POST['tel'];
        $directeur = $_POST['directeur'];
        $pharmacienResponsable = $_POST['pharmacienResponsable'];

        $obj = new infoGrossisterie($region, $ville, $code, $nom, $adresse, $telephone, $directeur, $pharmacienResponsable);

        $obj->updateData($conn, $id);
    }

    $objConn->closeConnection();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - Information Grossisterie</title>
</head>
<body>
<form action="editer_InfoGrossisterie.php" method="post">
    <input type="hidden" value="<?= $id ?>" name="id">
    <label for="region">Region</label>
    <input type="text" id="region" name="region" value="<?= $region ?>"><br>

    <label for="ville">Ville</label>
    <input type="text" id="ville" name="ville" value="<?= $ville ?>"><br>

    <label for="code">Code</label>
    <input type="text" id="code" name="code" value="<?= $code ?>"><br>

    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" value="<?= $nom ?>"><br>

    <label for="adresse">Adresse</label>
    <input type="text" id="adresse" name="adresse" value="<?= $adresse ?>"><br>

    <label for="tel">Téléphone</label>
    <input type="tel" id="tel" name="tel" value="<?= $telephone ?>"><br>

    <label for="directeur">Directeur</label>
    <input type="text" id="directeur" name="directeur" value="<?= $directeur ?>"><br>

    <label for="pharmacienResponsable">Réanimateur</label>
    <input type="text" id="pharmacienResponsable" name="pharmacienResponsable" value="<?= $pharmacienResponsable ?>"><br>

    <input type="submit" name="ajouter" value="Modifier" />
</form>
</body>
</html>