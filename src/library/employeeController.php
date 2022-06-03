<?php 
require('./employeeManager.php');

$req = $_SERVER['REQUEST_METHOD'];

    $db = getQueryStringParameters(); 
    echo json_encode($db);



if($req == 'DELETE') {
    $inputdata = file_get_contents("php://input");
    $data = json_decode($inputdata);

    deleteEmployee($data);

}

if ($req == "POST" && ($_POST["id"] == "")) {
 addEmployee($_POST);
 header("Location: .././dashboard.php");
} else  {
    echo "update emp";
}

switch ($req) {
    case $req == 'DELETE': 
        $inputdata = file_get_contents("php://input");
        $data = json_decode($inputdata);
    
        deleteEmployee($data);
    case $req == 'POST': 
        if($_POST["id"] == "") {
            addEmployee($_POST);
            header("Location: .././dashboard.php");
            break;
        } else {
            return;
        }
}
