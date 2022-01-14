<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */


//todo PHP function to add employee in employee.json
function addEmployee($path)
{

    //todo this is used to work with json files, to find the path
    //todo to access the content and decode to work
    $file = $path;
    $Allusers = file_get_contents($file);
    $usersAll = json_decode($Allusers);

    //todo create a new array with id
    foreach ($usersAll as $user) {
        $arraya[] = $user->id;
    }

    //todo find the last id and sum 1
    $newid = max($arraya) + 1;

    //todo if add employee from the table you don't have this fields
    if ($_POST['radio'] ==  null) {
        $radiocheck = ' ';
    } else {
        $radiocheck = $_POST['radio'];
    }

    if ($_POST['lastName'] == null) {
        $lastName = ' ';
    } else {
        $lastName = $_POST['lastName'];
    };

    //todo to works in employee page and dashboard
    //todo we pass all data one by one
    $myJson = array(
        'id'   =>   $newid,
        'name'   =>   $_POST['name'],
        'lastName'   =>  $lastName,
        'email'   =>  $_POST['email'],
        'gender'   =>   $radiocheck,
        'age'   =>  intval($_POST['age']),
        'streetAddress'   =>   $_POST['streetAddress'],
        'city'   =>  $_POST['city'],
        'state'   =>  $_POST['state'],
        'postalCode'   =>   $_POST['postalCode'],
        'phoneNumber'   =>  $_POST['phoneNumber']
    );

    //todo add new employee in the array encode this array
    //todo and save in the path specify
    array_push($usersAll, $myJson);
    $otra = json_encode($usersAll);
    file_put_contents($file, $otra);
};


//todo function to delete employee
function deleteEmployee($id, $path)
{

    $file = $path;
    $Allusers = file_get_contents($file);
    $usersAll = json_decode($Allusers);

    foreach ($usersAll as $user) {
        if ($user->id != $id) {
            $newUser[] = $user;
        } else {
            echo 'this is the user Deleted <br>';
        };
    }
    $newJson = json_encode($newUser);
    file_put_contents($file, $newJson);
}


//todo Function to update data to employee
function updateEmployee(array $updateEmployee, $path)
{
    $file = $path;
    $Allusers = file_get_contents($file);
    $usersAll1 = json_decode($Allusers);

    //todo to works in employee page and dashboard
    //todo we pass all data one by one

    foreach ($usersAll1 as $user) {
        if ($_GET['id'] == $user->id) {
            $user->id = $_GET['id'];
            $user->name = $updateEmployee["name"];
            $user->lastName = $updateEmployee["lastName"];
            $user->email   = $updateEmployee["email"];
            $user->gender = $updateEmployee["radio"];
            $user->streetAddress = $updateEmployee["streetAddress"];
            $user->postalCode = $updateEmployee["postalCode"];
            $user->phoneNumber = $updateEmployee["phoneNumber"];
            $user->age = $updateEmployee["age"];
            $user->state = $updateEmployee["state"];
            $user->city = $updateEmployee["city"];
            header("Location: ./dashboard.php");
        }

        //todo push into a array
        $customers[] = $user;
    }

    //todo search for the data with teh same id
    if ($updateEmployee["id"]) {
        $customers = [];
        foreach ($usersAll1 as $user) {
            //todo when find upadte all data
            if ($user->id == $updateEmployee["id"]) {
                $user = $updateEmployee;
            }

            //todo push into array
            $customers[] = $user;
        }
        $newinfo = json_encode($customers);
        file_put_contents($file, $newinfo);
    }
    //todo encode and save
    $newinfo = json_encode($customers);
    file_put_contents($file, $newinfo);
}

//todo function to charge all data defined by id
//todo get all sata and fill the form
function getEmployee(string $id, $path)
{
    $file = $path;
    $Allusers = file_get_contents($file);
    $usersAll1 = json_decode($Allusers);

    foreach ($usersAll1 as $user) {

        if ($id == $user->id) {
            define("name", $user->name);
            define("nmeLast", $user->lastName);
            define("email", $user->email);
            define("gender", $user->gender);
            define("streetAdress", $user->streetAddress);
            define("city", $user->city);
            define("postalCode", $user->postalCode);
            define("phoneNumber", $user->phoneNumber);
            define("age", $user->age);
            define("state", $user->state);
        }
    }
}


function removeAvatar($id)
{
    // TODO implement it
}

//todo Function to return if have email used
function recorrer($path, $post)
{
    $file = $path;
    $Allusers = file_get_contents($file);
    $usersAll = json_decode($Allusers);
    foreach ($usersAll as $user) {
        if ($user->email == $post) {
            //todo if have teh email return true
            return true;
        }
    }
}
?>