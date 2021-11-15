/**
 * add event listeners
 */

document.getElementById("updateBtn").addEventListener("click", (e) => {
  e.preventDefault();
  ajaxUpdateEmployee(takeFormData());
});

document.getElementById("inputEmployee").addEventListener("change", (e) => {
  $employeeSelected = e.target.value;
  ajaxGetEmployee($employeeSelected);
});

document.getElementById("inputGender").addEventListener("change", (e) => {
  $gender = e.target.value;
  document.getElementById("inputGender").setAttribute("data-key", $gender);
});
document.getElementById("newBtn").addEventListener("click", () => {
  location.reload();
});

document.getElementById("deleteBtn").addEventListener("click", () => {
  $id = document.getElementById("inputId").value;
  ajaxDeleteEmployee($id);
});

document.getElementById("formEmployee"),
  addEventListener("submit", (e) => {
    e.preventDefault();
    ajaxCreateEmployee(takeFormData());
  });
