<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */


// session_start();

function employeeDashboard() {
    $employeesJson = file_get_contents('../../resources/employees.json');
    $employeesDecodedJson = json_decode($employeesJson, true);

    // echo "<pre>";
    // echo "<h3>Array entero</h3>";
    // var_dump($employeesDecodedJson);

    // echo "<h3>2a posición del array</h3>";
    // var_dump($employeesDecodedJson[1]);

    // echo "<h3>id de la 2a posición del array</h3>";
    // echo $employeesDecodedJson[1]["id"]; // 2
    // echo "</pre>";

    foreach ($employeesDecodedJson as $employee) {
        $employeeId = $employee["id"];
        $employeeName = $employee["name"];
        $employeeEmail = $employee["email"];
        $employeeAge = $employee["age"];
        $employeeStreetAdress = $employee["streetAddress"];
        $employeeCity = $employee["city"];
        $employeeState = $employee["state"];
        $employeePostalCode = $employee["postalCode"];
        $employeePhoneNumber = $employee["phoneNumber"];
        ?>
        
        <tr>
            <th scope="row"><?php echo $employeeId ?></th>
            <td><?php echo $employeeName ?></td>
            <td><?php echo $employeeEmail ?></td>
            <td><?php echo $employeeAge ?></td>
            <td><?php echo $employeeStreetAdress ?></td>
            <td><?php echo $employeeCity ?></td>
            <td><?php echo $employeeState ?></td>
            <td><?php echo $employeePostalCode ?></td>
            <td><?php echo $employeePhoneNumber ?></td>
            <td scope="col" title="Remove employee"><a href=""><i class="bi bi-trash3-fill"></i></a></td>
        </tr>

        <?php
    }
} 


// function addEmployee(array $newEmployee)
// {
// // TODO implement it
// }


// function deleteEmployee(string $id)
// {
// // TODO implement it
// }


// function updateEmployee(array $updateEmployee)
// {
// // TODO implement it
// }


// function getEmployee(string $id)
// {
// // TODO implement it
// }


// // function removeAvatar($id)
// // {
// // // TODO implement it
// // }


// function getQueryStringParameters(): array
// {
// // TODO implement it
// }

// function getNextIdentifier(array $employeesCollection): int
// {
// // TODO implement it
// }
