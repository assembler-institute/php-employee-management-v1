<?php 
require('./employeeManager.php');

$req = $_SERVER['REQUEST_METHOD'];

    $db = getQueryStringParameters(); 
    echo json_encode($db);



// if($req == 'DELETE') {
//     $inputdata = file_get_contents("php://input");
//     $data = json_decode($inputdata);

//     deleteEmployee($data);

// }

// if ($req == "POST" && ($_POST["id"] == "")) {
//  addEmployee($_POST);
//  header("Location: .././dashboard.php");
// } else  {
//     echo "update emp";
// }

switch ($req) {
    case $req == 'DELETE': 
        $inputdata = file_get_contents("php://input");
        $data = json_decode($inputdata);
    
        deleteEmployee($data);
        break;
    case $req == 'POST': 

        $inputdata = file_get_contents("php://input");
        $data = json_decode($inputdata, true);

        var_dump($data);

        if(isset($data['id'])){
            echo "CREADO";
            addEmployee($data);
            break;
        }

        if($_POST['id'] != ''){
            echo "ACTUALIZADO";
            updateEmployee($_POST);
            header('location: .././dashboard.php');
        }

    case $req == 'GET':
        if(isset($_GET['id'])){
            header('Location: .././employee.php?id='.$_GET['id'].'');
        }
}
