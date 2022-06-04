<?php

function authUser() {
session_start();
//Login input
$username = trim($_POST['username']);
$pass = trim($_POST['pass']);

if(checkUser($username, $pass)) {
header("Location:../dashboard.php");
echo "TRUE";

} 
else {
  $_SESSION["loginError"] = "Wrong email or password!";
  header("Location: ../../index.php?login=false");
  echo "FALSE";
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