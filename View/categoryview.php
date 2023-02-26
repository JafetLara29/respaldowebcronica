<div class="card">
    <div class="card-header red-dark">
        <h3 class="card-title">Administración de categorías</h3>
        <div class="card-tools">
            <a onclick="loadPage('content-wrapper', './addcategoryform.php')" class="btn btn-success">Agregar</a>
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
                        <th>Nombre</th>
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
        setTimeout(function (){
            window.loading_screen.finish();
        }, 4000);
        getAll();
    });
    //! Obtener todo
    function getAll(){
        $.ajax({
            type: "POST",
            url: "../Business/categoryaction.php",
            data: {
                'action': 'getAll'
            },
            dataType: "json",
            success: function (response) {
                var rows = "";
                if(response != ""){//Si vienen registros
                    for (let i = 0; i < response.length; i++) {
                        rows += "<tr>" +
                        "<td>" + response[i]['name'] + "</td>" +
                        
                        "<td class='d-flex justify-content-center'>" +
                            "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#myModal"+response[i]['id']+"'>Editar</button>" +
                            "<div class='modal fade' id='myModal"+response[i]['id']+"' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>" +     
                            "<div class='modal-dialog modal-lg' role='document'>" +
                                        "<div class='modal-content'>" +
                                            "<div class='modal-header'>" +
                                                "<h4 class='modal-title'>Formulario</h4>" +
                                            "</div>" +
                                            "<div class='modal-body text-center'>" +
                                                "<form id='category-edit-form"+response[i]['id']+"' method='post'>" +
                                                    "<div class='mb-3'>" +
                                                        "<input type='text' class='form-control' name='name' id='name' placeholder='Nombre de la categoría' required value='"+response[i]['name']+"' />" +
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
                            "<form id='delete-user-form' class='pl-1' method='post'>" +
                                "<input type='hidden' name='action' value='Delete'>" +
                                "<input type='hidden' name='id' id='id' value='"+ response[i]['id'] +"'>" +
                                "<input class='btn btn-danger' type='button' value='Eliminar' onClick='delete_("+response[i]['id']+")'>" +
                            "</form>" +
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
                    $('#table tbody').html('<p class="text-danger">No hay categorías para mostrar</p>');
                }
            }
        });
    }

    // !Editar
   function edit_(id) {
       //Detenemos el envio de los datos del formulario
       var form = document.getElementById('category-edit-form'+id);

       $('#myModal'+id).modal('hide');
       //Verificamos que todos los campos estén llenos
       if($("#myModal"+id+" #name").val() != ""){
           //Hacemos esperar medio segundo el proceso de editado para dar chance a que se cierre el modal correctamente
           setTimeout(function(){
               //Hacemos consulta ajax para editar
               $.ajax({
                   type: "POST",
                   url: "../Business/categoryaction.php",
                   data: new FormData(form),
                   processData: false,  // tell jQuery not to process the data
                   contentType: false,   // tell jQuery not to set contentType
                   dataType: "json",
                   success: function (response) {
                       if(response['message'] == 'success'){
                           
                            swal.fire("Éxito!", "Se editó la información de la categoría exitosamente", "success");
                            dataTable.destroy();
                            getAll();

                        }else if(response['message'] == 'error'){
                           swal.fire("Error!", "Ha ocurrido un error al editar la categoría", "error");
                       }else if(response['message'] == 'name-error'){
                            swal.fire("Error!", "El input de nombre debe ser llenado", "error");
                        }
                   }
               });
           },500);
       }else{
           swal.fire("Error!", "Hay espacios sin llenar en el formulario", "error")
       }
   }

    // !Eliminar
    function delete_(id) {
       $.ajax({
            type: "POST",
            url: "../Business/categoryaction.php",
            data: {
                'id': id,
                'action': 'delete' 
            },
            dataType: "json",
            success: function (response) {
                if(response['message'] == 'success'){
                    
                    swal.fire("Éxito!", "Se eliminó la categoría exitosamente", "success");
                    dataTable.destroy();
                    getAll();

                }else if(response['message'] == 'error'){
                    swal.fire("Error!", "Ha ocurrido un error al eliminar la categoría", "error");
                }
            }
        });
   }
</script>