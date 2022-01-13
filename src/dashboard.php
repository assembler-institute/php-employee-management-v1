<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css"  rel="stylesheet" href="../assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<?php
  require "../assets/html/header.html";
?>
<body>
  <h1><a href="">sign out</a></h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">City</th>
      <th scope="col">Street Address</th>
      <th scope="col">State</th>
      <th scope="col">Age</th>
      <th scope="col">Postal Code</th>
      <th scope="col">Phone Number</th>
      <th scope="col"><button type="button" id="add" class="binImg" data-bs-toggle="modal" data-bs-target="#exampleModal">
<img src="https://static.vecteezy.com/system/resources/previews/000/583/100/original/vector-button-plus-icon.jpg">
</button></th>
    </tr>
    </thead>
</table>


<!-- Modal add employee-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert New Employeer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body container">
      <form action="./library/employeeController.php" method="POST" enctype="multipart/form-data">
        <label>name:<input type="text"id="name" name="name"></label>
        <label>lastName:<input type="text" id="lastName" name="lastName"></label>
        <label>email:<input type="text" id="email" name="email"></label>
        <label>gender:<input type="text"  id="gender" name="gender"></label>
        <label>city:<input type="text" id="city" name="city"></label>
        <label>streetAddress:<input type="text" id="streetAddress" name="streetAddress"></label>
        <label>state:<input type="text" id="state"name="state"></label>
        <label>age:<input type="text" id="age" name="age"></label>
        <label>postalCode:<input type="text" id="postalCode" name="postalCode"></label>
        <label>phoneNumber:<input type="text" id="phoneNumber" name="phoneNumber"></label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submitAdd">add employee</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
  <?php
    require "../assets/js/index.js";
  ?>

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <?php require "../assets/html/footer.html";?>
</body>
</html>