<?php
require_once("./library/sessionHelper.php");
checkSession();

include_once '../assets/html/header.html'
?>

<div class="container-fluid">
  <div class="row">

    <main class="col-12 ms-sm-auto px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome <span class="text-primary"><?= strstr($_SESSION["email"], '@', true) ?></span>, this is our Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
        </div>
      </div>

      <div id="jsGrid"></div>

      <script>

        var clients = (function() {
                var json = null;
                $.ajax({
                    'async': false,
                    'global': false,
                    'url': "../resources/employees.json",
                    'dataType': "json",
                    'success': function (data) {
                        json = data;
                    }
                });
                return json;
        })();

        $("#jsGrid").jsGrid({
            width: "100%",
            height: "600px",

            inserting: true,
            editing: true,
            sorting: true,
            paging: true,

            data: clients,

            fields: [
                { name: "name", type: "text", width: 70, validate: "required" },
                { name: "lastName", type: "text", width: 80, validate: "required" },
                { name: "email", type: "text", width: 80, validate: "required" },
                { name: "age", type: "number", width: 25 },
                { name: "postalCode", type: "number", width: 30 },
                { name: "phoneNumber", type: "number", width: 40 },
                { name: "state", type: "text", width: 50 },
                { name: "gender", type: "text", width: 20 },
                { name: "city", type: "text", width: 80 },
                { name: "streetAddress", type: "text", width: 50 },
                { type: "control" }
            ]
        });

  </script>
    </main>
  </div>
</div>

<?php include_once '../assets/html/footer.html'; ?>