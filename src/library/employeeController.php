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

if ($method == 'GET') {
    $data = array(
        ':name' => "%" . $_GET['name'] . "%",
        ':email' => "%" . $_GET['email'] . "%",
        ':age' => $_GET['age'],
        ':streetAddress' => "%" . $_GET['address'] . "%",
        ':city' => "%" . $_GET['city'] . "%",
        ':state' => "%" . $_GET['state'] . "%",
        ':postalCode' => $_GET['zip'],
        ':phoneNumber' => $_GET['phone'],
    );
};

if ($method == 'POST') {
    $data = array(
        ':name' => "%" . $_POST['name'] . "%",
        ':email' => "%" . $_POST['email'] . "%",
        ':age' => $_POST['age'],
        ':streetAddress' => "%" . $_POST['address'] . "%",
        ':city' => "%" . $_POST['city'] . "%",
        ':state' => "%" . $_POST['state'] . "%",
        ':postalCode' => $_POST['zip'],
        ':phoneNumber' => $_POST['phone'],
    );
    file_put_contents('../../resources/employees.json', $data);
};

if ($method == 'PUT') {
};

if ($method == 'PATCH') {
};

if ($method == 'DELETE') {
};
