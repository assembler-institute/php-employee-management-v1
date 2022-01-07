<?php
include "../assets/html/header.html"
    ?>
<!-- NAV -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="../assets/img/logo.jpg" alt="" width="25">
    </a>
    <a class="navbar-brand" href="#">Employees Management</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Employee</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div id="jsGrid"></div>

<?php
include "../assets/html/footer.html"
    ?>