<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<h2> Welcome: <?php echo $_SESSION['usermail'] ?></h2>
</body>
</html>