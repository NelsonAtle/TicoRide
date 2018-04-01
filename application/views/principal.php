<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
    <head>
        <title>Tico-Ride</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="external/css/principal.css">
    </head>
    <body>
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
        <ul class="center collapsible popout col m8 offset-m2" data-collapsible="accordion">
          <li>
            <div class="collapsible-header z-depth-4">
              <i class="material-icons whatshot">whatshot</i>First
            </div>
            <div class="collapsible-body">
              <table>
                <tr class="table_rides">
                  <td>Conductor</td>
                  <td>Hora</td>
                  <td>Salida</td>
                  <td>Llegada</td>
                  <td>Campos Disponibles</td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </table>
            </div>
          </li>
        </ul>
      </div>
      <!-- Modal Login -->
      <div id="login" class="modal modal-fixed-footer">
        <form action="" method="post">
          <div class="modal-content">
            <h4 class="center" id="title_login"><i class="material-icons">send</i>Tico-Ride<i class="material-icons">chevron_right</i>Login</h4>
            <div class="row">
              <div class="input-field col s12">
                <input id="user" type="text" class="validate" name="usuario" require>
                <label for="user">Usuario</label>
              </div>
              <div class="input-field col s12">
                <input id="password" type="password" class="validate" name="password" require>
                <label for="password">Contraseña</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect btn-flat">Iniciar Sesión</a>
          </div>
        </form>
      </div>
      <!-- Modal Registro -->
      <div id="registro" class="modal modal-fixed-footer">
        <form action="" method="post">
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
                <input id="password_add" type="password" class="validate" name="password" require>
                <label for="password_add">Contraseña</label>
              </div>
              <div class="input-field col s12">
                <input id="password_repeat" type="password" class="validate" name="confirmar" require>
                <label for="password_repeat">Contraseña Repetir</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect btn-flat">Registrarse</a>
          </div>
        </form>
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
</html>