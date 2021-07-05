<?php

function check_usuario_on_database($username, $pass)
{
  $my_data_base_of_users = file_get_contents("../../resources/users.json");
  $array_json = json_decode($my_data_base_of_users);

  foreach ($array_json->users as $user) {
    if ($username == $user->name && password_verify($pass, $user->password)) {
      $usernameFalso = $user->name;
      $passwordFalsa = $user->password;
			// echo $usernameFalso;
			// echo $passwordFalsa;
			// return true;
    } else {
      echo "no coincide";
			// return false;
    }
  }

	if (
		$username == $usernameFalso &&
		password_verify($pass, $passwordFalsa)
	) {
		echo $username;
		echo $passwordFalsa;
		return true;
	} else {
		echo "esta todo mal";
		return false;
	}

}