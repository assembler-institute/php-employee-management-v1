<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php 
include('../assets/html/header.html');
include("./library/loginManager.php");
include("./library/employeeManager.php");
checkSession();


if (isset($_SESSION["userAdded"])){
    $userAdded = true;
    $message = $_SESSION["userAdded"];
    unset ($_SESSION["userAdded"]);
}


?>
<main>
<?php if(isset($userAdded)) {
    echo "
    <p id='message' class='alert alert-success'>$message</p>

    <script>
        setTimeout(function(){
            document.getElementById('message').style.display = 'none';
        }, 3000);
    </script>
    ";

} ?>

    <input type="hidden" value="<?php echo $_SESSION["time"]; ?>" id="timeStart">
    <input type="hidden" value="<?php echo time(); ?>" id="timeCurrent">
    <table class="table" id="tableData">
        <thead id="tableHead">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Street No</th>
                <th>City</th>
                <th>State</th>
                <th>Postal Code</th>
                <th>Phone Number</th>
                <th id="add">+</th>
            </tr>
            <form id="addEmployee" action="./library/employeeController.php" method="post">
                <tr id="rowInput" class="hide">
                    <td> <input type="text" name="name" id="" required>
                    </td>
                    <td><input type="email" name="email" id="" required> </td>
                    <td><input type="number" name="age" id="" maxlength="2" required></td>
                    <td> <input type="text" name="address" required></td>
                    <td><input type="text" name="city" id="" required></td>
                    <td><input type="text" name="state" id="" required></td>
                    <td> <input type="number" name="postalCode" id="" maxlength="5" required></td>
                    <td><input type="tel" name="phone" id="" maxlength="9" required></td>
                    <td><button type="submit" name="submit" required>+</button></td>
                </tr>
            </form>
        </thead>
        <!--  -->
        <tbody class="table__tbody--dataEmployer" id="tableBody">
        </tbody>
    </table>
    <form action="./library/employeeController.php" method="post" id="form-navigation">
        <input type="hidden" name="page" value="" id="nextPage">
        Next
    </form>
    <form action="./library/employeeController.php" method="post" id="form-navigation-back">
        <input type="hidden" name="page" value="" id="backPage">
        Back
    </form>
</main>

<script>
    const dashboardTag = document.getElementById("dashboardTag");
    const employeeTag = document.getElementById("employeeTag");

    if (window.location.href.includes("dashboard.php")) {
    dashboardTag.classList.add("active");
    employeeTag.classList.remove("active");
} 
</script>

<?php 
    include('../assets/html/footer.html');
?>