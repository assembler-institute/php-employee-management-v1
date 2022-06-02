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
                <th id="add">+</th>
            </tr>
            <form action="./library/employeeController.php" method="post">
                <tr id="rowInput" class="hide">
                    <td> <input type="text" name="name" id="">
                    </td>
                    <td><input type="email" name="email" id=""> </td>
                    <td><input type="number" name="age" id=""></td>
                    <td> <input type="text" name="address"></td>
                    <td><input type="text" name="city" id=""></td>
                    <td><input type="text" name="state" id=""></td>
                    <td> <input type="number" name="postalCode" id=""></td>
                    <td><input type="tel" name="phone" id=""></td>
                    <td><button type="submit" name="submit">+</button></td>
                </tr>
            </form>
        </thead>
        <!--  -->
        <tbody class="table__tbody--dataEmployer" id="tableBody">
        </tbody>
    </table>
</main>
<?php 
    include('../assets/html/footer.html');
?>