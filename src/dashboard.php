<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>

<body>
    <?php require_once "../assets/html/header.html" ?>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Age</th>
                <th scope="col">Street</th>
                <th scope="col">City</th>
                <th scope="col">Phone State</th>
                <th scope="col">Phone Postal Code</th>
                <th scope="col">Phone Number</th>
            </tr>
        </thead>
        <tbody>
<<<<<<< HEAD
            <?php require_once "" ?>
            <tr>
                <th scope="row">1</th>
                <td>Rack</td>
                <td>jackon@network.com</td>
                <td>24</td>
                <td>126</td>
                <td>San Jone</td>
                <td>CA</td>
                <td>394221</td>
                <td>7383627627</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Rack</td>
                <td>jackon@network.com</td>
                <td>24</td>
                <td>126</td>
                <td>San Jone</td>
                <td>CA</td>
                <td>394221</td>
                <td>7383627627</td>
            </tr>
=======
            <?php require_once "./library/employeeController.php"; ?>
            
>>>>>>> develop
        </tbody>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

    <?php require_once "../assets/html/footer.html" ?>

</body>

</html>