<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */
    function addEmployee(array $newEmployee){
        $employees = json_decode(file_get_contents('../../resources/employees.json'), true); 
        $newEmployee["id"] = $employees[count($employees) - 1]['id'] + 1;       
        $newEmployeeFinal = (object) $newEmployee;
        array_push($employees, $newEmployeeFinal);
        file_put_contents('../../resources/employees.json', json_encode($employees));
        echo json_encode($employees);  
    }

    function deleteEmployee(string $id){
        $employees = json_decode(file_get_contents('../../resources/employees.json'), true);
        for($i = 0; $i < count($employees); $i++){
            if(strval($employees[$i]['id']) === $id) {
                $employeePos = array_search($employees[$i], $employees);
                array_splice($employees, $employeePos, 1);
            }
            file_put_contents('../../resources/employees.json', json_encode($employees));
        }
        echo json_encode($employees);
    }


    function updateEmployee(array $updateEmployee){
        $employees = json_decode(file_get_contents('../../resources/employees.json'), true); 
        for ($i = 0; $i < count($employees); $i++) {
            if ($employees[$i]["id"] == $updateEmployee["id"]){
                $employees[$i]['name']           = $updateEmployee['name'];
                $employees[$i]['lastName']       = $updateEmployee['lastName'];
                $employees[$i]['email']          = $updateEmployee['email'];
                $employees[$i]['gender']         = $updateEmployee['gender'];
                $employees[$i]['city']           = $updateEmployee['city'];
                $employees[$i]['streetAddress']  = $updateEmployee['streetAddress'];
                $employees[$i]['state']          = $updateEmployee['state'];
                $employees[$i]['age']            = $updateEmployee['age'];
                $employees[$i]['postalCode']     = $updateEmployee['postalCode'];
                $employees[$i]['phoneNumber']    = $updateEmployee['phoneNumber'];
            }
            file_put_contents('../../resources/employees.json', json_encode($employees));
            header('Location: ../dashboard.php');
        }
    }

    function getEmployee(string $id){
    // TODO implement it
        $employees = json_decode(file_get_contents('../resources/employees.json'), true);
        foreach ($employees as $employee){
            if (strval($employee['id']) === $id){
                $id            = $employee['id'];
                $name          = $employee['name'];
                $lastName      = $employee['lastName'];
                $email         = $employee['email'];
                $gender        = $employee['gender'];
                $city          = $employee['city'];
                $streetAddress = $employee['streetAddress'];
                $state         = $employee['state'];
                $age           = $employee['age'];
                $postalCode    = $employee['postalCode'];
                $phoneNumber   = $employee['phoneNumber'];

                function selectGender($g) {
                    switch ($g) {
                        case 'man':
                            $op = <<<op
                                <option value="man" selected>Man</option>
                                <option value="woman">Woman</option>
                                <option value="other">Other</option>
                            op;
                            return $op;
                            break;
                        case 'woman':
                            $op = <<<op
                                <option value="man">Man</option>
                                <option value="woman" selected>Woman</option>
                                <option value="other">Other</option>
                            op;
                            return $op;
                            break;
                        case 'other':
                            $op = <<<op
                                <option value="man">Man</option>
                                <option value="woman">Woman</option>
                                <option value="other" selected>Other</option>
                            op;
                            return $op;
                            break;
                    };
                }

                $options = selectGender($gender);

                $form = <<<form
                <form class="mt-3" action="library/employeeController.php?action=update&id=$id" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="$name" required>
                        </div>
                        <div class="col-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="$lastName" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" value="$email" name="email" required>
                        </div>
                        <div class="col-6">
                            <label for="gender" class="form-label">Gender</label>
                            <div>
                            <select name="gender" id="gender" required>
                                $options
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" value="$city" name="city" required>
                        </div>

                        <div class="col-6">
                            <label for="address" class="form-label">Street Address</label>
                            <input type="text" class="form-control" id="address" value="$streetAddress" name="address" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" value="$state" name="state" required>
                        </div>

                        <div class="col-6">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" value="$age" name="age" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="postalCode" class="form-label">Postal Code</label>
                            <input type="number" class="form-control" id="postalCode" value="$postalCode" name="postalCode" required>
                        </div>

                        <div class="col-6">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phoneNumber" value="$phoneNumber" name="phoneNumber" required>
                        </div>
                    </div>

                    <div class="modal-footer mt-4 btns-box">
                        <input id="submit" value="Update Employee" type="submit" class="btn btn-primary">
                        <button class="btn btn-secondary"><a href="../src/dashboard.php">Return</a></button>
                    </div>
                </form>
                form;
                echo $form;
            }
        }
    }

    function removeAvatar($id){
    // TODO implement it
    }

    function getQueryStringParameters():array{
    // TODO implement it
    }

    function getNextIdentifier(array $employeesCollection):int{
    // TODO implement it
    }

    function printEmployees() {
        $employees = json_decode(file_get_contents('../../resources/employees.json'), true);        
        echo json_encode($employees);
    }