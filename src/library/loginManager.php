
<?php
$usersJson = file_get_contents("/Users/victorgreco/Documents/personal_projects/php-employee-management-v1/resources/users.json");
$usersArray = json_decode($usersJson, true);

foreach ($usersArray['users'] as $user) {
    $isValidUser = $user['email'] === $_POST['email'];
    $isPasswordChecked = password_verify($_POST['password'], $user['password']);

    if ($isValidUser && $isPasswordChecked) {
        echo "Success!";
        echo $user["userId"];
        setcookie("userId", $user["userId"], time()+ 20, '/');
    }
}