<!-- TODO Application entry point. Login view -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Employee Manager</title>
</head>
<body>
    <main>
        <h1>%LOGIN_TITLE%</h1>
        <form action="./src/library/loginManager.php" method="POST">
            <input type="email" id="email" name="email" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" maxlength="100" required>
            <input type="password" id="password" name="password" required>
            <button type="submit">Sign In</button>
        </form>
    </main>

    <?php echo file_get_contents('./assets/html/footer.html'); ?>
</body>
</html>