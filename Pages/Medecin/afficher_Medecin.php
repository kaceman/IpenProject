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
        <th>Nom</th>
        <th>Prenom</th>
        <th>Specialité</th>
        <th>Adresse</th>
        <th>Telephone</th>
        <th>Secteur</th>
        <th>Region</th>
        <th>Actions</th>
    </tr>
    <?php

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;
    
    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $sql = "SELECT * FROM medecin";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '  <td>' . $row['nom_medecin'] . '</td>';
            echo '  <td>' . $row['prenom_medecin'] . '</td>';
            echo '  <td>' . $row['specialite_medecin'] . '</td>';
            echo '  <td>' . $row['adresse_medecin'] . '</td>';
            echo '  <td>' . $row['tel_medecin'] . '</td>';
            echo '  <td>' . $row['secteur_medecin'] . '</td>';
            echo '  <td>' . $row['region'] . '</td>';
            echo '  <td>
                        <a href="editer_Medecin.php?id=' . $row['id_medecin'] . '&fonction=editer">Editer</a>
                        <a href="editer_Medecin.php?id=' . $row['id_medecin'] . '&fonction=supprimer">Supprimer</a>
                    </td>';
            echo '</tr>';
        }
    }

    $objConn->closeConnection();
    ?>
</table>
</body>
</html>