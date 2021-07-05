<?php

function login($a, $b){
     $data = file_get_contents("../../resources/users.json");
     $admin = json_decode($data, true);

     $adEmail = $admin['users'][0]['email'];
     $adPass = $admin['users'][0]['password'];

     if($a === $adEmail){
          echo "somos el mismo correo<br>";
          if(password_verify($b, $adPass)){
               echo "somos la misma pass<br>";
               session_start();
               $_SESSION["user"] = $admin['users'][0]['name'];
               header("Location: ../dashboard.php?login=success");
               exit();
          }else{
               header("Location: ../../index.php?error=invalidpwd");
               exit();
          }
     }else{
          header("Location: ../../index.php?error=invaliduser");
          exit();
     }
}

function logOut(){
     
}