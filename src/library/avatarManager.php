<?php

define("AVATARS_JSON_PATH", $_SERVER["DOCUMENT_ROOT"] . "/php-employee-management-v1/resources/avatars.json");

require_once('helper.php');

function addAvatar(array $newAvatar)
{
    $avatars = decodeJsonFile(AVATARS_JSON_PATH);
    $newAvatar['id'] = end($avatars)['id'] + 1;
    array_push($avatars, $newAvatar);

    saveArrayAsJson(AVATARS_JSON_PATH, $avatars);

    return $newAvatar;
}

function deleteAvatar(int $id)
{
    $avatars = decodeJsonFile(AVATARS_JSON_PATH);
    $avatar = findItemWithId($avatars, $id);

    if ($avatar) {
        unset($avatars[$avatar->key]);
        saveArrayAsJson(AVATARS_JSON_PATH, $avatars);

        return true;
    } else {
        return false;
    }
}

function updateAvatar(array $updateAvatar)
{
    $avatars = decodeJsonFile(AVATARS_JSON_PATH);
    $avatar = findItemWithId($avatars, $updateAvatar['id']);

    if ($avatar) {
        $avatar->value = $updateAvatar;
    } else {
        array_push($avatars, $updateAvatar);
    }

    saveArrayAsJson(AVATARS_JSON_PATH, array_sort($avatars, 'id'));
    return $updateAvatar;
}

function getAvatars(array $employeeIds = [])
{
    if (empty($employeeIds)) {
        return file_get_contents(AVATARS_JSON_PATH);
    }

    $avatars = decodeJsonFile(AVATARS_JSON_PATH);

    $foundAvatars = array();
    foreach ($employeeIds as $id) {
        $found = findItemWithEmployeeId($avatars, $id);
        if ($found) {
            array_push($foundAvatars, $found->value);
        }
    }

    return encodeJson(array_values($foundAvatars));
}

function getAvatar(int $employeeId)
{
    $avatars = decodeJsonFile(AVATARS_JSON_PATH);
    $found = findItemWithEmployeeId($avatars, $employeeId);
    $avatar = $found ? $found->value : array();

    return encodeJson($avatar);
}

