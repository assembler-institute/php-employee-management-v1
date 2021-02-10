<!-- Here you need to write things as login validation logout etc.. -->

<?php
    function verifyUser($email, $password){
        $url = '../../resources/users.json'; // path to your JSON file
        $data = file_get_contents($url); // put the contents of the file into a variable
        $users = json_decode($data, true); // decode the JSON to key value array

        foreach ($users as $user) {
            print_r($user[0]['email']);
            print_r($user[0]['password']);
            $userPassword = $user[0]['password'];
            $verify = password_verify($password, $userPassword);

            if ((!$verify) or ($user[0]['email'] !== $email)) {
                header("Location: ../../index.php?login=invaliduser");
                exit();
            }
            else {
                session_start();
                $_SESSION['username'] = $user[0]['name'];
                header("Location: ../dashboard.php");
            }
        }
    }
?>
