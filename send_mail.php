<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nom = strip_tags(trim($_POST["nom"]));
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $message = trim($_POST["message"]);

  if (empty($nom) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($message)) {
    // Erreur de validation - rediriger ou afficher un message d'erreur
    echo "Veuillez remplir correctement tous les champs.";
    exit;
  }

  // Destinataire : ton adresse e-mail personnelle ici :
  $destinataire = "clemjuu@icloud.com"; 

  // Sujet
  $sujet = "Nouveau message de votre site Portfolio";

  // Contenu du mail
  $contenu = "Nom : $nom\n";
  $contenu .= "Email : $email\n\n";
  $contenu .= "Message : \n$message\n";

  // En-têtes pour envoyer depuis ton adresse e-mail
  $headers = "From: $nom <$email>";

  // Envoi du mail
  if (mail($destinataire, $sujet, $contenu, $headers)) {
    echo "Merci, votre message a bien été envoyé.";
  } else {
    echo "Une erreur est survenue lors de l’envoi du message.";
  }
} else {
  // Si formulaire non soumis, rediriger (optionnel)
  header('Location: index.html');
  exit;
}
?>
