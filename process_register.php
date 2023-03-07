<?php

require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $pseudo = $_POST['pseudo'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hashed_password = password_hash($password, PASSWORD_DEFAULT); // pour la sécurité des mdp users, transforme le mdp en chaîne de caractères aléatoires appelés hash
  $created_at = date('y-m-d H:i:s');


  $stmt = $pdo->prepare("INSERT INTO user (login, email, password, created_at) VALUES (?, ?, ?, ?)");
  $stmt->execute([$pseudo, $email, $hashed_password, $created_at]);

  header('Location: login.php');
  exit();
}
?>
