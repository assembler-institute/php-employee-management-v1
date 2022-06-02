<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php 
include('../assets/html/header.html');
?>
<main>
    <table class="table" id="tableData">
        <thead id="tableHead">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Street No</th>
                <th>City</th>
                <th>State</th>
                <th>Postal Code</th>
                <th>Phone Number</th>
                <th>+</th>
            </tr>
        </thead>
        <!--  -->
        <tbody class="table__tbody--dataEmployer" id="tableBody">
        <div id="jsGrid"></div>
        </tbody>
    </table>
</main>
<?php 
    include('../assets/html/footer.html');
?>
    