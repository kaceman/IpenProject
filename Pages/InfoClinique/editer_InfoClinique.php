<?php

    require_once __DIR__ . '/../../Formulaires/Classes/Informations/InfoClinique.php';
    use Formulaires\Classes\Informations\InfoClinique;

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
    $reanimateur = "";
    $medecinDeGarde = "";
    $medecinSpecialisteHosp = "";


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if ($_GET['fonction'] == 'editer') {
            $id = $_GET['id'];

            $sql = "SELECT * FROM infoclinique WHERE id_infoClinique='$id'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $region = $row['region'];
                    $ville = $row['ville'];
                    $code = $row['code'];
                    $nom = $row['nom'];
                    $adresse = $row['adresse'];
                    $telephone = $row['telephone'];
                    $directeur = $row['directeur'];
                    $reanimateur = $row['reanimateur'];
                    $medecinDeGarde = $row['medecinGarde'];
                    $medecinSpecialisteHosp = $row['medecinSpecialiste'];
                }
            }
        } elseif ($_GET['fonction'] == 'supprimer') {
            $id = $_GET['id'];

            $sql = "DELETE FROM infoclinique WHERE id_infoClinique='$id'";

            $conn->query($sql);

            $objConn->closeConnection();

            header('Location: afficher_InfoClinique.php');
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
        $reanimateur = $_POST['reanimateur'];
        $medecinDeGarde = $_POST['medecingarde'];
        $medecinSpecialisteHosp = $_POST['medecinspecialiste'];

        $obj = new InfoClinique($region, $ville, $code, $nom, $adresse, $telephone, $directeur, $reanimateur, $medecinDeGarde, $medecinSpecialisteHosp);

        $obj->updateData($conn, $id);
    }

    $objConn->closeConnection();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - Information Clinique</title>
</head>
<body>
<form action="editer_InfoClinique.php" method="post">
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

    <label for="reanimateur">Réanimateur</label>
    <input type="text" id="reanimateur" name="reanimateur" value="<?= $reanimateur ?>"><br>

    <label for="medecingarde">Medecin de garde</label>
    <input type="text" id="medecingarde" name="medecingarde" value="<?= $medecinDeGarde ?>"><br>

    <label for="medecinspecialiste">Medecin Specialiste</label>
    <input type="text" id="medecinspecialiste" name="medecinspecialiste" value="<?= $medecinSpecialisteHosp ?>"><br>

    <input type="submit" name="ajouter" value="Modifier" />
</form>
</body>
</html>