<!-- TODO Application entry point. Login view -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <style>
        form {
            margin: 100px 25%;
        }

        .btn {
            margin-top: 25px;
        }
    </style>
    <title>Document</title>
</head>

<body class="text-center">
    <main class="form-signin">
        <form method="post" action="./src/library/loginController.php">
            <img class="mb-4" src="./images/logo.png" alt width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <div class="form-floating">
                <input name="user" type="text" class="form-control" id="floatingInput" placeholder="User name" required>
                <label for="floatingInput">Write your user name</label>
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>
            <?php
            switch (true) {
                case (isset($_SESSION["WEmailPass"])):
                    echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>";
                    echo " <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>";
                    echo $_SESSION["WEmailPass"];
                    echo "</div>";
                    break;

                case (isset($_SESSION["WName"])):
                    echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>";
                    echo " <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>";
                    echo $_SESSION["WName"];
                    echo "</div>";
                    break;

                case (isset($_SESSION["WPass"])):
                    echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>";
                    echo " <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>";
                    echo $_SESSION["WPass"];
                    echo "</div>";
                    break;
                case (isset($_SESSION["logout"])):
                    echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>";
                    echo " <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>";
                    echo $_SESSION["logout"];
                    echo "</div>";
                    break;

                default:
                    # code...
                    break;
            }
            ?>
            <button type="submit" class="btn btn-outline-success">submit</button>
        </form>

    </main>

</body>

</html>