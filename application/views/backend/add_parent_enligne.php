<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root"; // Utilisez le nom d'utilisateur de votre base de données
$password = ""; // Utilisez le mot de passe de votre base de données
$dbname = "schooligniter"; // Remplacez par le nom de votre base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['parentName'];
$prenom = $_POST['parentPrenom'];
$password = password_hash($_POST['parentPassword'], PASSWORD_DEFAULT); // Hash du mot de passe
$date_naissance = $_POST['parentDOB'];
$mobile = $_POST['parentMobile'];
$adresse = $_POST['parentAddress'];
$profession = $_POST['parentProfession'];

// Préparer et exécuter la requête d'insertion
$stmt = $conn->prepare("INSERT INTO parent (nom, prenom, password, date_naissance, mobile, adresse, profession) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $nom, $prenom, $password, $date_naissance, $mobile, $adresse, $profession);

if ($stmt->execute()) {
    echo "Nouveau parent ajouté avec succès";
} else {
    echo "Erreur : " . $stmt->error;
}

// Fermer la connexion
$stmt->close();
$conn->close();
?>
