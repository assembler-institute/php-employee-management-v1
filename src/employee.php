






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
    <!-- TODO Employee view -->
<?php 
    $file="../resources/employees.json";
    $Allusers= file_get_contents($file);
    $userAll = json_decode($Allusers);
    // print_r($userAll);
    foreach($userAll as $users){
        // foreach($users as $user){
            if( $users->id==$_GET["id"]){
                echo $users->id;
                echo "</br>";
                echo $users->name;
                echo "</br>";
                echo $users->lastName;
                echo "</br>";
                echo $users->email;
                echo "</br>";
                echo $users->gender;
                echo "</br>";
                echo $users->city;
                echo "</br>";
                echo $users->streetAddress;
                echo "</br>";
                echo $users->state;
                echo "</br>";
                echo $users->age;
                echo "</br>";
                echo $users->postalCode;
                echo "</br>";
                echo $users->phoneNumber;
                echo "</br>";
            }
    //    }
    }
?>
</body>
</html>