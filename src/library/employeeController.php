<?php
require_once("./loginManager.php");
session_start();
if (isset($_SESSION['name'])){
    var_dump($_SESSION['name']);
}