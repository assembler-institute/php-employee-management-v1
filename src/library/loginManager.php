
<?php
function login($data){
   //Get input data
    $userinput = $data['username'];
    $passinput = $data['password'];
    //Read json data
    $storage = "../../resources/users.json";
    //Decode Json data
    $stored_users = json_decode(file_get_contents($storage), true);
    //Iterate truh all users inside
    foreach ($stored_users['users'] as $key => $value){
        //Get user encrypted password
        //If Json user matches input user check user info
          $encPassword = $value['password'];
          //change it to email
          if ($value['name'] === $userinput){
            //If Json password matches input password start session & send data
            if(password_verify($passinput, $encPassword)){
            //Start session 
            session_start();
            //Declare user session
            $_SESSION['name'] = $userinput;
            //Send login data back to the controller
            $loginData = ["loginSuccess"=>true,'header'=>"http://localhost/employee-management/php-employee-management-v1/src/dashboard.php"];
            return $loginData;
            }
            //If user matches but passowrd don't send login data back to the controller
            else{
            $loginData = ["loginSuccess"=>false,'message'=>"Wrong  password"];
            return $loginData;
            }
            }
            //If user & password dont match send login data back to the controller
            else {
            $loginData = ["loginSuccess"=>false,'message'=>"Wrong email or password"];
            return $loginData;
            }
        }
}

 

