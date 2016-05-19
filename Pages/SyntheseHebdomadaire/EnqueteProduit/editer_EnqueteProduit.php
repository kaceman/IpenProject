<?php

    require_once __DIR__ . '/../../../Formulaires/Classes/SyntheseHebdomadaire/Produit.php';
    use Formulaires\Classes\SyntheseHebdomadaire\Produit;

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $id = "";
    $produit = "";
    $concurrentDirects = "";
    $emplacement = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if ($_GET['fonction'] == 'editer') {
            $id = $_GET['id'];

            $sql = "SELECT * FROM produit WHERE id_produit='$id'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $produit = $row['produit'];
                    $concurrentDirects = $row['concurrenceDirecte'];
                    $emplacement = $row['Emplacement'];
                }
            }
        } elseif ($_GET['fonction'] == 'supprimer') {
            $id = $_GET['id'];

            $sql = "DELETE FROM produit WHERE id_produit='$id'";

            $conn->query($sql);

            $objConn->closeConnection();

            header('Location: afficher_EnqueteProduit.php');
        }


    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $produit = $_POST['produit'];
        $concurrentDirects = $_POST['concurrentsDirects'];
        $emplacement = $_POST['emplacement'];

        $obj = new Produit($produit, $concurrentDirects, $emplacement);

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
<form action="editer_EnqueteProduit.php" method="post">

    <input type="hidden" value="<?= $id ?>" name="id">
    <label for="produit">Produit</label>
    <input type="text" id="produit" name="produit" value="<?= $produit ?>"><br>

    <label for="concurrentsDirects">Concurrents Directs</label>
    <input type="text" id="concurrentsDirects" name="concurrentsDirects" value="<?= $concurrentDirects ?>"><br>

    <label for="emplacement">Emplacement</label>
    <input type="text" id="emplacement" name="emplacement" value="<?= $emplacement ?>"><br>


    <input type="submit" name="ajouter" value="Modifier"/>
</form>
</body>
</html>