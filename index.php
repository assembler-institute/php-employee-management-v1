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
    if (isset($_GET['error'])) {
        echo '<div class="loginErrorContainer"><div class="loginError"> Incorrect Email or Password! </div></div>';
    }
    ?>
    <section class="login">
        <?php include_once('./src/jokeBubble.php'); ?>
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
        let avatars = JSON.parse(<?php echo json_encode($avatars); ?>);
        const myAvatar = new Avatar(false, avatars[0, getRandomInt(0, avatars.length)].properties);

        const $image = document.getElementById('image');
        const $bubble = document.querySelector('.bubble')
        const $password = document.getElementById('password');

        window.onload = () => {

            mainAvatarImage = myAvatar.getAvatar({
                mouth: 'twinkle'
            });
            eyesClosedImage = myAvatar.getEyesClosedAvatar({
                mouth: 'twinkle'
            });
            setMainImage()
            $image.addEventListener('click', showBubble)

            $password.addEventListener('focusin', function() {
                setTimeout(setEyesClosedImage, 100)
                clearTimeout(winkTimer);
            });

            $password.addEventListener('focusout', function() {
                setTimeout(setMainImage, 100)
                programateWink()
            });

            programateWink()
        };

        function showBubble() {
            $bubble.style.transform = "scale(1)";
            $bubble.style.transition = "transform 0.4s";
            $image.removeEventListener('click', showBubble)
            $image.addEventListener('click', showPunchline)
        }

        function showPunchline() {
            $bubble.querySelector('.joke-setup').style.opacity = '0';
            $bubble.querySelector('.joke-punchline').style.opacity = '1';
            $image.style.cursor = 'default';

            setTimeout(() => {
                mainAvatarImage = myAvatar.getAvatar({
                    mouth: 'smile'
                });
                eyesClosedImage = myAvatar.getEyesClosedAvatar({
                    mouth: 'smile'
                });
                setMainImage()
            }, 100)
            setTimeout(() => {
                mainAvatarImage = myAvatar.getAvatar({
                    mouth: 'twinkle'
                });
                eyesClosedImage = myAvatar.getEyesClosedAvatar({
                    mouth: 'twinkle'
                });
                setMainImage()
                $bubble.style.transform = "scale(0)";
            }, 6000)

            $image.removeEventListener('click', showPunchline)
        }

        let winkTimer;

        function programateWink() {
            winkTimer = setTimeout(() => {
                if ($image.innerHTML !== eyesClosedImage) {
                    setEyesClosedImage();
                    setTimeout(() => {
                        setMainImage()
                    }, getRandomInt(120, 160))
                }
                programateWink();
            }, getRandomInt(2000, 10000))
        }

        function setMainImage() {
            if(document.activeElement === $password) {
                $image.innerHTML = eyesClosedImage;
            } else {
                $image.innerHTML = mainAvatarImage;
            }
        }

        function setEyesClosedImage() {
            $image.innerHTML = eyesClosedImage;
        }

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min)) + min;
        }
    </script>
</body>

</html>