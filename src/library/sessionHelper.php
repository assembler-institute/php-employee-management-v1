<?php


/**
 * This function must first check where are we
 *
 * If we are on index and we are already logged it must redirect
 * to the dashboard, if not it must check for login errors, login info or logouts
 *
 * If we are on dashboard it must check that we are already logged, if not
 * it must redirect us to the index and show an error
 */
function checkSession()
{
  session_start(); //Cuando se ejecuta el session start es cuando se crea la cookie

if(!isset($_SESSION["username"]))
{
  header("Location: ../../index.php");
}

}

/**
 * This function must unset all session and cookies variables
 * and also destroy the session itself
 */
function destroySession()
{
  session_start();
unset($_SESSION);
if (ini_get("session.use_cookie")) {
  $params = session_get_cookie_params();
  setcookie(
    session_name(),
    '',
    time() - 42000,
    $params["path"],
    $params["domain"],
    $params["secure"],
    $params["httponly"],
  );
}
session_destroy();
header("Location: ../../index.php?logout=true");
}

/**
 * This function must get input form values and check them
 * If user is correct we must redirect user to the private area
 */
function authUser()
{
  // session_start();
// LO QUE NOS VIENE POR EL POST
$userName = $_POST["username"];
$passWord = $_POST["password"];
// echo $userName;
// echo $passWord;
// $_SESSION["username"] = $userName;
// $_SESSION["password"] = $passWord;

  //Contect to DataBase GETTING DATA FROM JSON
  $string = file_get_contents("../../resources/users.json");
  $json = json_decode($string, true);
  $users = $json["users"];
  // var_dump($users);

  //TO CHECK IF USER IS IN DATABASE
    foreach ($users as $user) {
      if($user["name"] === $userName) {
        // echo "user registered";
        if(password_verify($passWord, $user["password"])) {
          //All ok log in
          session_start();
          $_SESSION["username"] = $userName;
          echo "Login Ok";
        } else {
          echo "Invalid Password";
        }
      } else {
        echo "User Not Found";
      }
    }
// "password": "$2y$10$nuh1LEwFt7Q2/wz9/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC",
//  header("Location: ./sessionHelper.php");
}

/**
 * This function must emulate a database user search and return
 * true in case email and password matches
 */
function checkUser()
{
}

/**
 * This function is used to delete session Cookie
 */
function destroySessionCookie()
{
}

/**
 * This function is used to check for login errors
 */
function checkLoginError()
{
}

/**
 * This function is used to check for login information
 */
function checkLoginInfo()
{
}

/**
 * This function is used to check for logout
 */
function checkLogout()
{
}