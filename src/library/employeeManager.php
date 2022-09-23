<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */


// session_start();

function loadAllEmployees(){
    $employeesJson = file_get_contents('../../resources/employees.json');
    return $employeesJson;
}

function addNewEmployee($createdEmployee){ // function addEmployee(array $createdEmployee)

    $employeesJson = file_get_contents('../../resources/employees.json');
    $employeesDecodedJson = json_decode($employeesJson, true);

    // foreach ($employeesDecodedJson as $employee) {
    //     $employeeName = $employee["name"];
    //     $employeeLastName = $employee["lastName"];
    //     $employeeEmail = $employee["email"];
    // }

    // if ($createdEmployee["email"] != $employeeEmail {
        // if ($createdEmployee["name"] != $employeeName && $createdEmployee["lastName"] != $employeeLastName){

        // }
    // }

    $createdEmployee["id"] = end($employeesDecodedJson)["id"] + 1;

    array_push($employeesDecodedJson, $createdEmployee);

    $employeeEncodedJson = json_encode($employeesDecodedJson);
    file_put_contents("../../resources/employees.json", $employeeEncodedJson);

    echo $employeeEncodedJson;
    
    // $employeeEmail = $_POST["employee-email"];
    // return json_encode("Employee email: " . $employeeEmail); //enviar respuesta en formato json.
}

function getEmployee($id){ //(string $id)
    #echo $id;

    // $employeesJson = file_get_contents('../../resources/employees.json');
    $employeesJson = file_get_contents('../resources/employees.json');
    $employeesDecodedJson = json_decode($employeesJson, true);

    foreach ($employeesDecodedJson as $employee) {

        $employeeId = $employee["id"];
        // echo $employeeId;

        if ($id == $employeeId) { # $id = $_GET["action"];
            // echo $id, " es igual a ", $employeeId;
            // echo $employee["name"];

            ?>
                <form class="row g-3 needs-validation" novalidate>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">First name</label>
                        <input type="text" class="form-control" id="validationCustom01" value=<?php echo $employee["name"] ?> required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="validationCustom02" value=<?php echo $employee["lastName"] ?> required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">Email address</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value=<?php echo $employee["email"] ?> required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">Gender</label>
                        <select class="form-select" id="validationCustom04" value=<?php echo $employee["gender"] ?> required>
                            <option selected disabled value="">Choose...</option>
                            <option>Female</option>
                            <option>Male</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">City</label>
                        <input type="text" class="form-control" id="validationCustom03" value=<?php echo $employee["city"] ?> required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label">Street Address</label>
                        <input type="text" class="form-control" id="validationCustom05" value=<?php echo $employee["streetAddress"] ?> required>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label">State</label>
                        <input type="text" class="form-control" id="validationCustom05" value=<?php echo $employee["state"] ?> required>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label">Age</label>
                        <input type="text" class="form-control" id="validationCustom05" value=<?php echo $employee["age"] ?> required>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label">Postal Code</label>
                        <input type="number" class="form-control" id="validationCustom05" value=<?php echo $employee["postalCode"] ?> required>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustom05" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" id="validationCustom05" value=<?php echo $employee["phoneNumber"] ?> required>
                        <div class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn btn-secondary">Return</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            <?php
        }

       
    }
}

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
