<!-- Imports -->
<?php
    require_once("./library/sessionHelper.php");
    checkSession();
?>

<script src="../assets/js/index.js" defer></script>

<!-- Change Header -->
<script>
    $(".employee").removeClass("a-non-active");
    $(".dashboard").addClass("a-non-active");
</script>

<!-- Get selected employee -->
<?php

    function returnData($field){
        if(isset($_POST["data"])) {
            $userData = json_decode($_POST["data"]);
            return $userData->$field;
        } else return "";
    }

?>

<!-- Form -->
<div class="container-fluid px-1 py-5">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card">
                <form id="employee-form" class="form-card" onsubmit="event.preventDefault()">
                    <div class="row justify-content-between text-left">
                        <input type="hidden" id="id" name="id" value="<?=returnData("id");?>">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>First name</label> <input type="text" id="fname" name="name" value="<?=returnData("name");?>"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>Last name</label> <input type="text" id="lname" name="lastName" value="<?=returnData("lastName");?>"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>Email address</label> <input type="email" id="email" name="email" value="<?=returnData("email");?>"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>Gender</label> 
                            <div class="d-flex justify-content-around align-items-center">
                            <div class="d-flex align-items-center gap-3">
                                        <input type="radio" id="male" name="gen" value="man">Male
                                        </div>
                                        <div class="d-flex align-items-center gap-3">
                                            <input type="radio" id="female" name="gen" value="woman">Female
                                        </div>
                                        <div class="d-flex align-items-center gap-3">
                                            <input type="radio" id="non-binary" name="gen" value="non-bi">Non-binary
                                        </div>
                            </div>
                            <!-- Check employee gender -->
                            <?php
                                switch(returnData("gender")){
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
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>City</label> <input type="text" id="city" name="city" value="<?=returnData("city");?>"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>Street Address</label> <input type="text" id="street" name="streetAddress" value="<?=returnData("streetAddress");?>"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>State</label> <input type="text" id="state" name="state" value="<?=returnData("state");?>"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>Age</label> <input type="number" id="age" name="age" value="<?=returnData("age");?>"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>Postal Code</label> <input type="number" id="postal" name="postalCode" value="<?=returnData("postalCode");?>"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label>Phone Number</label> <input type="tel" id="phone" name="phoneNumber" value="<?=returnData("phoneNumber");?>"> </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-secundary">Return</button> </div>
                        <div class="form-group col-sm-6"> <button type="submit" value="<?=returnData("id")?>" class="btn-block btn-primary">Submit</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include("../assets/html/footer.html"); ?>