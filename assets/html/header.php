<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
      <a class="navbar-brand" href="#">Employees Management</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= $_SERVER['SCRIPT_NAME']=="/PHP-EMPLOYEE-MANAGEMENT-V1/src/dashboard.php" ? "active": "" ?>">
            <a class="nav-link" href="./dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item <?= $_SERVER['SCRIPT_NAME']=="/PHP-EMPLOYEE-MANAGEMENT-V1/src/employee.php" ? "active": "" ?>">
            <a class="nav-link" href="./employee.php">Employee</a>
          </li>
        </ul>
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
              <a class="nav-link" href="../src/library/loginController.php?logout">Log out</a>
          </li>
          </ul>
      </div>
    </nav>
</header>