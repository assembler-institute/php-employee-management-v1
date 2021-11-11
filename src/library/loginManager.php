<?php
/**
 * USER FUNCTIONS LIBRARY
 */

function addUser(string $name, string $email, string $pass)
{
  $id = '0001';
  $name = 'new user';

  $email = $_POST["email"];
  $pass = $_POST["pass"];

  $file = fopen(__DIR__ . '/resources/users.json','w');
}