


<?php
/**
 * This file Manager has all the
 * FUnctions to manage Session and log propeerly
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

      // registers the initial time when the session was created
      $_SESSION['startTime'] = $_SERVER['REQUEST_TIME'];

      // keeps a record of the data email of the client and sends to dashboard
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
 * Returns and Array with users
 */
function checkUsersDB(){

      // Read the JSON file
      $json = file_get_contents('../../resources/users.json');

      // Decode the JSON file
      $json_data = json_decode($json,true);

      return $json_data;
}


/**
 * @param email string : email from user loggin
 * @param pass string : pass from user login
 * @return boolean depending on user found and pass match
 */
function checkUser(string $email, string $pass)
{
    $users=checkUsersDB()["users"];
    $emails=[];

    foreach ($users as $key => $value) {
      // value is each array of each user,
      // $value["email"] is every emial from user
     array_push($emails,$value["email"]);
    };

    $userKeyMatch=array_search($email, $emails, true);

    if(isset($userKeyMatch)) $userFound=$users[$userKeyMatch];

    $passDbEncrypted=$userFound["password"];

    // verifyes for correct password
    //*password_hash($passDb, PASSWORD_DEFAULT) its used for encrypt in JSON
    $passMatch=password_verify($pass, $passDbEncrypted);

    if (isset($userKeyMatch) && isset($passMatch)) return true;
    else return false;
}

/**
 * This function must unset all session and cookies variables
 * and also destroy the session itself
 */
function destroySession()
{
  session_start();
  /**
   * Destroy session
   */$expired=false;
    if(isset($_SESSION['expired'])) $expired=true;

    session_unset();

    destroySessionCookie();
    session_destroy();

    if($expired)  header("Location:../../index.php?expired=true");
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

/**
 * This function check in dhashboard if we are logged
 */
function checkLoginDashboard($urlFile){

  if (!isset($_SESSION["email"])) {

    if(isset($_GET["expired"])){
      $_SESSION["errorMessage"]=["status" => "warning", "message" => "Your session have ended"];
    }
    else{
      $_SESSION["errorMessage"] = ["status" => "warning", "message" =>"You don't have permission to enter the dashboard. Please Login."];
    }
    $_SESSION['isRedirecting'] = true ;
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
  if(!isset($_SESSION["email"])) {

    if (isset($_GET["logout"]) ){

      return ["status" => "success", "message" => "You have logged out correctly"];

    } elseif (isset($_GET["expired"])){

      return ["status" => "success", "message" => "Your session have ended"];}
  }
}


function getUserFromEmail($email){

  return explode("@",$email)[0];

}

/**
 * @param email (string) validates a email format from string
 * @return boolean
 */
function validateEmail($email) {

  if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

    return true;

  }
}

