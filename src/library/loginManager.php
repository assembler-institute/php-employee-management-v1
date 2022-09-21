<?php

require_once("./sessionHelper.php");
  $username = $_POST["username"];
  $password = $_POST["password"];
  // echo $username;
  // echo $password;
authUser();

?>