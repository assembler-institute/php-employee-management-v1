<!-- Here you need to write things as login validation logout etc.. -->

<?php
    function verifyUser($email, $password){
        $url = '../../resources/users.json'; // path to your JSON file
        $data = file_get_contents($url); // put the contents of the file into a variable
        $users = json_decode($data, true); // decode the JSON to key value array
        $result = false;

        foreach ($users['users'] as $user) {
            $userPassword = $user['password'];
            $verify = password_verify($password, $userPassword);

            if (($verify) and ($user['email'] == $email)) {
                $result = true;
                startSession($user);
            }
        }
        return $result;
    }

    function startSession($user){
        session_start();
        $_SESSION['id'] = $user['userId'];
        $_SESSION['username'] = $user['name'];
        $_SESSION['start'] = time();
        $_SESSION['duration'] = 600;
    }

    function setErrorMessage($message){
        $url = $message? "?login=$message" : "";
        header("Location: ../../index.php$url");
        exit();
    }
?>
