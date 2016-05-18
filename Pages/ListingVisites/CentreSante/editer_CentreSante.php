<?php

    require_once __DIR__ . '/../../../Formulaires/Classes/ListingVisites/Publique/CentreSante.php';
    use Formulaires\Classes\ListingVisites\Publique\CentreSante;

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $id = "";
    $code = "";
    $cs = "";
    $medecin = "";
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

            $sql = "SELECT * FROM centresante WHERE id_centreSante='$id'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $code = $row['code_centreSante'];
                    $organisme = $row['centreSante'];
                    $medecin = $row['Medecin_centreSante'];
                    $specalite = $row['specialite_centreSante'];
                    $dateVisite = $row['date_centreSante'];
                    $a = $row['a_centreSante'];
                    $b = $row['b_centreSante'];
                    $c = $row['c_centreSante'];
                    $remarque = $row['remarques_centreSante'];
                    $region = $row['region_centreSante'];
                }
            }
        } elseif ($_GET['fonction'] == 'supprimer') {
            $id = $_GET['id'];

            $sql = "DELETE FROM centresante WHERE id_centreSante='$id'";

            $conn->query($sql);

            $objConn->closeConnection();

            header('Location: afficher_CentreSante.php');
        }


    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $code = $_POST['code'];
        $cs = $_POST['cs'];
        $medecin=$_POST['medecin'];
        $specalite = $_POST['specialite'];
        $dateVisite = $_POST['datevisite'];
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
        $remarque = $_POST['remarque'];
        $region =$_POST['region'];

        $obj = new CentreSante($code, $cs, $medecin, $specalite, $dateVisite, $a, $b, $c, $remarque, $region);

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
<form action="editer_CentreSante.php" method="post">

    <input type="hidden" value="<?= $id ?>" name="id">
    <label for="code">Code</label>
    <input type="text" id="code" name="code" value="<?= $code ?>"><br>

    <label for="cs">Centre de Santé</label>
    <input type="text" id="cs" name="cs" value="<?= $cs ?>"><br>

    <label for="medecin">Medecin</label>
    <input type="text" id="medecin" name="medecin" value="<?= $medecin ?>"><br>

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