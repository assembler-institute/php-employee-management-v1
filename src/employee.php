<!-- TODO Employee view -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>Employee Data</title>
</head>

<body>
    <header>
        <?php
        require_once("../assets/html/header.html")
        ?>
    </header>
    <main class="container p-5">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" id="inputName" placeholder="First Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputLastName">Last Name</label>
                    <input type="text" class="form-control" id="inputLastName" placeholder="Last Name">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="someone@somewhere.com">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputGender">Gender</label>
                    <select id="inputGender" class="form-control">
                        <option selected>Choose...</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAge">Age</label>
                    <input type="number" class="form-control" id="inputAge">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPhone">Phone Number</label>
                    <input type="text" class="form-control" id="inputPhone">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Street Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Street, Apartment, studio, or floor">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">State</label>
                    <input type="text" class="form-control" id="inputState">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputZip">Zip Code</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>


            </div>



            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary">Return</button>
        </form>
    </main>
</body>

</html>