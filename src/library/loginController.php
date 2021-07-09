<?php
require_once('loginManager.php');

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pwd']) && !empty($_POST['pwd'])){
     $username = $_POST["email"];
     $password = $_POST["pwd"];
     login($username,$password);
}

if(isset($_GET['logOut'])){
     session_destroy();
     header('Location: ../../index.php?logOut=true');
}
?>