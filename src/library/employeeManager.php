<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
		 //DB data 
		 $db_Employee = json_decode(file_get_contents('../../resources/employees.json'), true);
		 $last = end($db_Employee);
		 $id = $last['id']; //8
     
		
		 	//Form data
			//*HOW INCREMENT ID WITH FORM DATA?
		  $employee_data = (json_encode($newEmployee));
		
		  $db_Employee[] = array (
			"id" => ++$id,
			"name"=> $_POST["name"],
			"lastName"=> $_POST["lastName"],
			"email"=> $_POST["email"],
			"gender"=> $_POST["gender"],
			"age"=> $_POST["city"],
			"streetAddress"=> $_POST["streetAddress"],
			"city"=> $_POST["state"],
			"state"=> $_POST["age"],
			"postalCode"=> $_POST["postalCode"],
			"phoneNumber"=> $_POST["phoneNumber"]
	   );
    
		$jsonData = json_encode($db_Employee,  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		file_put_contents('../../resources/employees.json', $jsonData);

		//*HOW AVOID REFRESH PAGE AFTER
		header("Location: ../employee.php");
		 
}


function deleteEmployee(string $id)
{


}


function updateEmployee(array $updateEmployee)
{
// TODO implement it
}


function getEmployee(string $id)
{
    $dir = dirname(__DIR__, 2);
    $employeesJson = file_get_contents($dir . '/resources/employees.json');
    $arrayOfEmployees =  json_decode($employeesJson, true);

    // [{id:1, ....},{id:2,.....}]
    
    // for ($i=0; $i <$arrayOfEmployees ; $i++) { 
    //     if($arrayOfEmployees[$i].id === $id){
    //         return $arrayOfEmployees[$i]
    //     }
    // }


}

function getEmployees()
{
    $dir = dirname(__DIR__, 2);
    $employeesJson = file_get_contents($dir . '/resources/employees.json');
    return json_decode($employeesJson, true);
}



function removeAvatar($id)
{
// TODO implement it
}

function callType (){
    if(isset($_GET['call_type']))
{
	$call_type = $_GET['call_type'];

	if($call_type == "dashboard")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'Dashboard',
			'description' => 'Home description',
			'url' => $call_type.'.php' ,
			'data'=> file_get_contents('dashboard.php'),
		));
	}
	else if($call_type == "employee")
	{
        
        // header('employee.php');
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'Employee ',
			'description' => 'Employee',
			'url' => $call_type.'.php',
			'data'=> file_get_contents('employee.php'),
		));
	}
}
}


// function getQueryStringParameters(): array
// {
// // TODO implement it
// }

// function getNextIdentifier(array $employeesCollection): int
// {
// // TODO implement it
// }
