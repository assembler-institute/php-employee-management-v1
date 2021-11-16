const NAV = `
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="../assets/img/logo.gif" alt="..." height="45" />
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php"
            ><span class="fas fa-users"></span> Dashboard</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./employee.php"
            ><span class="fas fa-user"></span> Employee</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./library/loginController.php?logout=true"
            ><span class="fas fa-sign-out-alt"></span> Log out</a
          >
        </li>
      </ul>
    </div>
  </div>
</nav>
`;

const insertNav = () => {
	//get BODY element right at the start

	console.log(document.getElementById("mainContainer"));
	document
		.getElementById("mainContainer")
		.insertAdjacentHTML("beforeBegin", NAV);
};

insertNav();
