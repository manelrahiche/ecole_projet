<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Formulaire d'inscription</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">

	<style>
		.container {
			width: 50%;
			margin: 0 auto;
		}

		.form-group {
			display: flex;
			align-items: center;
			justify-content: flex-start;
			margin-bottom: 10px;
		}

		.form-label {
			flex: 1;
			margin-right: 15px;
			max-width: 150px; /* Ajuste la largeur maximale du label */
			text-align: right;
		}
        h2, .h2 {
  font-size: 25px;
  padding-left: 180px;
  margin-top: 70px;
  margin-bottom: 50px;}

		.form-control {
			flex: 2;
			max-width: 300px;
			margin-left: 10px; /* Ajuste l'espacement entre le label et le champ */
		}

		.btn-primary {
			font-size: 18px;
            background-color: blueviolet;
  margin-left: 220px;

  margin-top: 30px;
		}
	</style>

	<script>
		function validateForm() {
			const password = document.getElementById("password").value;
			const confirmPassword = document.getElementById("confirm_password").value;
            const email = document.getElementById("email").value;
			const emailPattern = /^[a-zA-Z]+\.[a-zA-Z]+@iftikhar\.com$/;
			
			if (password !== confirmPassword) {
				alert("Les mots de passe ne correspondent pas.");
				return false;
			}

			if (!emailPattern.test(email)) {
				alert("L'adresse e-mail doit être sous la forme nom.prenom@iftikhar.com.");
				return false;
			}

			return true;
		}
	</script>
</head>
<body>

	<div class="container">
		<h2>Inscription Parent</h2>
		<?php echo form_open(base_url() . 'index.php?guest/parent', array('class' => 'form-horizontal', 'onsubmit' => 'return validateForm()')); ?>

		<!-- Nom et Prénom combiné -->
		<div class="form-group">
			<label for="name" class="form-label">Nom et prénom</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Ex: John Doe" required>
		</div>

		<!-- Email -->
		<div class="form-group">
			<label for="email" class="form-label">Email</label>
			<input type="email" class="form-control" name="email" id="email" placeholder="nom.prenom@iftikhar.com" required>
		</div>

		<!-- Mot de passe -->
		<div class="form-group">
			<label for="password" class="form-label">Mot de passe</label>
			<input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
		</div>

		<!-- Confirmation du mot de passe -->
		<div class="form-group">
			<label for="confirm_password" class="form-label">Confirmez le mot de passe</label>
			<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirmez le mot de passe" required>
		</div>

		<!-- Mobile -->
		<div class="form-group">
			<label for="phone" class="form-label">Mobile</label>
			<input type="tel" class="form-control" name="phone" id="phone" placeholder="Numéro de téléphone" pattern="[0-9]{10}" title="Veuillez entrer un numéro valide à 10 chiffres" required>
		</div>

		<!-- Adresse -->
		<div class="form-group">
			<label for="address" class="form-label">Adresse</label>
			<input type="text" class="form-control" name="address" id="address" placeholder="Votre adresse" required>
		</div>

		<!-- Profession -->
		<div class="form-group">
			<label for="profession" class="form-label">Profession</label>
			<input type="text" class="form-control" name="profession" id="profession" placeholder="Votre profession" required>
		</div>

		<!-- Bouton de soumission -->
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Ajouter le parent</button>
		</div>

		<?php echo form_close(); ?>
	</div>

</body>
</html>
