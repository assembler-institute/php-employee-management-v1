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
        <input id="name" name="name" placeholder="Introduce your name"/>
        <input id="lastname" name="lastName" placeholder="Introduce your lastname"/>
        <input id="email" name="email" placeholder="Introduce your email" />
        <input id="gender" name="gender" placeholder="Introduce your gender"/>
        <input id="age" name="age" placeholder="Introduce your age"/>
        <input id="city" name="city" placeholder="Introduce your city"/>
        <input id="state" name="state" placeholder="Introduce your state"/>
        <input id="streetAddress" name="streetAddress" placeholder="Introduce your street address"/>
        <input id="postalcode" name="postalCode" placeholder="Introduce your postal code"/>
        <input id="phonenumber" name="phoneNumber" placeholder="Introduce your phone number"/>
        <button type="submit" name="id" value="'.$id.'">Enviar</button>
    </form>
</div>'

?>

