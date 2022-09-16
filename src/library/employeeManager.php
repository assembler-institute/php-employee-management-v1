<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */


//  session_start();

function employeeDashboard() {
    $employeesJson = file_get_contents('../../resources/employees.json');
    $decodedJson = json_decode($employeesJson, true);

    foreach ($decodedJson as $employee) {
        $employeeId = $employee["id"];
        $employeeName = $employee["name"];
        $employeeEmail = $employee["email"];
        $employeeAge = $employee["age"];
        $employeeStreetAdress = $employee["streetAdress"];
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
