<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - Ajouter une Commande</title>
</head>
<body>
<form action="traitement_Commande.php" method="post">
    <input type="hidden" value="<?= $_GET['id'] ?>" name="owner">
    <label for="datecmd">Date Commande</label>
    <input type="date" id="datecmd" name="datecmd"><br>

    <label for="commande">Commande</label>
    <input type="text" id="commande" name="commande"><br>

    <label for="rmqMedecin">Remarque Medecin</label>
    <input type="text" id="rmqMedecin" name="rmqMedecin"><br>

    <input type="submit" name="ajouter" value="Ajouter" />
</form>
</body>
</html>