<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>IPSEN - Organisme</title>
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
        <form action="traitement_CentreSante.php" method="post">
            <label for="code">Code</label>
            <input type="text" id="code" name="code"><br>

            <label for="cs">Centre de Santé</label>
            <input type="text" id="cs" name="cs"><br>

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

            <label for="a">A</label>
            <input type="text" id="a" name="a"><br>

            <label for="b">B</label>
            <input type="text" id="b" name="b"><br>

            <label for="c">C</label>
            <input type="text" id="c" name="c"><br>

            <label for="remarque">Remarque</label>
            <input type="text" id="remarque" name="remarque"><br>

            <label for="region">Region</label>
            <input type="text" id="region" name="region"><br>

            <input type="submit" name="ajouter" value="Ajouter" />
        </form>
    </body>
</html>