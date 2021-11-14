<?php
include "./library/sessionHelper.php";

?>
<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Web site " />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        <?php include("./../assets/css/main.css"); ?>
    </style>
</head>

<body>
<?php include("./../assets/html/header.html") ?>
<?php
        if (isset($_SESSION["message"]) && $_SESSION["message"] === "AddNewEmployee") {
            echo "<div class='alert alert-primary mb-3' role='alert'>Add successfully new employee!</div>";
            unset($_SESSION['message']);
        }
        if (isset($_SESSION["message"]) && $_SESSION["message"] === "DeleteEmployee") {
            echo "<div class='alert alert-primary mb-3' role='alert'>Remove successfully employee!</div>";
            unset($_SESSION['message']);
        }
    ?>
<div class="container">
    <div id="container-table">
    <div class="row row-header">
      <div class="col-1">Name</div>
      <div class="col-2">Email</div>
      <div class="col-1">Age</div>
      <div class="col-1">Str.No</div>
      <div class="col-2">City</div>
      <div class="col-1">State</div>
      <div class="col-1">Postal Code</div>
      <div class="col-2">Phone Number</div>
      <div class="col-1"><button type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="bi bi-plus-lg"></i></button></div>
    </div>
    <form method="POST" action="./library/employeeController.php">
        <div class="row" id="collapseExample">
            <div class="col-1"><input required type="text" class="form-control" placeholder="name" name="name"></div>
            <div class="col-2"><input required type="email" class="form-control" placeholder="email" name="email"></div>
            <div class="col-1"><input required type="text" class="form-control" placeholder="age" name="age"></div>
            <div class="col-1"><input required type="text" class="form-control" placeholder="street Address" name="streetAddress"></div>
            <div class="col-2"><input required type="text" class="form-control" placeholder="city" name="city"></div>
            <div class="col-1"><input required type="text" class="form-control" placeholder="state" name="state"></div>
            <div class="col-1"><input required type="text" class="form-control" placeholder="postal Code" name="postalCode"></div>
            <div class="col-2"><input required type="tel" class="form-control" placeholder="phone Number" name="phone"></div>
            <div class="col-1"><input required type="submit" value="submit" class="btn btn-primary"></div>
        </div>
    </form>
    </div>
</div>

<?php include("./../assets/html/footer.html") ?>
<script>
    $(document).ready(function() {
        $.getJSON("./../resources/employees.json", function(data) {
            console.log(data);
            var employee_data = "";
            $.each(data, function(key, value) {
                employee_data += "<div class='row'>";
                employee_data += "<div class='col-1'><a href='./employee.php?id=" + value.id + "'>" + value.name + "</a></div>";
                employee_data += "<div class='col-2'>" + value.email + "</div>";
                employee_data += "<div class='col-1'>" + value.age + "</div>";
                employee_data += "<div class='col-1'>" + value.streetAddress + "</div>";
                employee_data += "<div class='col-2'>" + value.city + "</div>";
                employee_data += "<div class='col-1'>" + value.state + "</div>";
                employee_data += "<div class='col-1'>" + value.postalCode + "</div>";
                employee_data += "<div class='col-2'>" + value.phoneNumber + "</div>";
                employee_data += "<div class='col-1 flex-row'><form method='DELETE' action='./library/employeeController.php' onsubmit='return confirmDelete()'><input type='hidden' name='id' value='" + value.id + "'><button type='submit'><i class='bi bi-trash'></i></button></form><button class='btn-edit'><i class='bi bi-pencil'></i></button></div>";
                employee_data += "</div>";
            });
            $("#container-table").append(employee_data);
        });
    });

    function confirmDelete() {
        if(confirm("Are you sure you want to delete ?"))
            return true;
        
        return false;
    }
</script>
</body>
</html><!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
