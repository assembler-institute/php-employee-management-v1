<?php
require_once("./loginManager.php");

if (isset($_GET['logout']) && $_GET['logout']) {
  destroySession();
} else {
  authUser();
}
