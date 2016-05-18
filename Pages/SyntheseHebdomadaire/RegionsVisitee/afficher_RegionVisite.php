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
        <th>Regions Visités</th>
        <th>Patelins</th>
        <th>Action Privé A</th>
        <th>Action Privé B</th>
        <th>Action Privé C</th>
        <th>Action Publique A</th>
        <th>Action Publique B</th>
        <th>Action Publique C</th>
        <th>Actions</th>
    </tr>
    <?php

    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;
    
    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $sql = "SELECT * FROM regionvisite";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '  <td>' . $row['regionVisite'] . '</td>';
            echo '  <td>' . $row['patelins'] . '</td>';
            echo '  <td>' . $row['actPrivA'] . '</td>';
            echo '  <td>' . $row['actPrivB'] . '</td>';
            echo '  <td>' . $row['actPrivC'] . '</td>';
            echo '  <td>' . $row['actPublA'] . '</td>';
            echo '  <td>' . $row['actPublB'] . '</td>';
            echo '  <td>' . $row['actPublC'] . '</td>';
            echo '  <td>
                        <a href="editer_RegionVisite.php?id=' . $row['id_regionVisite'] . '&fonction=editer">Editer</a>
                        <a href="editer_RegionVisite.php?id=' . $row['id_regionVisite'] . '&fonction=supprimer">Supprimer</a>
                    </td>';
            echo '</tr>';
        }
    }

    $objConn->closeConnection();
    ?>
</table>
</body>
</html>