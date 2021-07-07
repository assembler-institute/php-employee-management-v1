// Checking remaining time interval
setInterval(function () {
  $.ajax({
    url: "http://localhost:8888/17.1-Php-Employee-Management/src/library/sessionHelper.php",
    type: "GET",
    data: {
      timeoutCheck: "true",
    },
    success: function (resp) {
      if (resp == "Logout") {
        console.log("Logging out");
        closeSessionAjax();
      } else {
        console.log("NOT logging out");
        console.log(resp);
      }
    },
  });
}, 10000);

// Closing the session
function closeSessionAjax() {
  $.ajax({
    url: "http://localhost:8888/17.1-Php-Employee-Management/src/library/sessionHelper.php",
    type: "GET",
    data: {
      login: "false",
    },
    success: function (resp) {
      location.reload();
    },
  });
}
