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

<!-- Fill table -->
<script>
    fillJsGrid();
</script>

<!-- Footer -->
<?php include("../assets/html/footer.html"); ?>