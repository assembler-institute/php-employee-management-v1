<?php

require_once __DIR__ . "/loginManager.php";

if (isset($_POST["submit"])) {
  autentificar_usuario();
}

if (isset($_GET["logoutClicked"])) {
  cerrar_sesion();
}

function check_usuario_on_database($username, $pass)
{
  $users = getUsers();
  // $my_data_base_of_users = file_get_contents("../../resources/users.json");
  // $array_json = json_decode($my_data_base_of_users);

  foreach ($users->users as $user) {
    if ($username == $user->name && password_verify($pass, $user->password)) {
      $usernameFalso = $user->name;
      $passwordFalsa = $user->password;
      // echo $usernameFalso;
      // echo $passwordFalsa;
    } else {
      echo "no coincide";
    }
  }

  // if ($username == $usernameFalso && password_verify($pass, $passwordFalsa)) {
  //   return true;
  // } else {
  //   echo "esta todo mal";
  //   return false;
  // }

  return $username == $usernameFalso && password_verify($pass, $passwordFalsa);
}

function autentificar_usuario()
{
  session_start();

  $username = $_POST["username"];
  $pass = $_POST["password"];

  // check_usuario_on_database($username, $pass);

  if (check_usuario_on_database($username, $pass) == true) {
    $_SESSION["username"] = $username;
    require_once('sessionHelper.php');
    initSessionTimeout();
    header("Location: ../dashboard.php");
  } else {
    $_SESSION["ErrorDeAcceso"] = "Username y contraseña incorrectos";
    echo $username;
    echo $pass;
    header("location:../../index.php");
  }
}

function revisar_si_existe_sesion()
{
  if (!isset($_SESSION)) {
    session_start();
  }
  // basename() te coge de la URL actual, el ultimo lugar donde te encuentres
  $checkUrl = basename($_SERVER["REQUEST_URI"], "?" . $_SERVER["QUERY_STRING"]);

  if ($checkUrl == "index.php" || $checkUrl == "php-employee-management-v1") {
    if (isset($_SESSION["username"]) == true) {
      header("Location:./src/dashboard.php");
    } else {
      if ($alert = check_error_de_login()) {
        return $alert;
      }
      if ($alert = check_login_info()) {
        return $alert;
      }
      if ($alert = check_logout()) {
        return $alert;
      }
      if ($alert = check_error_de_registro()) {
        return $alert;
      }
    }
  } else {
    if (isset($_SESSION["username"]) == false) {
      $_SESSION["loginInfo"] =
        "No tienes permisos para entrar, por favor. Indentifícate.";
      header("Location:../index.php");
    }
  }
}

function cerrar_sesion()
{
  session_start();

  echo "se ejecuto cerrar_sesion()";

  // borra lo que haya dentro de las variables de session
  unset($_SESSION);

  // destruye la cookie de almacenada en el navegador de session
  destruir_cookie_de_la_sesion();

  // finalmente esto destruye la session y lo redirigimos a donde queramos
  session_destroy();

  // ademas añadimos el parametro logout en true para verificar un condicional
  header("Location: ../../index.php?logout=true");
}

function destruir_cookie_de_la_sesion()
{
  if (ini_get("session.use_cookie")) {
    $params = session_get_cookie_params();
    setcookie(
      session_name(),
      "",
      time() - 42000,
      $params["path"],
      $params["domain"],
      $params["secure"],
      $params["httponly"]
    );
  }
}

function check_error_de_login()
{
  if (isset($_SESSION["ErrorDeAcceso"])) {
    $texto_de_error = $_SESSION["ErrorDeAcceso"];
    unset($_SESSION["ErrorDeAcceso"]);
    return [
      "bg" => "bg-white",
      "type" => "text-danger",
      "emoticon" => "&#128557;",
      "texto" => $texto_de_error,
    ];
  }
}

function check_error_de_registro()
{
  if (isset($_SESSION["ErrorDeRegistro"])) {
    $texto_de_error = $_SESSION["ErrorDeRegistro"];
    unset($_SESSION["ErrorDeRegistro"]);
    return [
      "bg" => "bg-white",
      "type" => "text-danger",
      "emoticon" => "&#128557;",
      "texto" => $texto_de_error,
    ];
  }
}

function check_login_info()
{
  if (isset($_SESSION["loginInfo"])) {
    $texto_de_info = $_SESSION["loginInfo"];
    unset($_SESSION["loginInfo"]);
    return [
      "bg" => "bg-warning",
      "type" => "text-dark",
      "emoticon" => "&#128536;",
      "texto" => $texto_de_info,
    ];
  }
}

function check_logout()
{
  if (isset($_GET["logout"]) && !isset($_SESSION["username"])) {
    return [
      "bg" => "bg-white",
      "type" => "text-dark",
      "emoticon" => "&#128524;",
      "texto" => "Logout succesful",
    ];
  }
}

// NEW USEEEERR!!!
if (isset($_POST["register_submit"])) {
  handle_new_user();
}

function create_new_usuario_on_database($new_username, $new_pass)
{
  $newEncriptedPass = password_hash($new_pass, PASSWORD_DEFAULT);

  $users = getUsersArray();

  // $my_data_base_of_users = file_get_contents("../../resources/users.json");
  // $array_json = json_decode($my_data_base_of_users, true);
  $lastUserId = count($users["users"]);
  // echo $lastUserId;
  $newArray_from_user = [
    "userId" => $lastUserId + 1,
    "name" => $new_username,
    "password" => $newEncriptedPass,
    "email" => "no email bitx",
  ];

  newUserToUpdate($users, $newArray_from_user);
  // array_push($users["users"], $newArray_from_user);
  // $updatedUsers = json_encode($users);
  // print_r($final_data);

  // updateUsers($updatedUsers);
  // file_put_contents("../../resources/users.json", $final_data);

  return true;
}

function handle_new_user()
{
  // require_once "../library/loginManager.php";

  session_start();

  $new_username = $_POST["new_username"];
  $new_pass = $_POST["new_password"];

  if (empty($_POST["new_username"]) || empty($_POST["new_password"])) {
    $_SESSION["ErrorDeRegistro"] = "Username y contraseña no adecuados";
    header("location:../../index.php");
  } elseif (create_new_usuario_on_database($new_username, $new_pass) == true) {
    $_SESSION["username"] = $new_username;
    header("Location: ../dashboard.php");
  }
}
