<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php 
include('../assets/html/header.html');
include("./library/loginManager.php");
include("./library/employeeManager.php");
checkSession();

$userAdded=false;
if (isset($_SESSION["userAdded"])){
    $userAdded = true;
    $message = $_SESSION["userAdded"];
    unset ($_SESSION["userAdded"]);
}


?>
<main>
<p id='newEmployeeMessage' class='alert alert-success hide'>Employee succesfully saved!</p>
<?php if($userAdded) {
    echo "
    <p id='message' class='alert alert-success '>$message</p>

    <script>
        setTimeout(function(){
            document.getElementById('message').style.display = 'none';
        }, 3000);
    </script>
    ";

} ?>

    <input type="hidden" value="<?php echo $_SESSION["time"]; ?>" id="timeStart">
    <input type="hidden" value="<?php echo time(); ?>" id="timeCurrent">
    <table class="table-sm table-hover" id="tableData">
        <thead id="tableHead">
            <tr>
                <th class="menu__title--table">Name</th>
                <th class="menu__title--table">Email</th>
                <th class="menu__title--table">Age</th>
                <th class="menu__title--table">Street No</th>
                <th class="menu__title--table">City</th>
                <th class="menu__title--table">State</th>
                <th class="menu__title--table">Postal Code</th>
                <th class="menu__title--table">Phone Number</th>
                <th id="displayForm">+</th>
            </tr>
            <form id="addEmployeeForm" action="./library/employeeController.php" method="post">
                <tr id="rowInput" class="hide">
                    <td> <input type="text" name="name" id="" required>
                    </td>
                    <td><input type="email" name="email" id="" required> </td>
                    <td><input type="number" name="age" id="" maxlength="2" required></td>
                    <td> <input type="text" name="streetAddress" required></td>
                    <td><input type="text" name="city" id="" required></td>
                    <td><input type="text" name="state" id="" required></td>
                    <td> <input type="number" name="postalCode" id="" maxlength="5" required></td>
                    <td><input type="tel" name="phoneNumber" id="" maxlength="9" required></td>
                    <td><button id="addBtn" name="newEmployee" required>+</button></td>
                </tr>
            </form>
        </thead>
        <!--  -->
        <tbody class="table__tbody--dataEmployer" id="tableBody">
        </tbody>
    </table>
    
</main>
<div class="div-btn-navigation">
<form action="./library/employeeController.php" method="post" id="form-navigation">
    <input type="hidden" name="page" value="" id="nextPage">
    Next
</form>
<form action="./library/employeeController.php" method="post" id="form-navigation-back">
    <input type="hidden" name="page" value="" id="backPage">
    Back
</form>
</div>
<script>
    const dashboardTag = document.getElementById("dashboardTag");
    const employeeTag = document.getElementById("employeeTag");
    // Adds the class to give style depending the page you are
    if (window.location.href.includes("dashboard.php")) {
    dashboardTag.classList.add("active");
    employeeTag.classList.remove("active");
} 
</script>

<?php 
    include('../assets/html/footer.html');
?>