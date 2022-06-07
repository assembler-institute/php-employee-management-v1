<?php


function authUser() {
include ("sessionHelper.php");
session_start();
//Login input
$username = trim($_POST['username']);
$pass = trim($_POST['pass']);

if(checkUser($username, $pass)) {
$username = $_SESSION['username'];
header("Location:../dashboard.php");
} 
else {
  $_SESSION["loginError"] = "Wrong email or password!";
  header("Location: ../../index.php?login=error");
}
}

function checkUser($username, $pass){
  $users = json_decode(file_get_contents('../../resources/users.json'));

  foreach($users as $user) {
    $dbname  = $user->name;
    $dbpass  = $user->password;
  }

if($username === $dbname && password_verify($pass,$dbpass)) {
return true;
} else {
  return false;
}
}

function destroySessionCookie()
{
if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  setcookie(
      session_name(),
      '',
      time() - 42000,
      $params["path"],
      $params["domain"],
      $params["secure"],
      $params["httponly"]
  );
}
  
}

