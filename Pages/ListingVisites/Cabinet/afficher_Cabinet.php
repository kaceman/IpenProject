<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - La liste des cabinet</title>
</head>
<body>
<table>
    <caption>Liste des Cliniques</caption>
    <tr>
        <th>Code</th>
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

    $sql = "SELECT * FROM cabinet";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '  <td>' . $row['code_Cabinet'] . '</td>';
            echo '  <td>' . $row['MedecinPriv_Cabinet'] . '</td>';
            echo '  <td>' . $row['specialite_Cabinet'] . '</td>';
            echo '  <td>' . $row['dateVisite_Cabinet'] . '</td>';
            echo '  <td>' . $row['a_Cabinet'] . '</td>';
            echo '  <td>' . $row['b_Cabinet'] . '</td>';
            echo '  <td>' . $row['c_Cabinet'] . '</td>';
            echo '  <td>' . $row['remarques_Cabinet'] . '</td>';
            echo '  <td>' . $row['region_Cabinet'] . '</td>';
            echo '  <td>
                        <a href="editer_Cabinet.php?id=' . $row['id_Cabinet'] . '&fonction=editer">Editer</a>
                        <a href="editer_Cabinet.php?id=' . $row['id_Cabinet'] . '&fonction=supprimer">Supprimer</a>
                    </td>';
            echo '</tr>';
        }
    }

    $objConn->closeConnection();
    ?>
</table>
</body>
</html>