<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - itineraire</title>
</head>
<body>
<table>
    <caption>Liste des Itineraire</caption>
    <tr>
        <th>jour</th>
        <th>date</th>
        <th>region</th>
        <th>km interville</th>
        <th>km ville</th>
        <th>indemnite</th>
        <th>autre frais</th>
    </tr>
    <?php

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;
    
    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $sql = "SELECT * FROM itineraire";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '  <td>' . $row['jour_Itineraire'] . '</td>';
            echo '  <td>' . $row['date_Itineraire'] . '</td>';
            echo '  <td>' . $row['region_Itineraire'] . '</td>';
            echo '  <td>' . $row['kmInterVille'] . '</td>';
            echo '  <td>' . $row['kmVille'] . '</td>';
            echo '  <td>' . $row['Indemnite'] . '</td>';
            echo '  <td>' . $row['autreFrais'] . '</td>';
            echo '  <td>
                        <a href="editer_Itineraire.php?id=' . $row['id_Itineraire'] . '&fonction=editer">Editer</a>
                        <a href="editer_Itineraire.php?id=' . $row['id_Itineraire'] . '&fonction=supprimer">Supprimer</a>
                    </td>';
            echo '</tr>';
        }
    }

    $objConn->closeConnection();
    ?>
</table>
</body>
</html>