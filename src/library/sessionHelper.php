
<?php
// This file will check that the user session is still active and if not, you must call the corresponding function of "loginManager.php" to logout the user.
// In the event that the user remains more than 10 minutes in the session, the user will have to be logged out.

session_start();
/*
* If a key its pressed or mouse moved then it puts to cero a count down, like a set timeout. We can do it in jvs.
* if the timer gets to 10 mins triggers and AJAX that ejectures a php file that ends session and redirects to index.
*/
require_once ("loginManager.php");
/**
* This functions calculates Session Time
* @param initialTime (int )time when the session was initialized
* @return sessionTimer (int) - returns time of the session in ms
**/
function timer(int $intialTime){
    $sessionTimer = $_SERVER['REQUEST_TIME'] - $intialTime;
    return $sessionTimer;
  };

/**
* This functions sets a timeout that if achieved sends a form to the client
* @param initialTime (int )time when the session was initialized
* @return sessionTimer (int) - returns time of the session in ms
**/
function initializeTimer(){
  // time when session was created
  return date('Y-m-d H:i:s', $_SESSION['startTime']);
};

// send initial session time
if(filter_input(INPUT_POST,'json_getTime')){

  $json = filter_input(INPUT_POST,'json_getTime');
  $decoded_json = json_decode($json);
  $start = $decoded_json->start;

  if($start) echo json_encode(initializeTimer());

}

// if event on client timer to zero
if (filter_input(INPUT_POST,'json_endSession')){

  $jsonEnd = filter_input(INPUT_POST,'json_endSession');
  $decoded_jsonEnd = json_decode($jsonEnd);
  $end_session = $decoded_jsonEnd->end_session;

  if($end_session) {
    $_SESSION['expired'] = true;
    destroySession();
  }
}


if(isset($_GET["expired"]) && $_GET["expired"]) destroySession();




