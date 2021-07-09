<?PHP
require_once('loginManager.php');
if(!isset($_SESSION)){
     session_start();
}
if (isset($_GET["destroyUpdate"]) && $_GET["destroyUpdate"] == true){
     unset($_SESSION["employeeUpdate"]);
     unset($_SESSION['newEmployee']);
     header("Location: ../employee.php");
}

function destroySessions(){
     session_destroy();
     header('Location: ../index.php?sessionExpired=true');
}

function checkExpiredSession(){

     if(isset($_SESSION["timeout"])){
          $sessionTimeForAlfonso = time() - $_SESSION["timeout"];
          if($sessionTimeForAlfonso >120){
               logOut();
          }
     }
}

function initSessionTime(){
     $_SESSION["timeout"] = time();
     header("Location: ../dashboard.php?login=success");
}
