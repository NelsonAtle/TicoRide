<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tico-Ride</title>
        <script src="http://localhost/ticoride/external/js/jquery.js"></script>
        <link rel="stylesheet" href="materialize/css/materialize.min.css">
        <script src="materialize/js/materialize.min.js"></script>
        <link href="materialize/iconos/iconfont/material-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="http://localhost/ticoride/external/css/home.css">
    </head>
    <body>
        <nav>
            <div class="nav-wrapper grey darken-4 z-depth-4">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
                <a href="#" class="brand-logo center">Tico-Ride<i class="material-icons" id="log" style="font-size: 35px">send</i></a>
            </div>
        </nav>
        <ul id="slide-out" class="side-nav tabs">
            <li style="height: 170px; margin-bottom: -45px; background-image: url('external/images/source.gif'); background-position: center; background-size: cover;">
                <div class="user-view">
                    <div class="container" id="menulogo">
                        <h3 style="color: white;"><i class="material-icons">send</i>Tico-Ride</h3>
                    </div>
                   
                    <h5 id="nombre_muestra"></h5>
                </div>
                
            </li>
            <li>
                <div class="divider sep"></div>
            </li>
            <li class="tab">
                <a href="#dashboard"><i class="material-icons">layers</i>Dashboard</a>
            </li>
            <li class="tab">
                <a href="#buscar"><i class="material-icons">search</i>Buscar Rides</a>
            
            </li>
            <li class="tab">
                <a href="#apartados"><i class="material-icons">search</i>Rides Apartados</a>
            
            </li>
            <li>
                <a href="#ajustes" class="modal-trigger"><i class="material-icons">build</i>Ajustes</a>
            </li>
            <li>
                <a href="#" onclick="postSalir();"><i class="material-icons">cancel</i>Salir</a>
            </li>
        </ul>
        <div id="contenedor">
            <div id="dashboard">
                <h5 id="dash" >DASHBOARD</h5>
                <div class="row">
                    <ul class="center collapsible popout" data-collapsible="accordion" id="rides_user">
                        
                    </ul>
                </div>
                <div class="fixed-action-btn ">
                    <a class="btn-floating btn-large red waves-effect modal-trigger" href="#crear_ride">
                        <i class="large material-icons">add</i>
                    </a>
                </div>
            </div>
            <div id="buscar">
                <h5 id="rides" >Lista Rides Disponibles</h5>
                <div class="row">
                    <ul class="center collapsible popout" data-collapsible="accordion" id="listaRidesBuscar">
                       
                    </ul>
                </div>
            </div>
            <div id="apartados">
                <h5 id="rideapartados" >Lista Rides Apartados</h5>
                <div class="row">
                    <ul class="center collapsible popout" data-collapsible="accordion" id="listaRidesApartados">
                       
                    </ul>
                </div>
            </div>
        </div>
        <!-- Modal Nuevo Ride -->
        <div id="crear_ride" class="modal modal-fixed-footer">
            <form action="" method="post">
                <input type="text" style="display: none;" id="conductor" >
                <div class="modal-content">
                    <h4 class="center" id="title_login"><i class="material-icons">send</i>Tico-Ride<i class="material-icons">chevron_right</i>Registro</h4>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">call_made</i>
                            <input id="salida" type="text" class="validate" name="salida" require>
                            <label for="salida">Salida</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">call_received</i>
                            <input id="llegada" type="text" class="validate" name="llegada" require>
                            <label for="llegada">Llegada</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">schedule</i>
                            <input id="hora_salida" type="text" class="timepicker" class="validate" name="hSalida" require>
                            <label for="hora_salida">Hora Salida</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">schedule</i>
                            <input id="hora_llegada" type="text" class="timepicker" class="validate" name="hLlegada" require>
                            <label for="hora_llegada">Hora Llegada</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">dashboard</i>
                            <input id="campos" type="number" class="validate" name="campos" require>
                            <label for="campos">Campos Disponibles</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">date_range</i>
                            <select multiple id="dias">
                                <option value="" disabled selected>Seleccione los días</option>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miercoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sabados">Sabados</option>
                                <option value="Domingos">Domingos</option>
                            </select>
                            <label>Días de disponibilidad</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">sms</i>
                            <input id="descripcion" type="text"  class="validate" name="descripcion" require>
                            <label for="descripcion">Descripción</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#!" onclick="postNewRide();" class="modal-action modal-close waves-effect btn-flat">Crear Ride</a>
                </div>
            </form>
        </div>
         <!-- Modal Modificar Ride -->
         <div id="mod_ride" class="modal modal-fixed-footer">
            <form action="" method="post">
                <div class="modal-content">
                    <h4 class="center" id="title_login"><i class="material-icons">send</i>Tico-Ride<i class="material-icons">chevron_right</i>Modificar</h4>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">call_made</i>
                            <input id="salid" type="text" class="validate" name="salida" require>
                            <label for="salid">Salida</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">call_received</i>
                            <input id="llegad" type="text" class="validate" name="llegada" require>
                            <label for="llegad">Llegada</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">schedule</i>
                            <input id="hora_salid" type="text" class="timepicker" class="validate" name="hSalida" require>
                            <label for="hora_salid">Hora Salida</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">schedule</i>
                            <input id="hora_llegad" type="text" class="timepicker" class="validate" name="hLlegada" require>
                            <label for="hora_llegad">Hora Llegada</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">dashboard</i>
                            <input id="campo" type="number" class="validate" name="campos" require>
                            <label for="campo">Campos Disponibles</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">date_range</i>
                            <select multiple id="dias_edit">
                                <option value="" disabled selected>Seleccione los días</option>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miercoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sabados">Sabados</option>
                                <option value="Domingos">Domingos</option>
                            </select>
                            <label>Días de disponibilidad</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">sms</i>
                            <input id="descripcio" type="text"  class="validate" name="descripcion" require>
                            <label for="descripcio">Descripción</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="modal-action modal-close waves-effect btn-flat" value="" onclick="putRide(this);" id="modRide">Actualizar Ride</button>
                </div>
            </form>
        </div>
        <!-- Modal Ajustes  -->
        <div id="ajustes" class="modal modal-fixed-footer">
            <form action="" method="post">
            <div class="modal-content">
                <h4 class="center" id="title_login"><i class="material-icons">send</i>Tico-Ride<i class="material-icons">chevron_right</i>Ajustes</h4>
                <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="name_user" type="text" class="validate" name="nombre" require>
                    <label for="name_user">Nombre</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="apellido" type="text" class="validate" name="apellido" require>
                    <label for="apellido">Primer Apellido</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">phone</i>
                    <input id="numero" type="number" class="validate" name="telefono" require>
                    <label for="numero">Teléfono</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input id="user_add" type="text" class="validate" name="usuario" require>
                    <label for="user_add">Usuario</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">bubble_chart</i>
                    <input id="password_add" type="password" class="validate" name="password" require>
                    <label for="password_add">Contraseña</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">bubble_chart</i>
                    <input id="password_repeat" type="password" class="validate" name="confirmar" require>
                    <label for="password_repeat">Contraseña Repetir</label>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" onclick="putUpdateUser();" class="modal-action modal-close waves-effect btn-flat">Cambiar</a>
            </div>
            </form>
      </div>
        <script>
            $(".button-collapse").sideNav();
            $('.timepicker').pickatime({
                default: 'now', // Set default time: 'now', '1:30AM', '16:30'
                fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
                twelvehour: false, // Use AM/PM or 24-hour format
                donetext: 'OK', // text for done-button
                cleartext: 'Clear', // text for clear-button
                canceltext: 'Cancel', // Text for cancel-button,
                container: undefined, // ex. 'body' will append picker to body
                autoclose: false, // automatic close timepicker
                ampmclickable: true, // make AM PM clickable
                aftershow: function(){} //Function for after opening timepicker
            });
            $(document).ready(function(){
                $('.modal').modal();
            });
            $(document).ready(function() {
                $('select').material_select();
            });
            $(document).ready(function(){
                $('ul.tabs').tabs();
            });
        </script>
       
        <script src="external/js/usuarios.js"></script>
        <script src="external/js/rides.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                getUsuarioData(<?php echo $_SESSION["ride"]; ?>);
                getIdRides();
                getRidesUser();
                getRideApartados();
            });
           
    </script>
    </body>
</html>