<?php 
    function accessAdmin($name, $pass) {
        session_start();

        $adminsInfo = json_decode(file_get_contents('../../resources/users.json'),true)['users'];
    
        if ($name === '' || $pass === ''){
            echo json_encode('Blank');       
        } else {
            foreach ($adminsInfo as $admin) {
                if (($name === $admin['name']) || 
                    ($name === $admin['email'])) {
                    if (password_verify($pass, $admin['password'])){
                        echo json_encode('OK');
                        $adminId = $admin['userId'];
                        $_SESSION['user'] = $adminId;
                    } else {
                        echo json_encode('No match');
                    }
                } else {
                    echo json_encode('No match');
                }
            }
        }
    }

    function userConnected() {
        if (!isset($_SESSION['user'])) {
            header('location: ../index.php');
        }
    }