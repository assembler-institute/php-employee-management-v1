<?php
require_once "./loginManager.php";


if (isset($_POST["submitLogin"])) {
    $path = "../../resources/users.json";
    checkUser($path);
}

if (isset($_POST["logout"])) {
    sessionlogout("Location:../../index.php");
}


//     if (isset($_POST['submitForm'])) {
//     $seemail= recorrer("../resources/employees.json", $_POST['email']);
//     if (isset($_GET['id']) ) {
//         if($_POST["lastName"] != " " && $_POST["radio"] != " "){
//             updateEmployee($_POST, "../resources/employees.json");
//         }
//         print_r($_POST);
//     } else if($seemail){
//         echo "this email is already in use";
//     }else{
//         addEmployee("../resources/employees.json");
//         header("Location:./dashboard.php");
//     }
// }
// if(isset($_POST['Cancel'])){
//     header("Location:./dashboard.php");
// }

?>

