<?php
function login($loginData){
$registredUserData= authUser($loginData);
$alldata= [$loginData, $registredUserData ];
return json_encode($alldata);
}

function authUser($loginData){
    
     $email = $loginData["email"];
    //  $password = $loginData["password"];
    $storage = "../../resources/users.json";
    $stored_users = json_decode(file_get_contents($storage), true);
    $emailDB=$stored_users['users'];
     $data=  $emailDB;
     return $data;
     
}


