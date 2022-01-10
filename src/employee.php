<!-- Imports -->
<?php
require_once("./library/sessionHelper.php");
checkSession();
?>

<!-- Change Header -->
<script>
    $(".employee").removeClass("a-non-active");
    $(".dashboard").addClass("a-non-active");
</script>

<!-- Footer -->
<?php include("../assets/html/footer.html"); ?>