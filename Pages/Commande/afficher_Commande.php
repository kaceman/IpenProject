<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - La liste des Cliniques</title>
</head>
<body>
<table>
    <caption>Liste des Commandes</caption>
    <tr>
        <th>Date Commande</th>
        <th>Commande</th>
        <th>Remarque du medecin</th>
        <th>Actions</th>
    </tr>
    <?php

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $id = $_GET['id'];

    $sql = "SELECT * FROM commande WHERE id_infoClinique='$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '  <td>' . $row['dateCommande'] . '</td>';
            echo '  <td>' . $row['commande'] . '</td>';
            echo '  <td>' . $row['remarqueMedecin'] . '</td>';
            echo '  <td>
                        <a href="editer_Commande.php?idclinique=' . $id . '&id=' . $row['id_commande'] . '&fonction=editer">Editer</a>
                        <a href="editer_Commande.php?idclinique=' . $id . '&id=' . $row['id_commande'] . '&fonction=supprimer">Supprimer</a>
                    </td>';
            echo '</tr>';
        }
    }

    $objConn->closeConnection();
    ?>
</table>

<?php echo '<a href="ajouter_Commande.php?id=' . $id . '">Ajouter une commande</a>'; ?>
</body>
</html>