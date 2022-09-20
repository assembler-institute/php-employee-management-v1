// console.log('Funcionando');


// java script detecte el form
let formulario = document.getElementById('formulario');
// detectar cuando el usuario  pulse el boton

        let respuesta = document.getElementById('respuesta');


formulario.addEventListener('submit', function(e){
    // cuando se presione el boton del formulario, se pasara una funcion 
    e.preventDefault();  //evita qhe se ejecute lo k viene por defecto en el navegador, procesar el formulario
    console.log('me diste un click')
    
    let datos = new FormData(formulario) //indica que es una nueva informacion de formulario de let formulario
    console.log(datos);        //esto es la variable formulario
    //como se si se estan registrando bien los datos
    console.log(datos.get('usuario'));        //esto es la variable formulario
    console.log(datos.get('pass'));        //esto es la variable formulario
    //con esto hemos detectado los imput con un addeventlistenerun submit y un nuevo formulario
    //ahora tenemos k enviarlos al php

 //por eso er importante que el boton tenga tipo submit

// despues de pasar por .php procesamos los datos traidos:
fetch('post.php',{
    method: 'POST',
    body: datos
    })
    .then( res => res.json())
    .then( data => { //nos llegan los datos
        console.log(data)
        if(data === 'error'){  //este error es el de .php linea 10
            respuesta.innerHTML() = `
            <div class="alert alert-danger" role="alert">
            llena los camposss!
            </div>
            `
        }else{
            respuesta.innerHTML() = `
            <div class="alert alert-primary" role="alert">
                ${data}
            </div>
            `
        }
        //     esta es la info k viene del php


    })
})


