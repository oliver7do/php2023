<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de réservation de livre</title>
</head>
<body>
    <form action="model/db_book.php" method="post">
        <label for="title">Titre du livre :</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="author">Auteur :</label>
        <input type="text" id="author" name="author" required><br><br>

        <input type="submit" value="Réserver">
    </form>
</body>
</html>
