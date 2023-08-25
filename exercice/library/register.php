
        <!-- Inclure les liens CSS de Bootstrap -->
 <?php
        require_once('./inc/header.php');
                ?>

        <div class="container">
            <h2>Formulaire de Contact</h2>

            <form action="../../exercice/library/model/db_register.php" method="post">
                <div class="form-group">
                    <label for="nom">Premon :</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Nom :</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>

                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="message">Message :</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label>Genre :</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genre" id="homme" value="homme">
                        <label class="form-check-label" for="homme">Homme</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genre" id="femme" value="femme">
                        <label class="form-check-label" for="femme">Femme</label>
                    </div>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="tel">Tel</label>
                    <input class="form-check-input" type="number" id="tel" name="tel">
                </div>
                <div class="form-group">
                    <label for="pays">Pays :</label>
                    <select class="form-control" id="pays" name="pays">
                        <option value="france">France</option>
                        <option value="canada">Canada</option>
                        <option value="usa">USA</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="souscription" name="souscription" value="oui">
                    <label class="form-check-label" for="souscription">Souscrire à la newsletter</label>
                </div>

                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
        <?php 
        require_once('./inc/footer.php');
        ?>
