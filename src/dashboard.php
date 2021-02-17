<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/employee.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/error.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include_once("./library/sessionHelper.php");

        session_start();
        $sessionStart = $_SESSION["start"];
        $sessionDuration = $_SESSION["duration"];
        $sessionTime = time() - $sessionStart;

        if(!isset($_SESSION["id"])){
            header("Location: ../index.php");
        }
        else {
            closeUserSession($sessionTime, $sessionDuration);
        }
    ?>
    <header class="header">
        <section class="title">
            <h4>Employees Manager</h4>
        </section>
        <ul class="nav-links">
            <li>
                <a href="http://127.0.0.1/php-employee-management-v1/src/library/loginController.php?logout='true'">Login</a>
            </li>
            <li>
                <a href="http://127.0.0.1/php-employee-management-v1/src/dashboard.php">Dashboard</a>
            </li>
            <li>
                <a href="http://127.0.0.1/php-employee-management-v1/src/employee.php?userId=<?=$userId?>">Employee</a>
            </li>
        </ul>

        <section class="searchBar-container">
            <form class="searchBar" action="" method="get">
                <input id="headerSearch" class="searchBar__input" type="text" name="searchValue" required>
                <button class="searchBar__submit" id="searchBtn" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </section>
        <section class="logout-container">
            <a href="http://127.0.0.1/php-employee-management-v1/src/library/loginController.php?logout='true'"><button class="logoutBtn" id="logout"> Log Out </button></a>
        </section>
    </header>
    <?php include_once("./jsgrid.php"); ?>
    <script src="assets/js/createGrid.js"></script>
    <script src="../assets/js/getEmployeeId.js"></script>
</body>
</html>
