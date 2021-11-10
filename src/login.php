<main class="min-vh-100 container-sm d-flex flex-column justify-content-center align-items-center gap-3">
	<h1 class="text-center display-4">Employee Manager</h1>
	<div class="border py-3 px-5 rounded-2">
		<h2 class="text-center fs-4 fw-light p-0 mb-4">Login</h2>
		<form class="login__form" method="POST" action="login.action.php">
			<input class="form-control form-control-lg mb-3 bg-light" type="text" name="user" id="user" placeholder="user@domain.com" />
			<input class="form-control form-control-lg mb-3 bg-light" type="password" name="password" id="password" placeholder="password" />
			<div class="d-flex justify-content-center gap-3">
				<!-- <button class="btn btn-primary" style="width: 8rem" type="submit">Login</button> -->
				<a class="btn btn-primary" href="index.php?logged">Fake login</a>
			</div>
		</form>
	</div>
</main>