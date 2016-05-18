<?php

    require_once __DIR__ . '/../../Formulaires/Classes/Informations/Commandes/Commande.php';
    use Formulaires\Classes\Informations\Commandes\Commande;

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $dateCommande = "";
    $commande = "";
    $remarqueMedecin = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if ($_GET['fonction'] == 'editer') {

            $idClinique = $_GET['idclinique'];
            $id = $_GET['id'];

            $sql = "SELECT * FROM commande WHERE id_commande='$id'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $dateCommande = $row['dateCommande'];
                    $commande = $row['commande'];
                    $remarqueMedecin = $row['remarqueMedecin'];
                }
            }
        } elseif ($_GET['fonction'] == 'supprimer') {

            $idClinique = $_GET['idclinique'];
            $id = $_GET['id'];

            $sql = "DELETE FROM commande WHERE id_commande='$id'";

            $conn->query($sql);

            $objConn->closeConnection();

            header('Location: afficher_Commande.php?id=' . $idClinique);
        }

    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $dateCommande = $_POST['datecmd'];
        $commande = $_POST['commande'];
        $remarqueMedecin = $_POST['rmqMedecin'];
        $owner = $_POST['idclinique'];

        $obj = new Commande($dateCommande, $commande, $remarqueMedecin, $owner);

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
<form action="editer_Commande.php" method="post">
    <input type="hidden" value="<?= $id ?>" name="id">
    <input type="hidden" value="<?= $idClinique ?>" name="idclinique">
    <label for="datecmd">Date Commande</label>
    <input type="date" id="datecmd" name="datecmd" value="<?= $dateCommande ?>"><br>

    <label for="commande">Commande</label>
    <input type="text" id="commande" name="commande" value="<?= $commande ?>"><br>

    <label for="rmqMedecin">Remarque Medecin</label>
    <input type="text" id="rmqMedecin" name="rmqMedecin" value="<?= $remarqueMedecin ?>"><br>

    <input type="submit" name="ajouter" value="Modifier" />
</form>
</body>
</html>