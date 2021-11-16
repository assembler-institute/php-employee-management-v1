<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="./dashboard.php">Employee Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="./dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link 
        <?php
        $disable = str_contains($_SERVER['REQUEST_URI'], 'employee.php') ? '' : 'disabled';
        echo $disable;
        ?>" href="">Employee</a>
      </li>
    </ul>
    <form action="../index.php?logout=user" method="POST">
      <input type="submit" class="btn btn-link flex-end" value="Logout" />
    </form>
  </div>
</nav>