<?php

if(isset($_POST["thereArefotos"])) {
	print_r(getUserImages());

}

function getUserImages () {
	session_start();
	$BASE_URL = $_SESSION["BASE_URL"];
  $imagesData = file_get_contents($BASE_URL . "/resources/images_mock.json");
	return $imagesData;
}