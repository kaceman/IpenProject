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
        <th>Code</th>
        <th>Organisme</th>
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

    $sql = "SELECT * FROM organisme";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '  <td>' . $row['code_organisme'] . '</td>';
            echo '  <td>' . $row['organisme'] . '</td>';
            echo '  <td>' . $row['medecin_organisme'] . '</td>';
            echo '  <td>' . $row['specialite_organisme'] . '</td>';
            echo '  <td>' . $row['dateVisite_organisme'] . '</td>';
            echo '  <td>' . $row['A_organisme'] . '</td>';
            echo '  <td>' . $row['B_organisme'] . '</td>';
            echo '  <td>' . $row['C_organisme'] . '</td>';
            echo '  <td>' . $row['remarques_organisme'] . '</td>';
            echo '  <td>' . $row['region_organisme'] . '</td>';
            echo '  <td>
                        <a href="editer_Organisme.php?id=' . $row['id__organisme'] . '&fonction=editer">Editer</a>
                        <a href="editer_Organisme.php?id=' . $row['id__organisme'] . '&fonction=supprimer">Supprimer</a>
                    </td>';
            echo '</tr>';
        }
    }

    $objConn->closeConnection();
    ?>
</table>
</body>
</html>