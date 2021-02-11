<?php if (!isset($_GET['login'])) {
                exit();
        }
        else {
            $loginCheck = $_GET['login'];

            if ($loginCheck == "empty") {
                echo '<p class="error">Please fill all the fields</p>';
                exit();
            }
            elseif ($loginCheck == "invalidemail") {
                echo '<p class="error">Please write a valid email</p>';
                exit();
            }
            elseif ($loginCheck == "invaliduser") {
                echo '<p class="error">Incorrect user credentials</p>';
                exit();
            }
        }
?>