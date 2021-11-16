<!-- TODO Employee view -->
<!--This file will be the employee view that will be used as much to view/edit
an existing one or to create a new one. -->
<?php
include_once "../assets/html/head.html";
include_once "../assets/html/header.html";
require_once "./imageGallery.php";

?>
<div class="container">
    <div class="row">
        <div class="col col-md-4 p-4">
            <!-- GALLERY -->
            <div id="carouselExampleControls" class="carousel slide" data-bs-interval="false" data-bs-ride="carousel">
                <div class="carousel-inner ">
                    <?php imageGallery();
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- END GALLERY -->

            <!-- SELECT EMPLOYEE -->
            <form>
                <div class="form-group" id="selectEmployee" data-key="NoN">
                    <label for="selectEmployee">Select Employee</label>
                    <select id="inputEmployee" class="form-control" id="inputGender2">
                        <option value="" selected id="0">Choose...</option>
                        <?php selectEmployee(); ?>
                    </select>

                    <button type="button" class="btn btn-danger invisible m-2" id="deleteBtn">Delete</button>
                    <button type="submit" class="btn btn-primary invisible m-2" id="newBtn">New</button>

                </div>
            </form>
            <!--END SELECT EMPLOYEE -->
        </div>

        <!-- FORM -->
        <div class="col col-md-8 p-4">
            <form id="formEmployee">
                <div class="form-row row">
                    <input type="hidden" class="form-control" id="inputId" value="new">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control" id="inputLast" placeholder="Surname" required>
                    </div>
                </div>
                <div class="form-row row">
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" required>
                    </div>
                    <div class="form-group col-md-6" id="inputGender" data-key="NoN">
                        <label for="inputGender">Gender</label>
                        <select id="inputGenderSelect" class="form-control" id="inputGender2" required>
                            <option value="" selected id="inputGenderNone">Choose...</option>
                            <option value="woman" id="woman">Female</option>
                            <option value="man" id="man">Male</option>
                            <option value="other" id="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-row row">
                    <div class="form-group col-md-6">
                        <label>City</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="City" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Street Address</label>
                        <input type="text" class="form-control" id="inputStreet" placeholder="Street Address" required>
                    </div>
                </div>
                <div class="form-row row">
                    <div class="form-group col-md-6">
                        <label>State</label>
                        <input type="text" class="form-control" id="inputState" placeholder="State" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Age</label>
                        <input type="text" class="form-control" id="inputAge" placeholder="Age" required>
                    </div>
                </div>
                <div class="form-row row">
                    <div class="form-group col-md-6">
                        <label>Postal code</label>
                        <input type="text" class="form-control" id="inputPostal" placeholder="Postal code" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" id="inputPhone" placeholder="PhoneNumber" required>
                    </div>
                </div>
                <div class="m-3">
                    <button type="submit" class="btn btn-success" id="formSubmit">Submit</button>
                    <button type="button" class="btn btn-success d-none" id="updateBtn">Update</button>
                    <a href="dashboard.php" class="item">
                        <button type="button" class="btn btn-secondary" id="return">Return</button>
                    </a>

                </div>
            </form>

        </div>
        <!-- END FORM -->
    </div>
</div>


<!-- SCRIPTS -->
<script src="../assets/js/addEventListeners.js"></script>
<script src="../assets/js/takeFormData.js"></script>
<script src="../assets/js/setFormData.js"></script>
<!-- END SCRIPTS -->
<?php
include "../assets/html/footer.html";
?>