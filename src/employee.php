<?php 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../src/library/employeeController.php" method="POST" enctype="multipart/form-data">
        <!-- dynamic id here -->
        <input type="hidden" name="id" id="" value="" placeholder=""> 
        <input type="text" name="name" id="" value="" placeholder="name">
        <input type="text" name="lastName" id="lastName" value="" placeholder="Last Name">
        <input type="email" name="email" id="email" value="" placeholder="email">
        <input type="text" name="gender" id="gender" value="" placeholder="gender">
        <input type="text" name="city" id="city" value="" placeholder="city">
        <input type="text" name="streetAddress" id="streetAddress" value="" placeholder="Street Address">
        <input type="text" name="state" id="state" value="" placeholder="State">
        <input type="text" name="age" id="age" value="" placeholder="Age">
        <input type="text" name="postalCode" id="postalCode" value="" placeholder="Postal Code">
        <input type="text" name="phoneNumber" id="phoneNumber" value="" placeholder="Phone Number">
        <input type="submit" name="submit" name="submit">
    </form>
</body>
</html>