<?php

    require_once __DIR__ . '/../../../Formulaires/Classes/ListingVisites/Publique/Urgence.php';
    use Formulaires\Classes\ListingVisites\Publique\Urgence;

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $id = "";
    $code = "";
    $urgence = "";
    $id_medecin = "";
    $specalite = "";
    $dateVisite = "";
    $remarque = "";
    $region = "";


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if ($_GET['fonction'] == 'editer') {
            $id = $_GET['id'];

            $sql = "SELECT * FROM ipsendb.urgence WHERE id_urgence='$id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $code = $row['code_urgence'];
            $urgence = $row['urgence'];
            $id_medecin = $row['id_medecin'];
            $specalite = $row['specialite_urgence'];
            $dateVisite = $row['dateVisite_urgence'];
            $remarque = $row['remarques_urgence'];
            $region = $row['region_urgence'];

        } elseif ($_GET['fonction'] == 'supprimer') {
            $id = $_GET['id'];

            $sql = "DELETE FROM ipsendb.urgence WHERE id_urgence='$id'";

            $conn->query($sql);

            $objConn->closeConnection();

            header('Location: afficher_Urgence.php');
        }


    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $code = $_POST['code'];
        $urgence = $_POST['urgence'];
        $medecin=$_POST['medecin'];
        $specalite = $_POST['specialite'];
        $dateVisite = $_POST['datevisite'];
        $remarque = $_POST['remarque'];
        $region =$_POST['region'];

        $obj = new Urgence($code, $urgence, $medecin, $specalite, $dateVisite, $remarque, $region);

        $obj->updateData($conn, $id);

        $objConn->closeConnection();

        header('Location: afficher_Urgence.php');
    }
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - Urgence</title>
</head>
<body>
<form action="editer_Urgence.php" method="post">

    <input type="hidden" value="<?= $id ?>" name="id">
    <label for="code">Code</label>
    <input type="text" id="code" name="code" value="<?= $code ?>"><br>

    <label for="urgence">Urgence</label>
    <input type="text" id="urgence" name="urgence" value="<?= $urgence ?>"><br>

    <label for="medecin">Medecin</label>
    <select id="medecin" name="medecin">
        <?php
        $sql = "SELECT * FROM ipsendb.medecin";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if($id_medecin == $row['id_medecin']){
                    echo '<option value="' . $row['id_medecin'] . '" selected>' . $row['nom_medecin'] . '</option>';
                } else {
                    echo '<option value="' . $row['id_medecin'] . '">' . $row['nom_medecin'] . '</option>';
                }
            }
        }

        $objConn->closeConnection();

        ?>
    </select><br>

    <label for="specialite">Spécialité</label>
    <input type="text" id="specialite" name="specialite" value="<?= $specalite ?>"><br>

    <label for="datevisite">Date Visite</label>
    <input type="date" id="datevisite" name="datevisite" value="<?= $dateVisite ?>"><br>

    <label for="remarque">Remarque</label>
    <input type="text" id="remarque" name="remarque" value="<?= $remarque ?>"><br>

    <label for="region">Region</label>
    <input type="text" id="region" name="region" value="<?= $region ?>"><br>


    <input type="submit" name="ajouter" value="Modifier"/>
</form>
</body>
</html>