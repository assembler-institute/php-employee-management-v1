<?php

# Post request verification
if (!isset($_POST["email"]) || !isset($_POST["password"])) {
  die('Ciao!');
}

require_once('./loginManager.php');
require_once('./sessionHelper.php');

# Get form vars and sanitize it
$email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
$password = $_POST["password"];

# Read json DB
$json = getJson('../../resources/users.json');
$user = $json['users'][0];

# Autenticate user and pass
if (!password_verify($password, $user['password'])) {
  header("Location: ../../index.php?error=password"); // Redirect with Query params
  exit();
}

if ($user['email'] !== $email) {
  header("Location: ../../index.php?error=email"); // Redirect with Query params
  exit();
}

# Create session
startSession($email);

# Redirect
header("Location: ../dashboard.php");
exit();