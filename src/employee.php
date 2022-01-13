<!-- TODO Employee view -->
<?php
session_start();
if($_SESSION["email"]){
    $userName=$_SESSION["email"];
}
else header("Location: ../index.php") ;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <?php
    include("../assets/html/header.php")
    ?>
    <?php
    if(isset($_GET["id"])){
    $file = "../resources/employees.json";
    $Allusers = file_get_contents($file);
    $userAll = json_decode($Allusers);
    foreach ($userAll as $users) {
        // foreach($users as $user){
        if ($users->id == $_GET["id"]) {

            ?>

    <div class="container mt-5">
        <form role="form" action="library/employeeController.php" method="post">
            <div class="row">
                <div class="form-group col">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" id="inputName" placeholder="Name" value=<?php if(isset($users->name)){
                        echo $users->name;
                    } 
                    ?>>
                </div>
                <div class="form-group col">
                    <label for="inputLastName">Last Name</label>
                    <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" value=<?php if(isset($users->lastName)){
                        echo $users->lastName;
                    } 
                    ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="inputEmail">Email Address</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email Address" value=<?php if(isset($users->email)){
                        echo $users->email;
                    } 
                    ?>>
                </div>
                <div class="form-group col">
                    <label for="inputGender">Gender</label>
                    <select id="inputGender" name="inputGender" class="form-control">
                        <?php 
                        if(isset($users->gender))
                        {
                            if($users->gender=="Male")
                            {
                                echo '<option   value="Male">Male</option>';
                                echo "</br>";
                                echo '<option   value="Male">Famel</option>';
                            }
                            else if($users->gender=="Famel")
                            {
                                echo '<option   value="Male">Male</option>';
                                echo "</br>";
                                echo '<option   value="Male">Famel</option>';
                            }
                        }
                        else{
                                echo '<option>Choose...</option>';
                                echo "</br>";
                                echo '<option   value="Male">Male</option>';
                                echo "</br>";
                                echo '<option   value="Male">Famel</option>';
                        }?>
                        <option   value="Male">Male</option>
                        <option  <?php if($users->gender=="Famel"){echo "selected";}?> value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="City" value=<?= $users->city ?> >
                </div>
                <div class="form-group col">
                    <label for= "inputStreetAddress">Street Address</label>
                    <input type="text" class="form-control" id="inputStreetAddress" placeholder="1234 Main St" value=<?php if(isset($users->city)){
                        echo $users->city;
                    } 
                    ?>>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="inputState">State</label>
                    <input type="text" class="form-control" id="inputState" placeholder="State" value=<?php if(isset($users->state)){
                        echo $users->state;
                    } 
                    ?> >
                </div>
                <div class="form-group col">
                    <label for="inputAge">Age</label>
                    <input type="text" class="form-control" id="inputAge" placeholder="Age" value=<?php if(isset($users->age)){
                        echo $users->age;
                    } 
                    ?> >
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="inputPostalCode">Postal Code</label>
                    <input type="text" class="form-control" id="inputPostalCode" placeholder="PostalCode" value=<?php if(isset($users->postalCode)){
                        echo $users->postalCode;
                    } 
                    ?> >
                </div>
                <div class="form-group col">
                    <label for="inputNumber">Phone Number</label>
                    <input type="number" class="form-control" id="inputNumber" placeholder="Phone Number" value=<?php if(isset($users->phoneNumber)){
                        echo $users->phoneNumber;
                    } 
                    ?>>
                </div>
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="submit" class="btn btn-secondary">Return</button>
            </div>
        </form>
    </div>

    <?php
}
}
}
    include("../assets/html/footer.php")
    ?>

    <!-- TODO Employee view -->
    
</body>

</html>