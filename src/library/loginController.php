<?php
//Check the request mmethod
if ($_SERVER['REQUEST_METHOD']==='POST') {



    
if(isset($_POST['username']) && isset($_POST['password'])){
        $username= $_POST['username'];
        $password=$_POST['password'];
       if ($username=="" || $password==""){
        $loginData = ["loginSuccess"=>false,'message'=>"Fill up the form"];
        echo json_encode($loginData);
   } else{
       require_once("./loginManager.php");
       $loginData=login($_POST);
       echo json_encode($loginData);
    }}

    
// if (isset($_POST['session'])) {
//     $loginData = ["loginSuccess"=>true,'header'=>"http://localhost/employee-management/php-employee-management-v1/src/dashboard.php"];
//     echo json_encode($loginData);
//     }
//     else{
//    $loginData = ["success"=>false,'header'=>"http://localhost/employee-management/php-employee-management-v1/",'message'=>"You need to login"];
//     echo json_encode($loginData);
// }
// }

}





