<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - La liste des Cliniques</title>
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
        <th>Réanimateur</th>
        <th>Medecin de garde</th>
        <th>Medecin Specialiste Hosp</th>
        <th>Actions</th>
    </tr>
    <?php

    require_once __DIR__ . '/../../Connexion/Connexion.php';
    use Connexion\Connexion;
    
    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $sql = "SELECT * FROM infoclinique";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '  <td>' . $row['region'] . '</td>';
            echo '  <td>' . $row['ville'] . '</td>';
            echo '  <td>' . $row['code'] . '</td>';
            echo '  <td>' . $row['nom'] . '</td>';
            echo '  <td>' . $row['adresse'] . '</td>';
            echo '  <td>' . $row['telephone'] . '</td>';
            echo '  <td>' . $row['directeur'] . '</td>';
            echo '  <td>' . $row['reanimateur'] . '</td>';
            echo '  <td>' . $row['medecinGarde'] . '</td>';
            echo '  <td>' . $row['medecinSpecialiste'] . '</td>';
            echo '  <td>
                        <a href="../Commande/afficher_Commande.php?id=' . $row['id_infoClinique'] . '">Afficher les Commande</a><br>
                        <a href="editer_InfoClinique.php?id=' . $row['id_infoClinique'] . '&fonction=editer">Editer</a>
                        <a href="editer_InfoClinique.php?id=' . $row['id_infoClinique'] . '&fonction=supprimer">Supprimer</a>
                    </td>';
            echo '</tr>';
        }
    }

    $objConn->closeConnection();
    ?>
</table>
</body>
</html>