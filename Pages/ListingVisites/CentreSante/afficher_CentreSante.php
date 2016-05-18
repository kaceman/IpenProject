<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - La liste des Centres de Santé</title>
</head>
<body>
<table>
    <caption>Liste des Centres de Santé</caption>
    <tr>
        <th>Code</th>
        <th>Centre de Santé</th>
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

    $sql = "SELECT * FROM centresante";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '  <td>' . $row['code_centreSante'] . '</td>';
            echo '  <td>' . $row['centreSante'] . '</td>';
            echo '  <td>' . $row['Medecin_centreSante'] . '</td>';
            echo '  <td>' . $row['specialite_centreSante'] . '</td>';
            echo '  <td>' . $row['date_centreSante'] . '</td>';
            echo '  <td>' . $row['a_centreSante'] . '</td>';
            echo '  <td>' . $row['b_centreSante'] . '</td>';
            echo '  <td>' . $row['c_centreSante'] . '</td>';
            echo '  <td>' . $row['remarques_centreSante'] . '</td>';
            echo '  <td>' . $row['region_centreSante'] . '</td>';
            echo '  <td>
                        <a href="editer_CentreSante.php?id=' . $row['id_centreSante'] . '&fonction=editer">Editer</a>
                        <a href="editer_CentreSante.php?id=' . $row['id_centreSante'] . '&fonction=supprimer">Supprimer</a>
                    </td>';
            echo '</tr>';
        }
    }

    $objConn->closeConnection();
    ?>
</table>
</body>
</html>