<?php

require('avatarManager.php');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET': {
        $ids = !empty($_GET['employeeIds']) ? explode(',', $_GET['employeeIds']) : [];
        echo getAvatars($ids);
        break;
    }
    case 'POST': {
        $added = addAvatar(json_decode(file_get_contents('php://input'), true));
        http_response_code(201);
        echo json_encode($added);
        break;
    }
    case 'PUT': {
        $avatarData = json_decode(file_get_contents('php://input'), true);
        if(isset($_GET['id'])) {
            $avatarData['id'] = (int)$_GET['id'];
        } else {
            http_response_code(400);
            die();
        }
        $updated = updateAvatar($avatarData);
        http_response_code(201);
        echo json_encode($updated);
        break;
    }
}
