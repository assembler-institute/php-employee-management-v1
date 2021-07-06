$('#formLogin').on('submit', login);
function login(e) {
  e.preventDefault();
  var formData = $("#formLogin").serializeArray();
  $.ajax({
    type: "POST",
    url: "./src/library/loginManager.php",
    cache: false,
    data: formData,
    success: function (response) {
      $('.text-danger').text('');
    },
    error: function (response) {
      $('.text-danger').text('Wrong email or password');
    }
  });
}
