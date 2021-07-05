let newUserText = document.getElementById("new__user--text");

newUserText.addEventListener("click", openNewForm);

function openNewForm() {
	let registerForm = document.getElementById("register_form");
	let flex_not_flex = registerForm.style.display;

  if(registerForm.style.display = "none"){
  	registerForm.style.display = "flex";
		newUserText.innerHTML = "Cancel registration";
  }
  if(flex_not_flex === "flex"){
  	registerForm.style.display = "none";
		newUserText.innerHTML = "New user, register now?";
  }
  console.log("clickeed");
}
