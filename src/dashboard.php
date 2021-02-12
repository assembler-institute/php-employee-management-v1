<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
    //session_start();
    //$userName = $_SESSION["username"];
    //echo $userName;
    $jsondata = file_get_contents("./resources/employees.json");
    $json = json_decode($jsondata, true);
    $output = 
        "<table>
            <tr>
                <th>";
    foreach($json as $employee){
    }
?>