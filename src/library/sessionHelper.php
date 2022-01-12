<?php
    require_once("./loginManager.php");
    // sesionExpirada();
    function sesionExpirada(){
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 30)) {
        "algo dentro";
    }
    "algo fuera";
    // $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
}

?>