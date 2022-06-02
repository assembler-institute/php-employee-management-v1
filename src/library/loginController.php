<?php
session_start();
function login($data){


        $storage = "../../resources/users.json";
        $userinput = $data['username'];
        $passinput = $data['password'];
        $_SESSION['$userinput'] = $userinput;


 $stored_users = json_decode(file_get_contents($storage), true);
    foreach ($stored_users['users'] as $key => $value){

            
            $encPassword = $value['password'];

           
            if ($value['name']== $userinput){

                
                if(password_verify($passinput, $encPassword)){
                    $_SESSION['name'] = $userinput;

            $login = ["success"=>true,'header'=>"http://localhost/employee-management/php-employee-management-v1/src/dashboard.php"];
            return $login;
                
                }else{
            $login = ["success"=>false,'message'=>"Wrong  password"];
            return $login;
                }
            } else {
            
            $login = ["success"=>false,'message'=>"Wrong email or password"];
            return $login;

            }
        }
    }

