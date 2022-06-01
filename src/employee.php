<!-- TODO Employee view -->
<?php
$id = $_GET['id'];

require('./library/employeeManager.php');

function setEmployee($id){

    if (isset($id)) {
        $employee = getEmployee($id);
        var_dump($employee);
    }
}


setEmployee($id);

echo '<div>
    <form action="./library/employeeController.php?id='.$id.'" method="post">
        <input id="name" name="name" />
        <input type="submit" name="update">
    </form>
</div>'

?>


