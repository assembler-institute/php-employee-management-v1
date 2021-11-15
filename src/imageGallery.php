<?php
require_once "./library/avatarsApi.php";
/**
 * *Implement here the image gallery
 *
 * *This file will contain the code necessary to display the API images.
 *
 * Inset html code generated in php
 */


/**
 ** Insert images in HTML code, generated in php from avatarsApi.php
 */
function imageGallery()
{
    //? decode the JSON
    $requestAPI = json_decode(APIcall());

    //? create array object
    $imgs = new ArrayObject($requestAPI);

    //? generate img tags, the first with class "active" for bootstrap gallery
    for ($i = 0; $i < 10; $i++) {
        echo $i === 0 ?  "<div class='carousel-item active'>" : "<div class='carousel-item'>"
?>
        <img src=<?php echo '"' . $imgs[$i]->{'photo'} . '"' ?> class="d-block w-100" style="width: 100px;" alt="Photo">
        </div>
<?PHP
    }
};

/**
 * * Insert select option in HTML code generated in php from employees.json
 */
function selectEmployee()
{
    $jsonEmployee = file_get_contents('../resources/employees.json'); //?get JSON content
    $jsonEmployee  = json_decode($jsonEmployee, true); //? decode the JSON into an associative array

    //? generate option tags with id equals to $employee[id]
    foreach ($jsonEmployee as $employee) {
        echo "<option value='$employee[id]' id='$employee[id]'>$employee[id] - $employee[name]</option>";
    }
}
?>