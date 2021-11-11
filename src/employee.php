<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Web site " />
    <title>Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        <?php include("./../assets/css/main.css"); ?>
    </style>
</head>

<body>
<?php include("./../assets/html/header.html") ?>

<main class="main container">
    <form class="row g-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="col-md-6">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" >
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="col-md-6">
            <label for="gender" class="form-label">Gender</label>
            <select id="gender" class="form-select">
                <option selected>Choose...</option>
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city">
        </div>
        <div class="col-md-6">
            <label for="streetAddress" class="form-label">Street Address</label>
            <input type="text" class="form-control" id="streetAddress" name="streetAddress">
        </div>

        <div class="col-md-6">
            <label for="state" class="form-label">Sate</label>
            <input type="text" class="form-control" id="state" name="state">
        </div>
        <div class="col-md-6">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age">
        </div>

        <div class="col-md-6">
            <label for="postalCode" class="form-label">Postal Code</label>
            <input type="number" class="form-control" id="postalCode" name="postalCode">
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="phone">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
            <button type="submit" class="btn btn-secondary">Return</button>
        </div>
    </form>
</main>

<?php include("./../assets/html/footer.html") ?>
</body>
</html>

