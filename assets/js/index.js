document.addEventListener("DOMContentLoaded", function (event) {
  // Read JSON by fetch
  fetch("../resources/employees.json")
    .then((res) => res.json())
    .then((data) => setupJsGrid(data));

  // Event listener to employee.php
  if (document.getElementById("employeeDetailForm") !== null) {
    document
      .getElementById("employeeDetailForm")
      .addEventListener("submit", processEditEmployee);
  }
});

function processEditEmployee(e) {
  e.preventDefault();
  let formData = new FormData(e.target);
  // Display the key/value pairs
  let item = {};
  for (var entry of formData.entries()) {
    let key = entry[0];
    let value = entry[1];
    item[key] = value;
  }

  makeRequest(item, "update");
}

// Create & Delete for AJAX
function insertNewEntry({ item }) {
  makeRequest(item, "create");
}

function deleteEntry({ item }) {
  makeRequest(item, "delete");
}

function editEntry({ item }) {
  window.location.replace(`employee.php?employeeId=${item.id}`);
}

function makeRequest(item, action) {
  fetch("../src/library/employeeController.php", {
    method: "post",
    body: JSON.stringify({
      item: item,
      action: action,
    }),
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then((res) => res.json())
    .then((msg) => {
      if (action === "update") window.location.replace(`dashboard.php`);
    });
}

function setupJsGrid(data) {
  $("#jsGrid").jsGrid({
    width: "100%",
    height: "400px",

    inserting: true,
    editing: true,
    sorting: true,
    paging: true,

    onItemInserted: insertNewEntry,
    onItemDeleted: deleteEntry,
    rowClick: editEntry,
    onItemEditing: editEntry,

    deleteConfirm: "Do you really want to delete the employee?",

    data: data,

    fields: [
      {
        name: "name",
        type: "text",
        validate: "required",
      },
      {
        name: "age",
        type: "text",
        validate: "required",
      },
      {
        name: "streetAddress",
        type: "text",
        validate: "required",
      },
      {
        name: "city",
        type: "text",
        validate: "required",
        textField: "Name",
      },
      {
        name: "state",
        type: "text",
        validate: "required",
        textField: "Name",
      },
      {
        name: "phoneNumber",
        type: "text",
        validate: "required",
        title: "Phone number",
      },
      {
        type: "control",
      },
    ],
  });
}

// Timer for inactivity
function activityWatcher() {
  //The number of seconds that have passed
  //since the user was active.
  var secondsSinceLastActivity = 0;

  //Five minutes. 60 x 5 = 300 seconds.
  var maxInactivity = 60 * 10;

  //Setup the setInterval method to run
  //every second. 1000 milliseconds = 1 second.
  setInterval(function () {
    secondsSinceLastActivity++;
    console.log(
      secondsSinceLastActivity + " seconds since the user was last active"
    );
    //if the user has been inactive or idle for longer
    //then the seconds specified in maxInactivity
    if (secondsSinceLastActivity > maxInactivity) {
      console.log(
        "User has been inactive for more than " + maxInactivity + " seconds"
      );
      //Redirect them to your logout.php page.
      window.location.replace(`../index.php?logout=timeout`);
    }
  }, 1000);

  //The function that will be called whenever a user is active
  function activity() {
    //reset the secondsSinceLastActivity variable
    //back to 0
    secondsSinceLastActivity = 0;
  }

  //An array of DOM events that should be interpreted as
  //user activity.
  var activityEvents = [
    "mousedown",
    "mousemove",
    "keydown",
    "scroll",
    "touchstart",
    "click",
  ];

  //add these events to the document.
  //register the activity function as the listener parameter.
  activityEvents.forEach(function (eventName) {
    document.addEventListener(eventName, activity, true);
  });
}

activityWatcher();
