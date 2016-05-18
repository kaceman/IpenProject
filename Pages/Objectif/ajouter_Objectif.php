<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>IPSEN - Ajouter un Objectif</title>
</head>
<body>
<form action="traitement_Objectif.php" method="post">
    <input type="hidden" value="<?= $_GET['id'] ?>" name="owner">
    <label for="mois">Mois</label>
    <input type="text" id="mois" name="mois"><br>

    <label for="pmObjectif">PM Objectif</label>
    <input type="number" id="pmObjectif" name="pmObjectif"><br>

    <label for="globalObjectif">Global Objectif</label>
    <input type="number" id="globalObjectif" name="globalObjectif"><br>

    <label for="pmrealise">PM Réalisé</label>
    <input type="number" id="pmrealise" name="pmrealise"><br>

    <label for="globalObjectif">Global Réalisé</label>
    <input type="number" id="globalObjectif" name="globalObjectif"><br>

    <input type="submit" name="ajouter" value="Ajouter" />
</form>
</body>
</html>