<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<html>
    <head>
        <title>Tico-Ride</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="external/js/jquery.js"></script>
        <link rel="stylesheet" href="materialize/css/materialize.min.css">
        <script src="materialize/js/materialize.min.js"></script>
        <link href="materialize/iconos/iconfont/material-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="external/css/principal.css">
    </head>
    <body onload="getRides()" >
      <nav>
        <div class="nav-wrapper grey darken-4 z-depth-4">
          <a href="#" class="brand-logo center">Tico-Ride<i class="material-icons" id="log" style="font-size: 35px">send</i></a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="modal-trigger" href="#login">Login</a></li>
            <li><a class="modal-trigger" href="#registro">Registrarse</a></li>
          </ul>
        </div>
      </nav>
      <div class="row">
        <ul class="center grey darken-4 col m8 offset-m2 z-depth-4">
          <li id="rides_disponibles"><h4>Rides Disponibles</h4></li>
        </ul>
      </div>
      <div class="row">
        <ul class="center collapsible popout col m8 offset-m2" data-collapsible="accordion" id="rides">
          
        </ul>
      </div>
      <!-- Modal Login -->
      <div id="login" class="modal modal-fixed-footer">
        <form action="" method="post">
          <div class="modal-content">
            <h4 class="center" id="title_login"><i class="material-icons">send</i>Tico-Ride<i class="material-icons">chevron_right</i>Login</h4>
            <div class="row">
              <div class="input-field col s12">
                <input id="user_login" type="text" class="validate" name="usuario" require>
                <label for="user_login">Usuario</label>
              </div>
              <div class="input-field col s12">
                <input id="password_login" type="password" class="validate" name="password" require>
                <label for="password_login">Contraseña</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect btn-flat" onclick="getUsuarioLogin()">Iniciar Sesión</a>
          </div>
        </form>
      </div>
      <!-- Modal Registro -->
      <div id="registro" class="modal modal-fixed-footer">
        
          <div class="modal-content">
            <h4 class="center" id="title_login"><i class="material-icons">send</i>Tico-Ride<i class="material-icons">chevron_right</i>Registro</h4>
            <div class="row">
              <div class="input-field col s12">
                <input id="name" type="text" class="validate" name="nombre" require>
                <label for="name">Nombre</label>
              </div>
              <div class="input-field col s12">
                <input id="apellido" type="text" class="validate" name="apellido" require>
                <label for="apellido">Primer Apellido</label>
              </div>
              <div class="input-field col s12">
                <input id="numero" type="number" class="validate" name="telefono" require>
                <label for="numero">Teléfono</label>
              </div>
              <div class="input-field col s12">
                <input id="user_add" type="text" class="validate" name="usuario" require>
                <label for="user_add">Usuario</label>
              </div>
              <div class="input-field col s12">
                <input id="password_add" type="password" class="validate" name="contrasena" require>
                <label for="password_add">Contraseña</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="modal-action modal-close waves-effect btn-flat" onclick="postUsuario()">Registrarse</a>
          </div>
        
      </div>
              
      <script>
        $(document).ready(function(){
          $('.collapsible').collapsible();
        });
        $(document).ready(function(){
          $('.modal').modal();
        });
      </script>
    </body>
    <script src="external/js/rides.js"></script>
    <script src="external/js/usuarios.js"></script>
    <script type="text/javascript"></script>
</html>