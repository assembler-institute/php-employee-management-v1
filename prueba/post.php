<?php
//nos lo traemos con un fetch
$usuario = $_POST['usuario']; #guardamos el usuario dentro de esta valriable
$pass = $_POST['pass']; #son los name del html
#tenemos k mandar una respuesta para k el archivo js lo interprete
if ($usuario ==='' || $pass ===''){
    #usuario = campo vacio ó password 
    // echo 'llena los campos';
    #fetch tiene datos en formato JSON, le metemos un jason_encode
    echo json_encode('error'); //enviamos nuestras respuestas en formato json
}else{
    echo json_encode('correcto: <br>Usuario:'.$usuario.'<br>Pass:'.$pass);
}



// public function _construct($name, $password)
?>