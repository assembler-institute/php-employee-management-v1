<?php

function checkSession()
{
  // We check if user has no session, and if so, we redirect to index
  if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
  }
}

function checkSessionToDashboard()
{
  // We check if user already is logged, and if so, we redirect to dashboard
  session_start();
  if (isset($_SESSION['username'])) {
    header("Location: ./src/dashboard.php");
  }
}

function logOut($caller)
{
  session_start();

  unset($_SESSION);

  if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
      session_name(),
      '',
      time() - 60000,
      $params["path"],
      $params["domain"],
      $params["secure"],
      $params["httponly"]
    );
  }

  session_destroy();

  if ($caller === "logOutBtn") {
    header("Location: ../../index.php?status=loggedOut");
  } elseif ($caller === "sessionTimeOut") {
    header("Location: ../index.php?status=sessionTimeOut");
  }
}

function checkSessionExpired()
{
  if (isset($_SESSION)) {
    $initTime = $_SESSION['initTime']; // What time did we started the session
    $duration = $_SESSION['duration']; // How much time do we want our session to stay active
    $currentTime = time();

    if (isset($_SESSION) && (($currentTime - $initTime) > $duration)) {
      logOut("sessionTimeOut");
    }
  }
}
