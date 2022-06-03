<!-- TODO Employee view -->
<?php 
include('../assets/html/header.html');
?>


<!------------ Employee form------------>
<form class="container" action="" method="post">
    <div class="row g-3">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="First name" aria-label="First name">
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="Example@example.com" aria-label="Email">
        </div>
        <div class="col">
            <label for=""></label>
            <select class="form-control" name="gender" id="">
                <option value="Man">Man</option>
                <option value="Woman">Woman</option>
            </select>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="City" aria-label="City">
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="Street Address" aria-label="Street Address">
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="State" aria-label="State">
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="Age" aria-label="Age">
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="Postal Code" aria-label="Postal Code">
        </div>
        <div class="col">
            <label for=""></label>
            <input type="text" class="form-control" placeholder="PhoneNumber" aria-label="PhoneNumber">
        </div>
    </div>
    <button type="submit" class="btn btn-info mt-5">Submit</button>
    <button type="submit" class="btn btn-secondary mt-5">Return</button>
</form>

<?php 
    include('../assets/html/footer.html');
?>