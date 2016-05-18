<?php

    require_once __DIR__ . '/../../Formulaires/Classes/Medecins/Medecin.php';
    use Formulaires\Classes\Medecins\Medecin;

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $id = "";
    $nom = "";
    $prenom = "";
    $specialite = "";
    $adresse = "";
    $telephone = "";
    $secteur = "";
    $region = "";


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if ($_GET['fonction'] == 'editer') {
            $id = $_GET['id'];

            $sql = "SELECT * FROM medecin WHERE id_medecin='$id'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $nom = $row['nom_medecin'];
                    $prenom = $row['prenom_medecin'];
                    $specialite = $row['specialite_medecin'];
                    $adresse = $row['adresse_medecin'];
                    $telephone = $row['tel_medecin'];
                    $secteur = $row['secteur_medecin'];
                    $region = $row['region'];
                }
            }
        } elseif ($_GET['fonction'] == 'supprimer') {
            $id = $_GET['id'];

            $sql = "DELETE FROM medecin WHERE id_medecin='$id'";

            $conn->query($sql);

            $objConn->closeConnection();

            header('Location: afficher_Medecin.php');
        }


    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $specialite=$_POST['specialite'];
        $adresse = $_POST['adresse'];
        $telephone = $_POST['tel'];
        $secteur = $_POST['secteur'];
        $region =$_POST['region'];

        $obj = new Medecin($nom, $prenom, $specialite, $adresse, $telephone, $secteur,$region);

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
<form action="editer_Medecin.php" method="post">

    <input type="hidden" value="<?= $id ?>" name="id">
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" value="<?= $nom ?>"><br>

    <label for="prenom">Prenom</label>
    <input type="text" id="prenom" name="prenom" value="<?= $prenom ?>"><br>

    <label for="specialite">Specialiité</label>
    <input type="text" id="specialite" name="specialite" value="<?= $specialite ?>"><br>

    <label for="adresse">Adresse</label>
    <input type="text" id="adresse" name="adresse" value="<?= $adresse ?>"><br>

    <label for="tel">telephone</label>
    <input type="text" id="tel" name="tel" value="<?= $telephone ?>"><br>

    <label for="secteur">Secteur</label>
    <input type="text" id="secteur" name="secteur" value="<?= $secteur ?>"><br>

    <label for="region">region</label>
    <input type="text" id="region" name="region" value="<?= $region ?>"><br>


    <input type="submit" name="ajouter" value="Modifier"/>
</form>
</body>
</html>