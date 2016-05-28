<?php

    require_once __DIR__ . '/../../../Formulaires/Classes/ListingVisites/Prive/Cabinet.php';
    use Formulaires\Classes\ListingVisites\Prive\Cabinet;

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $id = "";
    $code = "";
    $id_medecin = "";
    $specalite = "";
    $dateVisite = "";
    $a = "";
    $b = "";
    $c = "";
    $remarque = "";
    $region = "";


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if ($_GET['fonction'] == 'editer') {
            $id = $_GET['id'];

            $sql = "SELECT * FROM ipsendb.cabinet WHERE id_Cabinet='$id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $code = $row['code_Cabinet'];
            $id_medecin = $row['id_medecin'];
            $specalite = $row['specialite_Cabinet'];
            $dateVisite = $row['dateVisite_Cabinet'];
            $a = $row['a_Cabinet'];
            $b = $row['b_Cabinet'];
            $c = $row['c_Cabinet'];
            $remarque = $row['remarques_Cabinet'];
            $region = $row['region_Cabinet'];

        } elseif ($_GET['fonction'] == 'supprimer') {
            $id = $_GET['id'];

            $sql = "DELETE FROM ipsendb.cabinet WHERE id_Cabinet='$id'";

            $conn->query($sql);

            $objConn->closeConnection();

            $objConn->closeConnection();

            header('Location: afficher_Cabinet.php');
        }


    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $code = $_POST['code'];
        $id_medecin = $_POST['medecin'];
        $specalite = $_POST['specialite'];
        $dateVisite = $_POST['datevisite'];
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
        $remarque = $_POST['remarque'];
        $region =$_POST['region'];

        $obj = new Cabinet($code, $id_medecin, $specalite, $dateVisite, $a, $b, $c, $remarque, $region);

        $obj->updateData($conn, $id);

        $objConn->closeConnection();

        header('Location: afficher_Cabinet.php');
    }
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - Cabinet</title>
</head>
<body>
<form action="editer_Cabinet.php" method="post">

    <input type="hidden" value="<?= $id ?>" name="id">

    <label for="code">Code</label>
    <input type="text" id="code" name="code" value="<?= $code ?>"><br>

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

    <label for="a">A</label>
    <input type="text" id="a" name="a" value="<?= $a ?>"><br>

    <label for="b">B</label>
    <input type="text" id="b" name="b" value="<?= $b ?>"><br>

    <label for="c">C</label>
    <input type="text" id="c" name="c" value="<?= $c ?>"><br>

    <label for="remarque">Remarque</label>
    <input type="text" id="remarque" name="remarque" value="<?= $remarque ?>"><br>

    <label for="region">Region</label>
    <input type="text" id="region" name="region" value="<?= $region ?>"><br>

    <input type="submit" name="ajouter" value="Modifier"/>
</form>
</body>
</html>