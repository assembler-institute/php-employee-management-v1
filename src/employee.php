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
        <!-- GALLERY -->
        <div class="col col-md-3 p-4">
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
        </div>
        <!-- END GALLERY -->

        <!-- FORM -->
        <div class="col col-md-6 p-4">
            <form id="formEmployee">
                <div class="form-row row">
                    <input type="hidden" class="form-control" id="inputId" value="X">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control" id="inputLast" placeholder="Surname">
                    </div>
                </div>
                <div class="form-row row">
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6" id="inputGender">
                        <label for="inputState">Gender</label>
                        <select id="inputState" class="form-control" id="inputGender2">
                            <option value="" selected id="inputGenderNone">Choose...</option>
                            <option value="Female" id="inputGenderFemale">Female</option>
                            <option value="Male" id="inputGenderMale">Male</option>
                            <option value="Other" id="inputGenderOther">Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-row row">
                    <div class="form-group col-md-6">
                        <label>City</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="City">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Street Address</label>
                        <input type="text" class="form-control" id="inputStreet" placeholder="Street Address">
                    </div>
                </div>
                <div class="form-row row">
                    <div class="form-group col-md-6">
                        <label>State</label>
                        <input type="text" class="form-control" id="inputState" placeholder="State">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Age</label>
                        <input type="text" class="form-control" id="inputAge" placeholder="Age">
                    </div>
                </div>
                <div class="form-row row">
                    <div class="form-group col-md-6">
                        <label>Postal code</label>
                        <input type="text" class="form-control" id="inputPostal" placeholder="Postal code">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" id="inputPhone" placeholder="PhoneNumber">
                    </div>
                </div>
                <div class="m-3">
                    <button type="submit" class="btn btn-primary" id="formSubmit">Submit</button>
                    <button type="submit" class="btn btn-secondary" id="return">Return</button>
                </div>
            </form>
        </div>
        <!-- END FORM -->

        <!-- CHART -->
        <div class="col col-md-3 p-4">
            <h1>RATIO CHART HERE!</h1>
        </div>
        <!-- END CHART -->
    </div>
</div>


<?php
include "../assets/html/footer.html";
?>
<script>
    //?GENDER  post.gender.value? 
    //document.getElementById("inputGenderNone").removeAttribute("selected");
    //document.getElementById(`inputGender${post.gender.value}`).setAttribute("selected", true);
    document.getElementById("inputGender").addEventListener('change', (e) => {
        $gender = e.target.value;
        document.getElementById("inputGender").setAttribute('data-key', $gender)

    })

    document.getElementById("formEmployee"), addEventListener('submit', (e) => {
        e.preventDefault();
        let formData = {
            id: $("#inputId").val(),
            name: $("#inputName").val(),
            lastName: $("#inputLast").val(),
            email: $("#inputEmail").val(),
            gender: document.getElementById("inputGender").dataset.key,
            city: $("#inputCity").val(),
            streetAddress: $("#inputStreet").val(),
            state: $("#inputState").val(),
            age: $("#inputAge").val(),
            postalCode: $("#inputPostal").val(),
            phoneNumber: $("#inputPostal").val(),
            photo: document.querySelectorAll(".active")[1].firstElementChild.getAttribute("src")
        };
        console.log(formData);
    })
    /* cosas */
</script>