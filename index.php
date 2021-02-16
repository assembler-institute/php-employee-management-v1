<?php
include_once('./src/library/avatarManager.php');
$avatars = getAvatars();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Employee Management</title>
</head>

<body>
<?php
    if(isset( $_GET['error'] )){
        echo '<div class="loginErrorContainer"><div class="loginError"> Incorrect Email or Password! </div></div>';
    }
    ?>
    <section class="login">
        <div id='image'></div>
        <form action="./src/library/loginController.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Submit">
        </form>
    </section>

    <script type="module">
        import {
            Avatar
        } from "./assets/js/Avatar.js";

        let mainAvatarImage = '';
        let eyesClosedImage = '';

        window.onload = () => {
            let avatars = JSON.parse(<?php echo json_encode($avatars); ?>);
            const myAvatar = new Avatar(false, avatars[0, getRandomInt(0, avatars.length)].properties);

            mainAvatarImage = myAvatar.getAvatar();
            eyesClosedImage = myAvatar.getEyesClosedAvatar();
            document.getElementById('image').innerHTML = mainAvatarImage;
        };

        let winkTimer;

        function programateWink() {
            winkTimer = setTimeout(() => {
                const $image = document.getElementById('image');
                if ($image.innerHTML !== eyesClosedImage) {
                    $image.innerHTML = eyesClosedImage;
                    setTimeout(() => {
                        $image.innerHTML = mainAvatarImage;
                    },getRandomInt(120, 160))
                }
                programateWink();
            }, getRandomInt(2000, 10000))
        }

        programateWink()

        // focus password listeners
        const $password = document.getElementById('password');
        const $image = document.getElementById('image');
        $password.addEventListener('focusin', function() {
            setTimeout(() => $image.innerHTML = eyesClosedImage, 100)
            clearTimeout(winkTimer);
        });

        $password.addEventListener('focusout', function() {
            setTimeout(() => $image.innerHTML = mainAvatarImage, 100)
            programateWink()
        });

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min)) + min;
        }
    </script>
</body>

</html>