<?php
require("./loginManager.php");
$userName =$_POST["user"];
$userPassword=$_POST["password"];
validateLoginData($userName,$userPassword);