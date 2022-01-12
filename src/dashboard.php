<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    //check log in
        require_once("./library/sessionHelper.php");
        require_once("./../assets/html/header.html"); 
    ?>
    <title>Employee management</title>
    <!-- jsGrid -->
    <script type="text/javascript" src="./../node_modules/jsgrid/dist/jsgrid.min.js" defer></script>
    <link type="text/css" rel="stylesheet" href="./../node_modules/jsgrid/dist/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="./../node_modules/jsgrid/dist/jsgrid-theme.min.css" />
    <!-- My styles -->
    <script src="./../assets/js/dashboard.js" defer></script>
</head>

<body>
    <div id="jsGrid">

    </div>
    <!-- MODAL DELETE -->
    <article class="modal fade" id="deleteModal" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modalDelete">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="container-fluid text-center">
                            <div class="row">
                                <div class="col">
                                    <img src="./../assets/imgs/warning.png" width="106px" alt="warning">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h1>Are you sure?</h1>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4>Do you want to delete</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col">
                                    <button id="acceptDelete" data-bs-dismiss="modal">Delete</button>
                                    <button id="cancelDelete" data-bs-target="#deleteModal"
                                        data-bs-toggle="modal">Cancel</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <!-- ERROR MODAL -->
</body>

</html>