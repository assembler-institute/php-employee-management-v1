


<?php
// This file will contain the necessary functions so that the user can log in, save their session data and log out.

/**
 * This function must first check where are we
 *
 * If we are on index and we are already logged it must redirect
 * to the dashboard, if not it must check for login errors, login info or logouts
 *
 * If we are on dashboard it must check that we are already logged, if not
 * it must redirect us to the index and show an error
 */

/**
 * Checks state of session
 * @return alert if session has ended || redirects in case its needed.
 *
 */
function checkSession() {
  # check where we are in base of the URI
    $urlFile = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

      if ($urlFile === "index.php") {

          if (isset($_SESSION["email"])) {
            header("Location: ./src/dashboard.php");
        } else {
            // Check for session error
            if ($alert = checkLoginError()) return $alert;

            // Check for logout
            if ($alert = checkLogout()) return $alert;
        }
        # else if the file is dashboard.php
      } else {

        checkLoginDashboard($urlFile);

        }

}


/**
 * This function must get input form values and check them
 * If user is correct we must redirect user to the private area
 */
function authUser()

{
  $email = $_POST["email"];
  $pass = $_POST["pass"];

  if(validateEmail($email)){

    if (checkUser($email, $pass)) {

      $_SESSION["email"] = $email;
      header("Location: ../dashboard.php");

    } else {
      $_SESSION["errorMessage"] = "Email or Password error. Please try Again";
      header("Location:../../index.php");
    }

  } else {
    $_SESSION["errorMessage"] = "Email format error";
      header("Location: ../../index.php");
  }

}

/**
 * This function must emulate a database user search and return
 * true in case email and password matches
 * @param
 */
function checkUser(string $email, string $pass)

{
    //traer de JSON
    $emailDb = "admin@assemblerschool.com";
    $passDb = "123456";

    $passDbEnc = password_hash($passDb, PASSWORD_DEFAULT); //traer de JSON

    if ($email === $emailDb && password_verify($pass, $passDbEnc)) return true;

    else return false;
}

/**
 * This function must unset all session and cookies variables
 * and also destroy the session itself
 */
function destroySession()
{


  /**
   * Destroy session
   */
  session_start();
  session_unset();

  destroySessionCookie();
  session_destroy();


  header("Location:../../index.php?logout=true");


}

/**
 * This function is used to delete session Cookie
 */
function destroySessionCookie()
{
  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 90000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}
}

/**
 * This function is used to check for login errors
 */
function checkLoginError()
{
  if (isset($_SESSION["errorMessage"])) {

    $errorText = $_SESSION["errorMessage"];

    # delete the var from the session
    unset($_SESSION["errorMessage"]);

    return ["status" => "warning", "message" => $errorText];
}

}

function checkLoginDashboard($urlFile){

  if (!isset($_SESSION["email"])) {
    $_SESSION["errorMessage"] = ["status" => "warning", "message" =>"You don't have permission to enter the dashboard. Please Login."];
    $_SESSION['isRedirecting']= true ;
    $_SESSION['prevPage'] = $urlFile;
    header("Location: ../index.php");
  }
}

function checkRedirection(){

  unset($_SESSION['isRedirecting']);
  unset($_SESSION['prevPage']);

  $error= $_SESSION["errorMessage"];
  unset($_SESSION["errorMessage"]);


  return $error;

}


function checkLogout()
{
  if (isset($_GET["logout"]) && !isset($_SESSION["email"]))

  return ["status" => "success", "message" => "You have logged out correctly"];
}

function getUserFromEmail($email){

  return explode("@",$email)[0];

}

function validateEmail($email) {

  if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

    return true;

  }
}

