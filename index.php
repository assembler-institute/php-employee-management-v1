<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Web site " />
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        <?php include(__DIR__ . "/assets/css/main.css"); ?>
        <?php include(__DIR__ . "/assets/css/login.css"); ?>
    </style>
</head>

<body>
    <div class="center" >
        <h1>Account Login</h1>
        <form
            method="POST"
            action="./src/library/loginController.php"
        >
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username"  name="username"  autocomplete="current-name">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password"  name="password" autocomplete="current-password">
            </div>
            <!-- <div class="alert alert-primary mb-3" role="alert"></div> -->
            <button type="submit" class="btn-login" value="Submit">Submit</button>
        </form>
    </div>
</body>
</html>