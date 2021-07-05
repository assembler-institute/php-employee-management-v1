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
    } else {
      echo "no coincide";
    }
  }

	if (
		$username == $usernameFalso &&
		password_verify($pass, $passwordFalsa)
	) {
		return true;
	} else {
		echo "esta todo mal";
		return false;
	}

}

function create_new_usuario_on_database($new_username, $new_pass)
{

	$newEncriptedPass = password_hash($new_pass, PASSWORD_DEFAULT);

  $my_data_base_of_users = file_get_contents("../../resources/users.json");
  $array_json = json_decode($my_data_base_of_users, true);
	$lastUserId = count($array_json["users"]);
	echo $lastUserId;
	$newArray_from_user = array(
		"userId" => $lastUserId + 1,
		"name" => $new_username,
		"password" => $newEncriptedPass,
		"email" => "no email bitx",
	);

	array_push($array_json["users"], $newArray_from_user);
	$final_data = json_encode($array_json);
	print_r($final_data);

	file_put_contents("../../resources/users.json",$final_data);

	return true;
}