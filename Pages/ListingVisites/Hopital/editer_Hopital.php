<?php

    require_once __DIR__ . '/../../../Formulaires/Classes/ListingVisites/Publique/Hopital.php';
    use Formulaires\Classes\ListingVisites\Publique\Hopital;

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $id = "";
    $code = "";
    $hopital = "";
    $service = "";
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

            $sql = "SELECT * FROM hopital WHERE id_hopital='$id'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $code = $row['code_hopital'];
                    $hopital = $row['hopital'];
                    $service = $row['service_hopital'];
                    $medecin = $row['medecin_hopital'];
                    $specalite = $row['specialite_hopital'];
                    $dateVisite = $row['dateVisite_hopital'];
                    $a = $row['A_hopital'];
                    $b = $row['B_hopital'];
                    $c = $row['C_hopital'];
                    $remarque = $row['remarques_hopital'];
                    $region = $row['region_hopital'];
                }
            }
        } elseif ($_GET['fonction'] == 'supprimer') {
            $id = $_GET['id'];

            $sql = "DELETE FROM hopital WHERE id_hopital='$id'";

            $conn->query($sql);

            $objConn->closeConnection();

            header('Location: afficher_Hopital.php');
        }


    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $code = $_POST['code'];
        $hopital=$_POST['hopital'];
        $service=$_POST['service'];
        $medecin=$_POST['medecin'];
        $specalite = $_POST['specialite'];
        $dateVisite = $_POST['datevisite'];
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
        $remarque = $_POST['remarque'];
        $region =$_POST['region'];

        $obj = new Hopital($code, $hopital, $service, $medecin, $specalite, $dateVisite, $a, $b, $c, $remarque, $region);

        $obj->updateData($conn, $id);
    }

    $objConn->closeConnection();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - Cabinet</title>
</head>
<body>
<form action="editer_Hopital.php" method="post">

    <input type="hidden" value="<?= $id ?>" name="id">
    <label for="code">Code</label>
    <input type="text" id="code" name="code" value="<?= $code ?>"><br>

    <label for="hopital">Hopital</label>
    <input type="text" id="hopital" name="hopital" value="<?= $hopital ?>"><br>

    <label for="service">Service</label>
    <input type="text" id="service" name="service" value="<?= $service ?>"><br>

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