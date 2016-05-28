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

    $sql1 = "SELECT * FROM ipsendb.cabinet";

    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            echo '<tr>';
            echo '  <td>' . $row1['code_Cabinet'] . '</td>';

            $id_medecin = $row1['id_medecin'];
            $sql2 = "SELECT * FROM ipsendb.medecin WHERE id_medecin='$id_medecin'";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            echo '  <td><a href="../../Medecin/info_Medecin.php?id=' . $row2['id_medecin'] . '">' . $row2['nom_medecin'] . '</a></td>';

            echo '  <td>' . $row1['specialite_Cabinet'] . '</td>';
            echo '  <td>' . $row1['dateVisite_Cabinet'] . '</td>';
            echo '  <td>' . $row1['a_Cabinet'] . '</td>';
            echo '  <td>' . $row1['b_Cabinet'] . '</td>';
            echo '  <td>' . $row1['c_Cabinet'] . '</td>';
            echo '  <td>' . $row1['remarques_Cabinet'] . '</td>';
            echo '  <td>' . $row1['region_Cabinet'] . '</td>';
            echo '  <td>
                        <a href="editer_Cabinet.php?id=' . $row1['id_Cabinet'] . '&fonction=editer">Editer</a>
                        <a href="editer_Cabinet.php?id=' . $row1['id_Cabinet'] . '&fonction=supprimer">Supprimer</a>
                    </td>';
            echo '</tr>';
        }
    }

    $objConn->closeConnection();
    ?>
</table>
</body>
</html>