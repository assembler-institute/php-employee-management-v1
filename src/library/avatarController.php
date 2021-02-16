<?php

require('avatarManager.php');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET': {
        $ids = !empty($_GET['ids']) ? explode(',', $_GET['ids']) : [];
        echo getAvatars($ids);
        break;
    }
    case 'POST': {
        if (isset($_POST)) {
            addAvatar($_POST);
            http_response_code(201);
        } else {
            http_response_code(400);
        }
        break;
    }
    case 'PUT': {
        $avatarData = json_decode(file_get_contents('php://input'), true);
        if(isset($_GET['id'])) {
            $avatarData['id'] = $_GET['id'];
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
