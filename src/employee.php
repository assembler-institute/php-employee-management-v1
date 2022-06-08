<!-- TODO Employee view -->
<?php 
include('../assets/html/header.html');
include('./library/employeeManager.php');
include("./library/loginManager.php");

checkSession();


if (isset($_GET["info"])) {
    $info = true;
    $employee = $_SESSION["employeeData"];
}
?>


<!------------ Employee form------------>
<form class="container" action="./library/employeeController.php" method="post">
    <input type="hidden" value="<?php echo $_SESSION["time"]; ?>" id="timeStart">
    <input type="hidden" value="<?php echo time(); ?>" id="timeCurrent">
    <input type="hidden" name="employee" value="<?php if(isset($info)) {echo $employee['id'];}else{echo "0";} ?>">
    <div class="row g-3">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" name="name" placeholder="First name" aria-label="First name" value="<?php if(isset($info)) {echo $employee['name'];} ?>" required>
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" name="lastName" placeholder="Last name" aria-label="Last name" value="<?php if(isset($info)) {echo $employee['lastName'];} ?>" required>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for=""></label>
            <input type="email" class="form-control" name="email" placeholder="Example@example.com" aria-label="Email" value="<?php if(isset($info)) {echo $employee['email'];} ?>" required>
        </div>
        <div class="col">
            <label for=""></label>
            <select class="form-control" name="gender" id="" required>
                <option value="Man">Man</option>
                <option value="Woman">Woman</option>
            </select>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" name="city" placeholder="City" aria-label="City" value="<?php if(isset($info)) {echo $employee['city'];} ?>" required>
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" name="streetAddress" placeholder="Street Address" aria-label="Street Address" value="<?php if(isset($info)) {echo $employee['streetAddress'];} ?>" required>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" name="state" placeholder="State" aria-label="State" value="<?php if(isset($info)) {echo $employee['state'];} ?>" required>
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" name="age" placeholder="Age" aria-label="Age" value="<?php if(isset($info)) {echo $employee['age'];} ?>" maxlength="2" required>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" name="postalCode" placeholder="Postal Code" aria-label="Postal Code" value="<?php if(isset($info)) {echo $employee['postalCode'];} ?>" maxlength="5" required>
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" name="phoneNumber" placeholder="PhoneNumber" aria-label="PhoneNumber" value="<?php if(isset($info)) {echo $employee['phoneNumber'];} ?>" maxlength="9" required>
        </div>
    </div>
    <button type="submit" class="btn btn-info mt-5">Submit</button>
    <a href="./dashboard.php" class="btn btn-secondary mt-5">Return</a>
</form>

<script>
    const dashboardTag = document.getElementById("dashboardTag");
    const employeeTag = document.getElementById("employeeTag");
    if (window.location.href.includes("employee.php")) {
        dashboardTag.classList.remove("active");
        employeeTag.classList.add("active");
    }
</script>

<?php 
    include('../assets/html/footer.html');
?>