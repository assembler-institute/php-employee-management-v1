<?php

function getUsers()
{
  $my_data_base_of_users = file_get_contents("../../resources/users.json");
  return json_decode($my_data_base_of_users);
}

function getUsersArray()
{
  $my_data_base_of_users = file_get_contents("../../resources/users.json");
  return json_decode($my_data_base_of_users, true);
}

function updateUsers($updatedUsers)
{
  file_put_contents("../../resources/users.json", $updatedUsers);
}

function newUserToUpdate($pastUsers, $newArray_from_user)
{
  array_push($pastUsers["users"], $newArray_from_user);
  $updatedUsers = json_encode($pastUsers);
  updateUsers($updatedUsers);
}
