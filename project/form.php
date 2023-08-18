<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./formulario.css">
    <title>Formulaire de contact</title>
</head>

<body>
    <div class="container">
        <h1>Formulaire de contact</h1>
        <form action="./action.php" method="post">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="dataInput">Choisir une date:</label>
            <input type="date" id="dataInput" name="data">
            
            <label for="telefoneInput">Entrez votre numéro de téléphone :</label>
            <input type="tel" id="telefoneInput" name="telefone" pattern="[0-9]{10}" placeholder="Exemple: 1234567890" required>
            <small>Ne saisir que des nombres (10 chiffres).</small>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <label for="pet-select">Choisir un animal de compagnie:</label>
            
            <select name="pets" id="pet-select">
                <option value="">--Veuillez choisir une option--</option>
                <option value="dog">Chien</option>
                <option value="cat">Chat</option>
                <option value="hamster">Hamster</option>
                <option value="parrot">Perroquet</option>
                <option value="spider">Araignée</option>
                <option value="goldfish">Poisson rouge</option>
            </select>

            <div class="radio-group">
                <label>
                    <input type="radio" name="opcao" value="opcao1">
                France
                </label>
                <label>
                    <input type="radio" name="opcao" value="opcao2">
                Angola
                </label>
                <label>
                    <input type="radio" name="opcao" value="opcao3">
                EUA
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="aceito">
                    J'accepte les termes et conditions
                </label>

            <button type="submit">Envoyer</button>
        </form>
    </div>
</body>

</html>