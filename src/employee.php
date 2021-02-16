<!-- TODO Employee view -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <form action="/src/library/employeeController.php" method="post">
        <label for="name"></label>
        <input type="text" name="name">
        <label for="lastname"></label>
        <input type="text" name="lastname">
        <label for="email"></label>
        <input type="email" name="email">
        <label for="city"></label>
        <input type="text" name="city">
        <label for="streetAddress"></label>
        <input type="text" name="streetAddress">
        <label for="state"></label>
        <input type="text" name="state">
        <label for="age"></label>
        <input type="number" name="age">
        <label for="postalCode"></label>
        <input type="number" name="postalCode">
        <label for="phoneNumber"></label>
        <input type="number" name="phoneNumber">
        <input type="submit">
    </form>
    <?php
        
    ?>
</body>
</html>
<?php

?>