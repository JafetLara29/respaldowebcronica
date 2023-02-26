<div class="card">
    <div class="card-header red-dark">
        <h3 class="card-title">Administración de usuarios</h3>
        <div class="card-tools">
            <a onclick="loadPage('content-wrapper', './adduserformview.php')" class="btn btn-success">Agregar</a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table text-center" id="table-users">
                <thead>
                    <tr>
                        <th>Nombre de usuario</th>
                        <th>Contraseña</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center"> 
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Please wait -->
<script src="./Assets/dist/js/pleasewait.js"></script>
<script type="text/javascript">
  window.loading_screen = window.pleaseWait({
    logo: "../Images/Logo/cronical_logo_letras_blancas.png",
    backgroundColor: 'rgb(254, 1, 2)',
    loadingHtml: 
    '<p style="color:white; margin:0; paading:0;" class="loading-message">"La única cosa mejor que hacer buenas noticias, es hacer buenas noticias"</p><div class="sk-plane sk-center"></div>'
  });
</script>
<script>
    $(document).ready(function () {
        setTimeout(function (){
            window.loading_screen.finish();
        }, 4000);
        
        $.ajax({
            type: "POST",
            url: "../Business/useraction.php",
            data: {
                'action': 'getUsers'
            },
            dataType: "json",
            success: function (response) {
                var rows = "";
                if(response != ""){//Si vienen registros
                    for (let i = 0; i < response.length; i++) {
                        rows += "<tr>" +
                        "<td>" + response[i]['user_name'] + "</td>" +
                        "<td>" + response[i]['password'] + "</td>" +
                        "<td>" + response[i]['type_user'] + "</td>" +
                        "<td class='d-flex justify-content-center'>" +
                            "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal"+response[i]['id_user']+"'>Editar</button>" +
                            "<div class='modal fade' id='myModal"+response[i]['id_user']+"' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>" +     
                            "<div class='modal-dialog modal-lg' role='document'>" +
                                        "<div class='modal-content'>" +
                                            "<div class='modal-header'>" +
                                                "<h4 class='modal-title'>Formulario</h4>" +
                                                "<div id='message'></div>" +
                                            "</div>" +
                                            "<div class='modal-body text-center'>" +
                                                "<form id='form"+response[i]['id_user']+"' method='post'>" +
                                                    "<div class='mb-3'>" +
                                                        "<input type='text' class='form-control' name='username' id='username' placeholder='Nombre de usuario' value='"+response[i]['user_name']+"'>" +
                                                    "</div>" +
                                                    "<div class='mb-3'>" +
                                                        "<input type='text' class='form-control' name='password' id='password' placeholder='Contraseña' value='"+response[i]['password']+"'>" +
                                                    "</div>" +
                                                    "<div class='mb-3'>" +
                                                        "<label for='user_type' class='form-label'>Tipo de usuario</label>" +
                                                        "<select class='form-control' name='user_type' id='user_type'>" +
                                                            "<option "+((response[i]['type_user']=='master') ?'selected':'')+">master</option>" +
                                                            "<option "+((response[i]['type_user']=='reportero') ?'selected':'')+">reportero</option>" +
                                                        "</select>" +
                                                    "</div>" +
                                                    "<input class='btn btn-warning' type='button' value='Editar' onClick='edit_("+response[i]['id_user']+")'>" +
                                                "</form>" +
                                            "</div>" +
                                            "<div class='modal-footer'>" +
                                                "<button type='button' class='btn btn-default close' data-dismiss='modal'>Cerrar</button>" +
                                            "</div>"+
                                        "</div>"+
                                    "</div>"+
                                "</div>"+
                            "<form id='delete-user-form' class='pl-1' method='post'>" +
                                "<input type='hidden' name='action' value='Delete'>" +
                                "<input type='hidden' name='id' id='id' value='"+ response[i]['id_user'] +"'>" +
                                "<input class='btn btn-danger' type='submit' value='Eliminar' onClick='delete_("+response[i]['id_user']+")'>" +
                            "</form>" +
                        "</td>" +
                        "</tr>";
                    }
                    // $(selector).html(htmlString);
                    $('#table-users tbody').append(rows);
                }else{//Si no vienen registros
                    $('#table-users tbody').html('<p class="text-danger">No hay usuarios para mostrar</p>');
                }
            }
        });
    });

    function delete_(id){
        //Detenemos el envio de los datos del formulario
        event.preventDefault();
        //Hacemos consulta ajax para extraer los datos de nuevo y refrescar la lista
        $.ajax({
                type: "POST",
                url: "../Business/useraction.php",
                data: {
                    'action': 'delete',
                    'id': id
                },
                dataType: "json",
                success: function (response) {
                    if(response['message'] == 'success'){
                        swal.fire("Éxito!", "Usuario eliminado exitosamente", "success");
                        $.ajax({
                            type: "POST",
                            url: "../Business/useraction.php",
                            data: {
                                'action': 'getUsers'
                            },
                            dataType: "json",
                            success: function (response) {
                                var rows = "";
                                if(response != ""){//Si vienen registros
                                    for (let i = 0; i < response.length; i++) {
                                        rows += "<tr>" +
                                        "<td>" + response[i]['user_name'] + "</td>" +
                                        "<td>" + response[i]['password'] + "</td>" +
                                        "<td>" + response[i]['type_user'] + "</td>" +
                                        "<td class='d-flex justify-content-center'>" +
                                            "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal"+response[i]['id_user']+"'>Editar</button>" +
                                            "<div class='modal fade' id='myModal"+response[i]['id_user']+"' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>" +     
                                            "<div class='modal-dialog modal-lg' role='document'>" +
                                                        "<div class='modal-content'>" +
                                                            "<div class='modal-header'>" +
                                                                "<h4 class='modal-title'>Formulario</h4>" +
                                                                "<div id='message'></div>" +
                                                            "</div>" +
                                                            "<div class='modal-body text-center'>" +
                                                                "<form id='form"+response[i]['id_user']+"' method='post'>" +
                                                                    "<div class='mb-3'>" +
                                                                        "<input type='text' class='form-control' name='username' id='username' placeholder='Nombre de usuario' value='"+response[i]['user_name']+"'>" +
                                                                    "</div>" +
                                                                    "<div class='mb-3'>" +
                                                                        "<input type='text' class='form-control' name='password' id='password' placeholder='Contraseña' value='"+response[i]['password']+"'>" +
                                                                    "</div>" +
                                                                    "<div class='mb-3'>" +
                                                                        "<label for='user_type' class='form-label'>Tipo de usuario</label>" +
                                                                        "<select class='form-control' name='user_type' id='user_type'>" +
                                                                            "<option "+((response[i]['type_user']=='master') ?'selected':'')+">master</option>" +
                                                                            "<option "+((response[i]['type_user']=='reportero') ?'selected':'')+">reportero</option>" +
                                                                        "</select>" +
                                                                    "</div>" +
                                                                    "<input class='btn btn-warning' type='button' value='Editar' onClick='edit_("+response[i]['id_user']+")'>" +
                                                                "</form>" +
                                                            "</div>" +
                                                            "<div class='modal-footer'>" +
                                                                "<button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>" +
                                                            "</div>"+
                                                        "</div>"+
                                                    "</div>"+
                                                "</div>"+
                                            "<form id='delete-user-form' class='pl-1' method='post'>" +
                                                "<input type='hidden' name='action' value='Delete'>" +
                                                "<input type='hidden' name='id' id='id' value='"+ response[i]['id_user'] +"'>" +
                                                "<input class='btn btn-danger' type='submit' value='Eliminar' onClick='delete_("+response[i]['id_user']+")'>" +
                                            "</form>" +
                                        "</td>" +
                                        "</tr>";
                                    }
                                    // $(selector).html(htmlString);
                                    $('#table-users tbody').html(rows);
                                }else{//Si no vienen registros
                                    $('#table-users tbody').html('<p class="text-danger">No hay usuarios para mostrar</p>');
                                }
                            }
                        });
                    }else if(response['message'] == 'error'){
                        swal.fire("Error!", "Ha ocurrido un error al eliminar al usuario", "error");
                    }
                }
            });
    }
    function edit_(id){
        //Detenemos el envio de los datos del formulario
        event.preventDefault();
        $('#myModal'+id).modal('hide');
        //Verificamos que todos los campos estén llenos
        if($("#myModal"+id+" #username").val() != "" && $("#myModal"+id+" #password").val() != "" && $("#myModal"+id+" #user_type").val() != ""){
            //Hacemos esperar medio segundo el proceso de editado para dar chance a que se cierre el modal correctamente
            setTimeout(function(){
                //Hacemos consulta ajax para editar
                $.ajax({
                    type: "POST",
                    url: "../Business/useraction.php",
                    data: {
                        'action': 'edit',
                        'id': id,
                        'user_name': $("#myModal"+id+" #username").val(), 
                        'password': $("#myModal"+id+" #password").val(), 
                        'user_type': $("#myModal"+id+" #user_type").val()
                    },
                    dataType: "json",
                    success: function (response) {
                        if(response['message'] == 'success'){
                            swal.fire("Éxito!", "Se editó la información del usuario exitosamente", "success");
                            
                            $.ajax({
                                type: "POST",
                                url: "../Business/useraction.php",
                                data: {
                                    'action': 'getUsers'
                                },
                                dataType: "json",
                                success: function (response) {
                                    var rows = "";
                                    if(response != ""){//Si vienen registros
                                        for (let i = 0; i < response.length; i++) {
                                            rows += "<tr>" +
                                            "<td>" + response[i]['user_name'] + "</td>" +
                                            "<td>" + response[i]['password'] + "</td>" +
                                            "<td>" + response[i]['type_user'] + "</td>" +
                                            "<td class='d-flex justify-content-center'>" +
                                                "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal"+response[i]['id_user']+"'>Editar</button>" +
                                                "<div class='modal fade' id='myModal"+response[i]['id_user']+"' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>" +     
                                                "<div class='modal-dialog modal-lg' role='document'>" +
                                                            "<div class='modal-content'>" +
                                                                "<div class='modal-header'>" +
                                                                    "<h4 class='modal-title'>Formulario</h4>" +
                                                                    "<div id='message'></div>" +
                                                                "</div>" +
                                                                "<div class='modal-body text-center'>" +
                                                                    "<form id='form"+response[i]['id_user']+"' method='post'>" +
                                                                        "<div class='mb-3'>" +
                                                                            "<input type='text' class='form-control' name='username' id='username' placeholder='Nombre de usuario' value='"+response[i]['user_name']+"'>" +
                                                                        "</div>" +
                                                                        "<div class='mb-3'>" +
                                                                            "<input type='text' class='form-control' name='password' id='password' placeholder='Contraseña' value='"+response[i]['password']+"'>" +
                                                                        "</div>" +
                                                                        "<div class='mb-3'>" +
                                                                            "<label for='user_type' class='form-label'>Tipo de usuario</label>" +
                                                                            "<select class='form-control' name='user_type' id='user_type'>" +
                                                                                "<option "+((response[i]['type_user']=='master') ?'selected':'')+">master</option>" +
                                                                                "<option "+((response[i]['type_user']=='reportero') ?'selected':'')+">reportero</option>" +
                                                                            "</select>" +
                                                                        "</div>" +
                                                                        "<input class='btn btn-warning' type='button' value='Editar' onClick='edit_("+response[i]['id_user']+")'>" +
                                                                    "</form>" +
                                                                "</div>" +
                                                                "<div class='modal-footer'>" +
                                                                    "<button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>" +
                                                                "</div>"+
                                                            "</div>"+
                                                        "</div>"+
                                                    "</div>"+
                                                "<form id='delete-user-form' class='pl-1' method='post'>" +
                                                    "<input type='hidden' name='action' value='Delete'>" +
                                                    "<input type='hidden' name='id' id='id' value='"+ response[i]['id_user'] +"'>" +
                                                    "<input class='btn btn-danger' type='submit' value='Eliminar' onClick='delete_("+response[i]['id_user']+")'>" +
                                                "</form>" +
                                            "</td>" +
                                            "</tr>";
                                        }
                                        // $(selector).html(htmlString);
                                        $('#table-users tbody').html(rows);
                                    }else{//Si no vienen registros
                                        $('#table-users tbody').html('<p class="text-danger">No hay usuarios para mostrar</p>');
                                    }
                                }
                            });
                        }else if(response['message'] == 'error'){
                            $('#message').html("<p class='text-danger'>Ha ocurrido un error al editar al usuario</p>");
                            // swal.fire("Error!", "Ha ocurrido un error al editar al usuario", "error");
                        }
                    }
                });
            },500);
        }else{
            swal.fire("Error!", "Hay espacios sin llenar en el formulario", "error")
        }
    }
</script>