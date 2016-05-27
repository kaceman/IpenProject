<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - Secteur Prive</title>
</head>
<body>
<table>
    <caption>Liste des Secteur Prive/caption>
    <tr>
        <th>Code </th>
        <th>Medecin</th>
        <th>Action Ipsen</th>
        <th>Action Concurrence</th>
        <th>Actions</th>
    </tr>
    <?php

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;
    
    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $sql = "SELECT * FROM secteurprive";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '  <td>' . $row['code_prive'] . '</td>';
            echo '  <td>' . $row['medecin_sctPrive'] . '</td>';
            echo '  <td>' . $row['actionIpsen_prive'] . '</td>';
            echo '  <td>' . $row['actionConcurrence_prive'] . '</td>';
            echo '  <td>
                        <a href="editer_SecteurPrive.php?id=' . $row['id_prive'] . '&fonction=editer">Editer</a>
                        <a href="editer_SecteurPrive.php?id=' . $row['id_prive'] . '&fonction=supprimer">Supprimer</a>
                    </td>';
            echo '</tr>';
        }
    }

    $objConn->closeConnection();
    ?>
</table>
</body>
</html>