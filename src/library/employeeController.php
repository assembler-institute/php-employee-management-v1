<?php

require('employeeManager.php');

switch ($_SERVER['REQUEST_METHOD']) {
  case "GET":
      echo getEmployeesData();
  break;

  case 'post':
    
  break;

  case "delete":
    echo deleteEmployee($id);
  break;
}


























// if (isset($_SERVER['REQUEST_METHOD']))
//   {
//     switch ($_SERVER['REQUEST_METHOD'])
//     {
//       case 'GET':
//         if(isset($_REQUEST['employeeList'])) {
//           echo getEmployeesData();
//         }
//       case 'PUT':
//         if ('application/x-www-form-urlencoded' === $this->getContentType())
//         {
//           parse_str($this->getContent(), $request_vars );
//         }
//         break;
//       case 'DELETE':
//         if ('application/x-www-form-urlencoded' === $this->getContentType())
//         {
//           parse_str($this->getContent(), $request_vars );
//         }
//         break;
//     }
// }