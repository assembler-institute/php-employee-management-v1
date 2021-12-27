<!-- TODO Application entry point. Login view -->
<!DOCTYPE html>
<html>

<head>
    <title>Ajax Test</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
    <main>
        <div class="head">
            <h1>Log in</h1>
        </div>
        <div class="log">
            <form action="./modules/loging.php" method="POST">
                <div class="mb-3">
                    <label for="log" class="form-label">Username</label>
                    <input type="text" id="log" name="log">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="text" id="pass" name="pass">
                </div>
                <div class="sub">
                    <button type="submit" class="btn btn-primary">Log in</button>
                </div>
        </div>
        </form>
    </main>
</body>

</html>