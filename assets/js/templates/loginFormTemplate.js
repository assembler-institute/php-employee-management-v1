const FORM = ` <form action="src/library/loginController.php" method="post">
      <img src="./assets/img/assembler.png" class="me-3 img-form" alt="Assembler School">
      <div class="mb-1">
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Email address" data-bs-toggle="tooltip" data-bs-html="true" title="imassembler@assemblerschool.com" required>
      </div>
      <div class="mb-1">
        <input name="pass" type="password" class="form-control" id="floatingPassword" placeholder="Password" title="Assemb13r" required>
      </div>
      <button class="w-100 btn btn-md btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; Assembler School 2021</p>
    </form>`;

const insertForm = () => {
	//get <main> element
	document
		.getElementById("mainContainer")
		.insertAdjacentHTML("beforeend", FORM);
};

insertForm();
