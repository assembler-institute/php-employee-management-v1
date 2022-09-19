<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

    function addEmployee(array $newEmployee){
    // TODO implement it
        
    }


    function deleteEmployee(string $id){
    // TODO implement it
    }


    function updateEmployee(array $updateEmployee){
    // TODO implement it
    }


    function getEmployee(string $id){
    // TODO implement it
        $employees = json_decode(file_get_contents('../../resources/employees.json'), true);
        foreach ($employees as $employee){
            if (strval($employee['id']) === $id){
                return $employee;
            }
        }
        return $employees;
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
