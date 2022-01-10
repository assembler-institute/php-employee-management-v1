<!-- TODO Employee view -->
<?php
include_once "./../assets/html/header.html" 
?>
     <link rel="stylesheet" href="../assets/css/main.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>login</title>
</head> 
<body>
    <!-- <form action="./../assets/html/header.html" method="post"></form> -->
<div class="wrapper rounded bg-white">
    <div class="h3">Registration Form</div>
    <div class="form">
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>First Name</label> <input type="text" class="form-control" required> </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Last Name</label> <input type="text" class="form-control" required> </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Birthday</label> <input type="date" class="form-control" required> </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Gender</label>
                <div class="d-flex align-items-center mt-2"> <label class="option"> <input type="radio" name="radio">Male <span class="checkmark"></span> </label> <label class="option ms-4"> <input type="radio" name="radio">Female <span class="checkmark"></span> </label> </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-md-0 mt-3"> <label>Email</label> <input type="email" class="form-control" required> </div>
            <div class="col-md-6 mt-md-0 mt-3"> <label>Phone Number</label> <input type="tel" class="form-control" required> </div>
        </div>
        <div class=" my-md-2 my-3"> <label>Subject</label> <select id="sub" required>
                <option value="" selected hidden>Choose Option</option>
                <option value="Maths">Maths</option>
                <option value="Science">Science</option>
                <option value="Social">Social</option>
                <option value="Hindi">Hindi</option>
            </select> </div>
        <div class="btn btn-primary mt-3">Submit</div>
    </div>
</div>
</body>
</html>
