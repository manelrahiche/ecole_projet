<div class="container">
    <h2>Inscription des invités</h2>
    <?php echo form_open(base_url() . 'index.php?guest/register', array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>

    <!-- Nom et prénom combiné -->
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Nom et Prénom</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="Nom et Prénom" required>
        </div>
    </div>

    <!-- Adresse -->
    <div class="form-group">
        <label for="address" class="col-sm-2 control-label">Adresse</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" placeholder="Adresse" required>
        </div>
    </div>

    <!-- Mobile -->
    <div class="form-group">
        <label for="mobile" class="col-sm-2 control-label">Mobile</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="mobile" placeholder="Numéro de téléphone" required>
        </div>
    </div>

    <!-- Mot de passe -->
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Mot de passe</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
        </div>
    </div>

    <!-- Confirmation du mot de passe -->
    <div class="form-group">
        <label for="confirm_password" class="col-sm-2 control-label">Confirmer mot de passe</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirmez le mot de passe" required>
        </div>
    </div>

    <!-- Bouton de soumission -->
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </div>
    </div>

    <?php echo form_close(); ?>
</div>

<script>
    // Vérification que les deux mots de passe correspondent
    document.querySelector('form').addEventListener('submit', function(e) {
        var password = document.getElementById('password').value;
        var confirm_password = document.getElementById('confirm_password').value;

        if (password !== confirm_password) {
            e.preventDefault();
            alert("Les mots de passe ne correspondent pas.");
        }
    });
</script>
