
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
        $encPassword = $value['password'];
        //If Json user matches input user check user info
          //change it to email
          if ($value['name'] === $userinput){
            //If Json password matches input password start session & send data
            if(password_verify($passinput, $encPassword)){
            // Unset all session variables
            unset($_SESSION);
            //Start session 
            session_start();
            //Declare user session
            $_SESSION['user'] = $userinput;
            //Send login data back to the controller
            header("Location: ../dashboard.php");
            }
            //If user matches but passowrd don't send login data back to the controller
            else{
              session_start();
            $_SESSION["loginError"] =  "Wrong  password";
              header("Location: ../../index.php");
            }
          }
          //If user & password dont match send login data back to the controller
          else {
            session_start();
            $_SESSION["loginError"] = "Wrong user or password";
            header("Location: ../../index.php");
            }
        }
}

 

function logout(){
  session_start();
  unset($_SESSION);
  session_destroy();
  header("location: ../../index.php");
}