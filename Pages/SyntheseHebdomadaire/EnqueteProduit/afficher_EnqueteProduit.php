<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - La liste des Grossisterie</title>
</head>
<body>
<table>
    <caption>Liste des Cliniques</caption>
    <tr>
        <th>Produit</th>
        <th>Concurents Directs</th>
        <th>Emplacement</th>
        <th>Actions</th>
    </tr>
    <?php

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;
    
    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $sql = "SELECT * FROM produit";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '  <td>' . $row['produit'] . '</td>';
            echo '  <td>' . $row['concurrenceDirecte'] . '</td>';
            echo '  <td>' . $row['Emplacement'] . '</td>';
            echo '  <td>
                        <a href="editer_EnqueteProduit.php?id=' . $row['id_produit'] . '&fonction=editer">Editer</a>
                        <a href="editer_EnqueteProduit.php?id=' . $row['id_produit'] . '&fonction=supprimer">Supprimer</a>
                    </td>';
            echo '</tr>';
        }
    }

    $objConn->closeConnection();
    ?>
</table>
</body>
</html>