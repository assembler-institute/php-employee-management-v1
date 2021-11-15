
<?php
// This file will check that the user session is still active and if not, you must call the corresponding function of "loginManager.php" to logout the user.
// In the event that the user remains more than 10 minutes in the session, the user will have to be logged out.

session_start();
/*
* If a key its pressed or mouse moved then it puts to cero a count down, like a set timeout. We can do it in jvs.
* if the timer gets to 10 mins triggers and AJAX that ejectures a php file that ends session and redirects to index.
*/

/**
* This functions calculates Session Time
* @param initialTime (int )time when the session was initialized
* @return sessionTimer (int) - returns time of the session in ms
**/
function timer(int $intialTime){
    $sessionTimer = time() - $intialTime;
    return $sessionTimer;
  };

/**
* This functions sets a timeout that if achieved sends a form to the client
* @param initialTime (int )time when the session was initialized
* @return sessionTimer (int) - returns time of the session in ms
**/

function initializeTimer(){

}

$checkIn = $_SESSION['startTime'];

if(isset($checkIn) && $checkIn){
  echo timer($checkIn);
};

// poner contador a cero. si el js por evento recibe un movimiento
// la session debería vovler a cero



//if logout
if($_GET["logout"]) destroySession();
