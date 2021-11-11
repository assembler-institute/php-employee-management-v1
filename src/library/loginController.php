<?php

require_once('./loginManager.php');

function getLoginData() {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $loginData = ["username" => $username, "password" => $password];
  return $loginData;
}

function authUserCall() {
  $getLoginData = getLoginData();
  authUser($getLoginData); // REQUIRED FROM LOGINMANAGER
}

authUserCall();