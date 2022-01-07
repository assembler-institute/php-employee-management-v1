<?php

require_once("./loginManager.php");

readAllUsers($_POST["email"], $_POST["password"]);

?>