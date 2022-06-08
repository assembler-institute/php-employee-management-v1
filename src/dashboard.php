<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
require_once("./library/sessionHelper.php");
checkSession();
include_once("header.php");
?>
    <main>
      <sectiion class="dashboard__table__containeer">
        <table id="dashboardEmployeeTable" class="dashboard__employee__table">
          <tr class="dashboard__employe__th">
            <th>NAME</th>
            <th>EMAIL</th>
            <th>AGE</th>
            <th>STREET No.</th>
            <th>CITY</th>
            <th>STATE</th>
            <th>POSTAL CODE</th>
            <th>PHONE NUMBER</th>
            <th>
              <button id="dashboardAddNewEmployee">+</button>
            </th>
          </tr>
        </table>
      </sectiion>
    </main>
  </body>
</html>
