<!-- TODO Employee view -->
<?php 
session_start();
include('../assets/html/header.html');
include('./library/employeeManager.php');

if (isset($_GET["info"])) {
    $info = true;
    $employee = $_SESSION["employeeData"];
}

?>


<!------------ Employee form------------>
<form class="container" action="" method="post">
    <div class="row g-3">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?php if(isset($info)) {echo $employee['name'];} ?>">
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" value="<?php if(isset($info)) {echo $employee['lastName'];} ?>">
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="Example@example.com" aria-label="Email" value="<?php if(isset($info)) {echo $employee['email'];} ?>">
        </div>
        <div class="col">
            <label for=""></label>
            <select class="form-control" name="gender" id="">
                <option value="Man">Man</option>
                <option value="Woman">Woman</option>
            </select>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="City" aria-label="City" value="<?php if(isset($info)) {echo $employee['city'];} ?>">
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="Street Address" aria-label="Street Address" value="<?php if(isset($info)) {echo $employee['streetAddress'];} ?>">
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="State" aria-label="State" value="<?php if(isset($info)) {echo $employee['state'];} ?>">
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="Age" aria-label="Age" value="<?php if(isset($info)) {echo $employee['age'];} ?>">
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="Postal Code" aria-label="Postal Code" value="<?php if(isset($info)) {echo $employee['postalCode'];} ?>">
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="PhoneNumber" aria-label="PhoneNumber" value="<?php if(isset($info)) {echo $employee['phoneNumber'];} ?>">
        </div>
    </div>
    <button type="submit" class="btn btn-info mt-5">Submit</button>
    <button type="submit" class="btn btn-secondary mt-5">Return</button>
</form>

<?php 
    include('../assets/html/footer.html');
?>