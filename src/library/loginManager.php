<?php

if ($_SERVER['REQUEST_METHOD']==='POST') {
if(isset($_POST)){
        $username= $_POST['username'];
        $password=$_POST['password'];
       if ($username=="" || $password==""){
       echo json_encode("null");
   } else{
       require_once("./loginManager.php");
       
       echo json_encode("ull");
    }}}



