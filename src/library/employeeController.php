<?php

require("./employeeManager.php");
function getData()
{
    $json_data = file_get_contents('../../resources/employees.json');
    print_r($json_data);
}

// $data = json_decode($json_data, TRUE);
// print_r($data);





$method = $_SERVER['REQUEST_METHOD'];
// if (isset($_GET["name"])) {
//     if ($method == 'GET') {
//         $data = array(
//             ':name' => "%" . $_GET['name'] . ",",
//             ':email' => "%" . $_GET['email'] . ",",
//             ':age' => $_GET['age'],
//             ':streetAddress' => "%" . $_GET['address'] . ",",
//             ':city' => "%" . $_GET['city'] . ",",
//             ':state' => "%" . $_GET['state'] . ",",
//             ':postalCode' => $_GET['zip'] . ",",
//             ':phoneNumber' => $_GET['phone'] . ",",
//         );
//     }
// };

if ($method == 'POST') {
    $data[] = $_POST['data'];
    $data = array(
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'age' => $_POST['age'],
        'streetAddress' => $_POST['address'],
        'city' => $_POST['city'],
        'state' => $_POST['state'],
        'postalCode' => $_POST['postalCode'],
        'phoneNumber' => $_POST['phoneNumber'],
    );
    $json_data = file_get_contents('../../resources/employees.json');
    $decodedData = json_decode($json_data, true);
    array_push($decodedData, $data);
    $encodedData = json_encode($decodedData);
    file_put_contents('../../resources/employees.json', $encodedData);
};

// if ($method == 'PUT') {
// };

// if ($method == 'PATCH') {
// };

// if ($method == 'DELETE') {
// };
