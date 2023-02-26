<div class="card">
    <div class="card-header text-light red-dark">
        <h3 class="card-title">Administración de noticias</h3>
        <div class="card-tools">
            <a onclick="loadPage('content-wrapper', './addnewsform.php')" class="btn btn-success">Agregar</a>
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
                        <th>Fecha</th>
                        <th>Título</th>
                        <th>Bajadilla</th>
                        <th>Imagen</th>
                        <th>Descripción</th>
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
    var options = "";

    $(document).ready(function () {
        setTimeout(function (){
            window.loading_screen.finish();
        }, 4000);
        //* Llamamos al metodo de obtener categorias para obtener la lista y despues obtener todos los datos de la base de datos y preparar el modal de editar que esta en el string de la variable rows
        getCategories();
    });
    function getCategories(){
        $.ajax({
            type: "POST",
            url: "../Business/categoryaction.php",
            data: {'action': 'getAll'},
            dataType: "json",
            success: function (response) {
                getAll(response);
            }
        });
    }
    function getAll(categoriesOptions){
        $.ajax({
            type: "POST",
            url: "../Business/newsaction.php",
            data: {
                'action': 'getAll'
            },
            dataType: "json",
            success: function (response) {
                var rows = "";
                var options = "";
                // var options = ""; 
                if(response != ""){//Si vienen registros
                    // alert(window.categories);
                    for (let i = 0; i < response.length; i++) {
                        options = "";
                        //* Para iniciar, procesamos las categorias para saber a cual categoria pertenece cada noticia y dejarlo plasmado en el select de editar
                        for(let j = 0; j < categoriesOptions.length; j++){
                            if(categoriesOptions[j]['id'] == response[i]['id_category']){
                                options += "<option selected value='"+categoriesOptions[j]['id']+"'>"+categoriesOptions[j]['name']+"</option>"
                            }else{
                                options += "<option value='"+categoriesOptions[j]['id']+"'>"+categoriesOptions[j]['name']+"</option>"
                            }
                        }

                        rows += "<tr>" +
                        "<td>" + response[i]['date'] + "</td>" +
                        "<td>" + response[i]['title'] + "</td>" +
                        "<td>" + response[i]['bajadilla'] + "</td>" +

                        "<td>" +
                            "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#myModalimg"+response[i]['id']+"'>ver</button>" +
                            "<div class='modal fade' id='myModalimg"+response[i]['id']+"' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>" +     
                            "<div class='modal-dialog modal-lg' role='document'>" +
                                        "<div class='modal-content'>" +
                                            "<div class='modal-header'>" +
                                                "<h4 class='modal-title'>Imagen de noticia</h4>" +
                                                "<div id='message'></div>" +
                                            "</div>" +
                                            "<div class='modal-body text-center'>" +
                                                // '<img class="img-thumbnail" src="data:'+response[i]['img_type']+';base64,'+response[i]['image']+'">' +
                                                "<img class='img-thumbnail' src='../Resources/News-resources/"+response[i]['image']+"' alt='Imagen de la noticia'/>" +
                                            "</div>" +
                                            "<div class='modal-footer'>" +
                                                "<button type='button' class='btn btn-default close' data-dismiss='modal'>Cerrar</button>" +
                                            "</div>"+
                                        "</div>"+
                                    "</div>"+
                                "</div>"+
                        "</td>" +
                        "<td>" +
                            "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#myModalDescription"+response[i]['id']+"'>ver</button>" +
                            "<div class='modal fade' id='myModalDescription"+response[i]['id']+"' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>" +     
                            "<div class='modal-dialog modal-lg' role='document'>" +
                                        "<div class='modal-content'>" +
                                            "<div class='modal-header'>" +
                                                "<h4 class='modal-title'>Formulario</h4>" +
                                                "<div id='message'></div>" +
                                            "</div>" +
                                            "<div class='modal-body'>" +
                                                "<div class='text-left'>"+ response[i]['description'] + "</div>" +
                                            "</div>" +
                                            "<div class='modal-footer'>" +
                                                "<button type='button' class='btn btn-default close' data-dismiss='modal'>Cerrar</button>" +
                                            "</div>"+
                                        "</div>"+
                                    "</div>"+
                                "</div>"+
                        "</td>" +

                        "<td class='d-flex justify-content-center'>" +
                            "<a onclick=\"loadPage('content-wrapper', './editnewsform.php?id="+response[i]['id']+"')\" class='btn btn-warning'>Editar</a>" +
                            "<form id='delete-news-form' class='pl-1' method='post'>" +
                                "<input type='hidden' name='action' value='Delete'>" +
                                "<input type='hidden' name='id' id='id' value='"+ response[i]['id'] +"'>" +
                                "<input class='btn btn-danger' type='submit' value='Eliminar' onClick='delete_("+response[i]['id']+")'>" +
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
                    $('#table tbody').html('<p class="text-danger">No hay noticias para mostrar</p>');
                }
            }
        });
    }
   
   function delete_(id){
        //Detenemos el envio de los datos del formulario
        event.preventDefault();
        //Hacemos consulta ajax para extraer los datos de nuevo y refrescar la lista
        $.ajax({
                type: "POST",
                url: "../Business/newsaction.php",
                data: {
                    'action': 'delete',
                    'id': id
                },
                dataType: "json",
                success: function (response) {
                    if(response['message'] == 'success'){
                        swal.fire("Éxito!", "Noticia eliminada exitosamente", "success");
                        dataTable.destroy();
                        getCategories();
                    }else if(response['message'] == 'error'){
                        swal.fire("Error!", "Ha ocurrido un error al eliminar la noticia", "error");
                    }
                }
            });
    }

</script>