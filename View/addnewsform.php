<div class="card card-info">
    <div class="card-header text-center red-dark">
        <h3 class="card-title text-center">Formulario de noticia</h3>
    </div>
    <div class="card-body">
        <form id="form" method="post">
            <div class="mb-3">
                <label for="file" class="form-label">Imagen principal</label>
                <input type="file" class="form-control" name="image" id="image" placeholder="Imagen" aria-describedby="fileHelpId" accept="image/*" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="title" id="title" placeholder="Titulo" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="bajadilla" id="bajadilla" placeholder="Bajadilla" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Seleccione la categoría a la que pertenece la noticia</label>
                <select class="form-control" name="id_category" id="id_category">
                    <option>Seleccionar</option>
                </select>
            </div>
            <div class="mb-3">
                <div id="description-editor">

                </div>
                <input type="hidden" name='description' id="description-final">
                <!-- <textarea type="text" class="form-control" name="description" id="description" placeholder="Descripción" required></textarea> -->
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Sección de archivos</label>
                <div class="row mb-2">
                    <!-- <form id="file-form" action="../Business/fileaction.php" method="POST"> -->
                        <div class="col" style="min-width:250px">
                            <input type="file" class="form-control" name="file-input" id="file-input" placeholder="" aria-describedby="fileHelpId">
                            <progress style="width:100%" class="form-input" id="progressBar" value="0" max="100"></progress>
                        </div>
                        <div class="col">
                            <input id="file-submit-btn" type="button" class="btn btn-dark" onClick="saveFile()" value="Registrar archivo">
                        </div>
                    <!-- </form> -->
                </div>
                <table class="table table-striped table-responsive" id="table-files">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Archivo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
            <!-- <img src="" alt=""> -->
            <!-- Variables hidden -->
            <input type="hidden" name="id_journalist" value="1">
            <input type="hidden" name="action" value="save">
            <input class="btn btn-success" type="submit" value="Guardar noticia">
        </form>
    </div>
</div>
<script src="../JS/quill.js"></script>
<!-- Initialize Quill editor -->
<script>
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'], // toggled buttons
        // ['blockquote'],

        [{
            'header': 1
        }, {
            'header': 2
        }], // custom button values
        [{
            'list': 'ordered'
        }, {
            'list': 'bullet'
        }],
        [{
            'script': 'sub'
        }, {
            'script': 'super'
        }], // superscript/subscript
        [{
            'indent': '-1'
        }, {
            'indent': '+1'
        }], // outdent/indent
        [{
            'direction': 'rtl'
        }], // text direction

        [{
            'size': ['small', false, 'large', 'huge']
        }], // custom dropdown
        [{
            'header': [1, 2, 3, 4, 5, 6, false]
        }],

        [{
            'color': []
        }, {
            'background': []
        }], // dropdown with defaults from theme
        // [{ 'font': [] }],
        [{
            'align': []
        }],
        ['image'],
        // ['clean']                                         // remove formatting button
    ];
    var options = {
        // debug: 'info',
        modules: {
            toolbar: toolbarOptions
        },
        placeholder: 'Escribe tu noticia aquí...',
        readOnly: false,
        theme: 'snow'
    };
    var quill = new Quill('#description-editor', options);
</script>

<script>
    // Al recargar la pagina o al entrar se cargara lo que se encuentra en este script
    $(document).ready(function() {
        getAllFiles();
        // Para obtener las categorias
        $.ajax({
            type: "POST",
            url: "../Business/categoryaction.php",
            data: {
                'action': 'getAll'
            },
            dataType: "json",
            success: function(response) {
                if (response == '') {
                    $("#id_category").html("<option>Debe registrar categorías</option>");
                } else {
                    var options = "<option value='Seleccionar'>Seleccionar</option>";
                    for (let i = 0; i < response.length; i++) {
                        options += "<option value='" + response[i]['id'] + "'>" + response[i]['name'] + "</option>";
                    }
                    $("#id_category").html(options);
                }
            }
        });
    });

    //Evento del formulario | Evita que se envien los datos de manera convencional y los envia por ajax 
    $('#form').on('submit', function (e) {
        e.preventDefault();
        // alert('Si activa metodo');
        window.description = quill.container.firstChild.innerHTML;
        $("#description-final").val(window.description);

        //Verificamos que todos los campos contengan información
        if ($('#image').val() == '' || $('#title').val() == '' || $('#bajadilla').val() == '' || $('#id_category').val() == 'Seleccionar' || $('#description').val() == '') {
            swal.fire("Error!", "Hay campos sin rellenar, por favor ingrese todos los datos que se le solicitan", "error");
        } else {

            $.ajax({
                type: "POST",
                url: "../Business/newsaction.php",
                data: new FormData(this),
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                dataType: "json",
                success: function(response) {
                    // console.log(window.description);
                    if (response['message'] == 'success') {
                        swal.fire("Registro exitoso", "Noticia registrada con éxito", "success");
                        $("#form")[0].reset();
                        // quill.deleteText();
                        getAllFiles();
                    } else if (response['message'] == 'error') {
                        swal.fire("Error!", "Ha ocurrido un error al registrar la noticia", "error");
                    } else if (response['message'] == 'inputs-error') {
                        swal.fire("Error!", "No se han suministrado todos los datos requeridos", "error");
                    } else if (response['message'] == 'img-error') {
                        swal.fire("Error!", "El formato de la imagen no es aceptado", "error");
                    }
                }
            });
        }

    });
