document.addEventListener("DOMContentLoaded", function (event) {
  initJsGrid();

  // Event listener to employee.php
  if (document.getElementById("employeeDetailForm") !== null) {
    document
      .getElementById("employeeDetailForm")
      .addEventListener("submit", processEditEmployee);
  }
});

function initJsGrid() {
  // Read JSON by fetch
  fetch("../resources/employees.json")
    .then((res) => res.json())
    .then((data) => setupJsGrid(data));
}

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

function addEmployeeAlert() {
  let alertHtml = `<div class='alert alert-success alert-dismissible fade show bottom-right' role='alert'>
                  <strong> Employee Added Successfully!</strong>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                  </button>
          </div>`;

  document.querySelector("body").insertAdjacentHTML("beforeend", alertHtml);
}

// Create & Delete for AJAX

function editEntry({ item }) {
  window.location.href = `employee.php?employeeId=${item.id}`;
}

function deleteEntry({ item }) {
  makeRequest(item, "delete");
}

// Adding New Entry: Waiting for makeRequest function to finish before getting the json again and updating the grid

function insertNewEntry({ item }) {
  let promise = new Promise((resolve, reject) => {
    return makeRequest(item, "create", resolve, reject);
  });

  promise.then((resolve, reject) => {
    if (reject?.status === "rejected") {
      new Error("Failed to Add/Update Employee");
    }

    if (resolve?.status === "resolved") {
      addEmployeeAlert();
      initJsGrid();
    }
  });
}

function makeRequest(item, action, resolve = null, reject = null) {
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
      if (action === "update")
        window.location.href = `dashboard.php?updated=success`;
      if (typeof resolve == "function")
        return resolve({ message: msg, status: "resolved" });
    })
    .catch((err) => {
      if (typeof reject == "function") reject({ err: err, status: "rejected" });
    });
}

function setupJsGrid(data) {
  $("#jsGrid").jsGrid({
    width: "100%",
    height: "25rem",

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
        title: "Name",
      },
      {
        name: "age",
        type: "number",
        validate: "required",
        title: "Age",
      },
      {
        name: "streetAddress",
        type: "text",
        validate: "required",
        title: "Street Address",
      },
      {
        name: "city",
        type: "text",
        validate: "required",
        textField: "Name",
        title: "City",
      },
      {
        name: "state",
        type: "text",
        validate: "required",
        textField: "Name",
        title: "State",
      },
      {
        name: "phoneNumber",
        type: "number",
        validate: "required",
        title: "Phone number",
      },
      {
        type: "control",
        editButton: false,
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
    //console.log(secondsSinceLastActivity + ' seconds since the user was last active');
    //if the user has been inactive or idle for longer
    //then the seconds specified in maxInactivity
    if (secondsSinceLastActivity > maxInactivity) {
      //console.log('User has been inactive for more than ' + maxInactivity + ' seconds');
      //Redirect them to your logout.php page.
      window.location.href = `../index.php?logout=timeout`;
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
