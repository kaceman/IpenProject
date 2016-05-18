<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - La liste des Hopitaux</title>
</head>
<body>
<table>
    <caption>Liste des Hopitaux</caption>
    <tr>
        <th>Code</th>
        <th>Hopital</th>
        <th>Service</th>
        <th>Medecin</th>
        <th>Specialité</th>
        <th>Date Visite</th>
        <th>A</th>
        <th>B</th>
        <th>C</th>
        <th>Remarques</th>
        <th>Region</th>
        <th>Actions</th>
    </tr>
    <?php

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;
    
    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $sql = "SELECT * FROM hopital";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '  <td>' . $row['code_hopital'] . '</td>';
            echo '  <td>' . $row['hopital'] . '</td>';
            echo '  <td>' . $row['service_hopital'] . '</td>';
            echo '  <td>' . $row['medecin_hopital'] . '</td>';
            echo '  <td>' . $row['specialite_hopital'] . '</td>';
            echo '  <td>' . $row['dateVisite_hopital'] . '</td>';
            echo '  <td>' . $row['A_hopital'] . '</td>';
            echo '  <td>' . $row['B_hopital'] . '</td>';
            echo '  <td>' . $row['C_hopital'] . '</td>';
            echo '  <td>' . $row['remarques_hopital'] . '</td>';
            echo '  <td>' . $row['region_hopital'] . '</td>';
            echo '  <td>
                        <a href="editer_Hopital.php?id=' . $row['id_hopital'] . '&fonction=editer">Editer</a>
                        <a href="editer_Hopital.php?id=' . $row['id_hopital'] . '&fonction=supprimer">Supprimer</a>
                    </td>';
            echo '</tr>';
        }
    }

    $objConn->closeConnection();
    ?>
</table>
</body>
</html>