<!-- TODO Employee view -->
<!--This file will be the employee view that will be used as much to view/edit
an existing one or to create a new one. -->
<?php
include "../assets/html/head.html";
include "../assets/html/header.html";
?>
<div class="container">
    <div class="row">
        <div class="col col-md-2 p-4">
            <div id="carouselExampleControls" class="carousel slide" data-bs-interval="false" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../assets/img/1.jpg" class="d-block w-100" alt="Photo">
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/img/2.jpg" class="d-block w-100" alt="Photo">
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/img/3.jpg" class="d-block w-100" alt="Photo">
                    </div>
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


        <div class="col col-md-8 p-4">
            <form>
                <div class="form-row row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Name</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Last Name</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="Surname">
                    </div>
                </div>
                <div class="form-row row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Gender</label>
                        <select id="inputState" class="form-control">
                            <option value="" selected>Choose...</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-row row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">City</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="City">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Street Address</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="Street Address">
                    </div>
                </div>
                <div class="form-row row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">State</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="State">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Age</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="Age">
                    </div>
                </div>
                <div class="form-row row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Postal code</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Postal code">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">PhoneNumber</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="PhoneNumber">
                    </div>
                </div>
                <div class="m-3">
                    <button type="submit" class="btn btn-primary" id="formSubmit">Submit</button>
                    <button type="submit" class="btn btn-secondary" id="return">Return</button>
                </div>
            </form>
        </div>

        <div class="col col-md-2 p-4">
            <h1>RATIO CHART HERE!</h1>
        </div>
    </div>
</div>


<?php
include "../assets/html/footer.html";
?>