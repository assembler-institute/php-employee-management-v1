<?php 
    function accessAdmin($name, $pass) {
        session_start();

        $adminsInfo = json_decode(file_get_contents('../../resources/users.json'),true)['users'];
    
        if ($name === '' || $pass === ''){
            echo json_encode('You need to fill in all the information');       
        } else {
            foreach ($adminsInfo as $admin) {
                if (($name === $admin['name']) || 
                    ($name === $admin['email'])) {
                    if (password_verify($pass, $admin['password'])){
                        echo json_encode('OK');
                        $adminId = $admin['userId'];
                        $_SESSION['user'] = $adminId;
                    } else {
                        echo json_encode('Error: Not matching data found');
                    }
                } else {
                    echo json_encode('Error: Not matching data found');
                }
            }
        }
    }