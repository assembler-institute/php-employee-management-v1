<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/css/bootstrap.min.css" integrity="sha512-o/MhoRPVLExxZjCFVBsm17Pkztkzmh7Dp8k7/3JrtNCHh0AQ489kwpfA3dPSHzKDe8YCuEhxXq3Y71eb/o6amg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link type="text/css" rel="stylesheet" href="/node_modules/jsgrid/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="/node_modules/jsgrid/jsgrid-theme.min.css" />



    <title>Employee Management</title>
</head>

<body>
    <!------------ Header ------------>
    <?php
    include "../assets/html/header.html";
    ?>



    <!------------ Employee form------------>
    <form class="container" action="" method="post">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="name" id="">
                </div>
                <div class="form-group">
                    <label for="">Email address</label>
                    <input class="form-control" type="email" name="email" id="" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="">City</label>
                    <input class="form-control" type="text" name="city" id="">
                </div>
                <div class="form-group">
                    <label for="">State</label>
                    <input class="form-control" type="text" name="state" id="">
                </div>
                <div class="form-group">
                    <label for="">Postal Code</label>
                    <input class="form-control" type="number" name="postalCode" id="">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Last name</label>
                    <input class="form-control" type="text" name="lastName">
                </div>
                <div class="form-group">
                    <label for="">Gender</label>
                    <select class="form-control" name="gender" id="">
                        <option value="Man">Man</option>
                        <option value="Woman">Woman</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Street Address</label>
                    <input class="form-control" type="text" name="address">
                </div>
                <div class="form-group">
                    <label for="">Age</label>
                    <input class="form-control" type="number" name="age" id="">
                </div>
                <div class="form-group">
                    <label for="">Phone number</label>
                    <input class="form-control" type="tel" name="phone" id="">
                </div>
            </div>
        </div>

    </form>


    <!------------ Footer ------------>
    <?php
    include "../assets/html/footer.html";
    ?>


    <script type="text/javascript" src="/node_modules/jsgrid/jsgrid.min.js"></script>
</body>

</html>