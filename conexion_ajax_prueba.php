<?php
session_start();
$data = file_get_contents("resources/employees.json");
$employees = json_decode($data, true);
$_SESSION["listEmployees"] = $employees;


// This is the echo for the fields

$listEmployees = $_SESSION['listEmployees'];
foreach ($listEmployees as $key => $list){
        echo "Name-->".$list['name'].'<br>';
        echo "lastName-->".$list['lastName']."<br>";
        echo "email-->".$list['email']."<br>";
        echo "gender-->".$list['gender']."<br>";
        echo "city-->".$list['city']."<br>";
        echo "streetAddress-->".$list['streetAddress']."<br>";
        echo "state-->".$list['state']."<br>";
        echo "age-->".$list['age']."<br>";
        echo "postalCode-->".$list['postalCode']."<br>";
        echo "phoneNumber-->".$list['phoneNumber']."<br>";
        echo "<hr>";
    }
?>