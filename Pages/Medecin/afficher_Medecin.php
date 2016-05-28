<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>IPSEN - La liste des Grossisterie</title>

    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>

</head>
<body>
<div class="container">

    <h3 class="text-center">Liste Medecins</h3>

    <table id="datatables" class="table span12 table-bordered table-hover">
        <tr>
            <th>Nom</th>
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
        ?>
             <tr>
                 <td><?= $row['nom_medecin'] ?></td>
                 <td><?= $row['specialite_medecin'] ?></td>
                 <td><?= $row['adresse_medecin'] ?></td>
                 <td><?= $row['tel_medecin'] ?></td>
                 <td><?= $row['secteur_medecin'] ?></td>
                 <td><?= $row['region'] ?></td>
                 <td>
                     <a href="info_Medecin.php?id=<?= $row['id_medecin'] ?>">Afficher</a>
                     <a href="editer_Medecin.php?id=<?= $row['id_medecin'] ?>&fonction=editer">Editer</a>
                     <a href="editer_Medecin.php?id=<?= $row['id_medecin'] ?>&fonction=supprimer">Supprimer</a>
                 </td>
             </tr>
        <?php
            }
        }

        $objConn->closeConnection();
        ?>
    </table>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').dataTable();
    } );
</script>

</body>
</html>