</script>

<!-- Script para guardar los archivos  -->
<script>
    // $('#file-submit-btn').on('click', function () {
    function saveFile(){    
        let progressBar = document.querySelector("#progressBar");
        let ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", function(e){
            let percent = (e.loaded / e.total) * 100;
            progressBar.value = Math.round(percent);
        });
        // Evento para cuando se complete la accion
        ajax.upload.addEventListener("load", function(e){
            setTimeout(function (){
                progressBar.value = 0;
                $('#file-input').val('');
                getAllFiles(); 
            }, 1000);
        });

        var file = $("#file-input").get(0).files;
        var formData = new FormData();

        formData.append('file', file[0]);
        formData.append('action', 'save');
        ajax.open("POST", "../Business/fileaction.php");
        ajax.send(formData);
        //Peticion ajax
        // $.ajax({
        //     type: "POST",
        //     url: "../Business/fileaction.php",
        //     data: formData,
        //     dataType: "json",
        //     processData: false,
        //     contentType: false,
        //     success: function(response) {
        //         if (response['message'] == 'success') {
        //             swal.fire("Éxito!", "Se ha ligado el archivo a la noticia", "success");
        //             getAllFiles();
        //         } else if (response['message'] == 'error') {
        //             swal.fire("Error!", "Ha ocurrido un error al subir el archivo deseado", "error");
        //         }
        //     }
        // }); 
    // });
        }
    function getAllFiles(){
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        $('#table-files tbody').html('<img src="../Images/loading.gif" alt="Imagen de carga de contenido">');
                    }
            }, false);
            return xhr;
            },
            type: "POST",
            url: "../Business/fileaction.php",
            data: {
                'action': 'getAll'
            },
            dataType: "json",
            success: function(response) {
                var rows = "";
                var showFile = "";
                if (response != "") { //Si vienen registros
                    for (let i = 0; i < response.length; i++) {
                        if(response[i]['type'].includes("video")){
                            showFile = '<video style="width:100%" src="../Resources/News-resources/'+response[i]['file']+'" controls>El video no es soportado por su navegador. Haga click aquí para descargarlo</video>';
                        }else if(response[i]['type'].includes("image")){
                            showFile = '<img style="width:100%" src="data:'+response[i]['type']+';base64,'+response[i]['file']+'">';
                        }else if(response[i]['type'].includes("audio")){
                            showFile = '<audio style="width:100%" controls><source src="data:'+response[i]['type']+';base64,'+response[i]['file']+'">Tu navegador no soporta audio HTML5.</audio>';
                        }
                        rows += "<tr>" +
                            // "<td>" + response[i]['id'] + "</td>" +
                            "<td>" + response[i]['name'] + "</td>" +
                            "<td>" + response[i]['type'] + "</td>" +
                            '<td>' +
                                '<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId'+i+'">' +
                                    'Ver' +
                                '</button>' +
                                '<div class="modal fade" id="modelId'+i+'" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">' +
                                    '<div class="modal-dialog" role="document">' +
                                        '<div class="modal-content">' +
                                            '<div class="modal-header">' +
                                                '<h5 class="modal-title">Archivo de noticia</h5>' +
                                            '</div>' +
                                            '<div class="modal-body">' +
                                                showFile +
                                            '</div>' +
                                            '<div class="modal-footer">' +
                                            '<button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cerrar</button>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</td>' +
                            "<td><input class='btn btn-danger' type='button' value='Eliminar' onClick='deleteFile("+response[i]['id']+")'></td>" +
                            "</tr>";
                    }
                    $('#table-files tbody').html(rows);
                } else { //Si no vienen registros
                    $('#table-files tbody').html('<p class="text-danger">No hay archivos para mostrar</p>');
                }
            }
        });
    }
    function deleteFile(id){
        $.ajax({
            type: "POST",
            url: "../Business/fileaction.php",
            data: {
                    'action': 'delete',
                    'id': id
                },
            dataType: "json",
            success: function (response) {
                if (response['message'] == 'success') {
                        swal.fire("Éxito!", "Archivo eliminado con éxito", "success");
                        getAllFiles();
                    } else if (response['message'] == 'error') {
                        swal.fire("Error!", "Ha ocurrido un error al eliminar el archivo", "error");
                    }
            }
        });
    }
</script>