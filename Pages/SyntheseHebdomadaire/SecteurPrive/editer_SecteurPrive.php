<?php

    require_once __DIR__ . '/../../../Formulaires/Classes/SyntheseHebdomadaire/Prive.php';
    use Formulaires\Classes\SyntheseHebdomadaire\Prive;

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $id = "";
    $code = "";
    $medecin = "";
    $actionipsen = "";
    $actionconcurrence = "";


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if ($_GET['fonction'] == 'editer') {
            $id = $_GET['id'];

            $sql = "SELECT * FROM secteurprive WHERE id_prive='$id'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $code = $row['code_prive'];
                    $medecin = $row['medecin_sctPrive'];
                    $actionipsen = $row['actionIpsen_prive'];
                    $actionconcurrence = $row['actionConcurrence_prive'];

                }
            }
        } elseif ($_GET['fonction'] == 'supprimer') {
            $id = $_GET['id'];

            $sql = "DELETE FROM secteurprive WHERE id_prive='$id'";

            $conn->query($sql);

            $objConn->closeConnection();

            header('Location: afficher_SecteurPrive.php');
        }


    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $code = $_POST['code'];
        $medecin = $_POST['medecin'];
        $actionipsen = $_POST['actionipsen'];
        $actionconcurrence = $_POST['actionconcurrence'];

        $obj = new secteurprive($code, $medecin, $actionipsen, $actionconcurrence);

        $obj->updateData($conn, $id);
    }

    $objConn->closeConnection();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - Secteur Privé</title>
</head>
<body>
<form action="editer_SecteurPrive.php" method="post">

    <input type="hidden" value="<?= $id ?>" name="id">
    <label for="code">Code</label>
    <input type="text" id="code" name="code" value="<?= $code ?>"><br>

    <label for="medecin">Medecin</label>
    <input type="text" id="medecin" name="medecin" value="<?= $medecin ?>"><br>

    <label for="actionipsen">Action Ipsen</label>
    <input type="number" id="actionipsen" name="actionipsen" value="<?= $actionipsen ?>"><br>

    <label for="actionconcurrence">Action Concurrence</label>
    <input type="number" id="actionconcurrence" name="actionconcurrence" value="<?= $actionconcurrence ?>"><br>

    <input type="submit" name="ajouter" value="Modifier"/>
</form>
</body>
</html>