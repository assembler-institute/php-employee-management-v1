<?php
require_once('./library/avatarsApi.php');

define('PHOTOS_NUMBER', 6);
$employeePhotos = getEmployeePhotos(PHOTOS_NUMBER);
$printedPhotos = 0;
$hide = '';

// Print employee photo 
if (isset($employee['photo'])) :
    $photo = $employee['photo'];
    $printedPhotos = 1;
    $hide = 'd-none';
?>
    <label class="">
        <input type="radio" name="photo" value="<?= $photo ?>">
        <img src="<?= $photo ?>" class="img-thumbnail sized-image" alt="employeePhoto">
    </label>
    <script>
        $('[alt="employeePhoto"]').dblclick(function() {
            $('label.other').each(function() {
                $(this).toggleClass('d-none');
            });
        })
    </script>
<?php
endif;

// Print other photos 
for ($i = $printedPhotos; $i < PHOTOS_NUMBER; $i++) {
?>
    <label class="other <?php echo $hide ?>">
        <input type="radio" name="photo" value="<?= $employeePhotos[$i] ?>">
        <img src="<?= $employeePhotos[$i]  ?>" class="img-thumbnail sized-image" alt="employeePhoto<?= $i ?>">
    </label>
<?php
}
?>