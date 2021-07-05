<?php
function validateLoginData($user, $password){
    $userJson=require("../../resources/users.json");
    $userJsonArray=json_decode($userJson); 
    echo print_r($userJsonArray["users"]);
    //echo nl2br("$user\n$password\n$UserJsonArray");
    
}