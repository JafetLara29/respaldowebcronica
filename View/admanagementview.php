<div class="card">
    <div class="card-header red-dark">
        <h3 class="card-title">Administración de anuncios</h3>
        <div class="card-tools">
            <a onclick="loadPage('content-wrapper', './addadform.php')" class="btn btn-success">Agregar</a>
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
            <table class="table text-center" id="table">
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Página</th>
                        <th>Posición</th>
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
    '<p style="color:white; margin:0; paading:0;" class="loading-message">"La única cosa mejor que recibir buenas noticias, es hacer buenas noticias"</p><div class="sk-plane sk-center"></div>'
  });
</script>

<script>
    var dataTable;

    $(document).ready(function () {
            window.loading_screen.finish();
        getAll();
    });

    //! Obtener todo
    function getAll(){
        $.ajax({
            type: "POST",
            url: "../Business/adaction.php",
            data: {
                'action': 'getAll'
            },
            dataType: "json",
            success: function (response) {  
                var rows = "";
                var optionsPage = ['Seleccionar', 'Noticias', 'Categorias'];
                var optionsPosition = ['Seleccionar', 'Arriba', 'Derecha'];
                var pages = '';
                var positions = '';

                if(response != ""){//Si vienen registros
                    for (let i = 0; i < response.length; i++) {
                        pages = '';
                        positions = '';
                        
                        pages += '<select class="form-control" name="page" id="page">';

                        for(let j = 0; j < optionsPage.length; j++){
                            if(response[i]['page'] == optionsPage[j]){
                                pages += '<option selected value="'+optionsPage[j]+'">'+optionsPage[j]+'</option>';    
                            }else{
                                pages += '<option value="'+optionsPage[j]+'">'+optionsPage[j]+'</option>';    
                            }
                        }
                        pages += '</select>'

                        positions += '<select class="form-control" name="position" id="position">';

                        for(let j = 0; j < optionsPosition.length; j++){
                            if(response[i]['position'] == optionsPosition[j]){
                                positions += '<option selected value="'+optionsPosition[j]+'">'+optionsPosition[j]+'</option>';    
                            }else{
                                positions += '<option value="'+optionsPosition[j]+'">'+optionsPosition[j]+'</option>';    
                            }
                        }
                        positions += '</select>'

                        rows += "<tr>" +
                        "<td>" + response[i]['description'] + "</td>" +
                        "<td>" +
                            "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#myModalimg"+response[i]['id']+"'>ver</button>" +
                            "<div class='modal fade' id='myModalimg"+response[i]['id']+"' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>" +     
                            "<div class='modal-dialog modal-lg' role='document'>" +
                                        "<div class='modal-content'>" +
                                            "<div class='modal-header'>" +
                                                "<h4 class='modal-title'>Formulario</h4>" +
                                                "<div id='message'></div>" +
                                            "</div>" +
                                            "<div class='modal-body text-center'>" +
                                                "<img class='img-thumbnail' src='../Images/Ads/"+response[i]['image']+"' alt='Imagen de anuncio'/>" +
                                            "</div>" +
                                            "<div class='modal-footer'>" +
                                                "<button type='button' class='btn btn-default close' data-dismiss='modal'>Cerrar</button>" +
                                            "</div>"+
                                        "</div>"+
                                    "</div>"+
                                "</div>"+
                        "</td>" +
                        "<td>" +
                            response[i]['page'] +
                        "</td>"+
                        "<td>" +
                            response[i]['position'] +
                        "</td>"+
                        "<td class='d-flex justify-content-center'>" +
                            "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal"+response[i]['id']+"'>Editar</button>" +
                            "<div class='modal fade' id='myModal"+response[i]['id']+"' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>" +     
                            "<div class='modal-dialog modal-lg' role='document'>" +
                                        "<div class='modal-content'>" +
                                            "<div class='modal-header'>" +
                                                "<h4 class='modal-title'>Formulario</h4>" +
                                                "<div id='message'></div>" +
                                            "</div>" +
                                            "<div class='modal-body text-center'>" +
                                                "<form id='ad-edit-form"+response[i]['id']+"' method='post'>" +
                                                    "<div class='mb-3' >" +
                                                        pages +
                                                    "</div>" +
                                                    "<div class='mb-3' >" +
                                                        positions +
                                                    "</div>" +
                                                    "<div class='mb-3'>" +
                                                        "<textarea class='form-control' name='description' id='description' placeholder='Descripción' required>"+response[i]['description']+"</textarea>" +
                                                    "</div>" +
                                                    "<div class='mb-3'>" +
                                                        "<img class='img-fluid' src='../Images/Ads/"+response[i]['image']+"' alt='Imagen de anuncio'>" +
                                                        "<br> Seleccione otra imagen para reemplazar la actual si lo desea:" +
                                                        "<input class='form-control' name='image' type='file' accept='image/*'>" +
                                                    "</div>" +
                                                    "<div>" +
                                                        "<input class='form-control' name='link' type='text' placeholder='Link' value='"+response[i]['link']+"'>" +
                                                    "</div>" +
                                                    "<input type='hidden' name='action' value='edit'>" +
                                                    "<input type='hidden' name='id' value='"+response[i]['id']+"'>" +
                                                    "<input class='btn btn-warning' type='button' onClick='edit_("+response[i]['id']+")' value='Editar'>" +
                                                "</form>" +
                                            "</div>" +
                                            "<div class='modal-footer'>" +
                                                "<button type='button' class='btn btn-default close' data-dismiss='modal'>Cerrar</button>" +
                                            "</div>"+
                                        "</div>"+
                                    "</div>"+
                                "</div>"+
                            "<input class='btn btn-danger' type='submit' value='Eliminar' onClick=\"delete_("+response[i]['id']+", '"+response[i]['image']+"')\">" +
                            
                        "</td>" +
                        "</tr>";
                    }
                    // $(selector).html(htmlString);
                    $('#table tbody').html(rows);
                    dataTable = $('#table').DataTable({
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                        }
                        // lengthMenu: [ [1, 5, 10, 15], [1, 5, 15, "All"] ]
                    });
                }else{//Si no vienen registros
                    $('#table tbody').html('<p class="text-danger">No hay anuncios para mostrar</p>');
                }
            }
        });
    }

    // !Editar
   function edit_(id) {
       //Detenemos el envio de los datos del formulario
       var form = document.getElementById('ad-edit-form'+id);

       $('#myModal'+id).modal('hide');
       //Verificamos que todos los campos estén llenos
       if($("#myModal"+id+" #description").val() != ""){
           //Hacemos esperar medio segundo el proceso de editado para dar chance a que se cierre el modal correctamente
           setTimeout(function(){
               //Hacemos consulta ajax para editar
               $.ajax({
                   type: "POST",
                   url: "../Business/adaction.php",
                   data: new FormData(form),
                   processData: false,  // tell jQuery not to process the data
                   contentType: false,   // tell jQuery not to set contentType
                   dataType: "json",
                   success: function (response) {
                       if(response['message'] == 'success'){
                           
                            swal.fire("Éxito!", "Se editó la información del anuncio exitosamente", "success");
                            dataTable.destroy();
                            getAll();

                        }else if(response['message'] == 'error'){
                           swal.fire("Error!", "Ha ocurrido un error al editar el anuncio", "error");
                       }else if(response['message'] == 'img-error'){
                            swal.fire("Error!", "Solo se pueden seleccionar imágenes en el input de archivo o la imagen seleccionada no es de un formato acceptado", "error");
                        }else if(response['message'] == 'description-error'){
                            swal.fire("Error!", "El input de descripción debe ser llenado", "error");
                        }
                   }
               });
           },500);
       }else{
           swal.fire("Error!", "Hay espacios sin llenar en el formulario", "error")
       }
   }
    // !Editar
    function delete_(id, image) {

        $.ajax({
            type: "POST",
            url: "../Business/adaction.php",
            data: {
                'id': id,
                'image': image,
                'action': 'delete'
            },
            dataType: "json",
            success: function (response) {
                if(response['message'] == 'success'){
                    
                    swal.fire("Éxito!", "Se eliminó la información del anuncio exitosamente", "success");
                    dataTable.destroy();
                    getAll();

                }else if(response['message'] == 'error'){
                    swal.fire("Error!", "Ha ocurrido un error al eliminar el anuncio", "error");
                }
            }
        });
   }
</script>