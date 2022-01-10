<!-- TODO Employee view -->
<?php
include_once "./../assets/html/header.html";
if (isset($_GET['id'])) {
    $idfin= $_GET['id'];
    $file="./../resources/employees.json";
$Allusers= file_get_contents($file);
$usersAll1= json_decode($Allusers);

foreach ($usersAll1 as $user ) {
    if( $idfin == $user -> id){
        // echo $user -> id;
        define("name",$user -> name );
        define("nmeLast",$user -> lastName);
        define("email",$user -> email);
        define("gender",$user -> gender);
        define("streetAdress",$user -> streetAddress);
        define("city",$user -> city);
        define("postalCode",$user -> postalCode);
        define("phoneNumber",$user -> phoneNumber);
        define("age",$user -> age);
        define("state",$user -> state);
    }
}}
?>
     <link rel="stylesheet" href="../assets/css/main.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>login</title>
</head> 
<body>
    <!-- <form action="./../assets/html/header.html" method="post"></form> -->
    <div class="wrapper rounded bg-white">
        <div class="h3">Registration Form</div>
        <div class="form">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3"> <label>First Name</label> <input type="text" class="form-control" name="name" required value=<?= isset($_GET["id"]) ?  name : "" ?>> </div>
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Last Name</label> <input type="text" class="form-control" name="lastName"  required  value=<?= isset($_GET["id"]) ?  nmeLast : "" ?>> </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Email</label> <input type="email" class="form-control" name="email"  required value=<?= isset($_GET["id"]) ?  email : "" ?>> </div>
                    <div class="col-md-6 mt-md-0 mt-3"> <select  name="gender" class="form-select" aria-label="Default select example">
                    <input type="radio" name="radio" value="yes" class="radio" /> Yes
                    <input type="radio" name="radio" value="no" class="radio" />
                            <!-- <option selected>Open this select menu</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option> -->
                        <!-- </select> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3"> <label>City</label> <input type="text" class="form-control" name="city"  required value=<?= isset($_GET["id"]) ?  city : "" ?>> </div>
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Street Adress</label> <input type="text" class="form-control" name="streetAddress" required value=<?= isset($_GET["id"]) ?  streetAdress : "" ?>> </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3"> <label>State</label> <input type="text" class="form-control" name="state" value=<?= isset($_GET["id"]) ?  state : "" ?> > </div>
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Age</label> <input type="number" class="form-control" name="age"  value=<?= isset($_GET["id"]) ?  age : "" ?> > </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Postal Code</label> <input type="number" class="form-control" name="postalCode" value=<?= isset($_GET["id"]) ?  postalCode : "" ?> required> </div>
                    <div class="col-md-6 mt-md-0 mt-3"> <label>Phone Number</label> <input type="tel" class="form-control" name="phoneNumber"  required value=<?= isset($_GET["id"]) ?  phoneNumber : "" ?>> </div>
                </div>
                <div class="row">
                    <button class="btn btn-primary btn-lg" type="submit" name="submitForm"> Submit </button>
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['submitForm'])) {
        require './library/employeeManager.php';
        addEmployee();
    }
    // if (isset($_GET['id'])) {
       
    //     $idfin= $_GET['id'];
    //     $file="./../resources/employees.json";
    // $Allusers= file_get_contents($file);
    // $usersAll1= json_decode($Allusers);

    // foreach ($usersAll1 as $user ) {
    //     if( $idfin == $user -> id){
    //         // echo $user -> id;
    //         define("pepe",$user -> name );
    //         // echo pepe;
    //         $pepe= $user -> name;
    //         // $print_r($user -> id);
    //     }
    // }
    // foreach ($usersAll as $user ) {
    // print_r( $user -> id);
    // if($user -> id == $idfin ){
    //     echo "asd";
    //     // printf($user -> id);
    //     // $print_r($user -> id);
    // }
    // }
        // echo "pepe";
    // print_r($user -> id);
 


    ?>
</body>

</html>