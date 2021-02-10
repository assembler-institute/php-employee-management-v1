<?php
//get json file
$JSON = file_get_contents("../../resources/users.json");
//decode to create json array of users
$arrayJSON = json_decode($JSON, true);
//users array
$users = $arrayJSON['users'];

//when submit
if(isset($_POST['submit'])){
  //get email user inserted
  $email = $_POST['email'];
  //get password user inserted
  $password = $_POST['password'];

  //if any of the input fields is empty
  if (empty($email) || empty($password)){
    //redirect to index with error
    header("Location: ../../index.php?error=emptyFields");
    exit();
  }
  //redirect to index with error
  else{
    foreach($users as $user){
      if($email== $user["email"] && password_verify($password, $user["password"])){
        session_start();
        $_SESSION['email'] = $email;
        header("Location: ../../src/dashboard.php");
        
        exit();
      }
      else{
        header("Location: ../../index.php?error=wrongCredentias");
        exit();
      }
    }
  }
}