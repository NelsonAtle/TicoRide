function postUsuario(){
    var parametros = {
        "nombre" : document.getElementById("name").value,
        "apellido" : document.getElementById("apellido").value,
        "telefono" : document.getElementById("numero").value,
        "usuario" : document.getElementById("user_add").value,
        "contrasena" : document.getElementById("password_add").value
    };
    $.ajax({
        data:  parametros, //datos que se envian a traves de ajax
        url:   'http://localhost/ticoride-server/public/api/post/usuario/', //archivo que recibe la peticion
        type:  'post', //método de envio
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            alert("Registro Exitoso");
        }
    });
}

function getUsuarioLogin(){
    var parametros = {
        "usuario" : document.getElementById("user_login").value,
        "contrasena" : document.getElementById("password_login").value
    };
    $.ajax({
        data:  parametros, //datos que se envian a traves de ajax
        url:   'http://localhost/ticoride-server/public/api/get/usuario/', //archivo que recibe la peticion
        type:  'get', //método de envio
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
           // var session = "<?php $_SESSION[ride] = 4?>"
            var usuario = JSON.parse(response);
         
            window.location.replace("http://localhost/ticoride/home");
        }
    });
}

function getUsuarioData(id){
    
    var parametros = {
        "id" : id
    };
    
    $.ajax({
        data:  parametros, //datos que se envian a traves de ajax
        url:   'http://localhost/ticoride-server/public/api/get/usuario_data/', //archivo que recibe la peticion
        type:  'get', //método de envio
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            //var session = "$_SESSION['ride'] = $usuarios[0]["id"];"
            var usuario = JSON.parse(response);
            document.getElementById("nombre_muestra").innerHTML = usuario[0].nombre+" "+usuario[0].apellido;
            document.getElementById("conductor").value = usuario[0].nombre+" "+usuario[0].apellido;
            document.getElementById("name_user").value = usuario[0].nombre;
            document.getElementById("apellido").value = usuario[0].apellido;
            document.getElementById("numero").value = usuario[0].telefono;
            document.getElementById("user_add").value = usuario[0].usuario;
            document.getElementById("password_add").value = usuario[0].contrasena;
            document.getElementById("password_repeat").value = usuario[0].contrasena;
            $(function() {
                Materialize.updateTextFields();
            });
        }
    });
}

function putUpdateUser(){
    var pass1 = document.getElementById("password_add").value;
    var pass2 = document.getElementById("password_repeat").value;
    if (pass1 != pass2) {
        alert("Contraseñas no coinciden");
    }else{
        var parametros = {
            "nombre" : document.getElementById("name_user").value,
            "apellido" : document.getElementById("apellido").value,
            "telefono" : document.getElementById("numero").value,
            "usuario" : document.getElementById("user_add").value,
            "contrasena" : document.getElementById("password_add").value
        };
        
        $.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   'http://localhost/ticoride-server/public/api/put/usuario/', //archivo que recibe la peticion
            type:  'put', //método de envio
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                alert(response);
            }

        });
    }
}

function postSalir(){
    $.ajax({
        url:   'http://localhost/ticoride-server/public/api/post/salir/', //archivo que recibe la peticion
        type:  'post', //método de envio
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            window.location.replace("http://localhost/ticoride/");
        }
    });
}

