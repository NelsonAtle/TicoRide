function getRides(){
    $.ajax({
        url:   'http://localhost/ticoride-server/public/api/get/rides/',
        type:  'get',
        success:  function (response) {
                datos= $.parseJSON(response);
                
                for (var i = 0; i < datos.length; i++) {
                    var array_datos = [datos[i].conductor,datos[i].salida,datos[i].llegada,datos[i].hora_salida,
                                datos[i].hora_llegada,datos[i].campos,datos[i].dias,datos[i].descripcion];
                    var dias = array_datos[6];
                    dias="'"+dias+"'";
                    dias = dias.replace(/,/g,"<br>");

                    var toast = 'onclick="Materialize.toast('+dias+', 5000)"';
                    
                    
                    var li = "<li>"+
                                "<div class='collapsible-header z-depth-4'>"+
                                    "<i class='material-icons whatshot'>whatshot</i>"+
                                        "<span>"+array_datos[1]+" - "+array_datos[2]+"</span>"+
                                "</div>"+
                                "<div class='collapsible-body'>"+
                                    "<table>"+
                                        "<tr class='table_rides'>"+
                                            "<td>Conductor</td>"+
                                            "<td>Hora Salida</td>"+
                                            "<td>Hora LLegada</td>"+
                                            "<td>Campos</td>"+
                                            "<td>Días</td>"+
                                            "<td>Descripción</td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td>"+array_datos[0]+"</td>"+
                                            "<td>"+array_datos[3]+"</td>"+
                                            "<td>"+array_datos[4]+"</td>"+
                                            "<td>"+array_datos[5]+"</td>"+
                                           " <td>"+
                                                "<a class='btn'"+toast+">Ver</a>"+
                                            "</td>"+
                                           " <td>"+array_datos[7]+"</td>"+
                                       " </tr>"+
                                   " </table>"+
                                "</div>"+
                            "</li>";
                    $( "#rides" ).append( li );
                }
        }
    });
}
function postNewRide(){
    var dias = $("#dias").val();
    var lista = "";
    for (var i = 0; i < dias.length; i++) {
        lista+=dias[i]+",";
    }
    
    var parametros = {
        "salida" : document.getElementById("salida").value,
        "llegada" : document.getElementById("llegada").value,
        "hora_salida" : document.getElementById("hora_salida").value,
        "hora_llegada" : document.getElementById("hora_llegada").value,
        "campos" : document.getElementById("campos").value,
        "dias" : lista,
        "descripcion" : document.getElementById("descripcion").value,
        "conductor" : document.getElementById("conductor").value
    };
    
    $.ajax({
        data:  parametros, //datos que se envian a traves de ajax
        url:   'http://localhost/ticoride-server/public/api/post/new_ride/', //archivo que recibe la peticion
        type:  'post', //método de envio
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            alert("Registro Exitoso");
            $("#rides_user li").remove();
            getRidesUser();
        }
    });
}
function postApartar(id,campos){
    $.ajax({
        url:   'http://localhost/ticoride-server/public/api/post/apartar/'+id, //archivo que recibe la peticion
        type:  'post', //método de envio
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            putRideApartar(id,campos);
            location.reload();
        }
    });
}
function deleteRide(id){
    $.ajax({ //datos que se envian a traves de ajax
        url:   'http://localhost/ticoride-server/public/api/delete/ride/'+id, //archivo que recibe la peticion
        type:  'delete', //método de envio
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            alert(response);
        }
    });
}
function deleteApartar(id_ride,id_ride_user){
    $.ajax({ //datos que se envian a traves de ajax
        url:   'http://localhost/ticoride-server/public/api/delete/ride_user/'+id_ride+"/"+id_ride_user, //archivo que recibe la peticion
        type:  'delete', //método de envio
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            getRideApartar(id_ride);
        }
    });
}
function getRidesNoUser(sql){
    var parametros={
        "sql" : sql
    };
    $.ajax({
        data: parametros,
        url:   'http://localhost/ticoride-server/public/api/get/rides_out/',
        type:  'get',
        success:  function (response) {
                datos= $.parseJSON(response);
                
                for (var i = 0; i < datos.length; i++) {
                    var array_datos = [datos[i].conductor,datos[i].salida,datos[i].llegada,datos[i].hora_salida,
                                datos[i].hora_llegada,datos[i].campos,datos[i].dias,datos[i].descripcion,datos[i].id];
                    var dias = array_datos[6];
                    dias="'"+dias+"'";
                    dias = dias.replace(/,/g,"<br>");

                    var toast = 'onclick="Materialize.toast('+dias+', 5000)"';
                 
                    var li = "<li>"+
                                "<div class='collapsible-header z-depth-4'>"+
                                    "<i class='material-icons whatshot' style='color: #e65100;'>whatshot</i>"+
                                        "<span>"+array_datos[1]+" - "+array_datos[2]+"</span>"+
                                "</div>"+
                                "<div class='collapsible-body'>"+
                                    "<table>"+
                                        "<tr class='table_rides'>"+
                                            "<td>Conductor</td>"+
                                            "<td>Hora Salida</td>"+
                                            "<td>Hora LLegada</td>"+
                                            "<td>Campos</td>"+
                                            "<td>Días</td>"+
                                            "<td>Descripción</td>"+
                                            "<td></td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td>"+array_datos[0]+"</td>"+
                                            "<td>"+array_datos[3]+"</td>"+
                                            "<td>"+array_datos[4]+"</td>"+
                                            "<td>"+array_datos[5]+"</td>"+
                                           " <td>"+
                                                "<a class='btn'"+toast+">Ver</a>"+
                                            "</td>"+
                                           " <td>"+array_datos[7]+"</td>"+
                                           "<td><a class='btn blue' onclick='postApartar("+array_datos[8]+","+array_datos[5]+")'>Apartar</a></td>"+
                                       " </tr>"+
                                   " </table>"+
                                "</div>"+
                            "</li>";
                    $( "#listaRidesBuscar" ).append( li );
                }
        }
    });
}
function getIdRides(){
    $.ajax({
        url:   'http://localhost/ticoride-server/public/api/get/id_ride/', //archivo que recibe la peticion
        type:  'get', //método de envio
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            //var session = "$_SESSION['ride'] = $usuarios[0]["id"];"
            var rides = JSON.parse(response);
            if (rides=="") {
                var sql = "SELECT rides.* FROM rides where ";
            }else{
                var sql = "SELECT rides.* FROM rides where rides.id <> ";
                for (var i = 0; i < rides.length; i++) {
                    if (i==0) {
                        sql+=rides[i].id_ride+" and";
                    }else{
                        if (i==1) {
                            sql+=" rides.id <> "+rides[i].id_ride+" and";
                        }else{
                            sql+=" rides.id <> "+rides[i].id_ride+" and";
                        }
                    }
                }
            }
            getRidesNoUser(sql);
        }
    });
}
function getRidesUser(){
    $.ajax({
        url:   'http://localhost/ticoride-server/public/api/get/rides_user/',
        type:  'get',
        success:  function (response) {
                datos= $.parseJSON(response);
                for (var i = 0; i < datos.length; i++) {
                    var array_datos = [datos[i].salida,
                                       datos[i].llegada,
                                       datos[i].hora_salida,
                                       datos[i].hora_llegada,
                                       datos[i].campos,
                                       datos[i].dias,
                                       datos[i].descripcion,
                                       datos[i].id];
                    var dias = array_datos[5];
                    dias="'"+dias+"'";
                    dias = dias.replace(/,/g,"<br>");

                    var toast = 'onclick="Materialize.toast('+dias+', 5000)"';
                 
                    var li = "<li>"+
                                "<div class='collapsible-header z-depth-4'>"+
                                    "<i class='material-icons' style='color: #e65100;'>whatshot</i>"+
                                        "<span>"+array_datos[0]+" - "+array_datos[1]+"</span>"+
                                "</div>"+
                                "<div class='collapsible-body'>"+
                                    "<table>"+
                                        "<tr class='table_rides'>"+
                                            "<td>Salida</td>"+
                                            "<td>LLegada</td>"+
                                            "<td>Hora Salida</td>"+
                                            "<td>Hora LLegada</td>"+
                                            "<td>Campos</td>"+
                                            "<td>Días</td>"+
                                            "<td>Descripción</td>"+
                                            "<td class='crud'></td>"+
                                            "<td class='crud'></td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td>"+array_datos[0]+"</td>"+
                                            "<td>"+array_datos[1]+"</td>"+
                                            "<td>"+array_datos[2]+"</td>"+
                                            "<td>"+array_datos[3]+"</td>"+
                                            "<td>"+array_datos[4]+"</td>"+
                                           " <td>"+
                                                "<a class='btn'"+toast+">Ver</a>"+
                                            "</td>"+
                                           " <td>"+array_datos[6]+"</td>"+
                                           " <td>"+
                                                "<a href='#mod_ride' class='btn modal-trigger' onclick='getRide("+array_datos[7]+");'>"+
                                                    "<i class='material-icons'>autorenew</i>"+
                                                "</a>"+
                                           "</td>"+
                                           "<td>"+
                                                "<a href='' class='btn red' onclick='deleteRide("+array_datos[7]+");'>"+
                                                    "<i class='material-icons'>clear</i>"+
                                                "</a>"+
                                            "</td>"+
                                       " </tr>"+
                                   " </table>"+
                                "</div>"+
                            "</li>";
                    $("#rides_user").append(li);
                }
        }
    });
}
function putRide(id){
    var dias = $("#dias_edit").val();
    var lista = "";
    for (var i = 0; i < dias.length; i++) {
        lista+=dias[i]+",";
    }
    var parametros = {
        "salida" : document.getElementById("salid").value,
        "llegada" : document.getElementById("llegad").value,
        "hora_salida" : document.getElementById("hora_salid").value,
        "hora_llegada" : document.getElementById("hora_llegad").value,
        "campos" : document.getElementById("campo").value,
        "dias" : lista,
        "descripcion" : document.getElementById("descripcio").value,
    };
    
    $.ajax({
        data:  parametros, //datos que se envian a traves de ajax
        url:   'http://localhost/ticoride-server/public/api/put/ride/'+id.value, //archivo que recibe la peticion
        type:  'put', //método de envio
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            alert(response);
        }
    });
}
function patchRideApartar(id,campos){
   
    
    var parametros = {
        "campos" : campos
    };
    
    $.ajax({
        data:  parametros, //datos que se envian a traves de ajax
        url:   'http://localhost/ticoride-server/public/api/patch/ride/'+id, //archivo que recibe la peticion
        type:  'patch', //método de envio
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            alert(response);
            location.reload();
        }
    });
}
function putRideApartar(id,cantidad){
    $.ajax({
        url:   'http://localhost/ticoride-server/public/api/put/ride_apartar/'+id+'/'+cantidad, //archivo que recibe la peticion
        type:  'put', //método de envio
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#listaRidesBuscar li").remove();
            getIdRides();
            alert(response);
        }
    });
}
function getRide(id){
   $.ajax({
        url:   'http://localhost/ticoride-server/public/api/get/ride/'+id,
        type:  'get',
        success:  function (response) {
                datos= $.parseJSON(response);
                document.getElementById("salid").value = datos[0].salida;
                document.getElementById("llegad").value = datos[0].llegada;
                document.getElementById("hora_salid").value = datos[0].hora_salida; 
                document.getElementById("hora_llegad").value = datos[0].hora_llegada;
                document.getElementById("campo").value = datos[0].campos;
                //document.getElementById("dias_edit").value = datos[0].dias;
                document.getElementById("descripcio").value = datos[0].descripcion;
                document.getElementById("modRide").value = datos[0].id;
                var dias =  datos[0].dias;
                dias = dias.split(",");
                var lista = new Array(dias.length);
                $("#dias_edit").material_select('destroy');
                for (var i = 0; i < dias.length; i++) {
                    lista.push(dias[i]);
                }
                $('#dias_edit').val(lista).material_select();
                //$("#dias_edit option").prop("selected", true);
                //$("#dias_edit").material_select()
                $(function() {
                    Materialize.updateTextFields();
                });
        }
    });  
}
function getRideApartar(id){
   $.ajax({
        url:   'http://localhost/ticoride-server/public/api/get/ride/'+id,
        type:  'get',
        success:  function (response) {
                datos= $.parseJSON(response);
                patchRideApartar(id,parseInt(datos[0].campos)+1);


        }
    });  
}
function getRideApartados(){
   $.ajax({
        url:   'http://localhost/ticoride-server/public/api/get/rides_apartados/',
        type:  'get',
        success:  function (response) {
                datos= $.parseJSON(response);
                
                for (var i = 0; i < datos.length; i++) {
                    var array_datos = [datos[i].conductor,datos[i].salida,datos[i].llegada,datos[i].hora_salida,
                                datos[i].hora_llegada,datos[i].campos,datos[i].dias,datos[i].descripcion,datos[i].id,datos[i].id_r];
                    var dias = array_datos[6];
                    dias="'"+dias+"'";
                    dias = dias.replace(/,/g,"<br>");

                    var toast = 'onclick="Materialize.toast('+dias+', 5000)"';
                 
                    var li = "<li>"+
                                "<div class='collapsible-header z-depth-4'>"+
                                    "<i class='material-icons whatshot' style='color: #e65100;'>whatshot</i>"+
                                        "<span>"+array_datos[1]+" - "+array_datos[2]+"</span>"+
                                "</div>"+
                                "<div class='collapsible-body'>"+
                                    "<table>"+
                                        "<tr class='table_rides'>"+
                                            "<td>Conductor</td>"+
                                            "<td>Hora Salida</td>"+
                                            "<td>Hora LLegada</td>"+
                                            "<td>Campos</td>"+
                                            "<td>Días</td>"+
                                            "<td>Descripción</td>"+
                                            "<td></td>"+
                                        "</tr>"+
                                        "<tr>"+
                                            "<td>"+array_datos[0]+"</td>"+
                                            "<td>"+array_datos[3]+"</td>"+
                                            "<td>"+array_datos[4]+"</td>"+
                                            "<td>"+array_datos[5]+"</td>"+
                                           " <td>"+
                                                "<a class='btn'"+toast+">Ver</a>"+
                                            "</td>"+
                                           " <td>"+array_datos[7]+"</td>"+
                                           "<td><a class='btn blue' onclick='deleteApartar("+array_datos[8]+","+array_datos[9]+")'>Cancelar</a></td>"+
                                       " </tr>"+
                                   " </table>"+
                                "</div>"+
                            "</li>";
                    $( "#listaRidesApartados" ).append( li );
                }
        }
    });  
}
