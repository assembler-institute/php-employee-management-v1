<!-- TODO Employee view -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">

    <!-- Dependencies -->
    <script src="../node_modules/jquery/dist/jquery.js"></script>

    <link rel="stylesheet" href="../node_modules/jsgrid/css/jsgrid.css" />
    <link rel="stylesheet" href="../node_modules/jsgrid/css/theme.css" />
    <script type="text/javascript" src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">

    <title>Dashboard</title>
</head>

<body>
    <?php require("../assets/html/header.php") ?>
    <main class="container-fluid d-flex flex-column justify-content-center">
        <h2>Employee form</h2>
        <form class="w-50">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Name</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Your name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Last Name</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Your last name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlSelect1">Gender</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>Man</option>
                        <option>Woman</option>
                        <option>Non-binary</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">City</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Residency city">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Street Address</label>
                    <input type="number" class="form-control" id="inputPassword4" placeholder="Number">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">State</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Residency state">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Age</label>
                    <input type="number" class="form-control" id="inputPassword4" placeholder="Your phone age">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Postal Code</label>
                    <input type="number" class="form-control" id="inputEmail4" placeholder="Your postal code">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Phone</label>
                    <input type="number" class="form-control" id="inputPassword4" placeholder="Your phone number">
                </div>
            </div>

            <button type="submit" class="form-button btn btn-primary">Sign in</button>
            <button type="button" class="form-button btn btn-secondary">Back</button>
        </form>
    </main>
    <?php require("../assets/html/footer.html") ?>

    <!-- Javascript -->
    <script>

    </script>
</body>

</html>