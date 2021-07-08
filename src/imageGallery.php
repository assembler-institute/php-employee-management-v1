<?php
require_once('library/avatarsApi.php');

$request = 'https://uifaces.co/api?limit=5';
$key = 'A5CD0639-1EA74339-838676BE-5B902E21';
$headers = array(
    "Cache-Control:no-cache",
    "Accept:application/json",
    "X-API-KEY:" . $key,
);

// $photos = getEmployeePhotos($request, $headers);

// foreach ($photos as $key => $photo) {
?>
<!-- <label>
        <input type="radio" name="photo" value="<?= $photo ?>">
        <img src="<?= $photo ?>" class="img-thumbnail sized-image" alt="employeePhoto<?= $key ?>">
    </label> -->
<?php
// }

function renderImages($imagesNumber, $photos = [])
{
    $request = 'https://uifaces.co/api?limit=5';
    $key = 'A5CD0639-1EA74339-838676BE-5B902E21';
    $headers = array(
        "Cache-Control:no-cache",
        "Accept:application/json",
        "X-API-KEY:" . $key,
    );

    if (!count($photos))
        $photos = getEmployeePhotos($request, $headers);

    if ($imagesNumber > 5) $imagesNumber = 5;

    foreach ($photos as $key => $photo) {
        if ($key > $imagesNumber) break;
?>
        <label>
            <input type="radio" name="photo" value="<?= $photo ?>">
            <img src="<?= $photo ?>" class="img-thumbnail sized-image" alt="employeePhoto<?= $key ?>">
        </label>
<?php
    }
}
?>