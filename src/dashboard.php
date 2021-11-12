<?php
require_once './library/sessionHelper.php';
checkSession();

include_once '../assets/html/header.html';
?>

<div class="container-fluid">
  <div class="row">

    <main class="col-12 ms-sm-auto px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome <span class="text-primary"><?= strstr(
                                                            $_SESSION['email'],
                                                            '@',
                                                            true
                                                          ) ?></span>, this is our Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
        </div>
      </div>

      <div id="jsGrid"></div>

      <script>
        $("#jsGrid").jsGrid({
          width: "100%",
          height: "600px",

          inserting: true,
          editing: true,
          sorting: true,
          paging: true,
          autoload: true,
          pageSize: 10,
          pageButtonCount: 5,
          // deleteConfirm: "Do you really want to delete data?",
          deleteConfirm: function(item) {
            return "The client \"" + item.name + " " + item.lastName + "\" will be removed. Are you sure?";
          },
          rowClick: function(args) {
            showDetailsDialog("Edit", args.item);
          },

          controller: {
            loadData: function(filter) {
              var d = $.Deferred();

              return $.ajax({
                url: "../resources/employees.json",
                type: "GET",
                dataType: "json",
                success: function(data) {
                  return d.resolve(data);
                }
              }).done(function() {
                console.log("data loaded");
              });
            },
            insertItem: function(item) {
              var d = $.Deferred();

              return $.ajax({
                type: "POST",
                url: "./library/employeeController.php",
                data: item,
                success: function(data) {
                  return d.resolve(data);
                }
              }).done(function() {
                console.log("data inserted");
              });
            },
            updateItem: function(item) {
              var d = $.Deferred();

              return $.ajax({
                type: "PUT",
                url: "./library/employeeController.php",
                data: item,
                success: function(data) {
                  return d.resolve(data);
                }
              }).done(function() {
                console.log("data updated");
              });
            },
            deleteItem: function(item) {
              var d = $.Deferred();

              return $.ajax({
                type: "DELETE",
                url: "./library/employeeController.php",
                data: {
                  id: item.id
                },
                success: function(data) {
                  return d.resolve(data);
                }
              }).done(function() {
                console.log("data deleted");
              });
            },
          },

          fields: [{
              name: "name",
              title: "Name",
              type: "text",
              width: 50,
              validate: "required"
            },
            {
              name: "lastName",
              title: "Last name",
              type: "text",
              width: 60,
              validate: "required"
            },
            {
              name: "email",
              title: "Email",
              type: "text",
              width: 80,
              validate: "required"
            },
            {
              name: "age",
              title: "Age",
              type: "number",
              width: 40,
              validate: function(value) {
                if (value > 0) {
                  return true;
                }
              }
            },
            {
              name: "postalCode",
              title: "Postal code",
              type: "number",
              width: 40
            },
            {
              name: "phoneNumber",
              title: "Phone number",
              type: "number",
              width: 60
            },
            {
              name: "state",
              title: "State",
              type: "text",
              width: 50
            },
            {
              name: "gender",
              title: "Gender",
              type: "select",
              items: [{
                  Name: "Man",
                  Id: 'man'
                },
                {
                  Name: "Woman",
                  Id: 'woman'
                },
                {
                  Name: "Other",
                  Id: 'other'
                }
              ],
              valueField: "Id",
              textField: "Name",
              align: "left",
              width: 40
            },
            {
              name: "city",
              title: "City",
              type: "text",
              width: 60
            },
            {
              name: "streetAddress",
              title: "Street address",
              type: "text",
              width: 40
            },
            {
              type: "control",
              editButton: true,
              deleteButton: true,
              editButtonTooltip: "Edit",
              deleteButtonTooltip: "Delete",
              updateButtonTooltip: "Update",
              cancelEditButtonTooltip: "Cancel edit",
            }
          ]
        });
      </script>
    </main>
  </div>
</div>

<?php include_once '../assets/html/footer.html'; ?>