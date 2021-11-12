<?php
require_once("./sessionHelper.php");

if (isset($_GET['logout']) && $_GET['logout']) {
  destroySession();
} else {
  authUser();
}
