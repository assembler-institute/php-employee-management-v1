<!-- TODO Employee view -->

<?php
require_once('library/loginManager.php');

session_start();

if (!isset($_SESSION['authUserId'])) {
    http_response_code(401);
    header('Location:../index.php');
}

$userId = $_SESSION['authUserId'];
$authUser = getUserById($userId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <title>Employee</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5 px-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">Employee Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="employee.php">Employees</a>
                    </li>
                </ul>
            </div>
            <li class="nav-item d-flex dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $authUser['name'] ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">
                            <i class="bi bi-person me-2"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <form class="dropdown-item" action="library/loginController.php" method="post">
                            <input type="hidden" name="action" value="logout">
                            <i class="bi bi-box-arrow-left"></i>
                            <input class="bg-transparent border-0" type="submit" value="logout"></input>
                        </form>
                    </li>
                </ul>
            </li>
        </div>
    </nav>

    <section class="form-section">
        <h3>User Detail</h3>
        <form id="employee-form" class="row g-3">
            <div class="col-md-6">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName">
            </div>
            <div class="col-md-6">
                <label for="inputLastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="inputLastName">
            </div>
            <div class="col-6">
                <label for="inputEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="user@mail.com">
            </div>
            <div class="col-6">
                <label for="selectGender" class="form-label">Gender</label>
                <select class="form-control" id="SelectGender">
                    <option>Man</option>
                    <option>Women</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <label for="inputAge" class="form-label">Age</label>
                    <input type="text" class="form-control" id="inputAge">
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">State</label>
                <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">Street Address</label>
                <input type="text" class="form-control" id="inputAddress">
            </div>
            <div class="col-md-6">
                <label for="inputPhone" class="form-label">Phone number</label>
                <input type="text" class="form-control" id="inputPhone">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    </section>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        <?php if (isset($_GET['id'])) : ?>
            // Here Update code
        <?php else : ?>
            $('#employee-form').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(document.querySelector('#employee-form'))
                console.log(formData);

                // const name = $(this).find('#inputName'),
                //     lastName = $(this).find('#inputLastName'),
                //     email = $(this).find('#inputEmail'),
                //     gender = $(this).find('#SelectGender'),
                //     age = $(this).find('#inputAge');

                // const city = $(this).find('#inputCity');
                // const state = $(this).find('#inputState');
                // const zip = $(this).find('#inputZip');

                // $.ajax({
                //     url: "src/library/loginController.php",
                //     type: "post",
                //     dataType: "json",
                //     data: {
                //         'action': 'login',
                //         'email': email.val(),
                //         'password': pass.val(),
                //     },
                //     success: function(data, status) {
                //         window.location.reload();
                //     },
                //     error: function(xhr, status, error) {
                //         let err = JSON.parse(xhr.responseText);
                //         $('#login-error').addClass('show');
                //         $('.msg-login').text(err.message);
                //     }
                // })
            })
        <?php endif; ?>
    </script>
</body>

</html>