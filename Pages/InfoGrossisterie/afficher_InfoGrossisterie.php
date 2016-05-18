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
        <th>Region</th>
        <th>Ville</th>
        <th>Code</th>
        <th>Nom</th>
        <th>Adresse</th>
        <th>Téléphone</th>
        <th>Directeur</th>
        <th>Pharmacien Responsable</th>
        <th>Actions</th>
    </tr>
    <?php

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;
    
    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $sql = "SELECT * FROM grossisterie";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '  <td>' . $row['region_G'] . '</td>';
            echo '  <td>' . $row['ville_G'] . '</td>';
            echo '  <td>' . $row['code_G'] . '</td>';
            echo '  <td>' . $row['nom_G'] . '</td>';
            echo '  <td>' . $row['adresse_G'] . '</td>';
            echo '  <td>' . $row['telephone_G'] . '</td>';
            echo '  <td>' . $row['directeur_G'] . '</td>';
            echo '  <td>' . $row['pharmacienResponsable'] . '</td>';

            echo '  <td>
                        <a href="../Objectif/afficher_Objectif.php?id=' . $row['id_infoGrossisterie'] . '">Afficher les Objectifs</a><br>
                        <a href="editer_InfoGrossisterie.php?id=' . $row['id_infoGrossisterie'] . '&fonction=editer">Editer</a>
                        <a href="editer_InfoGrossisterie.php?id=' . $row['id_infoGrossisterie'] . '&fonction=supprimer">Supprimer</a>
                    </td>';
            echo '</tr>';
        }
    }

    $objConn->closeConnection();
    ?>
</table>
</body>
</html>