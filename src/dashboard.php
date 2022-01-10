<!-- Imports -->
<?php
require_once("./library/sessionHelper.php");
checkSession();
?>

<!-- jsGrid -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />

<!-- JS -->
<script src="../assets/js/grid.js"></script>

<!-- Change Header -->
<script>
    $(".dashboard").removeClass("a-non-active");
    $(".employee").addClass("a-non-active");
</script>

<!-- Grid -->
<div id="grid"></div>

<?php 

$decode_json = json_decode(file_get_contents("../resources/employees.json"));
$employees_array = [];
foreach($decode_json as $user){
    array_push($employees_array, json_decode(json_encode($user), true));
};

?>

<script>
    fillJsGrid(<?= json_encode($employees_array); ?>);
</script>

<!-- Footer -->
<?php include("../assets/html/footer.html"); ?>