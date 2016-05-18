<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - La liste des Objectifs</title>
</head>
<body>
<table>
    <caption>Liste des Objectif</caption>
    <tr>
        <th>Mois</th>
        <th>PM Objectif</th>
        <th>Global Objectif</th>
        <th>PM Realisé</th>
        <th>Global Realisé</th>
        <th>Actions</th>
    </tr>
    <?php

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $id = $_GET['id'];

    $sql = "SELECT * FROM objectif WHERE id_infoGrossisterie='$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '  <td>' . $row['mois'] . '</td>';
            echo '  <td>' . $row['PMobjectif'] . '</td>';
            echo '  <td>' . $row['GlobalObjectif'] . '</td>';
            echo '  <td>' . $row['PMrealise'] . '</td>';
            echo '  <td>' . $row['GlobalRealise'] . '</td>';
            echo '  <td>
                        <a href="editer_Objectif.php?idgrossisterie=' . $id . '&id=' . $row['id_objectif'] . '&fonction=editer">Editer</a>
                        <a href="editer_Objectif.php?idgrossisterie=' . $id . '&id=' . $row['id_objectif'] . '&fonction=supprimer">Supprimer</a>
                    </td>';
            echo '</tr>';
        }
    }

    $objConn->closeConnection();
    ?>
</table>

<?php echo '<a href="ajouter_Objectif.php?id=' . $id . '">Ajouter une commande</a>'; ?>
</body>
</html>