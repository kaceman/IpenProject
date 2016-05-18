<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - La liste des urgences</title>
</head>
<body>
<table>
    <caption>Liste des Cliniques</caption>
    <tr>
        <th>Code</th>
        <th>Urgence</th>
        <th>Medecin</th>
        <th>Specialité</th>
        <th>Date Visite</th>
        <th>Remarques</th>
        <th>Region</th>
        <th>Actions</th>
    </tr>
    <?php

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;
    
    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $sql = "SELECT * FROM urgence";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '  <td>' . $row['code_urgence'] . '</td>';
            echo '  <td>' . $row['urgence'] . '</td>';
            echo '  <td>' . $row['medecin_urgence'] . '</td>';
            echo '  <td>' . $row['specialite_urgence'] . '</td>';
            echo '  <td>' . $row['dateVisite_urgence'] . '</td>';
            echo '  <td>' . $row['remarques_urgence'] . '</td>';
            echo '  <td>' . $row['region_urgence'] . '</td>';
            echo '  <td>
                        <a href="editer_Urgence.php?id=' . $row['id_urgence'] . '&fonction=editer">Editer</a>
                        <a href="editer_Urgence.php?id=' . $row['id_urgence'] . '&fonction=supprimer">Supprimer</a>
                    </td>';
            echo '</tr>';
        }
    }

    $objConn->closeConnection();
    ?>
</table>
</body>
</html>