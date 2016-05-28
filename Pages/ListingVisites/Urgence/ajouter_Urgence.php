<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>IPSEN - Urgence</title>
    </head>
    <body>
    <?php
    require_once __DIR__ . '/../../../Connexion/Connexion.php';
    use Connexion\Connexion;

    $objConn = new Connexion();
    $conn = $objConn->connectToDB();

    $sql = "SELECT * FROM ipsendb.medecin";

    $result = $conn->query($sql);


    ?>
        <form action="traitement_Urgence.php" method="post">
            <label for="code">Code</label>
            <input type="text" id="code" name="code"><br>

            <label for="urgence">Urgence</label>
            <input type="text" id="urgence" name="urgence"><br>

            <label for="medecin">Medecin</label>
            <select id="medecin" name="medecin">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_medecin'] . '">' . $row['nom_medecin'] . '</option>';
                    }
                }

                $objConn->closeConnection();
                ?>
            </select><br>

            <label for="specialite">Spécialité</label>
            <input type="text" id="specialite" name="specialite"><br>

            <label for="datevisite">Date Visite</label>
            <input type="date" id="datevisite" name="datevisite"><br>

            <label for="remarque">Remarque</label>
            <input type="text" id="remarque" name="remarque"><br>

            <label for="region">Region</label>
            <input type="text" id="region" name="region"><br>

            <input type="submit" name="ajouter" value="Ajouter" />
        </form>
    </body>
</html>