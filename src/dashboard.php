<?php
session_start();
if (!isset($_SESSION['name'])) {
  header('location: .././index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="../assets/js/index.js" defer></script>
  <link href="../assets/css/main.css" rel="stylesheet">
  <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" type="module"></script> -->
  <title>Document</title>
</head>

<body>
  <div class="container">
    <table class="table" id="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Age</th>
          <th scope="col">Street No</th>
          <th scope="col">City</th>
          <th scope="col">State</th>
          <th scope="col">Postal Code</th>
          <th scope="col">Phone Number</th>
          <th scope="col">
            <button id='addNewEmp'>
              <!--<a>href="./employee.php">+</a>-->+
            </button>
          </th>
        </tr>
      </thead>
      <tbody id='table-body'>
        <tr id="addEmployeeForm" class="toggle">
          <!-- <form action="./library/employeeController.php" method="POST" enctype="multipart/form-data"> -->
          <form id="addEmpForm" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="" placeholder="">
          <td><input type="text" name="name" id="name" value="" placeholder="name"></td>
          <td><input type="email" name="email" id="email" value="" placeholder="email"></td>
          <td><input type="text" name="age" id="age" value="" placeholder="Age"></td>
          <td><input type="text" name="streetAddress" id="streetAddress" value="" placeholder="Street Address"></td>
          <td><input type="text" name="city" id="city" value="" placeholder="city"></td>
          <td><input type="text" name="state" id="state" value="" placeholder="State"></td>
          <td><input type="text" name="postalCode" id="postalCode" value="" placeholder="Postal Code"></td>
          <td><input type="text" name="phoneNumber" id="phoneNumber" value="" placeholder="Phone Number"></td>
          <td><input type="submit" value="Crear" id="createEmpButton"></td>
          </form>
        </tr>
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

