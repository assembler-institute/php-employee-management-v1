<?php
$employees = json_decode(file_get_contents("../resources/employees.json"), false);
print_r($employees); // print array