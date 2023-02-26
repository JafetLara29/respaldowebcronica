<div class="card">
    <div class="card-header text-center red-dark">
        <h3 class="card-title text-center">Agregar anuncio</h3>
    </div>
    <div class="card-body">
        <div class="text-center" id="ads-guide-container">

        </div>
        <form id="form" method="post">
            <div class="mb-3">
              <label for="page" class="form-label">Seleccione la página donde desea que se muestre el anuncio:</label>
              <select class="form-control" name="page" id="page">
                <option value="Seleccionar">Seleccionar</option>
                <option value="Noticias">Noticias</option>
                <option value="Categorias">Categorias</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="position" class="form-label">Seleccione el lugar dentro de la página donde se debe mostrar el anuncio:</label>
              <select class="form-control" name="position" id="position">
                <option value="Seleccionar">Seleccionar</option>
                <option value="Arriba">Arriba</option>
                <option value="Derecha">Derecha</option>
              </select>
            </div>
            <div class="mb-3">  
                <textarea class="form-control" name="description" id="description" placeholder="Descripción" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Seleccione la imagen:</label>
                <input type="file" class="form-control" name="image" id="image" required/>
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Ingrese el link de la imagen publicitaria:</label>
                <input type="text" class="form-control" name="link" id="link" placeholder="Link"/>
            </div>
            <!-- Input hidden de action -->
            <input type="hidden" name="action" value="save">
            <input class="btn btn-success" type="submit" value="Agregar">
        </form>
    </div>
</div>
<script>
    $('#page').on('change', function (){
        if($('#page').val() == "Seleccionar"){
            $('#ads-guide-container').html('');
        } else if($('#page').val() == "Noticias" && $('#position').val() == "Arriba"){
            $('#ads-guide-container').html('<img style="max-width:400px" class="img-thumbnail" src="../Images/ad-guide-news-top.png" alt="Imagen de guía para posiciones de anuncios">');
        }else if($('#page').val() == "Noticias" && $('#position').val() == "Derecha"){
            $('#ads-guide-container').html('<img style="max-width:400px" class="img-thumbnail" src="../Images/ad-guide-news-rigth.png" alt="Imagen de guía para posiciones de anuncios">');
        }
    });
    $('#position').on('input', function () {
        // Página de noticia
        if($('#page').val() == "Noticias" && $('#position').val() == "Arriba"){
            $('#ads-guide-container').html('<img style="max-width:400px" class="img-thumbnail" src="../Images/ad-guide-news-top.png" alt="Imagen de guía para posiciones de anuncios">');
        }else if($('#page').val() == "Noticias" && $('#position').val() == "Derecha"){
            $('#ads-guide-container').html('<img style="max-width:400px" class="img-thumbnail" src="../Images/ad-guide-news-rigth.png" alt="Imagen de guía para posiciones de anuncios">');
        }
        // Página de categorías
        if($('#page').val() == "Categorias" && $('#position').val() == "Arriba"){
            $('#ads-guide-container').html('<img style="max-width:400px" class="img-thumbnail" src="../Images/ad-guide-categories-top.png" alt="Imagen de guía para posiciones de anuncios">');
        }else if($('#page').val() == "Categorias" && $('#position').val() == "Derecha"){
            $('#ads-guide-container').html('<img style="max-width:400px" class="img-thumbnail" src="../Images/ad-guide-categories-rigth.png" alt="Imagen de guía para posiciones de anuncios">');
        }
    });

    $('#form').submit(function(event) {
        event.preventDefault();
        //Verificamos que todos los campos contengan información
        if($('#description').val() == '' || $('#image').val() == '' || $('#page').val() == 'Seleccionar' || $('#position').val() == 'Seleccionar'){
            swal.fire("Error!", "Hay campos sin rellenar, por favor ingrese todos los datos que se le solicitan", "error");
        }else{
            $.ajax({
                type: "POST",
                url: "../Business/adaction.php",
                data: new FormData(this),
                processData: false,  // tell jQuery not to process the data
                contentType: false,   // tell jQuery not to set contentType
                dataType: "json",
                success: function (response) {
                    if(response['message'] == 'success'){
                        swal.fire("Registro exitoso", "Anuncio registrado con éxito", "success");
                        $('#form')[0].reset();
                    }else if(response['message'] == 'error'){
                        swal.fire("Error!", "Ha ocurrido un error al registrar el anuncio", "error");
                    }else if(response['message'] == 'img-error'){
                        swal.fire("Error!", "Ha ocurrido un error al procesar la imagen seleccionada", "error");
                    }else if(response['message'] == 'description-error'){
                        swal.fire("Error!", "El input de descripción debe ser llenado", "error");
                    }
                }
            });
        }

    });
</script>