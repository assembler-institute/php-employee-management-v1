<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
require_once("./library/sessionHelper.php");
checkSession();

?>
    <main>
      <div>
      <?php
      include_once("header.php");
      ?>
      </div>
      <br>
      <sectiion class="dashboard__table__containeer">
        <table id="dashboardEmployeeTable" class="dashboard__employee__table" style="border-spacing: 0px;">
          <tr id="employeFields" class="dashboard__employe__th">
            <th>NAME</th>
            <th>EMAIL</th>
            <th>AGE</th>
            <th>STREET No.</th>
            <th>CITY</th>
            <th>STATE</th>
            <th>POSTAL CODE</th>
            <th>PHONE NUMBER</th>
            <th>
              <button id="dashboardAddNewEmployee">Add Employee</button>
            </th>
          </tr>
        </table>
      </sectiion>
    </main>
  </body>
</html>
