<!-- TODO If you are going to add the extra feature implement here the image selection as a
gallery or whatever you like -->

<!-- This file will contain the code necessary to display the API images.
Keep in mind that the API request must be implemented in another specific file for this
(“avatarsAPI.php”), which will be detailed in the following points of this documentation.
Then the “imageGallery.php” must include and call to the functions of “avatarsAPI.php” file.-->

<?php

require_once "./library/avatarsApi.php";
function imageGallery()
{

    $requestAPI = json_decode(APIcall());
    $imgs = new ArrayObject($requestAPI);

    for ($i = 0; $i < 10; $i++) {
        echo $i === 0 ?  "<div class='carousel-item active'>" : "<div class='carousel-item'>"
?>
        <img src=<?php echo '"' . $imgs[$i]->{'photo'} . '"' ?> class="d-block w-100" style="width: 100px;" alt="Photo">
        </div>
<?PHP
    }
};

function selectEmployee()
{
    $jsonEmployee = file_get_contents('../resources/employees.json'); //?get JSON content
    $jsonEmployee  = json_decode($jsonEmployee, true); //? decode the JSON into an associative array

    foreach ($jsonEmployee as $employee) {
        echo "<option value='$employee[id]' id='$employee[id]'>$employee[id] - $employee[name]</option>";
    }
}
?>