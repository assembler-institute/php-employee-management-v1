<?php

if ($_SERVER['REQUEST_METHOD']==='POST') {
if(isset($_POST)){
    $email= $_POST['email'];
    $password=$_POST['password'];
    $data=[$email,$password];

    
 if ($email=="" || $password==""){
     echo json_encode("null");
} else{
    require_once("./loginController.php");
    $data= login($_POST);
echo $data;
 }
}}



