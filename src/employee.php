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

<!-- Get selected employee -->
<?php 
    if(isset($_POST["data"])) {
        $userData = $_POST["data"];
        $userData = json_decode($userData);
    }
?>

<!-- Form -->
<div class="container-fluid px-1 py-5">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card">
                <form class="form-card" onsubmit="event.preventDefault()">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>First name</label> <input type="text" id="fname" name="fname" value="<?=$userData->name;?>"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>Last name</label> <input type="text" id="lname" name="lname" value="<?=$userData->lastName;?>"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>Email address</label> <input type="email" id="email" name="email" value="<?=$userData->email;?>"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>Gender</label> 
                            <div class="d-flex justify-content-around align-items-center">
                            <div class="d-flex align-items-center gap-3">
                                        <input type="radio" id="male" name="gen">Male
                                        </div>
                                        <div class="d-flex align-items-center gap-3">
                                            <input type="radio" id="female" name="gen">Female
                                        </div>
                                        <div class="d-flex align-items-center gap-3">
                                            <input type="radio" id="non-binary" name="gen">Non-binary
                                        </div>
                            </div>
                            <!-- Check employee gender -->
                            <?php
                                switch($userData->gender){
                                    case "man": 
                                        ?><script>$("#male").attr('checked', 'checked');</script><?php
                                        break;
                                    case "woman": 
                                        ?><script>$("#female").attr('checked', 'checked');</script><?php
                                        break;
                                    case "no-bin": 
                                        ?><script>$("#non-binary").attr('checked', 'checked');</script><?php
                                        break;
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>City</label> <input type="text" id="city" name="city" value="<?=$userData->city;?>"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>Street Address</label> <input type="text" id="street" name="street" value="<?=$userData->streetAddress;?>"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>State</label> <input type="text" id="state" name="state" value="<?=$userData->state;?>"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>Age</label> <input type="number" id="age" name="age" value="<?=$userData->age;?>"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>Postal Code</label> <input type="number" id="postal" name="postal" value="<?=$userData->postalCode;?>"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>Phone Number</label> <input type="tel" id="phone" name="phone" value="<?=$userData->phoneNumber;?>"> </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-secundary">Return</button> </div>
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">Submit</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include("../assets/html/footer.html"); ?>