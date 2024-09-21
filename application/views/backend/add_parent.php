<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet"> 
<div class="container" style="  position: absolute;transform: translate(-50%,-50%);top: 50%; left: 50%;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div  style="padding: 20px; background: linear-gradient(45deg, #007bff, #00c6ff);">
                    <h4 class="mb-0" style=" font-weight: 500; color: #fff; opacity: 0.7; font-size: 1.4rem;margin-top: 0;margin-bottom: 60px;text-shadow: 2px 2px 4px rgba(0,0,0,0.2);"><?php echo ('Ajouter un parent'); ?></h4>
                </div>
                <div class="card-body p-4">
                    <?php echo form_open(base_url() . 'index.php?guest/parent', array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>

                    <!-- Nom et Prénom combiné -->
                    <div class="mb-3">
                        <label for="name" class="form-label"><?php echo ('Nom et prénom'); ?></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Ex: John Doe" required>
                    </div>

                    <!-- Email avec vérification du format -->
                    <div class="mb-3">
                        <label for="email" class="form-label"><?php echo ('Email'); ?></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="nom.prenom@iftikhar.com" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z]+\.[iftikhar]{2,3}" required>
                    </div>

                    <!-- Mot de passe -->
                    <div class="mb-3">
                        <label for="password" class="form-label"><?php echo ('Mot de passe'); ?></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
                    </div>

                    <!-- Confirmation du mot de passe -->
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label"><?php echo ('Confirmez le mot de passe'); ?></label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirmez le mot de passe" required>
                    </div>

                    <!-- Mobile -->
                    <div class="mb-3">
                        <label for="phone" class="form-label"><?php echo ('Mobile'); ?></label>
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Numéro de téléphone" pattern="[0-9]{10}" title="Veuillez entrer un numéro valide à 10 chiffres" required>
                    </div>

                    <!-- Adresse -->
                    <div class="mb-3">
                        <label for="address" class="form-label"><?php echo ('Adresse'); ?></label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Votre adresse" required>
                    </div>

                    <!-- Profession -->
                    <div class="mb-3">
                        <label for="profession" class="form-label"><?php echo ('Profession'); ?></label>
                        <input type="text" class="form-control" name="profession" id="profession" placeholder="Votre profession" required>
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" style="padding: 12px; background: linear-gradient(45deg, #007bff, #00c6ff); font-size: 18px;">
                            <?php echo ('Ajouter le parent'); ?>
                        </button>
                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script pour valider le mot de passe -->
<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        var password = document.getElementById('password').value;
        var confirm_password = document.getElementById('confirm_password').value;

        if (password !== confirm_password) {
            e.preventDefault();
            alert("Les mots de passe ne correspondent pas.");
        }
    });
</script>
