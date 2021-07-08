<header class="p-0 container-fluid d-flex flex-column align-items-center">
  <nav class="
navbar navbar-expand-lg navbar-light
bg-light
container-fluid
d-flex
justify-content-between
">
    <a class="navbar-brand font-weight-bold" href="./dashboard.php">Employee Management</a>
    <!-- Left buttons -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li id="dashboardLink" class="nav-item ">
          <a class="nav-link" href="./dashboard.php">Dashboard</a>
        </li>
        <li id="employeeLink" class="nav-item ">
          <a class="nav-link" href="./employee.php">Employee</a>
        </li>
      </ul>
    </div>
    <!-- Logout functionality -->
    <div class="d-flex align-items-center">
      <p class="m-0 text-info"><?php echo $_SESSION["loggedUsername"]; ?></p>
      <a class="btn btn-outline-info ml-3" href="./library/sessionHelper.php?login=false">Logout</a>
    </div>
  </nav>

  <div class="container-fluid alerts position-relative mt-2 d-flex justify-content-center">
    <!-- Success on POST -->
    <div id="postAlert" class="position-absolute alert alert-success alert-dismissible fade d-none" role="alert">
      Added new employee!
    </div>
    <!-- Success on PUT -->
    <div id="putAlert" class="position-absolute alert alert-success alert-dismissible fade d-none" role="alert">
      Updated new employee!
    </div>
    <!-- Deleted employee -->
    <div id="deleteAlert" class="position-absolute alert alert-danger alert-dismissible fade d-none" role="alert">
      Deleted employee!
    </div>
  </div>

</header>

<script src="../assets/js/headerLink.js"></script>