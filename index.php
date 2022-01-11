<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php
        require ("assets/html/header.html");
        session_start();
        session_destroy();
    ?>
<form action="src/library/loginManager.php" method="post">
<section class="vh-100" style="background-color: #6a6a6a;">
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

            <h3 class="mb-2">Login to</h3>
            <h3 class="mb-5">Employees Management</h3>
                <div class="form-outline mb-4">
                    <label class="form-label" for="typeEmailX-2">Email</label>
                    <input type="email" id="typeEmailX-2" name="nameLogin" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="typePasswordX-2">Password</label>
                    <input type="password" id="typePasswordX-2" name="namePassword" class="form-control form-control-lg" />
                </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
                <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="form1Example3"
                />
            <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Log in</button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</form>
    <?php
        require ("assets/html/footer.html");
    ?>
</body>
</html>